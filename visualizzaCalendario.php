<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"])) //se il mio utente è loggato
    {
      ?>
          <div class="container-fluid">
              <div class="page-title">
                  <div class="row">
                      <div class="col-lg-6">
                      <h3>Calendario</h3>
                      </div>
                  </div>
              </div>
          </div>

          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Visualizza Calendario</h5>
                  </div>
                  <div class="card-body">
                        <div id='calendar_1'></div>
                        <script>
                            var calendarEl = document.getElementById('calendar_1');

                            var calendar = new FullCalendar.Calendar(calendarEl, {
                              headerToolbar: {
                                left: 'prevYear,prev,next,nextYear today',
                                center: 'title',
                                right: 'dayGridMonth,dayGridWeek,dayGridDay'
                              },
                              initialDate: '<?php echo date("yy-m-d"); ?>',
                              navLinks: true, // can click day/week names to navigate views
                              editable: true,
                              dayMaxEvents: true, // allow "more" link when too many events
                              events: [
                                <?php
                                  $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                                  $db_username = DATABASEUSERNAME;
                                  $db_password = PASSWORD;

                                  $DataBase = mysqli_connect($db,$db_username,$db_password);

                                  Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

                                  $Query = Mysqli_query($DataBase,"SELECT * FROM Attivita ORDER BY IdAttivita DESC");

                                  $ArrUserName;

                                  while($Row = Mysqli_fetch_array($Query))
                                  {
                                    ?>
                                      {
                                        id: <?php echo $Row["IdAttivita"]; ?>,
                                        title: '<?php echo $Row["Titolo"]; ?>',
                                        start: '<?php echo $Row["DataAttivitaInizio"]; ?>T<?php echo $Row["OrarioInizio"]; ?>',
                                        end: '<?php echo $Row["DataAttivitaFine"]; ?>T<?php echo $Row["OrarioFine"]; ?>'
                                      },
                                    <?php
                                  }

                                ?>
                              ],
                              
                              eventClick: function(info)
                              {
                                $.post("./visualizzaEventoCompleto.php",  {"IdAttivita": info.event.id } )
                                .done(function( result )
                                {
                                  $("#main").html(result);
                                });
                              }

                            });

                            calendar.render();
                          </script>
                          <style>

                          #calendar_1 {
                            max-width: 1100px;
                            margin: 0 auto;
                          }

                          </style>

                            <br>
                  </div>
                </div>
              </div>
            </div>

                    </div>
                    </div>
      <?php
    }
    else
        echo "Wops, sembra che qualcosa sia andato storto :(";
?>