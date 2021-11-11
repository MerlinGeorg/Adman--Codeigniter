<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template"> -->

    <!-- Title Page-->
    <title><?= $title ?></title>

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
    <link href= "<?php echo base_url('vendor/select2/select2-bootstrap4.css' );?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css' );?>" rel="stylesheet" media="all">
    <link href= "<?php echo base_url('vendor/perfect-scrollbar/perfect-scrollbar.css');?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href= "<?php echo base_url('Assets/css/theme.css');?>" rel="stylesheet" media="all">

    <!-- <link href="<?php echo base_url('Assets/css/login/bootstrap.min.css') ; ?>" rel="stylesheet"> -->
    <link href="<?php echo base_url('Assets/css/login/metisMenu.min.css') ; ?>" rel="stylesheet">
    <link href="<?php echo base_url('Assets/css/login/sb-admin-2.css') ; ?>" rel="stylesheet">

	<style type="text/css">

	</style>
</head>
<body class="animsition">
    <div class="page-wrapper">
        
    <?php if($header) echo $header; ?>
    <?php if($sidebar) echo $sidebar; ?>

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <?php if($page) echo $page; ?>
                </div>
            </div>
        </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
    <?php if($footer) echo $footer; ?>

    <!-- Jquery JS-->
    <script src="<?php echo base_url('Assets/js/jquery.min.js'); ?>"></script>   
    <!-- <script src="<?php echo base_url('vendor/jquery-3.2.1.min.js'); ?>"></script> -->
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url('vendor/bootstrap-4.1/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendor/bootstrap-4.1/bootstrap.min.js'); ?>"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url('vendor/slick/slick.min.js'); ?>">
    <script src="<?php echo base_url('vendor/select2/select2.min.js'); ?>">
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
    <script src="<?php echo base_url('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url('Assets/js/main.js'); ?>"></script>

</body>

</html>
<!-- end document-->