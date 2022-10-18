<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);
    
    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)    //Se il mio utente è loggato
    {
        ?>
            <div class="container-fluid">
                <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                    <h3>Gestione webhooks server</h3>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Selezionare canale d'interesse</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse" data-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove" data-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">

                        <?php PrintSelectInput("SelectIdCanale","Canale","CanaliDiscord","NomeCanale","IdCanaleDiscord"); ?>

                      </div>

                      <br>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" onclick="mandaMessaggio()" data-original-title="" title="">Visualizza webhook</button>
                    </div>
                  </div>
                </div>

                <script>
                    function mandaMessaggio()
                    {
                        var IdCanale = document.getElementById("SelectIdCanale").value;

                        $.post("./visualizzaWebhooksCanale.php",  {"IdCanale" : IdCanale} )
                        .done(function( result )
                        {
                            $("#main").html(result);
                        });
                    }
                </script>
        <?php
    }
?>