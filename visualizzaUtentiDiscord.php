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
            <h4 class="card-title mb-0">Visualizzazione utenti</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="table-responsive add-project">
            <table class="table card-table table-vcenter text-nowrap">
              <thead>
                <tr>
                  <th>ID utente</th>
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
                      
                      $Query = Mysqli_query($DataBase,"SELECT * FROM UtenteDiscord");
                      
                      $Count = 1;

                      while($Row = Mysqli_fetch_array($Query))
                      {
                          $ButtonVisualizza = "<button class='btn btn-primary' onclick='visualizzaUtente(".$Row["IdUtenteDiscord"]."n)'>Visualizza in dettaglio</button>";

                          echo "	<tr id='Canale_$Count'>
                                      <td id='UserName'>".$Row["IdUtenteDiscord"]."</td>
                                      <td>".$Row["NomeUtente"]."</td>
                                      <td>".$Row["LastUpdateDate"]." / ".$Row["LastUpdateTime"]."</td>
                          
                                      <td style='text-align:right;'>
                                          $ButtonVisualizza
                                      </td>
                                  </tr>
                          ";

                          $Count++;
                      }

                  ?>
                  
                  <script>
                      function visualizzaUtente(IdUtente)
                      {
                          $.post("./visualizzaUtente.php",  {"IdUtente": IdUtente} )
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
      <?php
    }
?>