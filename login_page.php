<!DOCTYPE html>
<?php include 'vardefine.php'; include 'PrintFunctions.php'; ?>
<html lang="it">

  <head>

    <!-- ======= Head ======= -->
    <?php PrintHead(); ?>
    
  </head>

    <div class="container login-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">

        <!-- LoginFomr_1 -->
            <div class="col-md-6 login-form-1">
                <h3 style="color:white;">Entra con social</h3>
                
                <div class="row">

                    <!-- Discord -->
                    <div class="col-xl-6 col-md-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="edited_icon-box edited_iconbox-discord">
                            <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="bx bxl-discord"></i>
                            </div>
                            <h4><a href="">Entra con discord</a></h4>
                            <a target="_blank" href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End discord -->

                    <!-- LoginSoon -->
                    <div class="col-xl-6 col-md-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="edited_icon-box edited_iconbox-green">
                            <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                            </svg>
                            <i class="bx bx-timer"></i>
                            </div>
                            <h4><a href="">A breve altri social!</a></h4>
                        </div>
                    </div><!-- End LoginSoon -->

                </div>
            </div><!-- End LoginFomr_1 -->

            <!-- LoginFomr_2 -->
            <div class="col-md-6 login-form-2">
                <h3>Inserisci le credenziali</h3>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                </form>
            </div><!-- End LoginFomr_2 -->

        </div>
    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</html>
<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    background-image: linear-gradient(to bottom right,  rgb(100,100,100), rgb(24,27,23));
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background:linear-gradient(45deg, rgb(<?php echo "$MainColor_R $MainColor_G $MainColor_B"; ?> / 80%) 0%, rgb(<?php echo "$SecondaryColor_R $SecondaryColor_G $SecondaryColor_B"; ?>) 100%);
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: rgb(<?php echo "$MainColor_R, $MainColor_G, $MainColor_B"?>);
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: rgb(<?php echo "$MainColor_R, $MainColor_G, $MainColor_B"?>);
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: rgb(<?php echo "$MainColor_R, $MainColor_G, $MainColor_B"?>);
    font-weight: 600;
    text-decoration: none;
}

/**
* Template Name: Techie - v2.1.0
* Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
body {
  font-family: "Open Sans", sans-serif;
  color: #444444;
}

a {
  color: #ff1b0a;
}

a:hover {
  color: #ff1a0ac9;
  text-decoration: none;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Poppins", sans-serif;
}

/*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
.back-to-top {
  position: fixed;
  display: none;
  right: 15px;
  bottom: 15px;
  z-index: 99999;
}

.back-to-top i {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 24px;
  width: 40px;
  height: 40px;
  border-radius: 4px;
  background: #f54f00;
  color: #fff;
  transition: all 0.4s;
}

.back-to-top i:hover {
  background: #f94700;
  color: #fff;
}

/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #ff6600d8;
  border-top-color: #e7e4fe;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Disable aos animation delay on mobile devices
--------------------------------------------------------------*/
@media screen and (max-width: 768px) {
  [data-aos-delay] {
    transition-delay: 0 !important;
  }
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  transition: all 0.5s;
  z-index: 997;
  padding: 20px 0;
}

#header.header-scrolled, #header.header-inner-pages {
  background: rgb(216 59 24);
  padding: 12px 0;
}

#header .logo {
  font-size: 32px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 2px;
  text-transform: uppercase;
}

#header .logo a {
  color: #fff;
}

#header .logo img {
  max-height: 75px;
}

@media (max-width: 992px) {
  #header {
    padding: 12px 0;
  }
  #header .logo {
    font-size: 28px;
  }
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/* Desktop Navigation */
.nav-menu ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.nav-menu > ul {
  display: flex;
}

.nav-menu > ul > li {
  position: relative;
  white-space: nowrap;
  padding: 10px 0 10px 24px;
}

