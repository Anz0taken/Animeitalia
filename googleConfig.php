<?php
    require_once __DIR__."/assets/vendor/autoload.php"; 
    $GoogleClient = new Google_Client();
    $GoogleClient->setClientId("936294172748-4u2qm4c73jgmgvo3apinvngf9n6ifnsm.apps.googleusercontent.com");
    $GoogleClient->setClientSecret("SjmZcdtXzBDVhmlI5iaYYMUU");
    $GoogleClient->setRedirectUri("https://localhost/Animeitalia_L/googleCallBack.php");
    $GoogleClient->addScope("email");
    $GoogleClient->addScope("profile");
?>