<!DOCTYPE html>
<?php
  session_start();
  include 'vardefine.php';
  include 'functions.php';
  include 'PrintFunctions.php';
  include 'DataBaseFunctions.php';
  require_once(__DIR__."/assets/vendor/autoload.php"); 

  $UserToken = GetUserToken();

  use RestCord\DiscordClient;
?>

<?php
    if(isset($_SESSION[$UserToken."UserName"]))    //Se il mio utente è loggato
    {
?>

<html lang="it">
  <head>

    <?php PrintHead() ?>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cp/assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/ionic-icon.css">
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/prism.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/style.css">
    <link id="color" rel="stylesheet" href="cp/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="cp/assets/css/responsive.css">

    <!-- Plugin -->
    <link href="./assets/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href='assets/css/calendar_main.css' rel='stylesheet'/>
  </head>
  <body class="dark-only">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper">
            <div class="logo-wrapper"><a href="index.php" style="cursor: pointer;"><img class="img-fluid" src="" alt=""></a></div>
            <div class="toggle-sidebar"><i href="index.php" class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
          </div>
          <div class="left-header col horizontal-wrapper pl-0">
            <ul class="horizontal-menu">
                <div class="mega-menu-container nav-submenu">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col mega-box">
                        <div class="mobile-title d-none">
                          <h5>Mega menu</h5><i data-feather="x"></i>
                        </div>
                        <div class="link-section icon">
                          <div>
                            <h6>Error Page</h6>
                          </div>
                          <ul>
                            <li><a href="error-400.html">Error page 400</a></li>
                            <li><a href="error-401.html">Error page 401</a></li>
                            <li><a href="error-403.html">Error page 403</a></li>
                            <li><a href="error-404.html">Error page 404</a></li>
                            <li><a href="error-500.html">Error page 500</a></li>
                            <li><a href="error-503.html">Error page 503</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section doted">
                          <div>
                            <h6> Authentication</h6>
                          </div>
                          <ul>
                            <li><a href="login.html">Login Simple</a></li>
                            <li><a href="login-image.html">Login Bg Image</a></li>
                            <li><a href="login-video.html">Login Bg video</a></li>
                            <li><a href="signup.html">Register Simple</a></li>
                            <li><a href="signup-image.html">Register Bg Image</a></li>
                            <li><a href="signup-video.html">Register Bg video</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section dashed">
                          <div>
                            <h6>Usefull Pages</h6>
                          </div>
                          <ul>
                            <li><a href="search.html">Search Website</a></li>
                            <li><a href="search-video.html">Search Video</a></li>
                            <li><a href="unlock.html">Unlock User</a></li>
                            <li><a href="forget-password.html">Forget Password</a></li>
                            <li><a href="reset-password.html">Reset Password</a></li>
                            <li><a href="maintenance.html">Maintenance</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section">
                          <div>
                            <h6>Email templates</h6>
                          </div>
                          <ul>
                            <li><a href="basic-template.html">Basic Email</a></li>
                            <li><a href="email-header.html">Basic With Header</a></li>
                            <li><a href="template-email.html">Ecomerce Template</a></li>
                            <li><a href="template-email-2.html">Email Template 2</a></li>
                            <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                            <li><a href="email-order-success.html">Order Success</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col mega-box">
                        <div class="link-section">
                          <div>
                            <h6>Coming Soon</h6>
                          </div>
                          <ul class="svg-icon">
                            <li><a href="comingsoon.html"> <i data-feather="file"> </i>Coming-soon</a></li>
                            <li><a href="comingsoon-bg-video.html"> <i data-feather="film"> </i>Coming-video</a></li>
                            <li><a href="comingsoon-bg-img.html"><i data-feather="image"> </i>Coming-Image</a></li>
                          </ul>
                          <div>
                            <h6>Other Soon</h6>
                          </div>
                          <ul class="svg-icon">
                            <li><a class="txt-primary" href="landing-page.html"> <i data-feather="cast"></i>Landing Page</a></li>
                            <li><a class="txt-secondary" href="sample-page.html"> <i data-feather="airplay"></i>Sample Page</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-secondary">1</span></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li class="bg-primary text-center">
                    <h6 class="f-18 mb-0">Notifiche</h6>
                    <p class="mb-0">Qui ci sono le tue notifiche!</p>
                  </li>
                  <li>
                    <p><i class="fa fa-circle-o mr-3 font-danger"></i>Notifica<span class="pull-right">Fine</span></p>
                  </li>
                  <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                </ul>
              </li>
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <ul class="chat-dropdown onhover-show-div">
                  <li class="bg-primary text-center">
                    <h6 class="f-18 mb-0">Chat</h6>
                    <p class="mb-0">Nessun messaggio</p>
                  </li>
                  <li>
                  </li>
                  <li class="text-center"> <a class="btn btn-primary" onclick="visualizzaMessaggi()">Apri interfaccia messaggi</a></li>
                </ul>
              </li>
              <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="profile-nav onhover-dropdown p-0 mr-0">
                <div class="media profile-media">
                <img class="b-r-10" alt="" width="40" height="40" src="
                <?php
                    $UserProfile = GetUserProfileById($_SESSION[$UserToken."IdUtente"]);

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
                  <div class="media-body"><span><?php echo $_SESSION[$UserToken."UserName"]; ?></span>
                    <p class="mb-0 font-roboto"> <?php echo $_SESSION[$UserToken."Nome"]; ?> <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div" style="position:absolute; top:40px;">
                  <li><i data-feather="settings"></i><span onclick="visualizzaImpostazioniAccount()">Impostazioni</span></li>
                  <li><i data-feather="log-in"></i><a href="logout.php"><span>Esci</span></li></a>
                </ul>
              </li>
            </ul>
          </div>
          <script id="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script id="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div class="logo-wrapper"><a href="index.php" style="cursor: pointer;"><img class="img-fluid" src="" alt=""><h2>Animeitalia</h2></a></div>
          <div class="logo-icon-wrapper"><a href="index.php" style="cursor: pointer;"><img class="img-fluid" src="" alt=""><h2>Animeitalia</h2></a></div>
          <nav>
            <div class="sidebar-main">
              <div id="sidebar-menu">
                <ul class="sidebar-links custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                  </li>

                  <!-- SOCIAL AMMINISTRATORI -->
                  <li class="sidebar-main-title">
                    <div>
                      <h6>Social</h6>
                      <p>Visualizza, chatta e interagisci con gli altri amministratori della piattaforma!</p>
                    </div>
                  </li>

                  <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg><span>Azioni sugli utenti</span></a>
                    
                    <ul class="sidebar-submenu">
                      <li><a style="cursor:pointer;"  onclick="visualizzaUtenti()">Visualizza utenti</a></li>
                      <li><a style="cursor:pointer;"  onclick="visualizzaMessaggi()">Chatta con gli utenti</a></li>
                    </ul>
                  </li>

                  <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg><span>Post & Feeds</span></a>
                    
                    <ul class="sidebar-submenu">
                      <li><a style="cursor:pointer;"  onclick="visualizzaPost()">Visualizza post</a></li>
                      <li><a style="cursor:pointer;"  onclick="aggiungiPost()">Pubblica post</a></li>
                    </ul>
                  </li>

                  <!-- SOCIAL AMMINISTRATORI END -->

                  <!-- GESTIONE AMMINISTRATORI -->
                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)
                    {
                  ?>
                    <li class="sidebar-main-title">
                      <div>
                        <h6>Gestione utenti</h6>
                        <p>Gestisci tutte le informazioni degli utenti registrati alla piattaforma.</p>
                      </div>
                    </li>
                  <?php
                    }
                  ?>
                  
                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOADDADMIN)
                    {
                  ?>
                    <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><i data-feather="layers"></i><span>Gestione amministratori</span></a>
                      <ul class="sidebar-submenu">
                        <li><a style="cursor:pointer;"  onclick="visualizzaAmministratori()">Visualizza amministratori</a></li>
                        <li><a style="cursor:pointer;"  onclick="aggiungiAmministratore()">Aggiungi amministratore</a></li>
                        <li><a style="cursor:pointer;"  onclick="visualizzaLogAmministratori()">Visualizza log amministratori</a></li>
                      </ul>
                    </li>
                  <?php
                    }
                  ?><!-- GESTIONE AMMINISTRATORI FINE -->

                  <!-- GESTIONE NEWS -->
                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSONEWS ||  $_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE)
                    {
                  ?>
                    <li class="sidebar-main-title">
                      <div>
                        <h6>Gestione news</h6>
                        <p>Operazioni da poter effettuare per modificare, visionare e aggiungere annunci news sulla piattaforma web!</p>
                      </div>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSONEWS)
                    {
                  ?>
                    <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg><span>Gestione news</span></a>
                      <ul class="sidebar-submenu">
                        <li><a style="cursor:pointer;"  onclick="visualizzaBozzeUser()">Visualizza le tue bozze</a></li>
                        <li><a style="cursor:pointer;"  onclick="aggiungiBozzaUserMenu()">Aggiungi una nuova bozza</a></li>
                      </ul>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOREDATTORE)
                    {
                  ?>
                    <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg><span>Pubblica news</span></a>
                      <ul class="sidebar-submenu">
                        <li><a style="cursor:pointer;"  onclick="visualizzaBozzeDaRevisionare()">Visualizza bozze da revisionare</a></li>
                      </ul>
                    </li>
                  <?php
                    }
                  ?><!-- FINE GESTIONE NEWS-->

                  <!-- GESTIONE DISCORD -->
                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOSTATISTICHE ||  $_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK || $_SESSION[$UserToken."Privilegi"] & PERMESSOPERMESSI)
                    {
                  ?>
                    <li class="sidebar-main-title">
                      <div>
                        <h6>Discord</h6>
                        <p>Operazioni da poter effettuare sul server</p>
                      </div>
                    </li>
                  <?php
                    }
                  ?>
                
                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOSTATISTICHE)
                    {
                  ?>
                    <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg><span>Statistiche discord</span></a>
                      <ul class="sidebar-submenu">
                        <li><a style="cursor:pointer;"  onclick="aggiungiCanaleDiscord()">Aggiungi canale</a></li>
                        <li><a style="cursor:pointer;"  onclick="visualizzaCanali()">Visualizza canali</a></li>
                        <li><a style="cursor:pointer;"  onclick="visualizzaUtentiDiscord()">Visualizza utenti</a></li>
                        <!-- <li><a style="cursor:pointer;"  onclick="visualizzaStatisticheGenerali()">Informazioni generali</a></li> -->
                      </ul>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOWEBHOOK)
                    {
                  ?>
                    <li class="sidebar-list"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg><span>Gestisci webhooks</span></a>
                      <ul class="sidebar-submenu">
                        <li><a style="cursor:pointer;"  onclick="visualizzaWebHookMenu()">Visualizza webhooks</a></li>
                        <li><a style="cursor:pointer;"  onclick="visualizzaMandaMessagguiMenu()">Manda messaggio (bot)</a></li>
                      </ul>
                    </li>
                  <?php
                    }
                  ?>

                  <?php
                    if($_SESSION[$UserToken."Privilegi"] & PERMESSOPERMESSI)
                    {
                    ?>
                      <li class="sidebar-list" ><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-pull-request"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><line x1="6" y1="9" x2="6" y2="21"></line></svg><span>Gestisci permessi</span></a>
                        <ul class="sidebar-submenu">
                          <li><a style="cursor:pointer;"  onclick="">Presto disponibile</a></li>
                        </ul>
                      </li>
                    <?php
                    }
                  ?><!-- GESTIONE DISCORD FINE -->
                  
                  <!-- GESTIONE ALTRE FUNZIONI -->
                  <li class="sidebar-main-title">
                      <div>
                        <h6>Altre funzioni</h6>
                        <p>Funzioni miste piattaforma web e altri social</p>
                      </div>
                    </li>

                  <li class="sidebar-list" style="margin-bottom:40px;"><a class="nav-link sidebar-title" style="cursor:pointer;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span>Calendario</span></a>
                    <ul class="sidebar-submenu">
                      <li><a style="cursor:pointer;"  onclick="visualizzaCalendario()">Visualizza calendario</a></li>
                      <li><a style="cursor:pointer;"  onclick="aggiungiEventoMenu()">Aggiungi evento</a></li>
                    </ul>
                  </li><!-- GESTIONE ALTRE FUNZIONI FINE -->

                </ul>
              </div>
            </div>
          </nav>
        </div>

        <!-- Page Sidebar Ends-->
        <div id="main" class="page-body">

          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-lg-6">
                  <h3>Benvenuto al pannello di controllo admin</h3>
                </div>
              </div>
            </div>
          </div>

          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row starter-main">

            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Salve amministratore</h5>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <p>
                      Questa &egrave; la fase beta del pannello di controllo per amministratori V1.0 della piattaforma web Animeitalia Legacy network. Pertanto le operazioni al momento che ogni amministratore pu&ograve; svolgere sono limitate. Col tempo ne verranno aggiunte altre.<br>
                      La versione corrente non ha scopi finali per un utilizzo utile degli strumenti forniti dalla piattaforma, bens&igrave; quella di verificare una solida struttura lato sicurezza, gestionale e grafico.<br>
                      Sono pregati i tester della piattaforma a contattare i responsabili gestori in caso di riconoscimento bug o malfunzionamenti, quanto prima provvederanno alla risoluzione dei problemi tecnici.<br>
                      <br>
                      Vi ringraziamo di aver preso parte a questa nuova iniziativa e,
                      fiduciosi sulle potenzialit&agrave; della piattaforma e della community supportante,
                      ci auguriamo abbiate piacevole permanenza,<br>
                      Anz & Staff.
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Container-fluid Ends-->

        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Animeitalia 2020 © All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Developed by Luca Gargiulo</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="cp/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="cp/assets/js/bootstrap/popper.min.js"></script>
    <script src="cp/assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="cp/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="cp/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="cp/assets/js/sidebar-menu.js"></script>
    <script src="cp/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="cp/assets/js/prism/prism.min.js"></script>
    <script src="cp/assets/js/clipboard/clipboard.min.js"></script>
    <script src="cp/assets/js/custom-card/custom-card.js"></script>
    <script src="cp/assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="cp/assets/js/script.js"></script>
    <script src="cp/assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="assets/js/sjcl.js"></script>
    <script type="text/javascript" src="assets/js/chat.js"></script>
    <script src='assets/js/calendar_main.js'></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="./assets/js/datepicker.min.js"></script>

  </body>
  <script>
    
    function aggiungiAmministratore()
    {
        <?php PrintAjaxFunction("aggiungiAmministratoreMenu.php","#main"); ?>
    }

    function visualizzaAmministratori()
    {
      <?php PrintAjaxFunction("visualizzaAmministratoreMenu.php","#main"); ?>
    }

    function visualizzaLogAmministratori()
    {
      <?php PrintAjaxFunction("visualizzaLogAmministratoreMenu.php","#main"); ?>
    }

    function visualizzaUtenti()
    {
      <?php PrintAjaxFunction("visualizzaUtenti.php","#main"); ?>
    }

    function visualizzaImpostazioniAccount()
    {
      <?php PrintAjaxFunction("visualizzaImpostazioniAccount.php","#main"); ?>
    }

    function visualizzaBozzeUser()
    {
      <?php PrintAjaxFunction("visualizzaBozzeUser.php","#main"); ?>
    }

    function aggiungiBozzaUserMenu()
    {
      <?php PrintAjaxFunction("aggiungiBozzaUserMenu.php","#main"); ?>
    }

    function visualizzaBozzeDaRevisionare()
    {
      <?php PrintAjaxFunction("visualizzaBozzeDaRevisionare.php","#main"); ?>
    }

    function visualizzaMessaggi()
    {
      <?php PrintAjaxFunction("visualizzaMessaggi.php","#main"); ?>
    }

    function visualizzaStatisticheGenerali()
    {
      <?php PrintAjaxFunction("visualizzaStatisticheGenerali.php","#main"); ?>
    }

    function visualizzaCalendario()
    {
      <?php PrintAjaxFunction("visualizzaCalendario.php","#main"); ?>
    }

    function aggiungiCanaleDiscord()
    {
      <?php PrintAjaxFunction("aggiungiCanaleMenu.php","#main"); ?>
    }

    function visualizzaCanali()
    {
      <?php PrintAjaxFunction("visualizzaCanali.php","#main"); ?>
    }

    function visualizzaUtentiDiscord()
    {
      <?php PrintAjaxFunction("visualizzaUtentiDiscord.php","#main"); ?>
    }

    function visualizzaMandaMessagguiMenu()
    {
      <?php PrintAjaxFunction("visualizzaMandaMessagguiMenu.php","#main"); ?>
    }

    function visualizzaWebHookMenu()
    {
      <?php PrintAjaxFunction("visualizzaWebHookMenu.php","#main"); ?>
    }

    function visualizzaPost()
    {
      <?php PrintAjaxFunction("visualizzaPost.php","#main"); ?>
    }

    function aggiungiPost()
    {
      <?php PrintAjaxFunction("aggiungiPostMenu.php","#main"); ?>
    }

    function aggiungiEventoMenu()
    {
      <?php  PrintAjaxFunction("aggiungiEventoMenu.php","#main"); ?>
    }

  </script>

</html>

<?php
    }
    else
      header("Location: index.php");
?>