.nav-menu a {
  display: block;
  position: relative;
  color: rgba(255, 255, 255, 0.7);
  transition: 0.3s;
  font-size: 15px;
  font-weight: 600;
  padding: 0 3px;
  font-family: "Open Sans", sans-serif;
}

.nav-menu > ul > li > a:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: -5px;
  left: 0;
  background-color: #fff;
  visibility: hidden;
  width: 0px;
  transition: all 0.3s ease-in-out 0s;
}

.nav-menu a:hover:before, .nav-menu li:hover > a:before, .nav-menu .active > a:before {
  visibility: visible;
  width: 100%;
}

.nav-menu a:hover, .nav-menu .active > a, .nav-menu li:hover > a {
  color: #fff;
}

.nav-menu .drop-down ul {
  display: block;
  position: absolute;
  left: 22px;
  top: calc(100% + 30px);
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  padding: 10px 0;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
}

.nav-menu .drop-down:hover > ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.nav-menu .drop-down li {
  min-width: 180px;
  position: relative;
}

.nav-menu .drop-down ul a {
  padding: 10px 20px;
  font-size: 14px;
  text-transform: none;
  color: #2c4964;
}

.nav-menu .drop-down ul a:hover, .nav-menu .drop-down ul .active > a, .nav-menu .drop-down ul li:hover > a {
  color: #5846f9;
}

.nav-menu .drop-down > a:after {
  content: "\ea99";
  font-family: IcoFont;
  padding-left: 5px;
}

.nav-menu .drop-down .drop-down ul {
  top: 0;
  left: calc(100% - 30px);
}

.nav-menu .drop-down .drop-down:hover > ul {
  opacity: 1;
  top: 0;
  left: 100%;
}

.nav-menu .drop-down .drop-down > a {
  padding-right: 35px;
}

.nav-menu .drop-down .drop-down > a:after {
  content: "\eaa0";
  font-family: IcoFont;
  position: absolute;
  right: 15px;
}

@media (max-width: 1366px) {
  .nav-menu .drop-down .drop-down ul {
    left: -90%;
  }
  .nav-menu .drop-down .drop-down:hover > ul {
    left: -100%;
  }
  .nav-menu .drop-down .drop-down > a:after {
    content: "\ea9d";
  }
}

/* Get Startet Button */
.get-started-btn {
  margin-left: 25px;
  color: #fff;
  border-radius: 5px;
  padding: 6px 25px 8px 25px;
  white-space: nowrap;
  transition: 0.3s;
  font-size: 14px;
  font-weight: 600;
  display: inline-block;
  border: 2px solid rgba(255, 255, 255, 0.5);
}

.get-started-btn:hover {
  border-color: #fff;
  color: #fff;
}

@media (max-width: 992px) {
  .get-started-btn {
    margin: 0 48px 0 0;
    padding: 6px 18px;
  }
}

/* Mobile Navigation */
.mobile-nav-toggle {
  position: fixed;
  right: 15px;
  top: 29px;
  z-index: 9998;
  border: 0;
  background: none;
  font-size: 24px;
  transition: all 0.4s;
  outline: none !important;
  line-height: 1;
  cursor: pointer;
  text-align: right;
}

.mobile-nav-toggle i {
  color: #fff;
}

.mobile-nav {
  position: fixed;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  z-index: 9999;
  overflow-y: auto;
  background: #fff;
  transition: ease-in-out 0.2s;
  opacity: 0;
  visibility: hidden;
  border-radius: 10px;
  padding: 10px 0;
}

.mobile-nav * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.mobile-nav a {
  display: block;
  position: relative;
  color: #2c4964;
  padding: 10px 20px;
  font-weight: 500;
  outline: none;
}

.mobile-nav a:hover, .mobile-nav .active > a, .mobile-nav li:hover > a {
  color: #5846f9;
  text-decoration: none;
}

.mobile-nav .drop-down > a:after {
  content: "\ea99";
  font-family: IcoFont;
  padding-left: 10px;
  position: absolute;
  right: 15px;
}

