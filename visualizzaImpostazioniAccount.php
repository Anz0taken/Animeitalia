<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        ?>
                <div class="container-fluid">
                  <div class="page-title">
                    <div class="row">
                      <div class="col-lg-6">
                        <h3>Gestione personale</h3>
                      </div>
                    </div>
                  </div>
                    <?php PrintUserPorfilePannel($_SESSION[$UserToken."IdUtente"], true); ?>
                </div>

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Impostazioni account</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    
                    <div class="card-body">
                      <div class="row">

                        <div class="col-sm-12 col-md-12">
                          <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input id="Password_edit" class="form-control" type="password" placeholder="password">
                          </div>
                        </div>

                      </div>

                    </div>

                    <div class="card-footer">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-lg-6">
                              <h3 id="serverAnswer"></h3>
                            </div>
                            <div class="col-lg-6 text-right">
                              <input type="button" onclick="modificaAccount()" class="btn btn-primary" value="Aggiorna"></button>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
                <script>
                    function modificaAccount()
                    {
                        var Password_edit = document.getElementById("Password_edit").value;
                        var UserName_edit = "<?php echo $_SESSION[$UserToken."UserName"]; ?>";
                        
                        Password_edit = sjcl.codec.hex.fromBits(sjcl.hash.sha256.hash(Password_edit));

                        $.post("./modificaAccount.php",  {"UserName": UserName_edit, "Permessi" : "", "Password" : Password_edit } )
                        .done(function( result ) 
                        {
                            $("#serverAnswer").html(result);
                        });
                    }

                </script>
        <?php
    }
?>