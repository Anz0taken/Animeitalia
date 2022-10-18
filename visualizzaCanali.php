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
                            <th>ID Canale</th>
                            <th>Nome</th>
                            <th>Ultimo aggiornamento</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php

                                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                                $db_username = DATABASEUSERNAME;
                                $db_password = PASSWORD;
                                
                                $DataBase = mysqli_connect($db,$db_username,$db_password);
                                
                                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
                                
                                $Query = Mysqli_query($DataBase,"SELECT * FROM CanaliDiscord");
                                
                                $Count = 1;

                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    $ButtonVisualizza = "<button class='btn btn-primary' onclick='visualizzaCanale(".$Row["IdCanaleDiscord"]."n)'>Visualizza in dettaglio</button>";
      
                                    echo "	<tr id='Canale_$Count'>
                                                <td id='UserName'>".$Row["IdCanaleDiscord"]."</td>
                                                <td>".$Row["NomeCanale"]."</td>
                                                <td>".$Row["LastUpdateDate"]." / ".$Row["LastUpdateTime"]."</td>
                                    
                                                <td style='text-align:right;'>

                                                    $ButtonVisualizza
                                                
                                                    <button class='btn btn-danger' onclick='cambiaVariabili(".$Row["IdCanaleDiscord"]."n)' type=\"button\" data-toggle=\"modal\" data-original-title=\"test\" data-target=\"#sureToDelete\" type=\"button\">Elimina</button>
                                                
                                                </td>
                                            </tr>
                                    ";

                                    $Count++;
                                }

                            ?>
                            
                            <script>
                                var IdCanale = 0;

                                function cambiaVariabili(IdCanale_)
                                {
                                  IdCanale = IdCanale_;
                                }

                                function eliminaCanale()
                                {
                                    if(IdCanale != 0)
                                    {
                                        $.post("./eliminaCanale.php",  {"IdCanale": IdCanale } )
                                        .done(function( result ) 
                                        {
                                          $("#main").html(result);
                                        });
                                    }
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

                        </tbody>  
                      </table>
                    </div>
                  </div>
                </div>
                <?php PrintSureDeleteModal("eliminaCanale"); ?>
        <?php
    }
?>