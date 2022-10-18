<?php
    session_start();
    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]) &&  $_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)
    {
      if( isset($_POST["IdAttivita"]) )
      {
        ?>

          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-lg-6">
                  <h3>Informazioni evento</h3>
                </div>
              </div>
            </div>
          </div>
          
        <?php
        
        $IdAttivita = filter_input(INPUT_POST, "IdAttivita", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        
        $db = NOMESERVER;
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;

        $DataBase = mysqli_connect($db,$db_username,$db_password);

        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

        $Query = Mysqli_query($DataBase,"SELECT * FROM Attivita WHERE IdAttivita = $IdAttivita");

        if($Row = Mysqli_fetch_array($Query))
        {
          ?>
            <div class="col-sm-12">
              <div class="card">
                  <div class="card-header">
              <h5>Evento "<?php echo $Row["Titolo"] ?>"</h5>
              </div>
              <div class="card-body">
                  <p>Qui troverai tutti i dettagli dell'webhook!</p>
                  <div class="table-responsive">
                  <table class="table table-bordered">
                      <tbody>

                      <tr>
                          <th class="text-nowrap" scope="row">Creatore evento</th>
                          <td colspan="5">
                            <?php 
                              $Utente = GetUserProfileById( intval($Row["IdUtente"]) );
                              echo $Utente["NomeUtente"];
                            ?>
                          </td>
                      </tr>

                      <tr>
                          <th class="text-nowrap" scope="row">Descrizione</th>
                          <td colspan="5">
                          <?php echo $Row["Descrizione"] ?>
                          </td>
                      </tr>

                      <tr>
                          <th class="text-nowrap" scope="row">Data inizio data/orario</th>
                          <td colspan="5">
                            <?php echo $Row["DataAttivitaInizio"] ?> - <?php echo $Row["OrarioInizio"] ?>
                          </td>
                      </tr>

                      <tr>
                          <th class="text-nowrap" scope="row">Data fine data/orario</th>
                          <td colspan="5">
                            <?php echo $Row["DataAttivitaFine"] ?> - <?php echo $Row["OrarioFine"] ?>
                          </td>
                      </tr>
                      

                      </tbody>
                  </table>
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
            </script>
          <?php
        }
      }
    }
    else
      echo "Non hai i permessi per visualizzare questa pagina.";
?>