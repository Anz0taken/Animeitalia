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
                        <h3>Sezione social</h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
        
        $Query = Mysqli_query($DataBase,"SELECT * FROM PostUtente ORDER BY Giorno,Orario DESC");
        
        $Count = 1;

        $OwnProfile = GetUserProfileById($_SESSION[$UserToken."IdUtente"]);

        while($PostUtente = Mysqli_fetch_array($Query))
        {
            $UserProfile = GetUserProfileById($PostUtente["IdUtente"]);

            ?>
                <div class="col-sm-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="new-users-social">
                        <div class="media"><img class="rounded-circle image-radius m-r-15" src="
                                <?php
                                    if(isset($UserProfile["Immagine"]))
                                    {
                                        if($UserProfile["Immagine"] != "")
                                        {
                                            echo $UserProfile["Immagine"];
                                        }
                                    }
                                    else
                                        echo "assets/img/UserIcon.png";
                                ?>
                            " alt="">
                            <div class="media-body">

                            <h6 class="mb-0 f-w-700"><?php echo $UserProfile["NomeUtente"]; ?></h6>
                            <p><?php echo $PostUtente["Giorno"]; ?>, <?php echo $PostUtente["Orario"]; ?></p>
                            
                            </div><span class="pull-right mt-0"><i data-feather="more-vertical"></i></span>
                        </div>
                        </div>

                        <div class="timeline-content">
                        <p>
                            <?php echo $PostUtente["Descrizione"]; ?>
                        </p>
                        <?php
                            if(isset($PostUtente["Immagine"]))
                            {
                                if($PostUtente["Immagine"] != "")
                                {
                                    echo '<img class="img-fluid" alt="" src="'.$PostUtente["Immagine"].'"><br><br><br>';
                                }
                            }
                        ?>
                        <div class="like-content" style="position:relative; top:20px;">

                            <span><button id="MiPiace_<?php echo $PostUtente['IdPost']; ?>" onclick="MiPiace(<?php echo $PostUtente['IdPost']; ?>)" class="btn btn-success">

                                <?php
                                    $QueryLike = Mysqli_query($DataBase,"SELECT * FROM MiPiace WHERE IdElementoCommentato = ".$PostUtente['IdPost']." AND TipoElementoCommentato = ".LIKETYPE." AND IdUtente = ".$_SESSION[$UserToken."IdUtente"]."");
                                    $LikeUtente = Mysqli_fetch_array($QueryLike);

                                    /* Se l'utente ha messo mi piace al post */
                                    if($LikeUtente)
                                    {
                                        echo "Non mi piace più";
                                    }
                                    else
                                    {
                                        echo "Mi piace";
                                    }
                                ?>

                            </button></span>
                            
                            <!-- Numero commenti -->
                            <span class="pull-right comment-number">
                                <span id="NumeroCommenti_<?php echo $PostUtente["IdPost"]; ?>">
                                    <?php
                                        $QueryCounter = Mysqli_query($DataBase,"SELECT COUNT(IdCommento) AS NumeroCommenti FROM CommentiUtente WHERE IdElementoCommentato = ".$PostUtente["IdPost"]." AND TipoElementoCommentato  = ".COMMENTTYPE."");

                                        $NumeroCommenti = Mysqli_fetch_array($QueryCounter);

                                        echo $NumeroCommenti["NumeroCommenti"];
                                    ?>
                                </span>
                                <span><i class="fa fa-comments-o"></i></span>
                            </span>
                            <!-- Fine Numero commenti -->

                            <!-- Numero MiPiace -->
                            <span class="pull-right comment-number">
                                <span id="NumeroMiPiace_<?php echo $PostUtente["IdPost"]; ?>">
                                    <?php
                                        $QueryCounter = Mysqli_query($DataBase,"SELECT COUNT(IdMiPiace) AS NumeroMiPiace FROM MiPiace WHERE IdElementoCommentato = ".$PostUtente["IdPost"]." AND TipoElementoCommentato  = ".LIKETYPE."");

                                        $NumeroMiPiace = Mysqli_fetch_array($QueryCounter);

                                        echo $NumeroMiPiace["NumeroMiPiace"];
                                    ?>
                                </span>
                                <span><i class="fa fa-heart font-danger"></i></span>
                            </span>
                            <!-- Fine Numero MiPiace -->

                        </div>
                        <br>
                        <hr>

                        <div class="social-chat" id="CommentiPost_<?php echo $PostUtente["IdPost"]; ?>">                  
                            <!-- Commenti degli utenti -->
                            <?php
                                $CommentiPost = Mysqli_query($DataBase,"SELECT * FROM CommentiUtente WHERE IdElementoCommentato = ".$PostUtente["IdPost"]." AND TipoElementoCommentato = ".COMMENTTYPE." ORDER BY Giorno ASC, Orario ASC");

                                while($CommentoUtente = Mysqli_fetch_array($CommentiPost))
                                {
                                    $ProfiloUtenteCommento = GetUserProfileById($CommentoUtente["IdUtente"]);

                                    ?>

                                        <div class="your-msg">
                                            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="
                                                <?php
                                                    if(isset($ProfiloUtenteCommento["Immagine"]))
                                                    {
                                                        if($ProfiloUtenteCommento["Immagine"] != "")
                                                        {
                                                            echo $ProfiloUtenteCommento["Immagine"];
                                                        }
                                                    }
                                                    else
                                                        echo "assets/img/UserIcon.png";
                                                ?>
                                            ">
                                                <div class="media-body"><span class="f-w-600"><?php echo $ProfiloUtenteCommento["NomeUtente"]; ?> <span><?php echo $CommentoUtente["Giorno"].", ".$CommentoUtente["Orario"]; ?> <i class="fa fa-reply font-primary"></i></span></span>
                                                    <p><?php echo $CommentoUtente["Descrizione"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                            <!-- Fine Commenti degli utenti -->
                        </div>

                        <!-- Sezione inserisci commento -->
                        <div class="comments-box">
                            <div class="media"><img class="img-50 img-fluid m-r-20 rounded-circle" alt="" src="
                                <?php
                                    if(isset($OwnProfile["Immagine"]))
                                    {
                                        if($OwnProfile["Immagine"] != "")
                                        {
                                            echo $OwnProfile["Immagine"];
                                        }
                                    }
                                    else
                                        echo "assets/img/UserIcon.png";
                                ?>
                            ">
                            <div class="media-body">
                                <div class="input-group text-box">
                                <input id="post_<?php echo $PostUtente["IdPost"]; ?>" class="form-control input-txt-bx" type="text" name="message-to-send" placeholder="Scrivi un commento...">
                                <div class="input-group-append">
                                    <button onclick="Commenta()" class="btn btn-transparent" type="button"><i class="ion ion-android-send"></i></button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Fine Sezione inserisci commento -->

                        </div>
                    </div>
                    </div>
                </div>
                <script>
                        $(function()
                        { 
                            $('#post_<?php echo $PostUtente["IdPost"]; ?>').keyup(function(e){	
                                if(e.keyCode == 13)
                                {
                                    Commenta_<?php echo $PostUtente["IdPost"]; ?>();
                                }
                            });
                        });

                        function Commenta_<?php echo $PostUtente["IdPost"]; ?>()
                        {
                            var IdPost = <?php echo $PostUtente["IdPost"]; ?>;
                            var Commento = $("#post_<?php echo $PostUtente["IdPost"]; ?>").val();
                            
                            $.post("./aggiungiCommento.php",  {"IdPost": IdPost, "Commento" : Commento} )
                            .done(function( result )
                            {
                                $("#CommentiPost_<?php echo $PostUtente["IdPost"]; ?>").html(result);
                                $("#post_<?php echo $PostUtente["IdPost"]; ?>").val("");
                            });
                        }

                </script>
            <?php
        }

        ?>
        <script>
            function MiPiace(IdPost)
            {
                $.post("./aggiungiTogliMiPiace.php",  {"IdPost": IdPost} )
                .done(function( result )
                {
                    var Wow = JSON.parse(result);
                    $("#MiPiace_"+IdPost).html(Wow.Button);
                    $("#NumeroMiPiace_"+IdPost).html(Wow.NumeroMiPiace);
                });
            }
        </script>
        <?php
    }
?>