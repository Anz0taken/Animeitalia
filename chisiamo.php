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
		
					<a href="./index.php" class="logo">
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
									<a href=".\index.php" class="nav-link">Home</a>
								</li>
								<li class="nav-item">
									<!--<a class="nav-link "  href="#"role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Legacy News</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#">Naruto&Boruto</a>
										<a class="dropdown-item" href="#">Newsfeed</a>
										<a class="dropdown-item" href="#">Post Versions</a>
									</div>
                                    -->
								</li>
								<li class="nav-item dropdown dropdown-has-megamenu">
									<a href="https://www.viaggigiovani.it/viaggi-evento/tokyo-legacy" class="nav-link" role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>TokyoTours</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">Chi siamo noi</a>
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
									<a href="#" class="nav-link">
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
	

		<div class="contenitore">
			<div class="head-title">
				<p class="text">About us</p>
			</div>
		</div>
		
					<!-- ... end Login-Registration Form  -->
				</div>
			</div>
		</div>
	</div>

<!-- End Stunning header -->



<section class="medium-padding180 counters">
	<div class="container">
		<div class="row">

			
			<!-- Counter Item -->
			
			<div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
				<div class="counter-numbers counter h2">
					<span data-purecounter-start="2" data-purecounter-end="400" data-purecounter-duration="2" class="purecounter">2</span>
					<div class="units">K<div>+</div></div>
				</div>
				<div class="counter-title">Membri Network</div>
			</div>
			
			<!-- ... end Counter Item -->

			
			<!-- Counter Item -->
			
			<div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
				<div class="counter-numbers counter h2">
					<span data-purecounter-start="2" data-purecounter-end="100" data-purecounter-duration="2" class="purecounter">2</span>
					<div class="units">K<div>+</div></div>
				</div>
				<div class="counter-title">Iscritti dei nostri affiliati</div>
			</div>
			
			<!-- ... end Counter Item -->

			
			<!-- Counter Item -->
			
			<div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
				<div class="counter-numbers counter h2">
					<span data-purecounter-start="2" data-purecounter-end="8" data-purecounter-duration="2" class="purecounter">2</span>
					<div class="units"><div></div></div>
				</div>
				<div class="counter-title">Gruppi, canali del nostro Network</div>
			</div>
			
			<!-- ... end Counter Item -->

			
			<!-- Counter Item -->
			
			<div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
				<div class="counter-numbers counter h2">
					<span data-purecounter-start="2" data-purecounter-end="4" data-purecounter-duration="2" class="purecounter">2</span>
					<div class="units"><div></div></div>
				</div>
				<div class="counter-title">I ragazzi in gamba dietro a tutto questo</div>
			</div>
			
			<!-- ... end Counter Item -->

		</div>
	</div>
</section>

<section class="pt120">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-5 col-lg-5 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading align-center">
					<div class="heading-sup-title">Che cos'è?</div>
					<h2 class="heading-title">AnimeItalia Legacy Network</h2>
					<p class="heading-text">Animeitalia Legacy è una community che conta quasi quattrocento mila utenti che è riuscita nel tempo a costruirsi la community anime più attiva e seguita in Italia, tra instagram, telegram, 
						discord e affiliati twitch e youtube siamo riusciti a costruire una realtà fatta per i veri amanti degli anime.
					</p>
				</div>
			</div>
		</div>

		<div class="info-box-wrap">
			<div class="row">
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fa fa-handshake"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">Collaborazioni</h3>
							<p class="info-box-text">Noi di Animeitalia cerchiamo sempre di essere sinceri cordiali e sopratutto cerchiamo sempre persone collaborative per ingrandire questa già grande realtà che è Animeitalia.</p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fa fa-briefcase"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">Impegno</h3>
							<p class="info-box-text">Per noi l'impegno per far trovare al meglio ogni giorno ogni utente che ci viene a trovare è sacro e cercheremo sempre di mantenere una certa qualità nei nostri servizi.</p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fa fa-list-alt"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">AnimeList</h3>
							<p class="info-box-text">Il sito è provisto del servizio animelist .</p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fa fa-ambulance"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">Beta</h3>
							<p class="info-box-text">Siamo ancora in fase di costruzione vi preghiamo di aspettare magari arriverà il sito ufficiale un giorno </p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fas fa-users"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">Amicizia</h3>
							<p class="info-box-text">L'amicizia per la nostra community è una delle nostre priorità.</p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
				<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

					
					<!-- Info Box  -->
					
					<div class="crumina-module crumina-info-box h-100">
						<div class="info-box-image">
							<i class="fa fa-puzzle-piece"></i>
						</div>
						<div class="info-box-content">
							<h3 class="info-box-title">Semplicità</h3>
							<p class="info-box-text">Il nostro servizio è pulito,semplice e diretto.</p>
						</div>
					</div>
					
					<!-- ... end Info Box  -->

				</div>
			</div>
		</div>

	</div>
