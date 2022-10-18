<?php
    function PrintHead()
    {
        ?>
            <title>Animeitalia Network</title>

            <!-- Meta data -->
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta name="keywords" content="Community , Italia, Italiana, Anime, Giochi, Discord, Telegram, Facebook, Instagram">
            <meta name="description" content="Community Italiana per discord, telegram, facebook. Il suo nome è Animeitalia, un insieme di persone che condividono i propri iteressi, oltre agli anime!">
            <meta name="author" content="Luca Gargiulo">

            <!-- Favicons -->
            <link href="assets/img/icon.jpg" rel="icon">
            <link href="assets/img/icon.jpg" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link href=".\assets\Bootstrap\dist\css\bootstrap.css" rel="stylesheet">

            <!-- Main Styles CSS -->
            <link rel="stylesheet" type="text/css" href="assets\css\main.css">
            <link rel="stylesheet" type="text/css" href="assets\css\fonts.min.css">

        <?php
    }

    function PrintHeader($MainColor_R,$MainColor_G,$MainColor_B,$SecondaryColor_R,$SecondaryColor_G,$SecondaryColor_B,$UserToken,$MainPage)
    {
        ?>
            <header id="header" class="fixed-top" style="padding-top: 5px; padding-bottom: 5px;" style="height: 100%; background:linear-gradient(45deg, rgb(<?php echo "$MainColor_R $MainColor_G $MainColor_B"; ?> / 80%) 0%, rgb(<?php echo $SecondaryColor_R*1.2." ";  echo $SecondaryColor_G*1.2." ";  echo $SecondaryColor_B*1.2; ?>) 100%);">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xl-9 d-flex align-items-center">
                            <h1 class="logo mr-auto"><img src="assets/img/logo_sh.png" style="max-width: 200%;"></h1>

                            <nav class="nav-menu d-none d-lg-block">
                            <ul>
                                <li class="active"><a href="index.php">Home</a></li>
                                <?php
                                    if($MainPage == 1)
                                    {
                                        ?>
                                        <li><a href="#services">Scopri la community</a></li>
                                        <li><a href="#features">Eventi</a></li>
                                <?php
                                    }
                                    if(isset($_SESSION[$UserToken."Nome"]))
                                    {
                                ?>
                                    <li><a href="./news.php">News</a></li>
                                    <li class="drop-down"><a href="">Account</a>
                                        <ul>
                                            <li><a href="pannelloControllo.php">Pannello controllo</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                            </nav><!-- .nav-menu -->
                            <?php
                                if(!isset($_SESSION[$UserToken."Nome"]))
                                {
                            ?>
                                <a data-toggle="modal" data-target="#LoginModal" href="#" class="get-started-btn scrollto">Accedi</a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                </div>
            </header>
        <?php
    }

    function PrintFooter($MainColor_R,$MainColor_G,$MainColor_B,$SecondaryColor_R,$SecondaryColor_G,$SecondaryColor_B)
    {
        ?>
            <footer id="footer" style="height: 100%; background:linear-gradient(45deg, rgb(<?php echo "$MainColor_R $MainColor_G $MainColor_B"; ?> / 80%) 0%, rgb(<?php echo "$SecondaryColor_R $SecondaryColor_G $SecondaryColor_B"; ?>) 100%)">

                <div class="footer-top">
                    <div class="container" style="margin-left:0;">
                        <div class="row">

                        <div class="col-lg-12 col-md-6 footer-contact">
                            <h2>Animeitalia</h2>
                            <p> Sito ancora in costruzione. Non temete, stiamo lavorando per voi! </p>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <div class="copyright-wrap d-md-flex py-4">
                        <div class="mr-md-auto text-center text-md-left">
                            <div class="copyright">
                                &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
                            </div>
                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>
                        </div>
                        <p>Made by Luca Gargiulo</p>
                    </div>
                </div>
            </footer>
        <?php
    }

    function PrintModalLogin($GoogleClient)
    {
        ?>
            <!-- Modallogin -->
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="modal fade bd-example-modal-lg" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding:10px;">
                    <!-- Modal Body -->
                    <div class="modal-body">

                    <div class="container login-container" data-aos="zoom-in" data-aos-delay="100"> 
                        <div class="row">
                        <!-- LoginFomr_2 -->
                        <div class="col-md-12 login-form-2">
                            <h3>Inserisci le credenziali</h3>
                            <div class="container">
                            <form id="myfrom" action="login.php" method="POST">
                                <div class="form-group">
                                <input id="UserName" name="UserName" type="text" class="form-control" placeholder="Username" value="" />
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" value="" />
                                </div>

                                <div class="form-group">
                                    <input id="loginButton" type="submit" class="btnSubmit" value="Login"/>
                                </div>

                                <div class="form-group">
                                    <a href="#" class="ForgetPwd" value="Login">Password dimenticata?</a>
                                    <div id="messageLogin"></div>
                                </div>
                                
                                <div style="text-align:center">
                                    <div class="g-recaptcha" data-sitekey="6LfKkvMZAAAAAMZ_Dg2wVd0P6FrY9hIc1e_p1NpO"></div>
                                </div>
                            </form>

                            <div id="loginloader" class="d-flex justify-content-center" style="opacity:0;">
                                <div class="spinner-border" style="color:white;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <script>
                                var myButton = document.getElementById('loginButton');

                                $('#myfrom').submit(function()
                                {
                                    document.getElementById('password').value = sjcl.codec.hex.fromBits(sjcl.hash.sha256.hash(document.getElementById('password').value));
                                    return true; // return false to cancel form action
                                });

							</script>

                            </div>
                        </div><!-- End LoginFomr_2 -->
                        </div>
                        <div class="row">
                        <div class="col-md-12 login-form-2" style="position:relative;">

                        <a target="_blank" href="https://discord.com/api/oauth2/authorize?client_id=772905716288716811&permissions=8&redirect_uri=http%3A%2F%2Flocalhost%2FAnimeitalia_L%2Flogin_discord.php&response_type=code&scope=identify%20email%20connections%20guilds%20guilds.join%20gdm.join%20applications.builds.upload%20messages.read%20webhook.incoming%20bot%20rpc.notifications.read%20rpc%20applications.builds.read%20applications.store.update%20applications.entitlements%20activities.read%20activities.write%20relationships.read" class="get-started-btn scrollto">Accedi con Discord</a>
                        
                        <a target="_blank" href="<?php echo $GoogleClient->createAuthUrl() ?>" class="get-started-btn scrollto">Accedi con Google</a>

                            <button style="position:absolute; right:23px;" type="button" class="btn btn-danger borderedButton" data-dismiss="modal">Chiudi</button>
                        </div>
                        </div>
                    </div>

                    </div><!-- End Modal Body -->
                </div>
                </div>
            </div><!-- End Modallogin -->
        <?php
    }

    function PrintInfoModal($IdModal, $Titolo, $Contenuto)
    {
        ?>
            <!-- Modallogin -->
            <div class="modal fade bd-example-modal-lg" id="<?php echo $IdModal; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $Titolo ?> <strong id="utenteSelezionato"></strong></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <label class="form-label"><?php echo $Contenuto; ?></label>
                    </div>
                  </div>
            </div><!-- End Modallogin -->
        <?php
    }

    function PrintSureDeleteModal($FunctionNameToDelete)
    {
        ?>
            <div class="modal fade" id="sureToDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica elemento <strong id="annuncioSelezionato"></strong></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                    <br>
                    <p>Sei sicuro di voler eliminare lelemento selezionato?</p>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-danger"  type="button" data-dismiss="modal">No</button>
                    <button class="btn btn-success" type="button" data-dismiss="modal" onclick="setTimeout(<?php echo $FunctionNameToDelete; ?>,500)" type="button">Si</button>
                    </div>
                </div>
                </div>
            </div>
        <?php
    }

    function PrintMessages($Messages,$discord,$PreUsername,$AfterUsername,$AfterMessage)
    {
        $HowManyMessages = count($Messages);

        for($i=0; $i < $HowManyMessages; $i++)
        {
            if($Messages[$HowManyMessages - $i - 1]->content != "")
                echo $PreUsername.$Messages[$HowManyMessages - $i - 1]->author["username"] . $AfterUsername . ConvertReferences(ConvertReferences($Messages[$HowManyMessages - $i - 1]->content,$discord,CHANNELS),$discord,USERS) . $AfterMessage;
        }
    }

    function PrintAjaxFunction($Indirizzo,$Dest)
    {
        ?>

        $.ajax
        (
            {
                url: "./<?php echo $Indirizzo; ?>", success: function(result)
                {
                    $("<?php echo $Dest; ?>").html(result);
                }
            }
        );

        <?php
    }

    function PrintPermessiHTML()
    {
        ?>
            <label class="d-block" for="chk-ani1">
                <input class="checkbox_animated" id="chk-ani1" type="checkbox" >Amministratore
            </label>

            <label class="d-block" for="chk-ani2">
                <input class="checkbox_animated" id="chk-ani2" type="checkbox">Scrittore di bozze
            </label>

            <label class="d-block" for="chk-ani3">
                <input class="checkbox_animated" id="chk-ani3" type="checkbox">Redattore
            </label>

            <label class="d-block" for="chk-ani4">
                <input class="checkbox_animated" id="chk-ani4" type="checkbox">Statistiche generali
            </label>

            <label class="d-block" for="chk-ani5">
                <input class="checkbox_animated" id="chk-ani5" type="checkbox">Gestione webhooks
            </label>
        <?php
    }

    function PrintPermessiJS()
    {
        ?>
            if(document.getElementById("chk-ani1").checked == true)
                Permessi_edit += 1;

            if(document.getElementById("chk-ani2").checked == true)
                Permessi_edit += 2;

            if(document.getElementById("chk-ani3").checked == true)
                Permessi_edit += 4;

            if(document.getElementById("chk-ani4").checked == true)
                Permessi_edit += 8;

            if(document.getElementById("chk-ani5").checked == true)
                Permessi_edit += 16;
        <?php
    }

    function PrintInputForm($TitoloSezione, $ParametriDaMandare, $Pagina, $PaginaToPost)
    {
        $PostSetFetch = "";
        $PostSetPostVar = "";
        $PostSetIfCondition = "";
        $PostClearInput = "";

        ?>
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                    <div class="col-lg-6">
                      <h3><?php echo $TitoloSezione; ?></h3>
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
                            <?php
                                foreach($ParametriDaMandare as $Parametro)
                                {
                                    $PostSetFetch.= 'var '.$Parametro->IdTag.' = document.getElementById("'.$Parametro->IdTag.'").value;';
                                    $PostSetPostVar.= '"'.$Parametro->IdTag.'": '.$Parametro->IdTag.',';
                                    $PostSetIfCondition.= ''.$Parametro->IdTag.' != "" && ';
                                    $PostClearInput.= 'document.getElementById("'.$Parametro->IdTag.'").value = ""; ';
                                    
                                    ?>
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label"><?php echo $Parametro->Testo; ?></label>
                                                <input id="<?php echo $Parametro->IdTag; ?>" class="form-control" type="text" placeholder="<?php echo $Parametro->Placeholder; ?>">
                                            </div>
                                        </div>

                                    <?php
                                }

                                $PostSetIfCondition = substr($PostSetIfCondition,0,strlen($PostSetIfCondition)-3);
                                $PostSetPostVar = substr($PostSetPostVar,0,strlen($PostSetPostVar)-1);
                            ?>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-lg-6">
                              <h3 id="dialogBox"></h3>
                            </div>
                            <div class="col-lg-6 text-right">
                              <input type="button" onclick="controllaEAggiungi()" class="btn btn-primary" value="Aggiungi"></button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        <script>
            function controllaEAggiungi()
            {
                <?php echo $PostSetFetch; ?>
                
                if( <?php echo $PostSetIfCondition; ?>)    //se l utente ha settato tutti i parametri necessari
                {
                    $.post("./<?php echo $Pagina; ?>",  {<?php echo $PostSetPostVar; ?>} )
                    .done(function( result )
                    {
                      <?php echo $PostClearInput; ?>
                      $("<?php echo $PaginaToPost; ?>").html(result);
                    });
                }
                else
                    $("#ModalInfoClose").modal()
            }
        </script>
        <?php
        PrintInfoModal("ModalInfoClose","Attenzione","Dati non inseriti correttamente.");
    }

    function PrintSelectInput($SelectId, $NomeSelect, $Tabella, $ColonnaToGetName, $ColonnaToGetValue)
    {
        ?>
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label class="form-label">Canale</label>
                        <select id="<?php echo $SelectId; ?>" class="form-control btn-square">
                            <option value="0">Seleziona un canale</option>
        <?php

        $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
        $db_username = DATABASEUSERNAME;
        $db_password = PASSWORD;
        
        $DataBase = mysqli_connect($db,$db_username,$db_password);
        
        Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere
        
        $Query = Mysqli_query($DataBase,"SELECT * FROM CanaliDiscord");
        
        $Count = 1;

        while($Row = Mysqli_fetch_array($Query))
        {
            ?>
                <option value="<?php echo $Row[$ColonnaToGetValue]; ?>n"><?php echo $Row[$ColonnaToGetName]; ?></option>
            <?php
        }
            ?>
            </select>
                    </div>
                </div>
        <?php
    }

    function PrintUserPorfilePannel($IdUtente, $ProprioAccount)
    {
        $UserProfile = GetUserProfileById($IdUtente);

        ?>
            <div class="user-profile">
                <div class="row">
                    <!-- user profile first-style start-->
                    <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <div class="cardheader" style="background:<?php
                                    if(isset($UserProfile["Copertina"]))
                                    {
                                        if($UserProfile["Copertina"] != "")
                                        {
                                            echo "url(".$UserProfile["Copertina"].")";
                                        }
                                    }
                                    else
                                        echo "black";
                                ?>
                            ;
                            no-repeat center center fixed; 
                            -webkit-background-size: cover;
                            -moz-background-size: cover;
                            -o-background-size: cover;
                            background-size: cover;
                            ">

                            <?php
                                if($ProprioAccount == true)
                                {
                            ?>
                            <div class="rounded d-inline-block" style="position:absolute; right:3px; top:3px; cursor:pointer; padding:10px; background-color: #262932;" data-toggle="modal" data-original-title="test" data-target="#modificaCopertina">
                                Modifica immagine copertina
                                <i class="icofont icofont-pencil-alt-5"></i>
                                
                            </div>
                            <?php
                                }
                            ?>
                            </div>
                            <div style="position:absolute; bottom:-50px; right:40px;" class="user-image">
                            </div>
                        <div class="user-image">
                        <div class="avatar" style="position:relative; top:-20px;">
                            <img alt="" width="300" height="300" src="
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
                            ">
                        </div>

                        <?php
                            if($ProprioAccount == true)
                            {
                        ?>
                            <div class="icon-wrapper" type="button" data-toggle="modal" data-original-title="test" data-target="#modificaAvatar"><i class="icofont icofont-pencil-alt-5"></i></div>
                        <?php
                            }
                        ?>

                        </div>
                        <div class="info">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="ttl-info text-left">
                                    <h6><i class="fa fa-envelope"></i>   Email
                                    
                                    <?php
                                        if($ProprioAccount == true)
                                        {
                                    ?>
                                            <i data-toggle="modal" style="cursor:pointer;" data-original-title="test" data-target="#modificaEmail" class="icofont icofont-pencil-alt-5"></i>
                                    <?php
                                        }
                                    ?>

                                    </h6>
                                    <span>
                                    <?php 
                                        if(isset($UserProfile["Email"]))
                                        {
                                            if($UserProfile["Email"] != "")
                                            {
                                                echo $UserProfile["Email"];
                                            }
                                        }
                                        else
                                            echo "Nessuna email al momento.";
                                    ?>
                                    </span>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="ttl-info text-left">
                                    <h6><i class="fa fa-calendar"></i>   Compleanno                                  <?php
                                        if($ProprioAccount == true)
                                        {
                                    ?>
                                            <i data-toggle="modal" style="cursor:pointer;" data-original-title="test" data-target="#modificaCompleanno" class="icofont icofont-pencil-alt-5"></i>
                                    <?php
                                        }
                                    ?></h6>
                                    <span>
                                    <?php 
                                        if(isset($UserProfile["Compleanno"]))
                                        {
                                            if($UserProfile["Compleanno"] != "")
                                            {
                                                echo $UserProfile["Compleanno"];
                                            }
                                        }
                                        else
                                            echo "Nessun compleanno al momento.";
                                    ?>
                                    </span>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
                            <div class="user-designation">
                                <div class="title"><a target="_blank" href=""><?php echo $UserProfile["NomeUtente"]; ?></a></div>
                                <div class="desc mt-2"><?php echo $UserProfile["Nome"]; ?></div>
                            </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="ttl-info text-left">
                                    <h6><i class="fa fa-phone"></i>   Contatti                                   <?php
                                        if($ProprioAccount == true)
                                        {
                                    ?>
                                            <i data-toggle="modal" style="cursor:pointer;" data-original-title="test" data-target="#modificaContatti" class="icofont icofont-pencil-alt-5"></i>
                                    <?php
                                        }
                                    ?></h6>

                                    <span>
                                    <?php 
                                        if(isset($UserProfile["Contatti"]))
                                        {
                                            if($UserProfile["Contatti"] != "")
                                            {
                                                echo $UserProfile["Contatti"];
                                            }
                                        }
                                        else
                                            echo "Nessuna contatto al momento.";
                                    ?>
                                    </span>

                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="ttl-info text-left">
                                    <h6><i class="fa fa-location-arrow"></i>   Posizione                                   <?php
                                        if($ProprioAccount == true)
                                        {
                                    ?>
                                            <i data-toggle="modal" style="cursor:pointer;" data-original-title="test" data-target="#modificaPosizione" class="icofont icofont-pencil-alt-5"></i>
                                    <?php
                                        }
                                    ?></h6>
                                    <span>
                                    <?php 
                                        if(isset($UserProfile["Posizione"]))
                                        {
                                            if($UserProfile["Posizione"] != "")
                                            {
                                                echo $UserProfile["Posizione"];
                                            }
                                        }
                                        else
                                            echo "Nessuna posizione utente al momento.";
                                    ?>
                                    </span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="user-designation">

                            <h6>
                                Descrizione/Bio
                            <?php
                                if($ProprioAccount == true)
                                {
                            ?>
                                    <i data-toggle="modal" style="cursor:pointer;" data-original-title="test" data-target="#modificaBio" class="icofont icofont-pencil-alt-5"></i>
                            <?php
                                }
                            ?>
                            </h6>

                            <div class="desc mt-2">
                                <?php
                                    if(isset($UserProfile["Bio"]))
                                    {
                                        if($UserProfile["Bio"] != "")
                                        {
                                            echo $UserProfile["Bio"];
                                        }
                                    }
                                    else
                                        echo "Nessuna descrizione utente al momento.";
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="social-media">
                            <ul class="list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="follow">
                            <div class="row">
                            <div class="col-6 text-md-right border-right">
                                <div class="follow-num counter">N/A</div><span>Follower</span>
                            </div>
                            <div class="col-6 text-md-left">
                                <div class="follow-num counter">N/A</div><span>Following</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                <?php
                    if($ProprioAccount == true)
                    {
                ?>
                        <?php PrintModalUploadImage("modificaAvatar","Modifica avatar", "caricaAvatarUtente.php", "1"); ?>
                        <?php PrintModalUploadImage("modificaCopertina","Modifica copertina", "caricaCopertinaUtente.php", "2"); ?>
                        
                        <?php PrintModificaParam("modificaBio",         "Cambia bio",               "Contenuto_1", "Inserisci il contenuto della bio.", "CambiaBio",        "1", "modificaCampoUtente.php", "Bio"); ?>
                        <?php PrintModificaParam("modificaEmail",       "Cambia email",             "Contenuto_2", "Inserisci la tua e-mail.",          "CambiaEmail",      "2", "modificaCampoUtente.php", "Email"); ?>
                        <?php PrintModificaParam("modificaCompleanno",  "Cambia data compleanno",   "Contenuto_3", "Inserisci il tuo compleanno.",      "CambiaCompleanno", "3", "modificaCampoUtente.php", "Compleanno"); ?>
                        <?php PrintModificaParam("modificaContatti",    "Cambia contatti",          "Contenuto_4", "Inserisci i tuoi contatti.",        "CambiaContatti",   "4", "modificaCampoUtente.php", "Contatti"); ?>
                        <?php PrintModificaParam("modificaPosizione",   "Cambia posizione",         "Contenuto_5", "Inserisci la tua posizione.",       "CambiaPosizione",  "5", "modificaCampoUtente.php", "Posizione"); ?>
                <?php
                    }
                ?>

        <?php
    }

    function PrintModificaParam($IdModal, $Titolo, $IdContenuto, $PlaceHolder, $FunzioneChiamante, $Count, $PaginaPhp, $NomeParametro)
    {
        ?>
            <!-- Modal modifica posizione -->
            <div class="modal fade" id="<?php echo $IdModal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $Titolo; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea  rows="5" id="<?php echo $IdContenuto; ?>" class="form-control" type="text" placeholder="<?php echo $PlaceHolder; ?>"></textarea>
                        <br>
                        <p id="serverAnswer_<?php echo $Count; ?>"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                        <button type="button" class="btn btn-primary" onclick="<?php echo $FunzioneChiamante; ?>()">Applica cambiamenti</button>
                    </div>
                    </div>
                </div>
            </div><!-- Fine Modal modifica posizione -->
            <script>
                function <?php echo $FunzioneChiamante; ?>()
                {
                    var Contenuto = document.getElementById("<?php echo $IdContenuto; ?>").value;
                    Contenuto = Contenuto.replace(/[\n\r]/g, "\\n");
                    Contenuto = Contenuto.replace(/</g, "&#60;");
                    
                    $.post("./<?php echo $PaginaPhp; ?>",  {"Contenuto": Contenuto, "NomeParametro" : "<?php echo $NomeParametro; ?>"} )
                    .done(function( result ) 
                    {
                        $("#serverAnswer_<?php echo $Count; ?>").html(result);
                    });
                }
            </script>
        <?php
    }

    function PrintModalUploadImage($IdModal, $Titolo, $PaginaPhp, $Count )
    {
        ?>
            <!-- Modal upload immagine -->
            <div class="modal fade bd-example-modal-lg" id="<?php echo $IdModal; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $Titolo; ?></strong></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        
                        <div class="modal-body">
                            <form id="uploadForm<?php echo $Count; ?>" enctype="multipart/form-data">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileInput" name="file">
                                    <label class="custom-file-label" for="customFile">Carica immagine</label>
                                </div>
                                <input style="width:100%; margin-bottom:16px; margin-top:16px;" class="btn btn-lg btn-success" type="submit" name="submit" value="UPLOAD"/>
                            </form>
                            <div id="uploadStatus<?php echo $Count; ?>"></div>
                                <div class="progress">
                                    <div id="progress-bar<?php echo $Count; ?>" class="progress-bar"></div>
                                </div>
                            <script>
                                $(".custom-file-input").on("change", function() {
                                var fileName = $(this).val().split("\\").pop();
                                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });

                                $(document).ready(function()
                                {
                                    // File upload via Ajax
                                    $("#uploadForm<?php echo $Count; ?>").on('submit', function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            xhr: function() {
                                                var xhr = new window.XMLHttpRequest();
                                                xhr.upload.addEventListener("progress", function(evt) {
                                                    if (evt.lengthComputable) {
                                                        var percentComplete = parseInt(((evt.loaded / evt.total) * 100),10);
                                                        $("#progress-bar<?php echo $Count; ?>").width(percentComplete + '%');
                                                        $("#progress-bar<?php echo $Count; ?>").html(percentComplete+'%');
                                                    }
                                                }, false);
                                                return xhr;
                                            },
                                            type: 'POST',
                                            url: '<?php echo $PaginaPhp; ?>',
                                            data: new FormData(this),
                                            contentType: false,
                                            cache: false,
                                            processData:false,
                                            beforeSend: function(){
                                                $("#progress-bar<?php echo $Count; ?>").width('0%');
                                            },
                                            error:function(){
                                                $('#uploadStatus<?php echo $Count; ?>').html('<p style="color:#EA4335;">Caricamento fallito, riprovare.</p>');
                                            },
                                            success: function(resp)
                                            {
                                                if(resp == 'ok'){
                                                    $('#uploadForm<?php echo $Count; ?>')[0].reset();
                                                    $('#uploadStatus<?php echo $Count; ?>').html('<p style="color:#28A74B;">File caricato con successo!<br>Ricaricare la pagina per aggiornare le impostazioni.</p>');
                                                }
                                                else if(resp == 'toobig')
                                                {
                                                    $('#uploadStatus<?php echo $Count; ?>').html('<p style="color:#EA4335;">L\'immagine sembra essere più grande di 100kb per avatar o 500kb per copertina, riprovare.</p>');
                                                }
                                                else
                                                    $('#uploadStatus<?php echo $Count; ?>').html('<p style="color:#EA4335;">Sembra esserci stato un errore, riprovare.</p>');
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div><!-- End Modal upload immagine -->
        <?php
    }

    function PrintScriptsTemplate()
    {
        ?>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <!-- JS Scripts -->
            <script src="assets/js/libs/jquery.appear.js"></script>
            <script src="assets/js/libs/jquery.mousewheel.js"></script>
            
            <script src="assets/js/libs/perfect-scrollbar.js"></script>
            <script src="assets/js/libs/svgxuse.js"></script>
            <script src="assets/js/libs/imagesloaded.pkgd.js"></script>
            <script src="assets/js/libs/Headroom.js"></script>
            <script src="assets/js/libs/popper.min.js"></script>
            <script src="assets/js/libs/material.min.js"></script>
            <script src="assets/js/libs/bootstrap-select.js"></script>
            <script src="assets/js/libs/smooth-scroll.js"></script>
            <script src="assets/js/libs/selectize.js"></script>
            <script src="assets/js/libs/swiper.jquery.js"></script>
            <script src="assets/js/libs/moment.js"></script>
            <script src="assets/js/libs/daterangepicker.js"></script>
            <script src="assets/js/libs/isotope.pkgd.js"></script>
            <script src="assets/js/libs/ajax-pagination.js"></script>
            <script src="assets/js/libs/jquery.magnific-popup.js"></script>
            <script src="assets/js/libs/aos.js"></script>
            <script src="assets/js/libs/purecounter_vanilla.js"></script>

            <script src="assets/js/main.js"></script>
            <script src="assets/js/libs-init/libs-init.js"></script>
            
            <script defer src="assets/fonts/fontawesome-all.js"></script>

            <script src="assets/js/sjcl.js"></script>

            <script src="assets/Bootstrap/dist/js/bootstrap.bundle.js"></script>

            <!-- SVG icons loader -->
            <script src="assets/js/svg-loader.js"></script>
            <!-- /SVG icons loader -->
        <?php
    }


    /*
    function PrintSomething()
    {
        ?>
            
        <?php
    }
    */
?>