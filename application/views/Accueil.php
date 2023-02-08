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

  <!-- Template Main CSS File -->
  <link href=<?php echo site_url("assets/css/style.css"); ?> rel="stylesheet">

</head>
<style>
    .label{
        color: white;
        margin-left : 50px;
    }
</style>

<body>


  <?php  $this->load->view('Header');  ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1>Bienvenue dans Takalo</h1>
      <h2>Nous sommes heureux de vous Recevoir</h2>
      <form action="<?php echo site_url('Accueil/search'); ?>" method="post">
            <label class="label">Mot-cle: </label><input type="text" name="search">
            <label class="label">Categorie: </label>
            <select name="categorie">
              <?php foreach ($category as $key) {?>
                <option value="<?php echo $key['idcategory']; ?>"> <?php echo $key['nomcategory']; ?></option>
              <?php } ?>  
            </select>
            <input type="submit" value="Rechercher" style="margin-left:30px">
      </form>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="100">
            <img src=<?php echo site_url("assets/img/clients/client-1.png"); ?> class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="200">
            <img src=<?php echo site_url("assets/img/clients/client-2.png"); ?> class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="300">
            <img src=<?php echo site_url("assets/img/clients/client-3.png"); ?> class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="400">
            <img src=<?php echo site_url("assets/img/clients/client-4.png"); ?> class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="500">
            <img src=<?php echo site_url("assets/img/clients/client-5.png"); ?> class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center" data-aos="zoom-in" data-aos-delay="600">
            <img src=<?php echo site_url("assets/img/clients/client-6.png"); ?> class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section>
    
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-left">
          <h2>Takalo</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>

              <?php foreach ($category as $key) {?>
                <li data-filter=".filter-<?php echo $key['idcategory']; ?>"><?php echo $key['nomcategory']; ?></li>
              <?php } ?>  
            
            </ul>
          </div>
        </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                
        <?php if (isset($objects)) {
          foreach ($objects as $object) { ?>        
            <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $object['idcategory']; ?> ">
              <div class="portfolio-wrap" style="height: 300px;">
              <?php foreach ($images as $image) {
                if ($image['idobject'] == $object['idobject']) { ?>   
                  <img  src=<?php echo site_url("assets/img/takalo/" . $image['image']); ?> class="img-fluid" alt="">
                <?php }
              } ?>   
                <div class="portfolio-info">
                  <h4><?php echo $object['name']; ?></h4>
                  <p><?php echo $object['name']; ?></p>
                  <div class="portfolio-links">
                    <a href=<?php echo site_url("Accueil/detail/" . $object['idobject']); ?> title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        } else if (isset($search)) {

          foreach ($search as $object) { ?>        
                <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $object[0]['idcategory']; ?> ">
                    <div class="portfolio-wrap" style="height: 300px;">
                          <?php foreach ($images as $image) {
                            if ($image['idobject'] == $object[0]['idobject']) { ?>   
                          <img  src=<?php echo site_url("assets/img/takalo/" . $image['image']); ?> class="img-fluid" alt="">
                      <?php }
                          } ?>   
                    <div class="portfolio-info">
                    <h4><?php echo $object[0]['name']; ?></h4>
                    <p><?php echo $object[0]['name']; ?></p>
                    <div class="portfolio-links">
                    <a href=<?php echo site_url("Accueil/detail/" . $object[0]['idobject']); ?> title="More Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        } ?> 
      </div>

      </div>
    </section>
  <!-- ======= Footer ======= -->
  <?php  $this->load->view('Footer');  ?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src=<?php echo site_url("assets/vendor/purecounter/purecounter_vanilla.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/aos/aos.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/glightbox/js/glightbox.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/isotope-layout/isotope.pkgd.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/swiper/swiper-bundle.min.js"); ?>></script>
  <script src=<?php echo site_url("assets/vendor/php-email-form/validate.js"); ?>></script>

  <!-- Template Main JS File -->
  <script src=<?php echo site_url("assets/js/main.js"); ?>></script>

</body>

</html>