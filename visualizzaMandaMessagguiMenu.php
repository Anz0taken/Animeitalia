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
        ?>
            <div class="container-fluid">
                <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                    <h3>Gestione messagistica bot</h3>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Impostazioni send message</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse" data-original-title="" title=""><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove" data-original-title="" title=""><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">

                        <div class="col-sm-6 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Nome mittente messaggio</label>
                            <input id="BotName" class="form-control" type="text" placeholder="Nome che gli utenti visualizzeranno come mittente del messaggio" data-original-title="" title="">
                          </div>
                        </div>

                        <?php PrintSelectInput("SelectIdCanale","Canale","CanaliDiscord","NomeCanale","IdCanaleDiscord"); ?>

                          <div class="col-sm-6 col-md-4" style="position:relative; top:5px; margin-bottom:30px; left:4px;" >
                              <label class="col-form-label m-r-10">Embeds integrato</label>
                              <label class="switch" style="position:relative; top:20px;">
                                <input onclick="activateEmbedsForm()" type="checkbox"><span class="switch-state"></span>
                              </label>
                          </div>

                          <!-- Inizio embeds -->
                          <div id="EmbedsForm" class="col-sm-12 col-md-12 d-none" style="margin-bottom:15px;">
                            <div class="row" style="background: rgba(55,58,66,1);">

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                  <label class="form-label">Titolo emebds</label>
                                  <input id="NomeTitoloEmbeds" class="form-control" type="text" placeholder="Titolo emebds" data-original-title="" title="">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3">
                                  <label class="form-label">Descrizione</label>
                                  <input id="DescrizioneEmbeds" class="form-control" type="text" placeholder="Descrizione embeds" data-original-title="" title="">
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-4">
                                <div class="form-group mb-3" style="position:relative; top:35px; margin-bottom:30px; left:4px;">
                                  <input id="coloreEmbeds" type="color" id="head" name="head" value="#FFFFFF">
                                  <label class="form-label">Colore emebds</label>
                                </div>
                              </div>

                              <div class="col-sm-12 col-md-12">
                                <div class="form-group mb-3">
                                  <label class="form-label">Immagine/gif URL</label>
                                  <input id="LinkUrl" class="form-control" type="text" placeholder="Inserire link" data-original-title="" title="">
                                </div>
                              </div>

                            </div>  
                          </div><!-- Fine embeds -->
                          
                        <div class="col-sm-12 col-md-12">
                          <div class="form-group mb-3">
                            <label class="form-label">Contenuto messaggio</label>
                            <textarea id="Content" rows="5" id="Contenuto" class="form-control" type="text" placeholder="Contenuto messaggio"></textarea >
                          </div>
                        </div>

                      </div>

                      <br>
                        <strong id="serverAnswer"></strong>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" onclick="mandaMessaggio()" data-original-title="" title="">Manda messaggio</button>
                    </div>
                  </div>
                </div>

                <script>
                    var EmbedsFormActive = 0;

                    function activateEmbedsForm()
                    {
                      if(EmbedsFormActive)
                      {
                        $('#EmbedsForm').addClass('d-none');
                      }
                      else
                      {
                        $('#EmbedsForm').removeClass('d-none');
                      }

                      EmbedsFormActive = (EmbedsFormActive+1)%2;
                    }

                    function mandaMessaggio()
                    {
                        var BotName = document.getElementById("BotName").value;
                        var Content = document.getElementById("Content").value;
                        var IdCanale = document.getElementById("SelectIdCanale").value;

                        //Embeds
                        var NomeTitoloEmbeds = document.getElementById("NomeTitoloEmbeds").value;
                        var DescrizioneEmbeds = document.getElementById("DescrizioneEmbeds").value;
                        var coloreEmbeds = document.getElementById("coloreEmbeds").value;
                        var LinkUrl = document.getElementById("LinkUrl").value;

                        $.post("./mandaMessaggioCanale.php",  {"BotName": BotName, "Content" : Content, "IdCanale" : IdCanale, "EmbedsFormActive" : EmbedsFormActive, "NomeTitoloEmbeds" : NomeTitoloEmbeds, "DescrizioneEmbeds" : DescrizioneEmbeds, "coloreEmbeds" : coloreEmbeds, "LinkUrl" : LinkUrl} )
                        .done(function( result )
                        {
                            $("#serverAnswer").html(result);
                        });
                    }
                </script>
        <?php
    }
?>