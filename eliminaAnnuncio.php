<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]))    //se il mio utente è loggato
    {
        if($_SESSION[$UserToken."Privilegi"] & PERMESSONEWS)  //ed ho il permesso di gestire gli amministratori
        {
            $TitoloAnnuncio = filter_input(INPUT_POST, "TitoloAnnuncio", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
            $db_username = DATABASEUSERNAME;
            $db_password = PASSWORD;
            
            $DataBase = mysqli_connect($db,$db_username,$db_password);
            
            Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
            
            $sql = "DELETE FROM Annunci WHERE Titolo = '$TitoloAnnuncio' AND Stato != 2";

            if(!($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN))
                $sql.= " AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]." ";

            if( mysqli_query($DataBase, $sql) ) //prova ad aggiungere l'utente
            {
                $date = date('Y-m-d H:i:s');

                $sql = "INSERT INTO AdminLogs
                (IdUtente, TipoTabella, TipoComando, ComandoCompleto, Giorno, Orario) VALUES
                (".$_SESSION[$UserToken."IdUtente"].", ".ANNUNCI.", ".DELETE.", \"$sql\", '$date','$date')";

                $Query = Mysqli_query($DataBase,$sql);

                echo "Annuncio eliminato con successo!";
            }
            else
                echo "ERRORE : Non e' stato possibile effettuare il comando sql. ".$sql." " . mysqli_error($DataBase);
        }
        else
            echo "<p> Non hai i permessi per visualizzare questa sezione . . .<p>";
    }
    else
        echo "Wops, sembra che qualcosa sia andato storto :(";
?>