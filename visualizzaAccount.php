<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]) && isset($_POST["UserName"]) )    //Se il mio utente è loggato
    {
        $IdUtente = GetIdByUserName(filter_input(INPUT_POST, "UserName", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
        ?>
                <div class="container-fluid">
                  <div class="page-title">
                    <div class="row">
                      <div class="col-lg-6">
                        <h3>Gestione personale</h3>
                      </div>
                    </div>
                  </div>
                    <?php PrintUserPorfilePannel($IdUtente, false); ?>
                </div>
        <?php
    }
?>