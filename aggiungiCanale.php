<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;
    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)    //Se il mio utente è loggato
    {
        if(isset($_POST["IdCanale"]) && $_POST["IdCanale"] != 0)
        {
            $IdCanale = filter_input(INPUT_POST, "IdCanale", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

            $Array = array_fill(0,1,0);

            $Array[0] = new DatoInsertSQL();
            $Array[0]->NomeParametro = "IdCanaleDiscord";
            $Array[0]->Valore = $IdCanale;
            $Array[0]->Numero = '';

            if(AggiungiInTabella("CanaliDiscord",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables))
            {
                try
                {
                    $ChannelGot = $discord->channel->getChannel(['channel.id' => intval($IdCanale) ]);
                    UpdateCanaleDiscord(intval($IdCanale),$ChannelGot->name);
                    echo "Canale aggiunto e aggiornato con successo.";
                }
                catch (Exception $e)
                {
                    echo "Il canale è stato aggiunto con sucesso al database, ma non sembra essere presente nel server.";
                }
            }
            else
                echo "Sembra ci sia stato un errore nell'inserimento del canale. Controlla che non sia stato già inserito, altrimenti contatta lo sviluppatore.";
        }
        else
            echo "0 Errore nell'ottenimento del canale.";
    }
    else
        echo "0 Sembra tu non abbia i permessi per accedere a questa sezione.";
?>