.mobile-nav .active.drop-down > a:after {
  content: "\eaa1";
}

.mobile-nav .drop-down > a {
  padding-right: 35px;
}

.mobile-nav .drop-down ul {
  display: none;
  overflow: hidden;
}

.mobile-nav .drop-down li {
  padding-left: 20px;
}

.mobile-nav-overly {
  width: 100%;
  height: 100%;
  z-index: 9997;
  top: 0;
  left: 0;
  position: fixed;
  background: rgba(28, 47, 65, 0.6);
  overflow: hidden;
  display: none;
  transition: ease-in-out 0.2s;
}

.mobile-nav-active {
  overflow: hidden;
}

.mobile-nav-active .mobile-nav {
  opacity: 1;
  visibility: visible;
}

.mobile-nav-active .mobile-nav-toggle i {
  color: #fff;
}

/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 100vh;
  background: linear-gradient(45deg, rgba(86, 58, 250, 0.9) 0%, rgba(116, 15, 214, 0.9) 100%), url("../img/hero-bg.jpg") center center no-repeat;
  background-size: cover;
}

#hero .container, #hero .container-fluid {
  padding-top: 84px;
}

#hero h1 {
  margin: 0;
  font-size: 52px;
  font-weight: 700;
  line-height: 64px;
  color: #fff;
}

#hero h2 {
  color: rgba(255, 255, 255, 0.8);
  margin: 10px 0 0 0;
  font-size: 20px;
}

#hero .btn-get-started {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 28px;
  border-radius: 5px;
  transition: 0.5s;
  margin-top: 30px;
  color: #fff;
  border: 2px solid #fff;
}

#hero .btn-get-started:hover {
  background: #fff;
  color: #5846f9;
}

#hero .animated {
  animation: up-down 2s ease-in-out infinite alternate-reverse both;
}

@media (min-width: 1200px) {
  #hero {
    background-attachment: fixed;
  }
}

@media (max-width: 991px) {
  #hero {
    text-align: center;
  }
  #hero .container, #hero .container-fluid {
    padding-top: 68px;
  }
  #hero .animated {
    -webkit-animation: none;
    animation: none;
  }
  #hero .hero-img {
    text-align: center;
  }
  #hero .hero-img img {
    width: 50%;
  }
}

@media (max-width: 768px) {
  #hero h1 {
    font-size: 26px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
  }
  #hero .hero-img img {
    width: 60%;
  }
}

@media (max-width: 575px) {
  #hero .hero-img img {
    width: 80%;
  }
}

@-webkit-keyframes up-down {
  0% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(-10px);
  }
}

@keyframes up-down {
  0% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(-10px);
  }
}

/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
  padding: 100px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #f9f8ff;
}

.section-title {
  text-align: center;
  padding-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 20px;
  position: relative;
}

.section-title h2::after {
  content: '';
  position: absolute;
  display: block;
  width: 50px;
  height: 3px;
  background: #ff280c;
  bottom: 0;
  left: calc(50% - 25px);
}

.section-title p {
  margin-bottom: 0;
}

/*--------------------------------------------------------------
# About
--------------------------------------------------------------*/
.about {
  padding: 120px 0;
}

.about .content h3 {
  font-weight: 600;
  font-size: 32px;
  color: #2c4964;
}

.about .content ul {
  list-style: none;
  padding: 0;
}

.about .content ul li {
  padding-bottom: 10px;
}

.about .content ul i {
  font-size: 20px;
  padding-right: 4px;
  color: #5846f9;
}

.about .content p:last-child {
  margin-bottom: 0;
}

