<?php
    session_start();
    include 'vardefine.php';
    include 'functions.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    require_once(__DIR__."/assets/vendor/autoload.php"); 
    use RestCord\DiscordClient;

    $discord = new DiscordClient(['token' => TOKENBOTSERVER]);

    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)
    {
        if(isset($_POST["IdWebhook"]))
        {
            if($_POST["IdWebhook"] != "")
            {
                $IdWebhook = intval(filter_input(INPUT_POST, "IdWebhook", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH));
                $_SESSION[$UserToken."IdWebhook"] = $IdWebhook;
                $Webhook = $discord->webhook->getWebhook(['webhook.id' => intval($IdWebhook)]);
                
                ?>
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                            <div class="col-lg-6">
                                <h3>Gestione webhook</h3>
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                            <h5>Webhook "<?php echo $Webhook->name; ?>" per canale
                            <?php
                                $Stringa = "<#".$Webhook->channel_id.">";
                                echo ConvertReferences($Stringa,$discord,CHANNELS);
                            ?>
                            </h5>
                            </div>
                            <div class="card-body">
                                <p>Qui troverai tutti i dettagli del webhook!</p>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>

                                    <tr>
                                        <th class="text-nowrap" scope="row">Id webhook</th>
                                        <td colspan="5" id="token">
                                        <i style="cursor:pointer;" onclick="revealToken()">Clicca qui per mostrare il token</i>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-nowrap" scope="row">Avatar</th>
                                        <td colspan="5">
                                        <?php
                                            echo $Webhook->avatar;
                                        ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="5">
                                            <form id="uploadForm" enctype="multipart/form-data">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="fileInput" name="file">
                                                    <label class="custom-file-label" for="customFile">Carica immagine</label>
                                                </div>
                                                <input style="width:100%; margin-bottom:16px; margin-top:16px;" class="btn btn-lg btn-success" type="submit" name="submit" value="UPLOAD"/>
                                            </form>
                                            <div id="uploadStatus"></div>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div>
                                            <script>
                                            $(".custom-file-input").on("change", function() {
                                            var fileName = $(this).val().split("\\").pop();
                                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                            });

                                            $(document).ready(function()
                                            {
                                                // File upload via Ajax
                                                $("#uploadForm").on('submit', function(e){
                                                    e.preventDefault();
                                                    $.ajax({
                                                        xhr: function() {
                                                            var xhr = new window.XMLHttpRequest();
                                                            xhr.upload.addEventListener("progress", function(evt) {
                                                                if (evt.lengthComputable) {
                                                                    var percentComplete = parseInt(((evt.loaded / evt.total) * 100),10);
                                                                    $(".progress-bar").width(percentComplete + '%');
                                                                    $(".progress-bar").html(percentComplete+'%');
                                                                }
                                                            }, false);
                                                            return xhr;
                                                        },
                                                        type: 'POST',
                                                        url: 'caricaAvatarWebhook.php',
                                                        data: new FormData(this),
                                                        contentType: false,
                                                        cache: false,
                                                        processData:false,
                                                        beforeSend: function(){
                                                            $(".progress-bar").width('0%');
                                                        },
                                                        error:function(){
                                                            $('#uploadStatus').html('<p style="color:#EA4335;">Caricamento fallito, riprovare.</p>');
                                                        },
                                                        success: function(resp)
                                                        {
                                                            if(resp == 'ok'){
                                                                $('#uploadForm')[0].reset();
                                                                $('#uploadStatus').html('<p style="color:#28A74B;">File caricato con successo!</p>');
                                                            }
                                                            else
                                                                $('#uploadStatus').html('<p style="color:#EA4335;">Sembra esserci stato un errore, riprovare.</p>');
                                                        }
                                                    });
                                                });
                                            });

                                            function visualizzaCanale(IdCanale)
                                            {
                                                $.post("./visualizzaCanaleCompleto.php",  {"IdCanale": IdCanale} )
                                                .done(function( result )
                                                {
                                                    $("#main").html(result);
                                                });
                                            }
                                        </script>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                            
                                    <div class="card-body chat-box">
                                        <div class="chat" id="messageChat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <script>
                        var Token = "<?php echo $Webhook->token; ?>";

                        function revealToken()
                        {
                            document.getElementById("token").innerHTML = Token;
                        }
                    </script>
                <?php
            }
        }
    }