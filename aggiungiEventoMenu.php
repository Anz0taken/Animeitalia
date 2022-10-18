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
                        <div class="col-md-6">
                          <div class="form-group mb-6">
                            <label class="form-label">Titolo</label>
                            <input autocomplete="off" id="Titolo" class="form-control" type="text" placeholder="Titolo evento">
                          </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                          <div class="form-group mb-6">
                            <label class="form-label">Descrizione</label>
                            <input autocomplete="off" id="Descrizione" class="form-control" type="text" placeholder="Descrizione evento">
                          </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="it-datepicker-wrapper theme-dark">
                                <div class="form-group">
                                    <label class="form-label">Data inizio evento</label>
                                    <input autocomplete="off" class="form-control it-date-datepicker" id="DataInizio" type="text" placeholder="inserisci data">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="md-form">
                                <label for="input_starttime">Orario inizio</label>
                                <input autocomplete="off" id="OrarioInizio" class="form-control timepicker" placeholder="inserisci orario">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="it-datepicker-wrapper theme-dark">
                                <div class="form-group">
                                    <label class="form-label">Data fine evento</label>
                                    <input autocomplete="off" class="form-control it-date-datepicker" id="DataFine" type="text" placeholder="inserisci data">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="md-form">
                                <label for="input_starttime">Orario fine</label>
                                <input autocomplete="off" id="OrarioFine" class="form-control timepicker" placeholder="inserisci orario">
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
                              <input type="button" onclick="controllaEAggiungi()" class="btn btn-primary" value="Aggiungi evento"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
        <script>
        
            $(document).ready
            (
              function()
              {
                  $('.it-date-datepicker').datepicker({
                    format: 'yyyy/mm/dd'
                  });

                  $('input.timepicker').timepicker({
                    timeFormat: 'HH:mm'
                  });
                  
              }
            );
            
            function controllaEAggiungi()
            {
                var DataInizio    = document.getElementById("DataInizio").value;
                var DataFine      = document.getElementById("DataFine").value;
                var OrarioInizio  = document.getElementById("OrarioInizio").value;
                var OrarioFine    = document.getElementById("OrarioFine").value;
                var Titolo        = document.getElementById("Titolo").value;
                var Descrizione   = document.getElementById("Descrizione").value;
                
                if( DataInizio != "" && DataFine != "" && OrarioInizio != "" && OrarioFine != "" && Titolo != "")    //se l utente ha settato tutti i parametri necessari
                {
                    //console.log(DataInizio < DataFine);
                    if(DataInizio <= DataFine)
                    {
                      $.post("./aggiungiEvento.php",  {"DataInizio": DataInizio , "DataFine": DataFine, "OrarioInizio" : OrarioInizio, "OrarioFine" : OrarioFine, "Titolo" : Titolo, "Descrizione" : Descrizione} )
                      .done(function( result )
                      {
                        $("#dialogBox").html(result);
                      });
                    }
                    else
                      $("#ModalInfoClose").modal();
                }
                else
                    $("#ModalInfoClose").modal();
            }
        </script>
        <?php
        PrintInfoModal("ModalInfoClose","Attenzione","Controlla di aver inserito tutti i dati, ricorda che la data inzio dell'evento non può essere maggiore della data fine. Il campo data/orario fine può essere lasciato vuoto.");
    }
?>