.about .content .read-more {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 50px 10px 28px;
  border-radius: 5px;
  transition: 0.5s;
  color: #fff;
  background: linear-gradient(45deg, #5846f9 0%, #7b27d8 100%);
  position: relative;
}

.about .content .read-more:hover {
  background: linear-gradient(180deg, #5846f9 0%, #7b27d8 100%);
}

.about .content .read-more i {
  font-size: 22px;
  position: absolute;
  right: 20px;
  top: 12px;
}

/*--------------------------------------------------------------
# Counts
--------------------------------------------------------------*/
.counts {
  background: linear-gradient(90deg, rgba(88, 70, 249, 0.5) 0%, rgba(123, 39, 216, 0.5) 100%), url("../img/counts-bg.png") center center no-repeat;
  padding: 80px 0 60px 0;
}

.counts .counters span {
  font-size: 48px;
  display: block;
  color: #fff;
  font-weight: 600;
  font-family: "Poppins", sans-serif;
}

.counts .counters p {
  padding: 0;
  margin: 0 0 20px 0;
  font-size: 15px;
  color: rgba(255, 255, 255, 0.8);
}

/*--------------------------------------------------------------
# Services
--------------------------------------------------------------*/
.edited_icon-box {
  text-align: center;
  padding: 70px 20px 80px 20px;
  transition: all ease-in-out 0.3s;
  background: #fff;
}

.icon {
  margin: 0 auto;
  width: 100px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: ease-in-out 0.3s;
  position: relative;
}

.icon i {
  font-size: 36px;
  transition: 0.5s;
  position: relative;
}

.icon svg {
  position: absolute;
  top: 0;
  left: 0;
}

.icon svg path {
  transition: 0.5s;
  fill: #f5f5f5;
}

.edited_icon-box h4 {
  font-weight: 600;
  margin: 10px 0 15px 0;
  font-size: 22px;
}

.edited_icon-box h4 a {
  color: #2c4964;
  transition: ease-in-out 0.3s;
}

.edited_icon-box p {
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.edited_icon-box:hover {
  border-color: #fff;
  box-shadow: 0px 0 25px 0 rgba(0, 0, 0, 0.1);
}

.edited_iconbox-discord i {
  color: #064270;
}

.edited_iconbox-discord:hover .icon path {
  color: #064270;
}

.edited_iconbox-discord:hover .icon i {
  color: #fff;
}

.edited_iconbox-discord:hover .icon path {
  fill: #064270;
}

.edited_iconbox-orange i {
  color: #ffa76e;
}

.edited_iconbox-orange:hover .icon i {
  color: #fff;
}

.edited_iconbox-orange:hover .icon path {
  fill: #ffa76e;
}

.edited_iconbox-telegram i {
  color: rgb(50, 175, 237);
}

.edited_iconbox-telegram:hover .icon i {
  color: #fff;
}

.edited_iconbox-telegram:hover .icon path {
  fill: rgb(50, 175, 237);
}

.edited_iconbox-instagram i {
  color: rgb(221, 45, 144);
}

.edited_iconbox-instagram:hover .icon i {
  color: #fff;
}

.edited_iconbox-instagram:hover .icon path {
  fill: rgb(221, 45, 144);
}

.edited_iconbox-facebook i {
  color: rgb(24, 119, 242);
}

.edited_iconbox-facebook:hover .icon i {
  color: #fff;
}

.edited_iconbox-facebook:hover .icon path {
  fill: rgb(24, 119, 242);
}

.edited_iconbox-yellow i {
  color: #ffbb2c;
}

.edited_iconbox-yellow:hover .icon i {
  color: #fff;
}

.edited_iconbox-yellow:hover .icon path {
  fill: #ffbb2c;
}

.edited_iconbox-green i {
  color: #00ff0d;
}

.edited_iconbox-green:hover .icon i {
  color: #fff;
}

.edited_iconbox-green:hover .icon path {
  fill: #00ff0d;
}

.edited_iconbox-purple i {
  color: #7837ad;
}

.edited_iconbox-purple:hover .icon i {
  color: #fff;
}

.edited_iconbox-purple:hover .icon path {
  fill: #7837ad;
}

.edited_iconbox-red i {
  color: #ff0e0e;
}

.edited_iconbox-red:hover .icon i {
  color: #fff;
}

.edited_iconbox-red:hover .icon path {
  fill: #ff0e0e;
}

.edited_iconbox-teal i {
  color: #11dbcf;
}

.edited_iconbox-teal:hover .icon i {
  color: #fff;
}

.edited_iconbox-teal:hover .icon path {
  fill: #11dbcf;
}

/*--------------------------------------------------------------
# Features
--------------------------------------------------------------*/
.features .icon-box h4 {
  font-size: 20px;
  font-weight: 700;
  margin: 5px 0 10px 60px;
}

.features .icon-box i {
  font-size: 48px;
  float: left;
  color: #ff4800d3;
}

.features .icon-box p {
  font-size: 15px;
  color: #848484;
  margin-left: 60px;
}

.features .image {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 400px;
}

/*--------------------------------------------------------------
# Testimonials
--------------------------------------------------------------*/
.testimonials .testimonial-item {
  box-sizing: content-box;
  min-height: 320px;
}

.testimonials .testimonial-item .testimonial-img {
  width: 90px;
  border-radius: 50%;
  margin: -40px 0 0 40px;
  position: relative;
  z-index: 2;
  border: 6px solid #fff;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.testimonials .testimonial-item h3 {
  font-size: 18px;
  font-weight: bold;
  margin: 10px 0 5px 45px;
  color: #2c4964;
}

.testimonials .testimonial-item h4 {
  font-size: 14px;
  color: #999;
  margin: 0 0 0 45px;
}

.testimonials .testimonial-item .quote-icon-left, .testimonials .testimonial-item .quote-icon-right {
  color: #b1a9fc;
  font-size: 26px;
}

.testimonials .testimonial-item .quote-icon-left {
  display: inline-block;
  left: -5px;
  position: relative;
}

.testimonials .testimonial-item .quote-icon-right {
  display: inline-block;
  right: -5px;
  position: relative;
  top: 10px;
}

.testimonials .testimonial-item p {
  font-style: italic;
  margin: 0 15px 0 15px;
  padding: 20px 20px 60px 20px;
  background: #fff;
  position: relative;
  border-radius: 6px;
  position: relative;
  z-index: 1;
  box-shadow: 0 0px 20px 0 rgba(0, 0, 0, 0.1);
}

.testimonials .owl-nav, .testimonials .owl-dots {
  margin-top: 5px;
  text-align: center;
}

.testimonials .owl-dot {
  display: inline-block;
  margin: 0 5px;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #ddd !important;
}

.testimonials .owl-dot.active {
  background-color: #5846f9 !important;
}

@media (max-width: 767px) {
  .testimonials {
    margin: 30px 10px;
  }
}

/*--------------------------------------------------------------
# Portfolio
--------------------------------------------------------------*/
.portfolio .portfolio-item {
  margin-bottom: 30px;
}

.portfolio #portfolio-flters {
  padding: 0;
  margin: 0 auto 25px auto;
  list-style: none;
  text-align: center;
  border-radius: 50px;
  padding: 2px 15px;
}

.portfolio #portfolio-flters li {
  cursor: pointer;
  display: inline-block;
  padding: 10px 15px;
  font-size: 14px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  color: #444444;
  margin-bottom: 5px;
  transition: all 0.3s ease-in-out;
  border-radius: 5px;
  font-family: "Poppins", sans-serif;
}

.portfolio #portfolio-flters li:hover, .portfolio #portfolio-flters li.filter-active {
  color: #fff;
  background: #5846f9;
}

