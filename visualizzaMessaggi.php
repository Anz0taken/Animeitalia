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
                <div class="col-6">
                  <h3>Chat App</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col call-chat-sidebar col-sm-12">
                <div class="card">
                  <div class="card-body chat-body">
                    <div class="chat-box">
                      <!-- Chat left side Start-->
                      <div class="chat-left-aside">
                        <div class="media">
                            <div class="name f-w-600">Utenti con cui puoi chattare</div>
                            <br>
                        </div>
                        <div class="people-list" id="people-list">
                          <ul class="list">
                            
                            <?php

                                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                                $db_username = DATABASEUSERNAME;
                                $db_password = PASSWORD;

                                $DataBase = mysqli_connect($db,$db_username,$db_password);

                                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

                                $Query = Mysqli_query($DataBase,"SELECT * FROM Utente WHERE IdUtente != ".$_SESSION[$UserToken."IdUtente"]);

                                $Count = 1;

                                while($Row = Mysqli_fetch_array($Query))
                                {
                                    ?>         
                                        <li class="clearfix">
                                            <div style="border-radius: 15px; cursor:pointer; border-style: solid; border-color: white; padding: 20px;" onclick="cambiaChat(<?php echo $Count; ?>)" class="container">
                                                <div class="name" id="Utente_<?php echo $Count; ?>"><?php echo $Row['NomeUtente']; ?></div>
                                                <div class="status"><?php echo $Row['Nome']; ?></div>
                                            </div>
                                        </li>
                                    <?php

                                    $Count++;
                                }

                            ?>
                          </ul>
                        </div>
                      </div>
                      <!-- Chat left side Ends-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col call-chat-body">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="row chat-box">
                      <!-- Chat right side start-->
                      <div class="col pr-0 chat-right-aside">
                        <!-- chat start-->
                        <div class="chat" id="UserChat">

                          <!-- chat-header start-->
                          <div class="chat-header clearfix">
                            <div class="name">Seleziona un utente</div>

                          </div>
                          <!-- chat-header end-->
                          <div class="chat-history chat-msg-box custom-scrollbar">
                            <ul>
                                <h3> Seleziona una chat per visualizzare la cronologia messaggi </h3>
                            </ul>
                          </div>
                          <!-- end chat-history-->
                          <div class="chat-message clearfix">
                            <div class="row">
                              <div class="col-xl-12 d-flex">
                                <div class="input-group text-box">
                                  <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Scrivi un messaggio...">
                                  <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">INVIA</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                          <!-- end chat-message-->
                        <!-- chat end-->
                        <!-- Chat right side ends-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script>
            
            function cambiaChat(NumeroAccount)
            {
                UserName = $("#Utente_"+NumeroAccount).text();
                
                $.post("./apriChat.php",  {"Interlocutore": UserName } )
                .done(function( result ) 
                {
                    $("#UserChat").html(""+result+"");
                });
            }

            </script>
<?php
    }
?>