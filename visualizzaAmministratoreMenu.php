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
                        <h3>Gestione amministratori</h3>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Visualizzazione amministratori</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="table-responsive add-project">
                      <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>Nome</th>
                            <th>Permessi</th>
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
                                
                                $Query = Mysqli_query($DataBase,"SELECT * FROM Utente");
                                
                                $Count = 1;

                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    $UserName = $Row['NomeUtente'];
                                    echo "	<tr id='Utente_$Count'>
                                                <td id='UserName'>".$Row["NomeUtente"]."</td>
                                                <td>".$Row["Nome"]."</td>
                                                <span class='status-icon bg-success'><td>".$Row["Permessi"]."</span></td>
                                                <td class=\"text-right\"><a class=\"icon\" href=\"javascript:void(0)\"></a>

                                                <button class='btn btn-success' onclick='visualizzaAccount($Count)'>Visualizza account</button>
                                                <button class='btn btn-primary' onclick='cambiaVariabili($Count)' type=\"button\" data-toggle=\"modal\" data-original-title=\"test\" data-target=\"#editAccount\">Modifica</button>
                                                <button class='btn btn-danger' onclick='eliminaAccount($Count)' type=\"button\">Elimina</button>
                                            </td>
                                            </tr>
                                    ";

                                    $Count++;
                                }

                            ?>
                            
                            <script>
                                var UserName_edit;

                                function visualizzaAccount(NumeroAccount)
                                {
                                  var UserName = $("#Utente_"+NumeroAccount+" #UserName").text();

                                  $.post("./visualizzaAccount.php",  {"UserName": UserName } )
                                  .done(function(result) 
                                  {
                                    $("#main").html(result);
                                  });
                                }

                                function cambiaVariabili(NumeroAccount)
                                {
                                  UserName_edit = $("#Utente_"+NumeroAccount+" #UserName").text();
                                  document.getElementById("utenteSelezionato").innerHTML = UserName_edit;
                                }

                                function eliminaAccount(NumeroAccount)
                                {
                                    var UserName = $("#Utente_"+NumeroAccount+" #UserName").text();

                                    $.post("./eliminaAccount.php",  {"UserName": UserName } )
                                    .done(function( result ) 
                                    {
                                        if( result == 0 )                           //se l utente cancellato e se stessi
                                            window.location.href = "./login.php";   //mandalo alla schermata homepage
                                        else                                        //altrimenti
                                        {
                                          var Testo = '<div class="container-fluid"> <div class="page-title"> <div class="row"> <div class="col-lg-6"> <h3>' + result + '</h3></div></div></div></div> ';
                                          $("#main").html(Testo);
                                        }
                                    });
                                }

                                function modificaAccount()
                                {
                                  var Permessi_edit = 0;

                                  <?php PrintPermessiJS(); ?>

                                  var Password_edit = document.getElementById("Password_edit").value;
                                  
                                  Password_edit = sjcl.codec.hex.fromBits(sjcl.hash.sha256.hash(Password_edit));

                                  $.post("./modificaAccount.php",  {"UserName": UserName_edit, "Permessi" : Permessi_edit, "Password" : Password_edit } )
                                    .done(function( result ) 
                                    {
                                      $("#serverAnswer").html(result);
                                    });
                                }
                            </script>

                        </tbody>  
                      </table>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifica utente <strong id="utenteSelezionato"></strong></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <label class="form-label">Permessi</label>
                          <div class="option">
                            <?php PrintPermessiHTML(); ?>
                          </div>

                        <label class="form-label">Password</label>
                        <input id="Password_edit" class="form-control" type="password" placeholder="password">
                          
                        <br>
                        <strong id="serverAnswer">Lasciare vuoti i campi volenti immutati.</strong>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Chiudi</button>
                        <button class="btn btn-secondary" onclick="modificaAccount()" type="button">Applica salvataggi</button>
                      </div>
                    </div>
                  </div>
                </div>

        <?php
    }
?>