.portfolio #portfolio-flters li:last-child {
  margin-right: 0;
}

.portfolio .portfolio-wrap {
  transition: 0.3s;
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.portfolio .portfolio-wrap::before {
  content: "";
  background: rgba(88, 70, 249, 0.8);
  position: absolute;
  left: 30px;
  right: 30px;
  top: 30px;
  bottom: 30px;
  transition: all ease-in-out 0.3s;
  z-index: 2;
  opacity: 0;
}

.portfolio .portfolio-wrap .portfolio-info {
  opacity: 0;
  position: absolute;
  top: 10%;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 3;
  transition: all ease-in-out 0.3s;
}

.portfolio .portfolio-wrap .portfolio-info h4 {
  font-size: 20px;
  color: #fff;
  font-weight: 600;
}

.portfolio .portfolio-wrap .portfolio-info p {
  color: #ffffff;
  font-size: 14px;
  text-transform: uppercase;
}

.portfolio .portfolio-wrap .portfolio-links {
  opacity: 0;
  left: 0;
  right: 0;
  bottom: 10%;
  text-align: center;
  z-index: 3;
  position: absolute;
  transition: all ease-in-out 0.3s;
}

.portfolio .portfolio-wrap .portfolio-links a {
  color: rgba(255, 255, 255, 0.6);
  margin: 0 2px;
  font-size: 28px;
  display: inline-block;
  transition: 0.3s;
}

.portfolio .portfolio-wrap .portfolio-links a:hover {
  color: #fff;
}

.portfolio .portfolio-wrap:hover::before {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 1;
}

.portfolio .portfolio-wrap:hover .portfolio-info {
  opacity: 1;
  top: calc(50% - 48px);
}

.portfolio .portfolio-wrap:hover .portfolio-links {
  opacity: 1;
  bottom: calc(50% - 50px);
}

/*--------------------------------------------------------------
# Pricing
--------------------------------------------------------------*/
.pricing .box {
  padding: 20px;
  background: #fff;
  text-align: center;
  border-radius: 5px;
  position: relative;
  overflow: hidden;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.pricing h3 {
  font-weight: 400;
  margin: -20px -20px 20px -20px;
  padding: 20px 15px;
  font-size: 16px;
  font-weight: 600;
  color: #2c4964;
  background: #f8f8f8;
}

.pricing h4 {
  font-size: 36px;
  color: #5846f9;
  font-weight: 600;
  font-family: "Roboto", sans-serif;
  margin-bottom: 20px;
}

.pricing h4 sup {
  font-size: 20px;
  top: -15px;
  left: -3px;
}

.pricing h4 span {
  color: #bababa;
  font-size: 16px;
  font-weight: 300;
}

.pricing ul {
  padding: 0;
  list-style: none;
  color: #444444;
  text-align: center;
  line-height: 20px;
  font-size: 14px;
}

.pricing ul li {
  padding-bottom: 16px;
}

.pricing ul i {
  color: #5846f9;
  font-size: 18px;
  padding-right: 4px;
}

.pricing ul .na {
  color: #ccc;
  text-decoration: line-through;
}

.pricing .btn-wrap {
  margin: 20px -20px -20px -20px;
  padding: 20px 15px;
  background: #f8f8f8;
  text-align: center;
}

.pricing .btn-buy {
  background: linear-gradient(42deg, #5846f9 0%, #7b27d8 100%);
  display: inline-block;
  padding: 10px 35px;
  border-radius: 4px;
  color: #fff;
  transition: none;
  font-size: 15px;
  font-weight: 400;
  font-family: "Roboto", sans-serif;
  font-weight: 600;
  transition: 0.3s;
}

.pricing .btn-buy:hover {
  background: linear-gradient(180deg, #5846f9 0%, #7b27d8 100%);
}

.pricing .featured h3 {
  color: #fff;
  background: #5846f9;
}

.pricing .advanced {
  width: 200px;
  position: absolute;
  top: 18px;
  right: -68px;
  transform: rotate(45deg);
  z-index: 1;
  font-size: 14px;
  padding: 1px 0 3px 0;
  background: #5846f9;
  color: #fff;
}

/*--------------------------------------------------------------
# Frequently Asked Questions
--------------------------------------------------------------*/
.faq {
  background: linear-gradient(42deg, #5846f9 0%, #7b27d8 100%);
}

.faq .section-title h2, .faq .section-title p {
  color: #fff;
}

.faq .section-title h2::after {
  background: rgba(255, 255, 255, 0.6);
}

.faq .faq-list {
  padding: 0 100px;
}

.faq .faq-list ul {
  padding: 0;
  list-style: none;
}

.faq .faq-list li + li {
  margin-top: 15px;
}

.faq .faq-list li {
  padding: 30px;
  background: #fff;
  border-radius: 5px;
  position: relative;
}

.faq .faq-list a {
  display: block;
  position: relative;
  font-family: "Roboto", sans-serif;
  font-size: 16px;
  line-height: 24px;
  font-weight: 500;
  padding: 0 30px;
  outline: none;
}

.faq .faq-list .icon-help {
  font-size: 24px;
  position: absolute;
  right: 0;
  left: 20px;
  color: #8577fb;
}

.faq .faq-list .icon-show, .faq .faq-list .icon-close {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 0;
}

.faq .faq-list p {
  margin-bottom: 0;
  padding: 10px 0 0 0;
}

.faq .faq-list .icon-show {
  display: none;
}

.faq .faq-list a.collapsed {
  color: #2c4964;
}

.faq .faq-list a.collapsed:hover {
  color: #5846f9;
}

.faq .faq-list a.collapsed .icon-show {
  display: inline-block;
}

.faq .faq-list a.collapsed .icon-close {
  display: none;
}

@media (max-width: 1200px) {
  .faq .faq-list {
    padding: 0;
  }
}

/*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
.contact .info-box {
  color: #444444;
  text-align: center;
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 20px 0 30px 0;
  background: #fff;
}

.contact .info-box i {
  font-size: 32px;
  color: #5846f9;
  border-radius: 50%;
  padding: 8px;
}

.contact .info-box h3 {
  font-size: 20px;
  color: #2c4964;
  font-weight: 700;
  margin: 10px 0;
}

.contact .info-box p {
  padding: 0;
  line-height: 24px;
  font-size: 14px;
  margin-bottom: 0;
}

.contact .php-email-form {
  box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
  padding: 30px;
  background: #fff;
}

.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 5px;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input:focus, .contact .php-email-form textarea:focus {
  border-color: #5846f9;
}

.contact .php-email-form input {
  padding: 20px 15px;
}

.contact .php-email-form textarea {
  padding: 12px 15px;
}

.contact .php-email-form button[type="submit"] {
  background: #f53900;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
  border-radius: 5px;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #f51000;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Breadcrumbs
--------------------------------------------------------------*/
.breadcrumbs {
  padding: 15px 0;
  background: #f2f6f9;
  min-height: 40px;
  margin-top: 68px;
}

.breadcrumbs h2 {
  font-size: 28px;
  font-weight: 300;
}

.breadcrumbs ol {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  font-size: 14px;
  margin: 0;
}

.breadcrumbs ol li + li {
  padding-left: 10px;
}

.breadcrumbs ol li + li::before {
  display: inline-block;
  padding-right: 10px;
  color: #3c6387;
  content: "/";
}

@media (max-width: 768px) {
  .breadcrumbs .d-flex {
    display: block !important;
  }
  .breadcrumbs ol {
    display: block;
  }
  .breadcrumbs ol li {
    display: inline-block;
  }
}

/*--------------------------------------------------------------
# Portfolio Details
--------------------------------------------------------------*/
.portfolio-details {
  padding: 30px 0 60px 0;
}

.portfolio-details .portfolio-details-container {
  position: relative;
}

.portfolio-details .portfolio-details-carousel {
  position: relative;
  z-index: 1;
}

.portfolio-details .portfolio-details-carousel .owl-nav, .portfolio-details .portfolio-details-carousel .owl-dots {
  margin-top: 5px;
  text-align: left;
}

.portfolio-details .portfolio-details-carousel .owl-dot {
  display: inline-block;
  margin: 0 10px 0 0;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #ddd !important;
}

.portfolio-details .portfolio-details-carousel .owl-dot.active {
  background-color: #5846f9 !important;
}

.portfolio-details .portfolio-info {
  padding: 30px;
  position: absolute;
  right: 0;
  bottom: -70px;
  background: #fff;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  z-index: 2;
}

.portfolio-details .portfolio-info h3 {
  font-size: 22px;
  font-weight: 700;
  margin-bottom: 20px;
  padding-bottom: 20px;
  border-bottom: 1px solid #eee;
}

.portfolio-details .portfolio-info ul {
  list-style: none;
  padding: 0;
  font-size: 15px;
}

.portfolio-details .portfolio-info ul li + li {
  margin-top: 10px;
}

.portfolio-details .portfolio-description {
  padding-top: 50px;
}

.portfolio-details .portfolio-description h2 {
  width: 50%;
  font-size: 26px;
  font-weight: 700;
  margin-bottom: 20px;
}

.portfolio-details .portfolio-description p {
  padding: 0 0 0 0;
}

@media (max-width: 768px) {
  .portfolio-details .portfolio-info {
    position: static;
    margin-top: 30px;
  }
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  color: #fff;
  font-size: 14px;
  background: linear-gradient(45deg, rgba(86, 58, 250, 0.9) 0%, rgba(116, 15, 214, 0.9) 100%), url("../img/hero-bg.jpg") center center no-repeat;
  background-size: cover;
}

#footer .footer-top {
  padding: 60px 0 30px 0;
  position: relative;
}

#footer .footer-top .footer-contact {
  margin-bottom: 30px;
}

#footer .footer-top .footer-contact h3 {
  font-size: 28px;
  margin: 0 0 30px 0;
  padding: 2px 0 2px 0;
  line-height: 1;
  font-weight: 500;
  text-transform: uppercase;
}

#footer .footer-top .footer-contact p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 0;
  font-family: "Poppins", sans-serif;
}

#footer .footer-top h4 {
  font-size: 16px;
  font-weight: bold;
  position: relative;
  padding-bottom: 12px;
}

