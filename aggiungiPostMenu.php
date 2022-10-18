<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

    if(isset($_SESSION[$UserToken."UserName"]))
    {
        ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                    <h3>Gestione post</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Pubblica post</h5>
                  </div>
                  <div class="card-body">
                    <form id="uploadPost" enctype="multipart/form-data">


                        <label class="form-label">Titolo</label>
                        <input name="Titolo" id="Titolo" class="form-control" type="text" placeholder="Titolo post" value="">
                        <br>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file">
                            <label class="custom-file-label" for="customFile">Carica immagine</label>
                        </div>

                        <br>
                        <br>

                        <textarea name="Contenuto" rows="5" id="Contenuto" class="form-control" type="text" placeholder="Messaggio post"></textarea></textarea>

                        <br>
                        <div id="uploadStatusPost"></div>
                        <div class="progress">
                            <div id="progress-bar" class="progress-bar"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <h3 id="dialogBox"></h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit" value="Upload"/>
                            </div>
                        </div>
                        <br>
                    </from>

                    <script>
                        $(".custom-file-input").on("change", function() {
                        var fileName = $(this).val().split("\\").pop();
                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });

                        $(document).ready(function()
                        {
                            $("#uploadPost").on('submit', function(e){
                                e.preventDefault();
                                $.ajax({
                                    xhr: function() {
                                        var xhr = new window.XMLHttpRequest();
                                        xhr.upload.addEventListener("progress", function(evt) {
                                            if (evt.lengthComputable) {
                                                var percentComplete = parseInt(((evt.loaded / evt.total) * 100),10);
                                                $("#progress-bar").width(percentComplete + '%');
                                                $("#progress-bar").html(percentComplete+'%');
                                            }
                                        }, false);
                                        return xhr;
                                    },
                                    type: 'POST',
                                    url: 'aggiungiPost.php',
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $("#progress-bar").width('0%');
                                    },
                                    error:function(){
                                        $('#uploadStatusPost').html('<p style="color:#EA4335;">Caricamento fallito, riprovare.</p>');
                                    },
                                    success: function(resp)
                                    {
                                        if(resp == 'ok')
                                        {
                                            $('#uploadPost')[0].reset();
                                            $('#uploadStatusPost').html('<p style="color:#28A74B;">File caricato con successo!<br>Ricaricare la pagina per aggiornare le impostazioni.</p>');
                                        }
                                        else
                                            $('#uploadStatusPost').html('<p style="color:#EA4335;">Sembra esserci stato un errore, riprovare.</p>');
                                    }
                                });
                            });
                        });
                    </script>
                  </div>
                </div>
              </div>
            </div>
        <?php
    }