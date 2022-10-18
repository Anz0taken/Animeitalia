<!DOCTYPE html>
<?php
  session_start();

  include 'vardefine.php';
  include 'functions.php';
  include 'PrintFunctions.php';
  include 'DataBaseFunctions.php';
  include 'googleConfig.php';

  require_once(__DIR__."/assets/vendor/autoload.php"); 

  $UserToken = GetUserToken();

  use RestCord\DiscordClient;
?>
<html lang="it">
<head>
<script data-ad-client="ca-pub-2621541393335958" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<?php PrintHead(); ?>
</head>
<body class="body-bg-white">

<script src="assets/js/jQuery/jquery-3.5.1.js"></script>
<!-- FINE AMBIENTE COMUNE -->

<div class="main-header main-header-fullwidth main-header-has-header-standard">

	<!-- Header Standard Landing  -->
	
	<div class="header--standard header--standard-landing" id="header--standard">
		<div class="container">
			<div class="header--standard-wrap">
	
				<a href="#" class="logo">
					<div class="img-wrap">
						<img  src="assets/img-anime-italia/aIIogo.png" alt="AnimeItalia">
						<img loading="lazy" src="assets/img-anime-italia/logo-anime-italia.png" alt="AnimeItalia" class="logo-colored">
					</div>
					<div class="title-block">
						<h5 class="logo-title">Anime Italia</h5>
						<div class="sub-title" id="sub-title">Legacy</div>
					</div>
				</a>

				<a href="#" class="open-responsive-menu js-open-responsive-menu">
					<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
				</a>
	
				<div class="nav nav-pills nav1 header-menu">
					<div class="mCustomScrollbar">
						<ul>
							<li class="nav-item">
								<a href="#" class="nav-link">Home</a>
							</li>
							<li class="nav-item">
								<!--<a class="nav-link "  href="#"role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Legacy News</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Naruto&Boruto</a>
									<a class="dropdown-item" href="#">Newsfeed</a>
									<a class="dropdown-item" href="#">Post Versions</a>
								</div>-->
							</li>
							<li class="nav-item dropdown dropdown-has-megamenu">
								<a href="https://www.viaggigiovani.it/viaggi-evento/tokyo-legacy" class="nav-link" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>TokyoTours</a>
							</li>
							<li class="nav-item">
								<a href="./chisiamo.php" class="nav-link">Chi siamo noi</a>
							</li>

							<li class="nav-item">
								<a href="./news.php" class="nav-link">Anime news</a>
							</li>

							<?php
								if(isset($_SESSION[$UserToken."UserName"]))    //se il mio utente è loggato
								{
							?>
								<li class="nav-item">
									<a href=".\pannelloControllo.php" class="nav-link">Pannello controllo</a>
								</li>
							<?php
								}
							?>


							<!--
							<li class="nav-item dropdown">
								<a href="#" class="nav-link " data-hover="dropdown" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Contattaci</a>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#">Assistenza</a>
									<a class="dropdown-item" href="#">diventa affiliato del network</a>
									<a class="dropdown-item" href="#">vuoi essere sponsorizzato?</a>
								</div>
							</li>
							-->
							<li class="close-responsive-menu js-close-responsive-menu">
								<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
							</li>
							<li class="nav-item js-expanded-menu">
								<a class="nav-link">
									<svg class="olymp-menu-icon"><use xlink:href="#olymp-menu-icon"></use></svg>
									<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
								</a>
							</li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php
      if(isset($_SESSION[$UserToken."Notify"]))
      {
        $Notify = intval($_SESSION[$UserToken."Notify"]);
        $TypeMessage = 0;
        $ContentMessage = 0;

        /* Otteniamo il tipo di alert */
        for($i = 2048, $TypeMessage = 0; !($Notify & $i) ; $i = $i >> 1, $TypeMessage++);

        /* Otteniamo il contenuto dell'alert */
        for($i = 1, $ContentMessage = 0; !($Notify & $i) ; $i = $i << 1, $ContentMessage++);
    ?>

      <!-- ======= Messaggio notifica ======= -->
      <div class="alert alert-<?php echo $Notify_Type[$TypeMessage]; ?> alert-dismissible fade show" style="position:fixed; z-index: 289; top:85px; width:100%;">
          <?php echo $Notify_Message[$ContentMessage]; ?>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>

    <?php
        unset($_SESSION[$UserToken."Notify"]);
      }
    ?>

	<!-- ... end Header Standard Landing  -->
	<div class="header-spacer--standard"></div>

	<div class="content-bg-wrap bg-landing">
        <div class="bg-video">
			<video class="bg-video-content" autoplay muted loop>
				<source src="assets/video-anime-italia/pepo.mp4" type="video/mp4">
				Your browser is not supported!
			</video>
		</div>
	</div>

	<div class="container">
		<div class="row display-flex">
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
				<img src="assets/img-anime-italia/Chiara_Anime_italia_2 (2).png" alt="mascotte-anime-italia" class="mascotte-anime-italia">
			</div>

			<div class="col col-xl-5 ml-auto col-lg-6 col-md-12 col-sm-12 col-12">

				
				<!-- Login-Registration Form  -->
				
				<div class="registration-login-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home" role="tab">
								<svg class="olymp-login-icon "><use xlink:href="#olymp-login-icon"></use></svg>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
								<svg class="olymp-register-icon"><use xlink:href="#olymp-register-icon"></use></svg>
							</a>
						</li>
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home" role="tabpanel">
							<div class="title h6">Registrati in AnimeItalia</div>
							<form class="content">
								<h3>Registrazione utenti presto disponibile!</h3>
								<!--
								<div class="row">
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Nome</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Cognome</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>
				
										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Data di Nascita</label>
											<input name="datetimepicker" value="10/24/1984" />
											<span class="input-group-addon">
															<svg class="olymp-calendar-icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
														</span>
										</div>
				
										<div class="form-group label-floating is-select">
											<label class="control-label">Genero</label>
											<select class="selectpicker form-control">
												<option value="MA">Maschile</option>
												<option value="FE">Femminile</option>
											</select>
										</div>
				
										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Io accetto i <a href="#">termini e condizioni</a> del sito
												</label>
											</div>
										</div>
				
										<a href="#" class="btn colore-anime-italia btn-lg full-width">Completare Registrazione!</a>
									</div>
								</div>
								-->
							</form>
						</div>
				
						<div class="tab-pane" id="profile" role="tabpanel">
							<div class="title h6">Accedi al tuo account</div>
								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
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

											<!--<a target="_blank" href="https://discord.com/api/oauth2/authorize?client_id=772905716288716811&permissions=8&redirect_uri=http%3A%2F%2Flocalhost%2FAnimeitalia_L%2Flogin_discord.php&response_type=code&scope=identify%20email%20connections%20guilds%20guilds.join%20gdm.join%20applications.builds.upload%20messages.read%20webhook.incoming%20bot%20rpc.notifications.read%20rpc%20applications.builds.read%20applications.store.update%20applications.entitlements%20activities.read%20activities.write%20relationships.read" class="get-started-btn scrollto">Accedi con Discord</a>
											
											<a target="_blank" href="<?php echo $GoogleClient->createAuthUrl() ?>" class="get-started-btn scrollto">Accedi con Google</a>
											-->
											</div>
											</div>
										</div>	
										<!--
											<div class="form-group label-floating">
												<label class="control-label">Username</label>
												<input class="form-control" placeholder="" type="email">
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Password</label>
												<input class="form-control" placeholder="" type="password">
											</div>

										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Salvare dati
												</label>
											</div>
											<a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Ho dimenticato la mia password</a>
										</div>
				
										<a href="#" class="btn btn-lg btn-primary full-width">Login</a>
				
										<div class="or"></div>
				
										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login con Facebook</a>
				
										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login con Twitter</a>
				
										-->

										<p>Per ora solo alcuni utenti speciali possono accedere! Tranquillo, stiamo lavorando per voi!</p>
									</div>
								</div>

						</div>
					</div>
				</div>
				
				<!-- ... end Login-Registration Form  -->
			</div>
		</div>
	</div>
