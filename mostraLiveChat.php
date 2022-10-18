<?php
    session_start();
    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);
    
    if(isset($_SESSION[$UserToken."UserName"]) &&  $_SESSION[$UserToken."Privilegi"] & PERMESSOSTATISTICHE && isset($_POST["IdCanale"]))
    {
        $IdCanale = intval(filter_input(INPUT_POST, "IdCanale", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));

        $PreUsername = '<div style="margin:10px;" class="media left-side-chat">
            <div class="media-body d-flex">
            <div style="position:relative; top:18px;"><h5>';

        $AfterUsername = '</h5></div>
            <div class="main-chat">
            <div class="message-main"><span class="mb-0">';

        $AfterMessage = '</span></div>
            </div>
            </div>
            </div>';

        $Messages = $discord->channel->getChannelMessages(['channel.id' => $IdCanale]);
        PrintMessages($Messages,$discord,$PreUsername,$AfterUsername,$AfterMessage);
    }
?>