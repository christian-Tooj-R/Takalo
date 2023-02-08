<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap-3.3.6-dist/css/bootstrap.css')?>">
        <link rel="stylesheet" href= "<?php echo site_url('assets/css/index.css')?>">
        <title>Login Page</title>
    </head>

    <body style="background-image: url('<?php echo site_url('assets/img/BackLogin.jpg')?>');background-size: cover;">
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Log In</h2>
                        </div>
                        <div class="row" >
                            <form  class="form-group" action="<?php echo site_url('Login/checklogin')?> " method="post">
                                <div class="row">
                                    <input type="email" name="email" id="username" class="form__input" placeholder="Email" value="christian@gmail.com">
                                </div>
                                <div class="row">
                                  <!-- <span class="fa fa-lock"></span> -->
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Password" value="christian123">
                                </div> 
                                <div class="row" style="margin-right: 55%;">
                                    <input type="checkbox" name="admin" value="1" checked >
                                    <label for="admin">Administrateur</label>
                                </div>
                                <?php if (isset($error)) {  ?>
                                    <div class="row">
                                        <p style="color: red;" ><?php echo $error ?> </p>
                                    </div>
                                <?php  } ?>  

                                <div class="row">
                                    <input type="submit" value="Connexion" class="btn">
                                </div>

                            </form>
                        </div>
                        <div class="row">
                          <p>Don't have an account? <a href="<?php echo site_url('Login/insert_inscription')?>">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>