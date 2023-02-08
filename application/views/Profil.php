<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TAKALO-SITE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=<?php echo site_url("assets/img/favicon.png"); ?> rel="icon">
  <link href=<?php echo site_url("assets/img/apple-touch-icon.png"); ?> rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Vendor CSS Files -->
  <link href=<?php echo site_url("assets/vendor/aos/aos.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/bootstrap-icons/bootstrap-icons.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/boxicons/css/boxicons.min.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/glightbox/css/glightbox.min.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/remixicon/remixicon.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/vendor/swiper/swiper-bundle.min.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/fonts/fontawesome-all.min.css"); ?> rel="stylesheet">
  <link href=<?php echo site_url("assets/fonts/font-awesome.min.css"); ?> rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href=<?php echo site_url("assets/css/style.css"); ?> rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.10.0
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->

  <?php  $this->load->view('Header');  ?>

  <!-- ======================= -->

    
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-right">
            
            <div class="content">
            <center>  <i class="far fa-user-circle" style="font-size: 100px;color:white;"></i></center>
            <div>
               
                <p style="color: white;margin-top: 5%;" ><?php echo $info['nom']."  ".$info['prenom']; ?></p>
            </div>
             <br> <br> <div class="text-center">
                <a href=<?php echo site_url("index.php/profil/ajout/AjoutObjet"); ?> class="more-btn">Ajouter un Objet<i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>

          <?php $this->load->view($prod); ?>
        </div>

      </div>
    </section><!-- End Why Us Section -->


  <!-- ======= Footer ======= -->

  <?php  $this->load->view('Footer');  ?>

  <!-- ======================= -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src=<?php echo site_url("assets/vendor/purecounter/purecounter_vanilla.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/aos/aos.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/glightbox/js/glightbox.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/isotope-layout/isotope.pkgd.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/swiper/swiper-bundle.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/php-email-form/validate.js"); ?>></script>
  <script src=<?php echo site_url("assets/bootstrap/js/bootstrap.min.js"); ?>></script>

  <!-- Template Main JS File -->
  <script src=<?php echo site_url("assets/js/main.js"); ?>></script>

</body>

</html>