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

            AggiornaStatoAnnuncio($UserToken, $TitoloAnnuncio, 1);
        }
        else
            echo "<p> Non hai i permessi per visualizzare questa sezione . . .<p>";
    }
    else
        echo "Wops, sembra che qualcosa sia andato storto :(";
?>