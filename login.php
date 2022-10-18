<?php
	session_start();
	include 'vardefine.php';
	include 'functions.php';
	include 'DataBaseFunctions.php';
	$UserToken = GetUserToken();
	
	$loginExceed = false;

	if( !isset($_SESSION[$UserToken."Nome"]) )	//Se l'utente non è loggato
	{
		/* In fase di testing si ignora lìinserimento e la verifica capcha */
		if(/*isset($_POST['g-recaptcha-response'])  ||*/ true)
		{
			//Da decommentare in fase di pubblicazione effettivo
			//$res = post_captcha($_POST['g-recaptcha-response']);

			/* In fase di testing si ignora lìinserimento e la verifica capcha */
			if(/*$res['success'] ||*/ true)
			{
				if( isset($_POST["UserName"]) && isset($_POST["password"] ))	//se l'utente ha inserito i dati di login e correttamente il captcha
				{
					$db 			= NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
					$db_username 	= DATABASEUSERNAME;
					$db_password 	= PASSWORD;
					$DataBase = mysqli_connect($db,$db_username,$db_password);
					Mysqli_select_db($DataBase,NOMEDB);	
					
					/* 	
						Controllo di tutti gli utenti che hanno provato a loggare nel database.
						Ogni volta che viene tentato di effettuare il login questa procedura viene effettuata
					*/

					$GetDataUser = Mysqli_query($DataBase,"select * from ipaccessi");

					while($Row_Data = Mysqli_fetch_array($GetDataUser))
					{
						if($Row_Data[2] > 2 && time() - $Row_Data[3] > 60)	//se l'utente ha superato il numero massimo di tentativi login e sono passati 60 secondi
						{
							$IdIndirizzo = $Row_Data[0];
							Mysqli_query($DataBase,"delete from ipaccessi where idindirizzo = $IdIndirizzo");	//cancellalo dai log
						}
					}
					
					$ipaddress = $_SERVER['REMOTE_ADDR'];
					$GetDataUser = Mysqli_query($DataBase,"select * from ipaccessi where iputente = '$ipaddress'");
					$Row_Data = Mysqli_fetch_array($GetDataUser);

					if(isset($Row_Data[2]) &&  $Row_Data[3] != 0)	//se è presente l'utente nel database e ha il tempo impostato per l'attesa di relogin
						$loginExceed = true;
					
					if(!$loginExceed)
					{
						$Username = filter_input(INPUT_POST, "nomeutente", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);							
						$Password = filter_input(INPUT_POST, "passwordutente", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

						/*=============================================================================================================================
						effettua la ricerca nella tabella persone, ottenendo come risultato solo le colonne della tabella che hanno il nome utente
						e la passowrd uguali a quelle inserite dall'utente.
						-----------------------------------------------------------------------------------------------------------------------------*/
						$Query = Mysqli_query($DataBase,"SELECT * FROM Utente WHERE NomeUtente = 'Administrator'");

						if($Query && Mysqli_num_rows($Query))	//se è stata trovata almeno una colonna
						{
							$Row_Data = Mysqli_fetch_array($Query);	//estrapola la prima riga della tabella mettendolo in un array
							
							//veniene ora modificato il file della sessione aggiungendo, a quella attuale, nuove variabili
							$_SESSION[$UserToken."Privilegi"] 	= $Row_Data[4];
							$_SESSION[$UserToken."Nome"] 		= $Row_Data[2];
							$_SESSION[$UserToken."UserName"] 	= $Row_Data[1];
							$_SESSION[$UserToken."IdUtente"] 	= $Row_Data[0];

							$_SESSION[$UserToken."Notify"] 		= SUCCESS | LOGINSUCCESS;
						}
						else
						{
							if($GetDataUser && !Mysqli_num_rows($GetDataUser))	//se la query ha avuto successo e è il primo tentativo di login da parte dell'utente
							{
								$sql = "INSERT INTO IpAccessi (IpUtente,TentativiAccesso,OrarioExceed) values ('$ipaddress',1,0)";
								$GetDataUser = Mysqli_query($DataBase,$sql);
							}
							else	//se non è il primo tentativo di login dell'utente
							{
								$TentativiAccesso = $Row_Data[2] + 1;

								$sql = "UPDATE IpAccessi SET TentativiAccesso = $TentativiAccesso WHERE IpUtente = '$ipaddress'";
								Mysqli_query($DataBase,$sql);

								if($TentativiAccesso > 2)	//se l'utente ha superato il numero consentiti di accesso 3
								{
									$sql = "UPDATE IpAccessi SET OrarioExceed =".time()." WHERE IpUtente = '$ipaddress'";
									Mysqli_query($DataBase,$sql);								
								}
							}

							$_SESSION[$UserToken."Notify"] = ERROR | LOGINREFUSE;
						}
					}
					else
					{
						$_SESSION[$UserToken."Notify"] = ERROR | TOOMANYATTEMPTS;
					}
				}
				else
				{
					$_SESSION[$UserToken."Notify"] = WARNING | CREDENTIALSPROB;
				}
			}
			else
			{
				$_SESSION[$UserToken."Notify"] = WARNING | CAPCHAREFUSE;
			}
		}
		else
		{
			$_SESSION[$UserToken."Notify"] = WARNING | CAPCHAPROB;
		}
	}
	else
	{
		$_SESSION[$UserToken."Notify"] = ERROR | ALREADYLOGGED;
	}

	header("Location:index.php");