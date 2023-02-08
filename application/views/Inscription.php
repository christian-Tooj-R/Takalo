<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Takalotakalo</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href=<?php echo site_url("assets/fonts/material-icon/css/material-design-iconic-font.min.css"); ?>>

    <!-- Main css -->
    <link rel="stylesheet" href=<?php echo site_url("assets/css/Inscription.css"); ?>>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        
                        <form action="<?php echo site_url('Login/insert_inscription')?>"  method="POST" class="register-form" id="register-form">
                            
                            <div class="form-group">
                                <?php if (isset($error)) {  ?>
                                    <div class="row">
                                        <p style="color: red;" ><?php echo $error ?> </p>
                                    </div>
                                <?php  } ?>   
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="FirstName"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="firstname" id="name" placeholder="Second Name"/>
                            </div>

                            <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <select name="sexe" style="margin-left: 32px;color: gray;width: 89%;height: 25px;">
                                    <option value="Masculin">Masculin</option>
                                    <option value="Feminin">Feminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="tel" name="contact" id="re_pass" placeholder="Contact"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password2" id="pass" placeholder="Password"/>
                            </div>

                            
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src=<?php echo site_url("assets/img/signup-image.jpg"); ?> alt="sing up image"></figure>
                        <a href="<?php echo site_url("index.php"); ?>" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    <!-- JS -->
    <script src=<?php echo site_url("assets/vendor/jquery/jquery.min.js"); ?>></script>
    <script src=<?php echo site_url("assets/js/main.js"); ?>></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>