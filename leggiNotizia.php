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
<!-- ... end Header Standard Landing  -->
<div class="header-spacer--standard"></div>

<div class="stunning-header-content">
    <h1 class="stunning-header-title">Legacy news</h1>
    <ul class="breadcrumbs">
        <li class="breadcrumbs-item">
            <a href="#">Sezione notizia</a>
            <span class="icon breadcrumbs-custom">/</span>
        </li>
    </ul>
</div>

<div class="content-bg-wrap stunning-header-bg1"></div>
</div>

<!-- End Stunning header -->


<div class="container">
<div class="row mt50">

    <div class="col col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <?php 
            if(isset($_GET["id"]))
            {
                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                $db_username = DATABASEUSERNAME;
                $db_password = PASSWORD;
                
                $DataBase = mysqli_connect($db,$db_username,$db_password);
                
                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

                $IdAnnuncio = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
                
                $Query = Mysqli_query($DataBase,"SELECT * FROM Annunci WHERE IdAnnuncio = $IdAnnuncio");
        
                if($Annuncio = Mysqli_fetch_array($Query))
                {
        ?>
                    <div class="ui-block mb60">
                        
                        <article class="hentry blog-post single-post single-post-v3">
                        
                            <a href="#" class="post-category bg-primary"><?php echo $Annuncio["Tag"]; ?></a>
                        
                            <h1 class="post-title"><?php echo $Annuncio["Titolo"]; ?></h1>
                        
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn">
                                <?php
                                $User = GetUserProfileById($Annuncio["IdUtente"]);
                                echo "&nbsp;".$User["NomeUtente"];
                                ?>
                                </a>
                                <div class="post__date">
                                    <time class="published">
                                        <?php
                                        echo "&nbsp;".$Annuncio["DataPubblicazione"];
                                        ?>
                                    </time>
                                </div>
                            </div>
                        
                            <div class="post-thumb">
						        <img loading="lazy" src="
                                    <?php
                                    echo $Annuncio["Copertina"];
                                    ?>
                                ">
                            <br>
                            <br>
                            <div class="post-content-wrap">
                        
                                <div class="post-content">
                                    <?php echo html_entity_decode($Annuncio["Contenuto"]); ?>
                                </div>
                            </div>

                        </article>
                        
                        <!-- ... end Single Post -->

                    </div>
        <?php
                }
            }
        ?>
    </div>

    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <aside class="blog-post-wrap">
            <div class="crumina-module crumina-heading with-title-decoration">
                <h5 class="heading-title">Posts che potrebbero interessarti</h5>
            </div>


            <?php
                $db = NOMESERVER;		//indirizzo server database a cui ci vogliamo connettere
                $db_username = DATABASEUSERNAME;
                $db_password = PASSWORD;

                $DataBase = mysqli_connect($db,$db_username,$db_password);

                Mysqli_select_db($DataBase,NOMEDB);	//database a cui ci vogliamo connettere

                $Query = Mysqli_query($DataBase,"SELECT * FROM Annunci WHERE Stato = 2 ORDER BY IdAnnuncio DESC LIMIT 5");

                while($Row = Mysqli_fetch_array($Query))
                {
            ?>
                <div class="ui-block">

                    <!-- Post -->
                    
                    <article class="hentry blog-post blog-post-v3 featured-post-item">
                    
                        <div class="post-thumb">
                            <img loading="lazy" src="
                        <?php
                          echo $Row["Copertina"];
                        ?>
                          ">
                            <a href="#" class="post-category bg-purple">
                                <?php
                                    echo $Row["Tag"];
                                ?>
                            </a>
                        </div>
                    
                        <div class="post-content">
                    
                            <div class="author-date">
                                by
                                <a class="h6 post__author-name fn"><?php
                                    $User = GetUserProfileById($Row["IdUtente"]);
                                    echo $User["NomeUtente"];
                                    ?>
                                </a>
                                <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                        - 5 MESI FA
                                    </time>
                                </div>
                            </div>
                    
                            <a href="./leggiNotizia.php?id=<?php echo $Row["IdAnnuncio"];?>" class="h4 post-title"><?php echo $Row["Titolo"]; ?></a>
                    
                        </div>
                    
                    </article>
                    
                    <!-- ... end Post -->

                </div>
            <?php
                }
            ?>

        </aside>
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