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

	<div class="main-header main-header-fullwidth main-header-has-header-standard stunning-header bg-primary-opacity">

	
		<!-- Header Standard Landing  -->
		
		<div class="header--standard header--standard-landing" id="header--standard" style="z-index: 300;">
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

	<div class="stunning-header-content" style="margin-bottom: 4rem;">
		<h1 class="stunning-header-title" style="font-size: 5rem; font-weight: 300; ">Legacy News</h1>
	</div>
  <!--
	<div class="contenitore" style="margin-top: 6rem;">
		<div class="panel" style="background-image: url(https://images.unsplash.com/photo-1593642633279-1796119d5482?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80)">
			<h3>Explore he world</h3>
		</div>
		<div class="panel " style="background-image: url(https://images.unsplash.com/photo-1608652763693-376f0ce46283?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80)">
			<h3>Explore he world</h3>
		</div>
		<div class="panel " style="background-image: url(https://images.unsplash.com/photo-1608638317448-3b56d09560f5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80)">
			<h3>Sunny beach</h3>
		</div>
		<div class="panel " style="background-image: url(https://images.unsplash.com/photo-1608623643122-ba620a693c3b?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80)">
			<h3>City on Winter</h3>
		</div>
		<div class="panel " style="background-image: url(https://images.unsplash.com/photo-1608643416250-b2768e7b5115?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80)">
			<h3>Mountains - Clouds</h3>
		</div>
	</div>
  -->

	<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- ... end Stunning header -->

<!--
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block ui-block-1 responsive-flex1200">
				<div class="ui-block-title">
					<ul class="filter-icons">
						<li>
							<a href="#">
								<img loading="lazy" src="img-anime-italia/ANIME.PNG" alt="icon" class="icon-images">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="img-anime-italia/Dragon_Ball_Legacy_Logo.png" alt="icon" class="icon-images">
							</a>
						</li>
						<li>
							<a href="#">
								<img loading="lazy" src="img-anime-italia/naruto.png" alt="icon" class="icon-images">
							</a>
						</li>
					</ul>
					<div class="w-select">
						<div class="title">Filtra per:</div>
						<fieldset class="form-group">
							<select class="selectpicker form-control">
								<option value="NU">Tutte le categorie</option>
								<option value="NU">Kodomo</option>
								<option value="NU">Shōjo</option>
								<option value="NU">Shōnen</option>
								<option value="NU">Seinen</option>
							</select>
						</fieldset>
					</div>

					<div class="w-select">
						<fieldset class="form-group">
							<select class="selectpicker form-control">
								<option value="NU">Più piaciuti</option>
								<option value="NU">Più commentati</option>
								<option value="NU">Più recenti</option>
							</select>
						</fieldset>
					</div>

					<a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2 btn-1">Filtra</a>

					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Cerca qui">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
-->


<section class="blog-post-wrap medium-padding80">
	<div class="container">
		<div class="row">
					
            <?php

              $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
              $db_username = DATABASEUSERNAME;
              $db_password = PASSWORD;

              $DataBase = mysqli_connect($db,$db_username,$db_password);

              Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

              $Query = Mysqli_query($DataBase,"SELECT * FROM Annunci WHERE Stato = 2 ORDER BY IdAnnuncio DESC");

              while($Row = Mysqli_fetch_array($Query))
              {
                ?>
                <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="ui-block">

                   <article class="hentry blog-post">
                    
                    <div class="post-thumb">
                      <img loading="lazy" style="width:100%; height: 100%;" src="
                        <?php
                          echo $Row["Copertina"];
                        ?>
                          ">
                    </div>

                    <div class="post-content">
                      <a href="./leggiNotizia.php?id=<?php echo $Row["IdAnnuncio"];?>" class="post-category bg-blue-light"><?php echo $Row["Tag"]; ?></a>
                      <a href="./leggiNotizia.php?id=<?php echo $Row["IdAnnuncio"];?>" class="h4 post-title"><?php echo $Row["Titolo"]; ?></a>
                      <p>Clicca <a href="./leggiNotizia.php?id=<?php echo $Row["IdAnnuncio"];?>">qui</a> per leggere questa notizia...</p>

                      <div class="author-date">
                        by
                        <a class="h6 post__author-name fn"><?php
                            $User = GetUserProfileById($Row["IdUtente"]);
                            echo $User["NomeUtente"];
                            ?>
                        </a>
                        <div class="post__date">
                          <time class="published">
                            <?php
                            echo $Row["DataPubblicazione"];
                            ?>
                          </time>
                        </div>
                      </div>

                    </div>

                  </article>
                  <!-- ... end Post -->
                </div>
              </div>
                <?php
              }

            ?>

		</div>
	</div>

	
	<!-- Pagination -->
	<!--
	<nav aria-label="Page navigation">
		<ul class="pagination justify-content-center">
			<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1">Previous</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item"><a class="page-link" href="#">...</a></li>
			<li class="page-item"><a class="page-link" href="#">12</a></li>
			<li class="page-item">
				<a class="page-link" href="#">Next</a>
			</li>
		</ul>
	</nav>
  -->
	
	<!-- ... end Pagination -->

</section>


<!-- Section Call To Action Animation -->



<div class="modal fade" id="restore-password" tabindex="-1" role="dialog" aria-labelledby="restore-password" aria-hidden="true">
	<div class="modal-dialog window-popup restore-password-popup" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="#olymp-close-icon"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Restore your Password</h6>
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
							<div class="title h6">Register to Olympus</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">First Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Last Name</label>
											<input class="form-control" placeholder="" type="text">
										</div>
									</div>
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="form-group date-time-picker label-floating">
											<label class="control-label">Your Birthday</label>
											<input name="datetimepicker" value="10/24/1984" />
											<span class="input-group-addon">
											<svg class="olymp-calendar-icon"><use xlink:href="#olymp-calendar-icon"></use></svg>
										</span>
										</div>

										<div class="form-group label-floating is-select">
											<label class="control-label">Your Gender</label>
											<select class="selectpicker form-control">
												<option value="MA">Male</option>
												<option value="FE">Female</option>
											</select>
										</div>

										<div class="remember">
											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													I accept the <a href="#">Terms and Conditions</a> of the website
												</label>
											</div>
										</div>

										<a href="#" class="btn btn-purple btn-lg full-width">Complete Registration!</a>
									</div>
								</div>
							</form>
						</div>

						<div class="tab-pane" id="profile1" role="tabpanel">
							<div class="title h6">Login to your Account</div>
							<form class="content">
								<div class="row">
									<div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="form-group label-floating">
											<label class="control-label">Your Email</label>
											<input class="form-control" placeholder="" type="email">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Your Password</label>
											<input class="form-control" placeholder="" type="password">
										</div>

										<div class="remember">

											<div class="checkbox">
												<label>
													<input name="optionsCheckboxes" type="checkbox">
													Remember Me
												</label>
											</div>
											<a href="#" class="forgot" data-toggle="modal" data-target="#restore-password">Forgot my Password</a>
										</div>

										<a href="#" class="btn btn-lg btn-primary full-width">Login</a>

										<div class="or"></div>

										<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>

										<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


										<p>Don’t you have an account?
											<a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!
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