<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();
    
    if(isset($_SESSION[$UserToken."UserName"]) && $_SESSION[$UserToken."Privilegi"] & PERMESSONEWS)    //Se il mio utente è loggato
    {
        ?>
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                    <h3>Gestione news</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Crea bozza</h5>
                  </div>
                  <div class="card-body">
                    <form id="uploadNews" enctype="multipart/form-data">


                        <label class="form-label">Titolo</label>
                        <input name="Titolo" id="Titolo" class="form-control" type="text" placeholder="Titolo post" value="">
                        <br>

                        <label class="form-label">Tag</label>
                        <input name="Tag" id="Tag" class="form-control" type="text" placeholder="Tag post" value="">
                        <br>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file">
                            <label class="custom-file-label" for="customFile">Immagine copertina</label>
                        </div>
                        
                        <br>
                        <br>

                        <div id="uploadStatusNews"></div>
                        <div class="progress">
                            <div id="progress-bar" class="progress-bar"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <h3 id="dialogBox"></h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <br>
                                <input class="btn btn-lg btn-success" type="submit" name="submit" value="Crea bozza"/>
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
                            $("#uploadNews").on('submit', function(e){
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
                                    url: 'aggiungiBozza.php',
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $("#progress-bar").width('0%');
                                    },
                                    error:function(){
                                        $('#uploadStatusNews').html('<p style="color:#EA4335;">Caricamento fallito, riprovare.</p>');
                                    },
                                    success: function(resp)
                                    {
                                        if(resp == 'ok')
                                        {
                                            $('#uploadNews')[0].reset();
                                            $('#uploadStatusNews').html('<p style="color:#28A74B;">Bozza creata con successo!</p>');
                                        }
                                        else
                                            $('#uploadStatusNews').html('<p style="color:#EA4335;">Sembra esserci stato un errore, riprovare.</p>');
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
?>