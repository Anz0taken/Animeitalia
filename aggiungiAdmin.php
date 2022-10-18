<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        if($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN) //ed ho il permesso di gestire gli amministratori
        {
            if( isset($_POST["UserName"]) && isset($_POST["Password"]) && isset($_POST["Permessi"]) && isset($_POST["Nome"]) )	//controllo ulteriore dei dati immessi
            {
                //prelevo tutti i dati necessari per la registrazione dell'utente
                $Username = filter_input(INPUT_POST, "UserName", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);											
                $Password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $Permessi = filter_input(INPUT_POST, "Permessi", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $Nome     = filter_input(INPUT_POST, "Nome", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

                $db = NOMESERVER;
                $db_username = DATABASEUSERNAME;
                $db_password = PASSWORD;
                
                $DataBase = mysqli_connect($db,$db_username,$db_password);
                
                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
                
                /*=============================================================================================================================
                effettua la ricerca nella tabella persone, ottenendo come risultato solo le colonne della tabella che hanno il nome utente
                uguale a quello inserito.
                -----------------------------------------------------------------------------------------------------------------------------*/
                $Query = Mysqli_query($DataBase,"SELECT * FROM Utente WHERE NomeUtente = '$Username'");

                if( $Query && !Mysqli_num_rows($Query) )	//se non è stata trovata alcuna persona con quel nickname
                {
                    $sql = "INSERT INTO Utente ( NomeUtente, Nome, PasswordUtente, Permessi ) values ('$Username','$Nome','$Password',$Permessi);";
                    
                    if( mysqli_query($DataBase, $sql) ) //prova ad aggiungere l'utente
                        echo "1CODE : La persona e' stata aggiunta con successo alla lista amministratori!";
                    else
                        echo "0CODE : ERRORE : Non e' stato possibile effettuare il comando sql. ".$sql." " . mysqli_error($DataBase);
                    
                }
                else
                    echo "0CODE : Sembra ci sia già un'altra persona con questo username, riprova!";
            }
            else
                echo "0CODE : Wops, sembra che qualcosa sia andato storto [01] :(";
        }
        else
            echo "0CODE : Non hai i permessi per visualizzare questa sezione . . .";
    }
    else
        echo "0 Wops, sembra che qualcosa sia andato storto [02]";
?>