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
                            <th>Stato</th>
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
                                
                                $Query = Mysqli_query($DataBase,"SELECT * FROM Annunci WHERE IdUtente = ".$_SESSION[$UserToken."IdUtente"]." ORDER BY Stato ");
                                
                                $Stati = array( "In bozza", "In revisione", "Pubblicato" );

                                $Count = 1;

                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    echo "	<tr id='Annuncio_$Count'>
                                                <td id='Titolo'>".$Row["Titolo"]."</td>
                                                <td>". $Stati[ $Row["Stato"] ] ."</td>
                                                <td class=\"text-right\"><a class=\"icon\" href=\"javascript:void(0)\"></a> ";

                                                if($Row["Stato"] == 0)
                                                {
                                                  ?>
                                                    <button class='btn btn-success' onclick='cambiaVariabili(<?php echo $Count; ?>); mandaAlRedattore();'>Manda al redattore</button>
                                                    <button class='btn btn-primary' onclick='cambiaVariabili(<?php echo $Count; ?>); modificaAnnuncio();'>Modifica</button>
                                                    <button class='btn btn-danger' onclick='cambiaVariabili(<?php echo $Count; ?>)' data-toggle="modal" data-original-title="test" data-target="#sureToDelete" type="button">Elimina</button>
                                                  <?php
                                                }
                                                else if($Row["Stato"] == 1)
                                                  echo "<button class='btn btn-warning' onclick='cambiaVariabili($Count); ritiraAnnuncio();'>Ritira</button> ";
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

                                function mandaAlRedattore()
                                {
                                  if(TitoloAnnuncio != "")
                                    {
                                        $.post("./mandaAnnuncioRedattore.php",  {"TitoloAnnuncio": TitoloAnnuncio } )
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

                                function ritiraAnnuncio()
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

                                function eliminaAnnuncio()
                                {
                                    if(TitoloAnnuncio != "")
                                    {
                                        $.post("./eliminaAnnuncio.php",  {"TitoloAnnuncio": TitoloAnnuncio } )
                                        .done(function( result ) 
                                        {
                                            if( result == 0 )
                                                $("#main").html("Annuncio eliminato con successo.");
                                            else                                        
                                            {
                                                var Testo = '<div class="container-fluid"> <div class="page-title"> <div class="row"> <div class="col-lg-6"> <h3>' + result + '</h3></div></div></div></div> ';
                                                $("#main").html(Testo);
                                            }
                                        });
                                    }
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

              <?php PrintSureDeleteModal("eliminaAnnuncio"); ?>
        <?php
    }
?>