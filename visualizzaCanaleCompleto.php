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
        $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

        try
        {
            $ChannelGot = $discord->channel->getChannel(['channel.id' => $IdCanale]);
            UpdateCanaleDiscord(intval($IdCanale),$ChannelGot->name);
            ?>
                <div class="container-fluid">
                  <div class="page-title">
                    <div class="row">
                      <div class="col-lg-6">
                        <h3>Informazioni statistiche discord</h3>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Canale selezionato "<?php echo $ChannelGot->name; ?>"</h5><span><?php echo ConvertReferences($ChannelGot->topic,$discord,CHANNELS); ?></span>
                  </div>
                  <div class="card-body">
                    <p>Qui troverai tutti i dettagli del canale!</p>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tbody>

                          <tr>
                            <th class="text-nowrap" scope="row">Tipo di canale</th>
                            <td colspan="5">
                            <?php
                                echo $ChannelType[$ChannelGot->type];
                            ?>
                            </td>
                          </tr>

                          <tr>
                            <th class="text-nowrap" scope="row">Numero utenti massimo</th>
                            <td colspan="5">
                            <?php
                                if($ChannelGot->user_limit != "")
                                  echo $ChannelGot->user_limit;
                                else
                                  echo "Illimitato";
                            ?>
                            </td>
                          </tr>

                          <tr>
                            <th class="text-nowrap" scope="row">Tempo messaggi temporizzati</th>
                            <td colspan="5">
                            <?php
                                if($ChannelGot->rate_limit_per_user != "")
                                  echo $ChannelGot->rate_limit_per_user;
                                else
                                  echo "Non settato";
                            ?>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 xl-100 chat-sec box-col-6">
                <div class="card chat-default">
                  <div class="card-header card-no-border">
                    <div class="media media-dashboard">
                      <div class="media-body">
                        <div class="row">
                          <div class="col-6">
                            <h5 class="mb-0">Livechat del canale</h5>
                          </div>
                          <div class="col-6" style="text-align:right;">
                            <button class="btn btn-primary" onclick="getLiveChat(<?php echo $IdCanale; ?>n)">Carica live chat</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="card-body chat-box">
                    <div class="chat" id="messageChat">

                    </div>
                  </div>
                </div>
              </div>
              
              </div>
              <script>
                  function getLiveChat(IdCanale)
                  {
                      $.post("./mostraLiveChat.php",  {"IdCanale": IdCanale} )
                      .done(function( result )
                      {
                          $("#messageChat").html(result);
                      });
                  }

                  function visualizzaCanale(IdCanale)
                  {
                      $.post("./visualizzaCanaleCompleto.php",  {"IdCanale": IdCanale} )
                      .done(function( result )
                      {
                          $("#main").html(result);
                      });
                  }
              </script>
              
            <?php
        }
        catch (Exception $e)
        {
            //pass
        }
    }
?>