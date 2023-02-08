
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href=<?php echo site_url(); ?>><span>Takalo</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href=<?php echo site_url('Accueil/index'); ?>>Home</a></li>
            <li><a class="nav-link scrollto" href=<?php echo site_url("profil"); ?>>Profile</a></li>
            <li><a class="nav-link scrollto active" href=<?php echo site_url('Historique'); ?>>Exchange history</a></li>
            <?php  $datauser = $this->session->user;
            if ($datauser['admin'] == 1) { ?>
                <li><a class="nav-link scrollto" href="<?php echo site_url("Statistique"); ?>">Statistics</a></li>
            <?php } ?>
            <li><a class="getstarted scrollto" href="<?php echo site_url("Login/deconnexion"); ?>">Disconnection</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

      </div>
    </div>
  </header>
  <!-- End Header -->