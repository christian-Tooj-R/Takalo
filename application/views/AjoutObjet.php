<section  style="width: 700px;">
<div>
<h2>Ajouter un Objet</h2>
  <?php if(isset($response)) echo $response;  ?>
    <form action="<?php echo base_url()."User";  ?>" method="post" enctype='multipart/form-data'>
          <label class="label">Choisissez une fichier: </label><input type="file" name="file">
          <br><br><input type="submit" value="Upload" name="upload">
    </form>
</div>
</section>