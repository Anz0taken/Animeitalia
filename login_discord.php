<?php
    require_once(__DIR__."/assets/vendor/autoload.php"); 

    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => 'NzcyOTA1NzE2Mjg4NzE2ODEx.X6Beig.xOTTM2g7u2A2i1mYRCj-fPFe4QE']); // Token is required

    //var_dump( $discord->channel->getChannelMessages( ['channel.id' => 683340950180986979] ) );
    //var_dump( $discord->channel->createMessage( ['channel.id' => 683340950180986979, 'content' => "Hello"] ) );
?>
<?php
//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "https://discord.com/api/webhooks/776521336704991232/NPx2lm5zWJN17uAGGo_BreUs9p2kVX2an9fsAFhr6CWpTtGMwqCOvLgC_CnKYdJjf1y5";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "Questo messaggio è stato generato automaticamente da un bot. ",
    
    // Username
    "username" => "Bot user.",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );