<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]) && ($_SESSION[$UserToken."Privilegi"] & PERMESSONEWS || $_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE))    //Se il mio utente è loggato
    {
        if(isset($_POST["OldTitolo"]) && isset($_POST["NewTitolo"]) && isset($_POST["Contenuto"]))
        {
            $OldTitolo = filter_input(INPUT_POST, "OldTitolo", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $NewTitolo = filter_input(INPUT_POST, "NewTitolo", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $Contenuto = filter_input(INPUT_POST, "Contenuto", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            
            $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
            $db_username = DATABASEUSERNAME;
            $db_password = PASSWORD;
            
            $DataBase = mysqli_connect($db,$db_username,$db_password);
            
            Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
            
            $sql = "UPDATE Annunci SET Titolo = '$NewTitolo', Contenuto = '$Contenuto' WHERE Titolo = '$OldTitolo' AND Stato != 2";

            if(!($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN) && !($_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE))         //se l'utente non è un amministratore e non è un redattore
                $sql.= " AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]." ";

            if( mysqli_query($DataBase, $sql) ) //prova ad aggiungere l'utente
            {
                echo "Annuncio modificato con successo!";
            }
            else
                echo "Sembra qualcosa sia andato storto! : ";
            
        }
        else
            echo "0 Errore nell'ottenimento del nometitolo.";
    }
    else
        echo "0 Sembra tu non abbia i permessi per accedere a questa sezione.";
?>