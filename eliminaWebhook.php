<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)
    {
        if(isset($_POST["IdWebhook"]))
        {
            if($_POST["IdWebhook"] != "")
            {
                $IdWebhook = intval(filter_input(INPUT_POST, "IdWebhook", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
                $discord->webhook->deleteWebhook(['webhook.id' => $IdWebhook]);
                
                echo "Webhook eliminato correttamente!";
            }
        }
    }