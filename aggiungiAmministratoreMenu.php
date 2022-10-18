<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        ?>
            <style>
              .option
              {
                margin-top: 4px;
                position: relative;
                font-size: 18px;
                line-height: 20px;
                font-weight: 400;
                width: 100%;
              }
            </style>
            
            <div class="container-fluid">
                <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                    <h3>Gestione amministratori</h3>
                    </div>
                </div>
                </div>
            </div>

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row starter-main">

                <div class="col-xl-12">
                  <form class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Inserisci dati</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group mb-3">
                            <label class="form-label">Username</label>
                            <input id="UserName" class="form-control" type="text" placeholder="Username">
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                          <div class="form-group mb-3">
                            <label class="form-label">Nome utente</label>
                            <input id="Nome" class="form-control" type="text" placeholder="Nome utente">
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                          <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input id="Password" class="form-control" type="password" placeholder="password">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label">Permessi</label>
                            <div class="option">
                              <?php PrintPermessiHTML(); ?>
                            </div>
                        </div>

                      </div>
                    </div>

                    <div class="card-footer">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-lg-6">
                              <h3 id="dialogBox"></h3>
                            </div>
                            <div class="col-lg-6 text-right">
                              <input type="button" onclick="controllaEAggiungi()" class="btn btn-primary" value="Aggiungi"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
        <script>
            function controllaEAggiungi()
            {
                //controllo i permessi
                var Permessi_edit = 0;

                <?php PrintPermessiJS(); ?>

                if(Permessi_edit == 0)
                  $("#ModalInfoClose").modal()
                else
                {
                    var UserName = document.getElementById("UserName").value;
                    var Nome = document.getElementById("Nome").value;
                    var Password = document.getElementById("Password").value;
                    
                    Password = sjcl.codec.hex.fromBits(sjcl.hash.sha256.hash(Password));

                    UserName = UserName.toUpperCase();
                    
                    if( UserName != "" && Nome!="" && Password!="" )    //se l utente ha settato tutti i parametri necessari
                    {
                        $.post("./aggiungiAdmin.php",  {"UserName": UserName , "Nome": Nome, "Password" : Password, "Permessi" : Permessi_edit} )
                        .done(function( result )
                        {   
                            if(result[0] == "0")
                            {
                              $("#dialogBox").html(result);
                            }
                            else
                              $("#main").html(result);
                        });
                    }
                    else
                      $("#ModalInfoClose").modal()
                }
            }
        </script>
        <?php
        PrintInfoModal("ModalInfoClose","Attenzione","Controlla di aver inserito tutti i dati e di aver dato almeno un permesso.");
    }
?>