</div>



<!-- Clients Block -->

<section class="crumina-module crumina-clients">
	<div class="container">
		<div class="row">
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" target="_blank" href="https://www.instagram.com/animelegacy.italia/?hl=it">
					<img loading="lazy" src="assets/Social-icons/034-instagram.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" target="_blank" href="https://t.me/animelegacy">
					<img loading="lazy" src="assets/Social-icons/056-telegram.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" target="_blank" href="https://discord.gg/animeitalia">
					<img loading="lazy" src="assets/Social-icons/057-discord.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" target="_blank" href="https://www.facebook.com/groups/noicheguardiamoanimeeleggiamomanga">
					<img loading="lazy" src="assets/Social-icons/045-facebook.png" class="" alt="logo">
				</a>
			</div>
			<div class="col col-xl-2 m-auto col-lg-2 col-md-6 col-sm-6 col-6">
				<a class="clients-item" target="_blank" href="https://www.twitch.tv/animeitaliatv">
					<img loading="lazy" src="assets/Social-icons/015-twitch.png" class="" alt="logo">
				</a>
			</div>
		</div>
	</div>
</section>


<section class="section">
	<div class="section-text">
		<h2 class="heading-title">Trova utenti <span class="c-primary">con i tuoi stessi interessi</span></h2>
		<p class="heading-text">Se cerchi una community in cui non c'è mai d'annoiarsi, allora Animeitalia fa per te. Troverai tante persone a te simili che non credevi esistessero, che aspetti, entra subito!
		</p>
	</div>
	<div class="section-image-box">
        <img src="assets/img-anime-italia/anime-italia-games.png" alt="last-image" class="section-image">
	</div>
