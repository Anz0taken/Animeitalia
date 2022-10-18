<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["BotName"]) && isset($_POST["Content"]) && isset($_POST["IdCanale"]) && isset($_POST["EmbedsFormActive"]))
    {
        $IdCanale = intval(filter_input(INPUT_POST, "IdCanale", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
        $BotName = filter_input(INPUT_POST, "BotName", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        $Content = filter_input(INPUT_POST, "Content", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

        $Embeds = intval(filter_input(INPUT_POST, "EmbedsFormActive", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
        
        if($Embeds && !(isset($_POST["NomeTitoloEmbeds"]) && isset($_POST["DescrizioneEmbeds"]) && isset($_POST["coloreEmbeds"]) ))
        {
            $Embeds = false;
        }

        if($Embeds)
        {
            $NomeTitoloEmbeds = filter_input(INPUT_POST, "NomeTitoloEmbeds", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $DescrizioneEmbeds = filter_input(INPUT_POST, "DescrizioneEmbeds", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            $coloreEmbeds = filter_input(INPUT_POST, "coloreEmbeds", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
            
            if($NomeTitoloEmbeds == "" || $DescrizioneEmbeds == "" || $coloreEmbeds == "")
                $Embeds = false;
        }

        if($IdCanale != 0 && $BotName != "" && ($Content != "" || $Embeds == 1))
        {
            $WebHookChannel = $discord->webhook->getChannelWebhooks(['channel.id' => $IdCanale,]);

            $HowManyWebHooks = count($WebHookChannel);

            $Found = false;

            for($i=0; $i < $HowManyWebHooks && !$Found; $i++)
            {
                if($WebHookChannel[$i]->name == "CommunicationWebHook")
                {
                    $Found = true;
                    $WebHookChannel = $WebHookChannel[$i];
                }
            }

            if(!$Found)
            {
                $WebHookChannel = $discord->webhook->createWebhook(
                    [
                        'channel.id' => $IdCanale,
                        'name' => "CommunicationWebHook"
                        //'avatar' => 
                        ]
                );

                echo "Webhook non trovato, ne è stato creato uno.<br> Pertanto il messaggio non è stato inviato.<br> Si invita a controllare i settaggi del webhook prima di contrinuare.";
            }
            else
            {
                $ExecutionCode = [
                    'webhook.id'    => $WebHookChannel->id,
                    'webhook.token' => $WebHookChannel->token,
                    'username'      => $BotName,
                    'content'       => html_entity_decode($Content)
                ];

                if($Embeds)
                {
                    $Embeds = [
                        [
                            // Set the title for your embed
                            "title" => html_entity_decode($NomeTitoloEmbeds),
                
                            // The type of your embed, will ALWAYS be "rich"
                            "type" => "rich",
                
                            // A description for your embed
                            "description" => html_entity_decode($DescrizioneEmbeds),
                
                            // The URL of where your title will be a link to
                            //"url" => "https://www.google.com/",
                
                            // The integer color to be used on the left side of the embed
                            "color" => hexdec( $coloreEmbeds ),
                
                            // Footer object
                            "footer" => [
                                "text" => $_SESSION[$UserToken."UserName"],
                                //"icon_url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg"
                            ],
                
                            // Thumbnail object
                            //"thumbnail" => [
                            //    "url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg"
                            //],
                
                            // Author object
                            //"author" => [
                            //    "name" => "N/A",
                                //"url" => "https://www.abc.xyz"
                            //],
                        ]
                    ];

                    if(isset($_POST["LinkUrl"]))
                        if($_POST["LinkUrl"] != "")
                        {
                            $Embeds[0]["image"] = [
                            "url" => filter_input(INPUT_POST, "LinkUrl", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH)
                            ];
                        }

                    $ExecutionCode["embeds"] = $Embeds;
                }

                $discord->webhook->executeWebhook($ExecutionCode);
                echo "Messaggio inviato correttamente.";
            }
        }
        else
            echo "Controlla di aver inserito tutti i paramentri input correttamente.";
    }
    else
        echo "Wops, sembra che qualcosa sia andato storto [01]";
?>