<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    $ImageFormatURI = "";

    $upload = 'err';
    if(isset($_SESSION[$UserToken."UserName"]))
    { 
        if($_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)
        {
            if(!empty($_FILES['file']) && isset($_SESSION[$UserToken."IdWebhook"]))
            {
                $IdWebhook =  $_SESSION[$UserToken."IdWebhook"];
                
                //Ottieni nome file
                $fileName = basename($_FILES['file']['name']); 
                
                //Ottieni path
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

                //Ottieni contenuto file
                $Uri = file_get_contents($_FILES['file']['tmp_name']);

                $ImageFormatURI = "data:image/$fileType;base64,".base64_encode($Uri);

                $discord->webhook->modifyWebhook(
                    [
                        'webhook.id' => intval($IdWebhook),
                        'avatar' => $ImageFormatURI
                    ]
                );

                $upload = 'ok';
            }
        }
    }

    echo $upload;
?>