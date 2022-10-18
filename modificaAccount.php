<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["UserName"]))    //Se il mio utente è loggato ed è stato passato per post L'username
    {
        $OwnAccount = false;
        $Username = "";

        if(isset($_POST["UserName"]))
        {
            $Username = filter_input(INPUT_POST, "UserName", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            if($Username == $_SESSION[$UserToken."UserName"])
                $OwnAccount = true;
        }

        if($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN || $OwnAccount) //ed ho il permesso di gestire gli amministratori oppure è il mio account
        {
            if(isset($_POST["Password"]) && isset($_POST["Permessi"]) )	//controllo ulteriore dei dati immessi
            {
                //prelevo tutti i dati necessari per la registrazione dell'utente											
                $Password = filter_input(INPUT_POST, "Password", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                $Permessi = filter_input(INPUT_POST, "Permessi", FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

                $db = NOMESERVER;
                $db_username = DATABASEUSERNAME;
                $db_password = PASSWORD;
                
                $DataBase = mysqli_connect($db,$db_username,$db_password);
                
                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
                
                /*=============================================================================================================================
                effettua la ricerca nella tabella persone, ottenendo come risultato solo le colonne della tabella che hanno il nome utente
                uguale a quello inserito.
                -----------------------------------------------------------------------------------------------------------------------------*/
                $sql = "SELECT * FROM Utente WHERE NomeUtente = '$Username'";
                $Query = Mysqli_query($DataBase,$sql);

                if( $Query && Mysqli_num_rows($Query) )	//è stata trovata alcuna persona con quel nickname
                {
                    $ToDo = false;

                    $sql = "UPDATE Utente
                            SET ";
                            
                    if($Permessi != "" && $_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN )
                    {
                        $sql .= "Permessi = '$Permessi',";
                        $ToDo = true;
                    }
                    
                    if($Password != "")
                    {
                        $sql .= "PasswordUtente = '$Password'";
                        $ToDo = true;
                    }
                        
                    $sql .= "WHERE NomeUtente = '$Username' ";
                    
                    if($ToDo)
                        if( mysqli_query($DataBase, $sql) ) //prova ad aggiungere l'utente
                            echo "1CODE : L'account e' stato modificato con successo!";
                        else
                            echo "0CODE : ERRORE : Non e' stato possibile effettuare il comando sql. ".$sql." " . mysqli_error($DataBase);
                    else
                    echo "Nessuna modifica impartita.";
                }
                else
                    echo "0CODE : Sembra non sia stato trovato l'amministratore che stai cercando :(";
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