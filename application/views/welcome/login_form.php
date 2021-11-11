<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template"> -->

    <!-- Title Page-->
    <title>ADMAN LOGIN</title>

    <!-- Fontfaces CSS-->
    <link href= "<?php echo base_url('Assets/css/font-face.css'); ?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/font-awesome-4.7/css/font-awesome.min.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/font-awesome-5/css/fontawesome-all.min.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/mdi-font/css/material-design-iconic-font.min.css');?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href= "<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.css' );?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href= "<?php echo base_url('vendor/animsition/animsition.min.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/wow/animate.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/css-hamburgers/hamburgers.min.css' );?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/slick/slick.css');?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/select2/select2.min.css' );?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.css');?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href= "<?php echo base_url('Assets/css/theme.css');?>" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper" style="padding-bottom: 0;">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url('Assets/img/icon/adman_logo.png'); ?>" style="height: 75px;" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                        <!-- <h1>Log-in</h1><br>
                        <form class="form-signin" method="post" action="<?php echo site_url('Welcome/user_login_process'); ?>" >       
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="login" class="login login-submit" value="login"> -->

                        <form class="form-signin" action="<?php echo site_url('Welcome/user_login_process'); ?>" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <!--<div class="login-checkbox">-->
                                <!--    <label>-->
                                <!--        <input id="" type="checkbox" name="remember">Remember Me-->
                                <!--    </label>-->
                                <!--</div>-->
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">Log In</button>
                          </form>
    
                          <div class="login-help">
                          </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Jquery JS-->
<script src="<?php echo base_url('Assets/js/jquery.min.js'); ?>"></script>   
    <!-- <script src="<?php echo base_url('vendor/jquery-3.2.1.min.js'); ?>"></script> -->
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('vendor/slick/slick.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('vendor/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/animsition/animsition.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('vendor/counter-up/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/counter-up/jquery.counterup.min.js'); ?>">
    </script>
    <script src="<?php echo base_url('vendor/circle-progress/circle-progress.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/chartjs/Chart.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>">
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url('Assets/js/main.js'); ?>"></script>

</body>

</html>