</section>

<section class="section">
	<div class="section-image-box">
        <img src="assets/img-anime-italia/anime-italia-discord.png" alt="last-image" class="section-image">
	</div>
	<div class="section-text">
		<h2 class="heading-title">Una comunity che <span class="c-primary">nasce dagli utenti</span></h2>
		<p class="heading-text">Tutte le nostre community sono nate proprio per voi! Amanti del mondo anime e dei giochi, abbiamo scelto di creare il nostro network per rispecchiare tutte le vostre necessit&agrave; e desideri.
		</p>
	</div>
</section>

<section class="section">
	<div class="section-text">
		<h2 class="heading-title">Perchè unirsi a <span class="c-primary">Anime Italia Legacy</span>?</h2>
		<p class="heading-text">Perch&egrave; siamo gli unici in Italia ad avere una piattaforma completa e soddisfacente per ogni user background, con pi&ugrave; 500k utenti online ogni giorno, lavoriamo e siamo sempre attivi per voi.
		</p>
	</div>
	<div class="section-image-box">
        <img src="assets/img-anime-italia/puppamelo.png" alt="last-image" class="section-image">
	</div>
</section>


<section class="medium-padding100 subscribe-animation bg-users">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading c-white custom-color">
					<h2 class="h1 heading-title">AnimeItalia Newsletter</h2>
					<p class="heading-text">Scriviti per essere il primo a sapere sulle nostre novità!
					</p>
				</div>

				
				<!-- Subscribe Form  -->
				
				<form class="form-inline subscribe-form" method="post">
					<div class="form-group label-floating is-empty">
						<label class="control-label">Enter your email</label>
						<input class="form-control bg-white" placeholder="" type="email">
					</div>
				
					<button class="btn btn-blue btn-lg">Inviare</button>
				</form>
				
				<!-- ... end Subscribe Form  -->

			</div>
		</div>

	</div>
</section>



<!-- Section Call To Action Animation -->

