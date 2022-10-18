<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        if(isset($_POST["IdCanale"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)
        {
            if($_POST["IdCanale"] != "")
            {
                $IdCanale = intval(filter_input(INPUT_POST, "IdCanale", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));

                $WebHookChannel = $discord->webhook->getChannelWebhooks(['channel.id' => intval($IdCanale)]);

                ?>
                    <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                        <div class="col-lg-6">
                            <h3>Gestione discord</h3>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title mb-0">Visualizzazione canali</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                        </div>
                        <div class="table-responsive add-project">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>Id webhook</th>
                                <th>Nome webhook</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php

                                $HowManyWebHooks = count($WebHookChannel);

                                for($i=0; $i < $HowManyWebHooks; $i++)
                                {
                                    $IdWebhook = $WebHookChannel[$i]->id;
                                    echo "
                                    <tr id='$i'>
                                        <td id='IdWebhook'>".$IdWebhook."</td>
                                        <td>".$WebHookChannel[$i]->name."</td>
                                        <td></td>
                                        <td style='text-align:right;'>
                                            <button class='btn btn-primary' onclick='visualizzaWebhookCompleto(".$IdWebhook."n);'>Visualizza e modifica</button>
                                            <button class='btn btn-danger' onclick='cambiaVariabili(".$IdWebhook."n);' data-toggle=\"modal\" data-original-title=\"test\" data-target=\"#sureToDelete\" type=\"button\">Elimina</button>
                                        </td>
                                    </tr>
                                    ";

                                }

                                ?>
                        </tbody>  
                      </table>
                    </div>
                  </div>
                </div>
                <script>
                    IdWebhook = 0;

                    function cambiaVariabili(IdWebhook_)
                    {
                        IdWebhook = IdWebhook_;
                    }

                    function visualizzaWebhookCompleto(IdWebhook_)
                    {
                        $.post("./visualizzaWebhookCompleto.php",  {"IdWebhook" : IdWebhook_} )
                        .done(function( result )
                        {
                            $("#main").html(result);
                        });
                    }

                    function eliminaWebhook()
                    {
                        $.post("./eliminaWebhook.php",  {"IdWebhook" : IdWebhook} )
                        .done(function( result )
                        {
                            $("#main").html(result);
                        });
                    }
                </script>
                <?php
                PrintSureDeleteModal("eliminaWebhook");
                //echo '<pre>'; print_r($WebHookChannel); echo '</pre>';
            }
        }
    }
?>