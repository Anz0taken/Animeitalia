<!DOCTYPE html>
<?php include 'vardefine.php'; include 'PrintFunctions.php'; ?>
<html lang="it">

  <head>

    <!-- ======= Head ======= -->
    <?php PrintHead(); ?>
    
  </head>

  <body>

    <!-- ======= Header ======= -->
    <?php PrintHeader($MainColor_R,$MainColor_G,$MainColor_B,$SecondaryColor_R,$SecondaryColor_G,$SecondaryColor_B); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 100%; background:linear-gradient(45deg, rgb(<?php echo "$MainColor_R $MainColor_G $MainColor_B"; ?> / 80%) 0%, rgb(<?php echo "$SecondaryColor_R $SecondaryColor_G $SecondaryColor_B"; ?>) 100%);">
    </section>
    <main id="main">
      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Titolo</h2>
            <p>Sottotitolo</p>
            </div>
        </div>
            
      </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php PrintFooter($MainColor_R,$MainColor_G,$MainColor_B,$SecondaryColor_R,$SecondaryColor_G,$SecondaryColor_B); ?>

    <!-- ======= Preloader ======= -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
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

  </body>

</html>