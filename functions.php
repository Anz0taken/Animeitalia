<?php
    function post_captcha($user_response)
    {
        $fields_string = '';
        $fields = array(
            'secret' => '6LfKkvMZAAAAAMYk2vS5TNmO4MZLjmGKf72UizJW',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    function ConvertReferences($String,$discord,$Reference)
    {
        $Size = strlen($String);
        $InizioCanale = -1;
        $StringNumero = "";
        $PuntoEsc = "";
        $Debug = "";

        for($i=0; $i < $Size; $i++)
        {
            if($InizioCanale == -1 && $String[$i] == '<' && $String[$i+1] == $Reference)   //Se è stato trovato un tag channel
            {
                $InizioCanale = $i;

                if($String[$i+2] == '!')
                {
                    $PuntoEsc = "!";
                    $i++;
                }

                $i++;
            }
            else if($InizioCanale != -1 && $String[$i]=='>')   //Se è stato completato il tag
            {
                /* Ottenuto il nostro ID */
                /* Preleviamo il nostro nome del canale dal discord */
                
                if($Reference == CHANNELS)
                {
                    $NomeCanale = "";

                    if( !($NomeCanale = GetIdByTag("NomeCanale","CanaliDiscord","IdCanaleDiscord",$StringNumero)) )   //Se il canale non è presente nel database
                    {
                        try
                        {
                            $ChannelGot = $discord->channel->getChannel(['channel.id' => intval($StringNumero)]);
                            $NomeCanale = $ChannelGot->name;

                            $Array = array_fill(0,4,0);

                            $Array[0] = new DatoInsertSQL();
                            $Array[0]->NomeParametro = "IdCanaleDiscord";
                            $Array[0]->Valore = $StringNumero;
                            $Array[0]->Numero = '';

                            $Array[1] = new DatoInsertSQL();
                            $Array[1]->NomeParametro = "NomeCanale";
                            $Array[1]->Valore = $NomeCanale;
                            $Array[1]->Numero = '\'';

                            $date = date('Y-m-d H:i:s');

                            $Array[2] = new DatoInsertSQL();
                            $Array[2]->NomeParametro = "LastUpdateDate";
                            $Array[2]->Valore = $date;
                            $Array[2]->Numero = '\'';

                            $Array[3] = new DatoInsertSQL();
                            $Array[3]->NomeParametro = "LastUpdateTime";
                            $Array[3]->Valore = $date;
                            $Array[3]->Numero = '\'';

                            AggiungiInTabella("CanaliDiscord",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables);
                        }
                        catch (Exception $e)
                        {

                        }
                    }
                    
                    $String = str_replace("<#$StringNumero>","<code style='cursor:pointer;' onclick='visualizzaCanale($StringNumero"."n".")';'>".$NomeCanale."</code>",$String);
                }
                else if($Reference == USERS)
                {
                    $NomeUtente = "";

                    if( !($NomeUtente = GetIdByTag("NomeUtente","UtenteDiscord","IdUtenteDiscord",$StringNumero)) )   //Se il canale non è presente nel database
                    {
                        try
                        {
                            $User = $discord->user->getUser(['user.id' => intval($StringNumero)]);
                            $NomeUtente = $User->username;

                            $Array = array_fill(0,4,0);

                            $Array[0] = new DatoInsertSQL();
                            $Array[0]->NomeParametro = "IdUtenteDiscord";
                            $Array[0]->Valore = $StringNumero;
                            $Array[0]->Numero = '';

                            $Array[1] = new DatoInsertSQL();
                            $Array[1]->NomeParametro = "NomeUtente";
                            $Array[1]->Valore = $NomeUtente;
                            $Array[1]->Numero = '\'';

                            $date = date('Y-m-d H:i:s');

                            $Array[2] = new DatoInsertSQL();
                            $Array[2]->NomeParametro = "LastUpdateDate";
                            $Array[2]->Valore = $date;
                            $Array[2]->Numero = '\'';

                            $Array[3] = new DatoInsertSQL();
                            $Array[3]->NomeParametro = "LastUpdateTime";
                            $Array[3]->Valore = $date;
                            $Array[3]->Numero = '\'';

                            AggiungiInTabella("UtenteDiscord",$Array,$_SESSION[$UserToken.'IdUtente'], $NameToNumberSQLTables);
                            
                        }
                        catch (Exception $e)
                        {
                        }
                    }

                    $String = str_replace("<@".$PuntoEsc."$StringNumero>","<code style='cursor:pointer;' onclick=''>".$NomeUtente."</code>",$String);
                    $PuntoEsc = "";
                }

                $StringNumero = "";
                $InizioCanale = -1;
            }
            else if($InizioCanale != -1)  //Se è il carattere del tag
            {
                $StringNumero.=$String[$i];
            }
        }

        return $Debug.$String;
    }
?>