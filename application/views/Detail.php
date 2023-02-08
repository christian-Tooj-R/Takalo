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
    <script src=<?php echo site_url("assets/js/fonction.js"); ?> type="text/javascript" ></script>
 </head>

<body>

  <!-- ======= Header ======= -->

  <?php  $this->load->view('Header');  ?>

  <!-- ======================= -->

  <main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Details</h2>
      <ol>
        <li><a href="<?php echo site_url('Accueil/index'); ?>">Home</a></li>
        <li>Details</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">
          <?php foreach ($images as $image) {?>
            <div class="swiper-slide" style="height: 400px;">

              <img src=<?php echo site_url("assets/img/takalo/" . $image['image']); ?> alt="">
            </div>
          <?php } ?>
            
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Objet information</h3>
          <ul>
          <form  id=myform>
            <input type="hidden" value="<?php echo $object['idobject'];  ?>" name="idob">
          <?php foreach ($category as $key) {
            if ($key['idcategory'] == $object['idcategory']) { ?>  
              <li><strong>Category</strong>: <input name="categorie" type="hidden" value="<?php echo $key['idcategory']; ?>"><p class="cat"><?php echo $key['nomcategory']; ?></p> </li>
          <?php }
          }?>
            <li><strong>Proprietaire</strong>: <input class="input" type="hidden" value="<?php echo $info['nom']."  ".$info['prenom']; ?>"> <p class="cat"> <?php echo $info['nom']."  ".$info['prenom']; ?></p></li>
            <li><strong>Contact</strong>: <input name="contact" type="hidden" value="<?php echo $info['contact']; ?>"> <p class="cat" > <?php echo $info['contact']; ?></p></li>
            <?php ?>
            <li>
              <?php if(strcmp($acceptation,"Modifier")==0 ) { ?>
               <button id="bouton" class="btn btn-primary" onclick="modif()" type="button">Modifier</button>
                <a style="margin-left: 25%; color: red;" class="btn btn-primary" href="<?php echo site_url("Accueil/supprimer/".$object['idobject']); ?>">Supprimer</a>
              <?php } else { ?>
                <a style="" class="btn btn-primary" href="<?php echo site_url("Accueil/".$acceptation."/".$info['iduser']."/".$object['idobject']); ?>" ><?php echo $acceptation; ?></a>
              <?php } ?>
            </li>      
            </form>
          </ul>
        </div>
        <div class="portfolio-description">
        <strong>Nom</strong>: <input name="nomobj" type="hidden" value="<?php echo $object['name'];  ?>" placeholder="Nom du produit">
         <p class="cat" style="font-size: 30px"><?php echo $object['name'];  ?></p><br>
        <strong>Description</strong>: <input name="description" type="hidden" value="<?php echo $object['description'];  ?>" placeholder="Description">
          
          <p  class="cat">
           <?php echo $object['prixestime'];  ?>
          </p><br>

          <strong>Prix estime</strong>: <input name="prixestime" type="hidden" value="<?php echo $object['prixestime'];  ?>" placeholder="Description">
          
          <p  class="cat">
           <?php echo $object['description'];  ?>
          </p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Details Section -->

<?php if(strcmp($acceptation,"Modifier")==0 ) {?>
    <main id="main">
      <section id="why-us" class="why-us">
          <div class="container">

            <div class="row">
              
              <div style="margin-left:5% ;" class="col-lg-11 d-flex align-items-stretch">
                <div class="icon-boxes d-flex flex-column justify-content-center">
                  <div class="row">
                    <?php foreach ($objectsdemande as $key) { ?>
                      <div class="col-xl-4 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box mt-4 mt-xl-0">
                              
                              <?php foreach ($imagesdemande as $image) {
                                if ($image['idobject'] == $key['idtakalo']) { ?> 
                                  <div class="portfolio-wrap" style="height:auto;">  
                                    <img style="width: 100%; " src=<?php echo site_url("assets/img/takalo/" . $image['image']); ?> alt="">   
                                  </div>
                              <?php break; }
                              }?>
                              <h4><?php echo $key['name'] ?></h4>
                              <p>
                                <a class="btn btn-primary" href="<?php echo site_url("Accueil/accepte/".$object['idobject']."/".$key['idobject'] ); ?>" ><?php echo "Accepter" ?></a>
                                <a style="margin-top: 4%; color: red;" class="btn btn-primary" href="<?php echo site_url("Accueil/annulerdemande/".$object['idobject']."/".$key['idtakalo']); ?>">Annuler</a>
             
                              </p>
                               
                            </div>
                      </div>
                    <?php } ?>
                    

                  </div>
                </div><!-- End .content-->
              </div>
            </div>

          </div>
        </section>
    </main><!-- End #main -->
    <?php } ?>
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