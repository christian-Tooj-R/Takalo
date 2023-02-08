<section id="portfolio" class="portfolio" style="width: 700px;">
<h2>Vos Objets</h2>
      <div class="container">

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

<?php foreach ($objects as $object) {?>        
  <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $object['idcategory']; ?> ">
    <div class="portfolio-wrap" style="height:200px;">
    <?php foreach ($images as $image) {
      if ($image['idobject'] == $object['idobject']) { ?>   
        <img  src=<?php echo site_url("assets/img/takalo/" . $image['image']); ?> class="img-fluid" alt="">
      <?php }
    }?>   
      <div class="portfolio-info">
        <h4><?php echo $object['name']; ?></h4>
        <p><?php echo $object['name']; ?></p>
        <div class="portfolio-links">
          <?php if ($reservation == "reserver") { ?>
              <a href="<?php echo site_url("Accueil/echange/".$object['idobject']."/".$idechange."/".$idpropriety ); ?>"><i class="bx bx-plus"></i></a>
          <?php } ?>
          <a href=<?php echo site_url("Accueil/detail/".$object['idobject']."/profil"); ?> title="More Details"><i class="bx bx-link"></i></a>
        </div>
      </div>
    </div>
  </div>
<?php } ?>           
</div>

      </div>
    </section>