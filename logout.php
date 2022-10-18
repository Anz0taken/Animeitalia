<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';
    require_once(__DIR__."/assets/vendor/autoload.php"); 

    $UserToken = GetUserToken();

    use RestCord\DiscordClient;

    if(isset($_SESSION[$UserToken."UserName"]))    //se sono loggato
    {
        //cancella tutte le variabili sul file della sessione inerenti all'attuale login
        unset($_SESSION[$UserToken."UserName"]);   
        unset($_SESSION[$UserToken."Nome"]);
        unset($_SESSION[$UserToken."Privilegi"]);
		
		$_SESSION[$UserToken."Notify"] = ERROR | LOGOUTSUCCESS;
    }

    header("Location:index.php");
?>