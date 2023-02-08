<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>TAKALO-SITE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href=<?php echo site_url("assets/img/favicon.png"); ?> rel="icon">
    <link href=<?php echo site_url("assets/img/apple-touch-icon.png"); ?> rel="apple-touch-icon">
    <link href=<?php echo site_url("assets/vendor/aos/aos.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/bootstrap/css/bootstrap.min.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/bootstrap-icons/bootstrap-icons.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/boxicons/css/boxicons.min.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/glightbox/css/glightbox.min.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/remixicon/remixicon.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/vendor/swiper/swiper-bundle.min.css"); ?> rel="stylesheet">
    <link href=<?php echo site_url("assets/css/style.css"); ?> rel="stylesheet">
    <script src=<?php echo site_url("assets/js/chart.js"); ?>></script>
 </head>
<body>
    <?php  $this->load->view('Header');  ?>
 
    
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenue dans Takalo</h1>
      <h2>Nous sommes heureux de vous Recevoir</h2>
    </div>
  </section>

  <main id="main">
      <section id="why-us" class="why-us">
          <div class="container">
            
              <p>Nombre d'utilisateur inscrit :  <?php echo $nombureinscrit['count(*)']; ?>  Personne</p>
            
              <p> Nombre des echange effectue  :  <?php echo $numbureechange['count(*)']; ?> </p>
            </div><!-- End .content-->
          </div>
        </div>
      </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
  <?php  $this->load->view('Footer');  ?>
 <!-- End Footer -->

</body>
</html>
