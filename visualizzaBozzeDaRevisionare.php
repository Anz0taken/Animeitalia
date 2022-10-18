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
                        <h3>Gestione News</h3>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Visualizza i tuoi annunci</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="table-responsive add-project">
                      <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                          <tr>
                            <th>Titolo</th>
                            <th>Autore</th>
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
                                
                                $Query = Mysqli_query($DataBase,"SELECT * FROM Annunci, Utente WHERE Annunci.IdUtente = Utente.IdUtente AND Stato = 1 ORDER BY Annunci.IdUtente, Stato");
                                
                                $Count = 1;
                                
                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    echo "	<tr id='Annuncio_$Count'>
                                                <td id='Titolo'>".$Row["Titolo"]."</td>
                                                <td>".$Row["NomeUtente"]."</td>
                                                <td class=\"text-right\"><a class=\"icon\" href=\"javascript:void(0)\"></a> ";

                                                  ?>
                                                    <button class='btn btn-success' onclick='cambiaVariabili(<?php echo $Count; ?>); pubblicaAnnuncio();'>Pubblica</button>
                                                    <button class='btn btn-primary' onclick='cambiaVariabili(<?php echo $Count; ?>); modificaAnnuncio();'>Visualizza e modifica</button>
                                                    <button class='btn btn-danger'  onclick='cambiaVariabili(<?php echo $Count; ?>); respingiAnnuncio();'>Respingi</button>
                                                  <?php
                                          echo "</td>
                                      </tr>
                                    ";

                                    $Count++;
                                }

                            ?>
                            
                            <script>
                                var TitoloAnnuncio = "";

                                function cambiaVariabili(Count)
                                {
                                    TitoloAnnuncio = $("#Annuncio_"+Count+" #Titolo").text();
                                    document.getElementById("annuncioSelezionato").innerHTML = TitoloAnnuncio;
                                }

                                function pubblicaAnnuncio()
                                {
                                  if(TitoloAnnuncio != "")
                                    {
                                        $.post("./pubblicaAnnuncio.php",  {"TitoloAnnuncio": TitoloAnnuncio } )
                                        .done(function( result ) 
                                        {
                                            if( result == 0 )
                                                $("#main").html("Annuncio mandato con successo.");
                                            else                                        
                                            {
                                                var Testo = '<div class="container-fluid"> <div class="page-title"> <div class="row"> <div class="col-lg-6"> <h3>' + result + '</h3></div></div></div></div> ';
                                                $("#main").html(Testo);
                                            }
                                        });
                                    }
                                }

                                function respingiAnnuncio()
                                {
                                  $.post("./ritiraAnnuncioRedattore.php",  {"TitoloAnnuncio": TitoloAnnuncio } )
                                  .done(function( result ) 
                                  {
                                      if( result == 0 )
                                          $("#main").html("Annuncio mandato con successo.");
                                      else                                        
                                      {
                                          var Testo = '<div class="container-fluid"> <div class="page-title"> <div class="row"> <div class="col-lg-6"> <h3>' + result + '</h3></div></div></div></div> ';
                                          $("#main").html(Testo);
                                      }
                                  });
                                }

                                function modificaAnnuncio()
                                {
                                    $.post("./modificaAnnuncioMenu.php",  {"TitoloAnnuncio": TitoloAnnuncio } )
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

                <div class="modal fade" id="sureToDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifica annuncio <strong id="annuncioSelezionato"></strong></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <br>
                        <p>Sei sicuro di voler eliminare l'annuncio?</p>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger"  type="button" data-dismiss="modal">No</button>
                        <button class="btn btn-success" type="button" data-dismiss="modal" onclick="setTimeout(eliminaAnnuncio,500)" type="button">Si</button>
                      </div>
                    </div>
                  </div>
                </div>

        <?php
    }
?>