</section>


<section class="medium-padding120">
	<div class="container">
		<div class="row mb60">
			<div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 m-auto">
				<div class="crumina-module crumina-heading align-center">
					<div class="heading-sup-title">THE OLYMPIANS</div>
					<h2 class="heading-title">I WEEB DIETRO A TUTTO</h2>
					<p class="heading-text">Conosci il team!
					</p>
				</div>
			</div>
		</div>

		<div class="row teammembers-wrap">
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
						<img class="main" src=".\assets\img-anime-italia\damiano.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\damiano.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Damiano Di Stefano(aka demix931)l</a>
				
						<div class="teammembers-item-prof">OWNER SUPREMO</div>
				
						<ul class="socials socials--round">
				
                            <li>
								<a target="_blank" href="https://www.facebook.com/demix931" class="social-item facebook">
									<svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.48-1.195 1.18v1.54h2.39l-.31 2.42h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"></path></svg>
								</a>
							</li>

							<li>
								<a target="_blank" href="https://t.me/demix931" class="social-item twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                    <path d="M66.964 134.874s-32.08-10.062-51.344-16.002c-17.542-6.693-1.57-14.928 6.015-17.59 7.585-2.66 186.38-71.948 194.94-75.233 8.94-4.147 19.884-.35 14.767 18.656-4.416 20.407-30.166 142.874-33.827 158.812-3.66 15.937-18.447 6.844-18.447 6.844l-83.21-61.442z" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M92.412 201.62s4.295.56 8.83-3.702c4.536-4.26 26.303-25.603 26.303-25.603" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M66.985 134.887l28.922 14.082-3.488 52.65s-4.928.843-6.25-3.613c-1.323-4.455-19.185-63.12-19.185-63.12z" fill="#FFFFFF" stroke="#000" stroke-width="10" stroke-linejoin="bevel"/>
                                    <path d="M66.985 134.887s127.637-77.45 120.09-71.138c-7.55 6.312-91.168 85.22-91.168 85.22z" fill="#FFFFFF" stroke="#000" stroke-width="9.67" stroke-linejoin="bevel"/>
                                    </svg>
								</a>
							</li>
				
							<li>
								<a target="_blank" href="https://www.instagram.com/demix931/?hl=it" class="social-item instagram">
                                    <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve"> <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/> <path id="XMLID_81_" fill="#FFFFFF" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/> <circle id="XMLID_83_" fill="#FFFFFF" cx="418.306" cy="134.072" r="34.149"/> </svg>
                                </a>
							</li>

						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
                        <img class="main" src=".\assets\img-anime-italia\orso.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\orso.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Alessandro Ferrara(aka Orso)</a>
				
						<div class="teammembers-item-prof">OWNER</div>
				
						<ul class="socials socials--round">
				
                            <li>
								<a target="_blank" href="https://www.facebook.com/alessandro.ferrara.568632/" class="social-item facebook">
									<svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M15.117 0H.883C.395 0 0 .395 0 .883v14.234c0 .488.395.883.883.883h7.663V9.804H6.46V7.39h2.086V5.607c0-2.066 1.262-3.19 3.106-3.19.883 0 1.642.064 1.863.094v2.16h-1.28c-1 0-1.195.48-1.195 1.18v1.54h2.39l-.31 2.42h-2.08V16h4.077c.488 0 .883-.395.883-.883V.883C16 .395 15.605 0 15.117 0" fill-rule="nonzero"></path></svg>
								</a>
							</li>

							<li>
								<a target="_blank" href="https://t.me/Alestosos" class="social-item twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                    <path d="M66.964 134.874s-32.08-10.062-51.344-16.002c-17.542-6.693-1.57-14.928 6.015-17.59 7.585-2.66 186.38-71.948 194.94-75.233 8.94-4.147 19.884-.35 14.767 18.656-4.416 20.407-30.166 142.874-33.827 158.812-3.66 15.937-18.447 6.844-18.447 6.844l-83.21-61.442z" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M92.412 201.62s4.295.56 8.83-3.702c4.536-4.26 26.303-25.603 26.303-25.603" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M66.985 134.887l28.922 14.082-3.488 52.65s-4.928.843-6.25-3.613c-1.323-4.455-19.185-63.12-19.185-63.12z" fill="#FFFFFF" stroke="#000" stroke-width="10" stroke-linejoin="bevel"/>
                                    <path d="M66.985 134.887s127.637-77.45 120.09-71.138c-7.55 6.312-91.168 85.22-91.168 85.22z" fill="#FFFFFF" stroke="#000" stroke-width="9.67" stroke-linejoin="bevel"/>
                                    </svg>
								</a>
							</li>
				
							<li>
								<a target="_blank" href="https://www.instagram.com/alessandro_ferrix/?hl=it" class="social-item instagram">
                                    <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve"> <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/> <path id="XMLID_81_" fill="#FFFFFF" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/> <circle id="XMLID_83_" fill="#FFFFFF" cx="418.306" cy="134.072" r="34.149"/> </svg>
                                </a>
							</li>
				
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>

			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
                    <img class="main" src=".\assets\img-anime-italia\anz.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\anz.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Luca Gargiulo(aka Anz)</a>
				
						<div class="teammembers-item-prof">OWNER / DEVELOPER</div>
				
						<ul class="socials socials--round">
                            
                            <li>
								<a target="_blank" href="https://t.me/TuringStudio" class="social-item twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                    <path d="M66.964 134.874s-32.08-10.062-51.344-16.002c-17.542-6.693-1.57-14.928 6.015-17.59 7.585-2.66 186.38-71.948 194.94-75.233 8.94-4.147 19.884-.35 14.767 18.656-4.416 20.407-30.166 142.874-33.827 158.812-3.66 15.937-18.447 6.844-18.447 6.844l-83.21-61.442z" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M92.412 201.62s4.295.56 8.83-3.702c4.536-4.26 26.303-25.603 26.303-25.603" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M66.985 134.887l28.922 14.082-3.488 52.65s-4.928.843-6.25-3.613c-1.323-4.455-19.185-63.12-19.185-63.12z" fill="#FFFFFF" stroke="#000" stroke-width="10" stroke-linejoin="bevel"/>
                                    <path d="M66.985 134.887s127.637-77.45 120.09-71.138c-7.55 6.312-91.168 85.22-91.168 85.22z" fill="#FFFFFF" stroke="#000" stroke-width="9.67" stroke-linejoin="bevel"/>
                                    </svg>
								</a>
							</li>

						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>

			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
                        <img class="main" src=".\assets\img-anime-italia\gaspa.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\gaspa.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Filippo Gasparini(aka Philipxander)</a>
				
						<div class="teammembers-item-prof">OWNER</div>
				
						<ul class="socials socials--round">

							<li>
								<a target="_blank" href="https://t.me/ruhk97" class="social-item twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                    <path d="M66.964 134.874s-32.08-10.062-51.344-16.002c-17.542-6.693-1.57-14.928 6.015-17.59 7.585-2.66 186.38-71.948 194.94-75.233 8.94-4.147 19.884-.35 14.767 18.656-4.416 20.407-30.166 142.874-33.827 158.812-3.66 15.937-18.447 6.844-18.447 6.844l-83.21-61.442z" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M92.412 201.62s4.295.56 8.83-3.702c4.536-4.26 26.303-25.603 26.303-25.603" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M66.985 134.887l28.922 14.082-3.488 52.65s-4.928.843-6.25-3.613c-1.323-4.455-19.185-63.12-19.185-63.12z" fill="#FFFFFF" stroke="#000" stroke-width="10" stroke-linejoin="bevel"/>
                                    <path d="M66.985 134.887s127.637-77.45 120.09-71.138c-7.55 6.312-91.168 85.22-91.168 85.22z" fill="#FFFFFF" stroke="#000" stroke-width="9.67" stroke-linejoin="bevel"/>
                                    </svg>
								</a>
							</li>
				
							<li>
								<a target="_blank" href="https://www.instagram.com/gaspa97/?hl=it" class="social-item instagram">
                                    <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve"> <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/> <path id="XMLID_81_" fill="#FFFFFF" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/> <circle id="XMLID_83_" fill="#FFFFFF" cx="418.306" cy="134.072" r="34.149"/> </svg>
                                </a>
							</li>

						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
                        <img class="main" src=".\assets\img-anime-italia\angelo.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\angelo.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Angelo Schifano(aka Soul)</a>
				
						<div class="teammembers-item-prof">OWNER</div>
				
						<ul class="socials socials--round">

							<li>
								<a target="_blank" href="https://t.me/angeloo_soul" class="social-item twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 240">
                                    <path d="M66.964 134.874s-32.08-10.062-51.344-16.002c-17.542-6.693-1.57-14.928 6.015-17.59 7.585-2.66 186.38-71.948 194.94-75.233 8.94-4.147 19.884-.35 14.767 18.656-4.416 20.407-30.166 142.874-33.827 158.812-3.66 15.937-18.447 6.844-18.447 6.844l-83.21-61.442z" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M92.412 201.62s4.295.56 8.83-3.702c4.536-4.26 26.303-25.603 26.303-25.603" fill="#FFFFFF" stroke="#000" stroke-width="10"/>
                                    <path d="M66.985 134.887l28.922 14.082-3.488 52.65s-4.928.843-6.25-3.613c-1.323-4.455-19.185-63.12-19.185-63.12z" fill="#FFFFFF" stroke="#000" stroke-width="10" stroke-linejoin="bevel"/>
                                    <path d="M66.985 134.887s127.637-77.45 120.09-71.138c-7.55 6.312-91.168 85.22-91.168 85.22z" fill="#FFFFFF" stroke="#000" stroke-width="9.67" stroke-linejoin="bevel"/>
                                    </svg>
								</a>
							</li>
				
							<li>
								<a target="_blank" href="https://www.instagram.com/zvelyon/?hl=it" class="social-item instagram">
                                    <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve"> <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/> <path id="XMLID_81_" fill="#FFFFFF" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/> <circle id="XMLID_83_" fill="#FFFFFF" cx="418.306" cy="134.072" r="34.149"/> </svg>
                                </a>
							</li>
                            
						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
			<div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

				
				<!-- Teammember Item  -->
				
				<div class="crumina-module crumina-teammembers-item">
				
					<div class="teammembers-thumb">
                        <img class="main" src=".\assets\img-anime-italia\jose.jpeg" alt="team member">
						<img class="hover" src=".\assets\img-anime-italia\jose.jpeg" alt="team member">
					</div>
				
					<div class="teammember-content">
				
						<a href="#" class="h5 teammembers-item-name">Jose Avellaneda(aka GAL1L3O)</a>
				
						<div class="teammembers-item-prof">FRONT END DEVELOPER</div>
				
						<ul class="socials socials--round">
                        
							<li>
								<a target="_blank" href="https://www.instagram.com/jose_avellaneda10/?hl=it" class="social-item instagram">
                                    <svg class="instagram-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve"> <path class="logo" id="XMLID_17_" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722 c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156 C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156 c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722 c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/> <path id="XMLID_81_" fill="#FFFFFF" d="M275.517,133C196.933,133,133,196.933,133,275.516 s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6 c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083 C362.6,323.611,323.611,362.6,275.517,362.6z"/> <circle id="XMLID_83_" fill="#FFFFFF" cx="418.306" cy="134.072" r="34.149"/> </svg>
                                </a>
							</li>

						</ul>
					</div>
				</div>
				
				<!-- ... end Teammember Item  -->

			</div>
		</div>

	</div>
</section>



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
<!-- ... end Footer Full Width -->


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

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="assets/img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<a class="back-to-top" href="#">
	<img src="assets/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>

<!-- INIZIO AMBIENTE COMUNE -->
<?php PrintScriptsTemplate(); ?>
<script src="assets/js/svg-loader.js"></script>

</body>
</html>