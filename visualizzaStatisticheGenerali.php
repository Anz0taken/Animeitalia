<?php
    session_start();
    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    if(isset($_SESSION[$UserToken."Privilegi"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOSTATISTICHE )    //Se il mio utente è loggato
    {
        /*=====================================================================
            Fase fetch dati dal server
        ---------------------------------------------------------------------*/

        /* Connessione */
        $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

        /* Ottenimento messaggi salotto */
        //$Messages = $discord->channel->getChannelMessages(['channel.id' => 778617681690624020]);
        //$ChannelGot = $discord->channel->getChannel(['channel.id' => 699345123812704456]);
        //$User = $discord->user->getUser(['user.id' => 463746363625046036]);
        //$Guild = $discord->guild->getGuildEmbed(['guild.id' => 668070203870937123]);  //Id server
        //$discord->webhook->deleteWebhook(['webhook.id' => 780803374278639626]);
        $WebHookChannel = $discord->webhook->getChannelWebhooks(['channel.id' => 780803160557355008]);

        echo '<pre>'; print_r($WebHookChannel); echo '</pre>';
        //PrintMessages($Messages,$discord,""," : ","<br>");

        /*=====================================================================
            Fine fase fetch dati dal server
        ---------------------------------------------------------------------*/
    }
    //print("<pre>".print_r($Messages,true)."</pre>");
?>