#footer .footer-top .footer-links {
  margin-bottom: 30px;
}

#footer .footer-top .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

#footer .footer-top .footer-links ul i {
  padding-right: 2px;
  color: #fff;
  font-size: 18px;
  line-height: 1;
}

#footer .footer-top .footer-links ul li {
  padding: 10px 0;
  display: flex;
  align-items: center;
}

#footer .footer-top .footer-links ul li:first-child {
  padding-top: 0;
}

#footer .footer-top .footer-links ul a {
  color: rgba(255, 255, 255, 0.8);
  transition: 0.3s;
  display: inline-block;
  line-height: 1;
}

#footer .footer-top .footer-links ul a:hover {
  text-decoration: underline;
  color: #fff;
}

#footer .footer-newsletter {
  font-size: 15px;
}

#footer .footer-newsletter h4 {
  font-size: 16px;
  font-weight: bold;
  position: relative;
  padding-bottom: 12px;
}

#footer .footer-newsletter form {
  margin-top: 30px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 5px;
  text-align: left;
  border: 1px solid white;
}

#footer .footer-newsletter form input[type="email"] {
  border: 0;
  padding: 4px 8px;
  width: calc(100% - 100px);
}

#footer .footer-newsletter form input[type="submit"] {
  position: absolute;
  top: -1px;
  right: -2px;
  bottom: -1px;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #f53900;;
  color: #fff;
  transition: 0.3s;
  border-radius: 0 5px 5px 0;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

#footer .footer-newsletter form input[type="submit"]:hover {
  background: #f51d00;
}

#footer .copyright-wrap {
  border-top: 1px solid #fb9677;
}

#footer .credits {
  padding-top: 5px;
  font-size: 13px;
  color: #fff;
}

#footer .credits a {
  color: #fff;
}

#footer .social-links a {
  font-size: 18px;
  display: inline-block;
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
}

#footer .social-links a:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
  text-decoration: none;
}

</style>