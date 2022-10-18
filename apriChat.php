<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    $LastMessage = "";
?>
        <div class="chat-header clearfix">
        <div class="name"><?php echo filter_input(INPUT_POST, "Interlocutore", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH); ?></div>
        <div class="status">Utente</div>
        </div>
        <div class="chat-history chat-msg-box custom-scrollbar">
            <ul id="chathistory">
<?php
    
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
        $IdInterlocutore = GetIdByUserName(filter_input(INPUT_POST, "Interlocutore", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
        $NomeChat = "";

        if($IdInterlocutore)
        {
            if($IdChat = EsisteChat($_SESSION[$UserToken."IdUtente"], $IdInterlocutore))    //Se la chat già esiste
            {
                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                $db_username = DATABASEUSERNAME;
                $db_password = PASSWORD;
        
                $DataBase = mysqli_connect($db,$db_username,$db_password);
        
                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
        
                $Query = Mysqli_query($DataBase,"SELECT * FROM Messaggio WHERE IdChat = $IdChat ORDER BY IdMessaggio");

                while($Row = Mysqli_fetch_array($Query))
                {
                    if($Row["IdUtenteMittente"] == $IdInterlocutore)
                    {
                        ?>
                            <li>
                                <div class="message my-message">
                                    <div class="message-data text-right"><span class="message-data-time"><?php echo $Row["Giorno"]." / ".$Row["Orario"]; ?></span></div><?php echo $Row["Messaggio"]; ?>
                                </div>
                            </li>
                        <?php
                        $_SESSION[$UserToken."GiornoLastUpdate"] = $Row["Giorno"];
                        $_SESSION[$UserToken."OrarioLastUpdate"] = $Row["Orario"];
                    }
                    else
                    {
                        ?>
                            <li class="clearfix">
                                <div class="message other-message pull-right">
                                  <div class="message-data"><span class="message-data-time"><?php echo $Row["Giorno"]." / ".$Row["Orario"]; ?></span></div><?php echo $Row["Messaggio"]; ?>
                                </div>
                              </li>
                        <?php          
                    }
                }
            }
            else
            {
                $WokraTutto = "SiFunge";
                $_SESSION[$UserToken."GiornoLastUpdate"] = date('Y-m-d');
                $_SESSION[$UserToken."OrarioLastUpdate"] = date('H:i:s');
                $IdChat = CreaChat(intval($_SESSION[$UserToken."IdUtente"]), intval($IdInterlocutore));
            }

            $_SESSION[$UserToken."CurrentChat"] = $IdChat;
        }

        ?>                      
            </ul>
        </div>
        <div class="chat-message clearfix">
            <div class="row">
                <div class="col-xl-12 d-flex">
                    <div class="input-group text-box">
                        <input class="form-control input-txt-bx" id="sendie" type="text" name="message-to-send" placeholder="Scrivi un messaggio...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="mandaMessaggio()" type="button">INVIA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <script type="text/javascript">

        var LastDateMessage = "<?php echo $_SESSION[$UserToken."GiornoLastUpdate"]; ?>";

        $(function()
        { 
            $('#sendie').keyup(function(e) {	
                if(e.keyCode == 13)
                { 
                    mandaMessaggio();
                }
            });
        });

        function mandaMessaggio()
        {
            var MessaggioDaMandare = document.getElementById("sendie").value;
            
            if(MessaggioDaMandare != "")
                $.post("./mandaMessaggio.php",  {"MessaggioDaMandare": MessaggioDaMandare } )
                    .done(function( result )
                    {
                        document.getElementById("chathistory").innerHTML += '<li class="clearfix"> <div class="message other-message pull-right"> <div class="message-data"><span class="message-data-time">Recentemente</span></div>'+ MessaggioDaMandare +'</div> </li>';
                    });

            document.getElementById("sendie").value = "";
        }

        checkNewMessages();

        function checkNewMessages()
        {
            var ChatHistory = document.getElementById("chathistory");

            if(typeof(ChatHistory) != 'undefined' && ChatHistory != null)
            {
                $.ajax
                (
                    {
                        url:"./riceviNuoviMessaggi.php", success: function(result)
                        {
                            var Response = JSON.parse(result);

                            for(var i = 0; i < Response.length; i++)
                            {
                                ChatHistory.innerHTML += '<li><div class="message my-message"><div class="message-data text-right"><span class="message-data-time">Recentemente</span></div> '+ Response[i] +'</div></li>';
                            }
                        }
                    }
                );

                setTimeout(checkNewMessages, 500);
            }
        }
    </script>
<?php
    }
?>