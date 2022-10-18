<?php
    session_start();

    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';
    include 'googleConfig.php';

    require_once(__DIR__."/assets/vendor/autoload.php"); 

    $UserToken = GetUserToken();
    
    /*
    if(!isset($_SESSION[$UserToken."UserName"]))
    {
        if(isset($_GET["code"]))
        {
            $Token = $GoogleClient->fetchAccessTokenWithAuthCode($_GET["code"]);

            if(!isset($Token['error']))
            {
                //$_SESSION[$UserToken."GoogleToken"] = $Token["access_token"];
                $GoogleService = new Google_Service_Oauth2($GoogleClient);

                $Data = $GoogleService->userinfo->get();

                $_SESSION[$UserToken."Nome"] = $Data['given_name']. " " .$Data['family_name'];
                $_SESSION[$UserToken."UserName"] = $Data['email'];

                $_SESSION[$UserToken."Privilegi"] = 0;
                $_SESSION[$UserToken."IdUtente"] = 0;

                $_SESSION[$UserToken."Notify"] = SUCCESS | LOGINSUCCESS;
            }
            else
                $_SESSION[$UserToken."Notify"] = ERROR | LOGINGOOGLEREFUSE;
        }
        else
            $_SESSION[$UserToken."Notify"] = ERROR | LOGINGOOGLEREFUSE;
    }
    else
        $_SESSION[$UserToken."Notify"] = ERROR | ALREADYLOGGED;
    */

    header("Location: index.php");
?>