<div class="modal fade" id="registration-login-form-popup" tabindex="-1" role="dialog" aria-labelledby="registration-login-form-popup" aria-hidden="true">
	<div class="modal-dialog window-popup registration-login-form-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<div class="registration-login-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home1" role="tab">
								<svg class="olymp-login-icon">
									<use xlink:href="#olymp-login-icon"></use>
								</svg>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#profile1" role="tab">
								<svg class="olymp-register-icon">
									<use xlink:href="#olymp-register-icon"></use>
								</svg>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home1" role="tabpanel">
							<div class="title h6">Registrati su AnimeItalia</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Cognome</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Data di nascita</label>
											<input name="datetimepicker" value="10/24/1984" />
											<span class="input-group-addon">
											<svg class="olymp-calendar-icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
										</span>
										</div>

										<div class="form-group label-floating is-select">
											<label class="control-label">Genero</label>
											<select class="selectpicker form-control">
												<option value="MA">Maschile</option>
												<option value="FE">Femminile</option>
											</select>
										</div>

										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Io accetto i<a href="#">termini e condizioni</a> del sito
												</label>
											</div>
										</div>

										<a href="#" class="btn btn-purple btn-lg full-width">Completare registrazione!</a>
									</div>
								</div>
							</form>
						</div>

						<div class="tab-pane" id="profile1" role="tabpanel">
							<div class="title h6">Login nel tuo Account</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label"> Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="remember">

											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Ricordare dati
												</label>
											</div>
											<a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Ho dimenticato la mia Password</a>
										</div>

										<a href="#" class="btn btn-lg btn-primary full-width">Login</a>

										<div class="or"></div>

										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login con Facebook</a>

										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login con Twitter</a>


										<p>Hai già un account?
											<a href="#">Registrati subito!</a> E potrai godere dei benefici della nostra comunity!
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Window-popup Restore Password -->

<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
	<div class="modal-dialog window-popup restore-password-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Recuperare Password</h6>
			</div>

			<div class="modal-body">
				<form  method="get">
					<p>Enter your email and click the send code button. You’ll receive a code in your email. Please use that
						code below to change the old password for a new one.
					</p>
					<div class="form-group label-floating">
						<label class="control-label">Your Email</label>
						<input class="form-control" placeholder="" type="email" value="james-spiegel@yourmail.com">
					</div>
					<button class="btn btn-purple btn-lg full-width">Send me the Code</button>
					<div class="form-group label-floating">
						<label class="control-label">Enter the Code</label>
						<input class="form-control" placeholder="" type="text" value="">
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Your New Password</label>
						<input class="form-control" placeholder="" type="password" value="olympus">
					</div>
					<button class="btn btn-primary btn-lg full-width">Change your Password!</button>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- ... end Window-popup Restore Password -->


<!-- Window Popup Main Search -->

<div class="modal fade" id="main-popup-search" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>
			<div class="modal-body">
				<form class="form-inline search-form" method="post">
					<div class="form-group label-floating">
						<label class="control-label">What are you looking for?</label>
						<input class="form-control bg-white" placeholder="" type="text" value="">
					</div>

					<button class="btn btn-purple btn-lg">Search</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- ... end Window Popup Main Search -->

<!-- Footer Full Width -->

<footer class="footer">
	<div class="footer-logo-box">
        <img src="assets/img-anime-italia/logo-anime-italia.png" alt="footer logo" class="footer-logo">
	</div>
	<div class="footer-content">
        <div class="footer-navigation">
				<ul class="footer-list">
					<li class="footer-item"><a href="#" class="footer-link">Home</a></li>
					<li class="footer-item"><a href="#" class="footer-link">Profilo</a></li>
					<li class="footer-item"><a href="#" class="footer-link">Eventi</a></li>
					<li class="footer-item"><a href="#" class="footer-link">Termini e condizioni</a></li>
					<li class="footer-item"><a href="#" class="footer-link">Privacy policy</a></li>
				</ul>
		</div>

		<div class="footer-copyright">
			<p class="footer-copyright-text">
				Copyright &copy; 2021 Turing Enterprise, Luca Gargiullo
			</p>
		</div>
	</div>
</footer>

</div>

<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="popup-chat-responsive" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img loading="lazy" src="assets/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img loading="lazy" src="assets/img/author-page.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img loading="lazy" src="assets/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

		<div class="form-group">
			<textarea class="form-control" placeholder="Press enter to post..."></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="#olymp-happy-sticker-icon"></use></svg>

				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<!-- INIZIO AMBIENTE COMUNE -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/countup.js/1.8.2/countUp.min.js'></script>
<?php PrintScriptsTemplate(); ?>
<script src="assets/js/svg-loader.js"></script>

</body>
</html>