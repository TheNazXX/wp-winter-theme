<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>wp1-CARS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


    <link href="img/favicon.ico" rel="icon">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">


    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <?php wp_body_open() ?>
    <?php global $wp1_options; ?>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">

                    <?php if ($wp1_options['phone']) : ?>
                        <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i><?php echo esc_html($wp1_options['phone']) ?></a>
                    <?php endif ?>

                    <?php if ($wp1_options['phone'] && $wp1_options['email']) : ?>
                        <span class="text-body">|</span>
                    <?php endif ?>

                    <?php if ($wp1_options['email']) : ?>
                        <a class="text-body px-3" href="mailto:<?php echo esc_html($wp1_options['email']) ?>">

                            <i class="fa fa-envelope mr-2"></i>
                            <?php echo esc_html($wp1_options['email']) ?>
                        </a>
                    <?php endif ?>


                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <?php if ($wp1_options['fb']) : ?>
                        <a class="text-body px-3" href="<?php echo esc_html($wp1_options['fb']) ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <?php endif ?>

                    <?php if ($wp1_options['twi']) : ?>
                        <a class="text-body px-3" href="<?php echo esc_html($wp1_options['twi']) ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif ?>
                    <?php if ($wp1_options['in']) : ?>
                        <a class="text-body px-3" href="<?php echo esc_html($wp1_options['in']) ?>">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    <?php endif ?>
                    <?php if ($wp1_options['ins']) : ?>
                        <a class="text-body px-3" href="<?php echo esc_html($wp1_options['ins']) ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                    <?php endif ?>
                    <?php if ($wp1_options['yout']) : ?>
                        <a class="text-body px-3" href="<?php echo esc_html($wp1_options['yout']) ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="<?php echo esc_url(home_url("/")) ?>" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1"><?php echo esc_html(bloginfo('name')) ?></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <?php wp_nav_menu([
                        'theme_location' => 'header_menu',
                        'menu_class' => 'navbar-nav ml-auto py-0',
                        'container' => '',
                        'add_li_class' => 'nav-item nav-link'
                    ]) ?>
                    <!-- <ul class="navbar-nav ml-auto py-0">
          <li class="nav-item nav-link active"><a href="index.html">Home</a></li>
          <li class="nav-item nav-link "><a href="about.html">About</a></li>
          <li class="nav-item nav-link "><a href="service.html">Service</a></li>
          <li class="nav-item nav-link "><a href="car.html">Cars</a></li>
        </ul> -->
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Topbar End -->

    <?php if (!is_front_page()) { ?>
        <?php 
            echo get_the_ID();
            $bg_image = '';

            if($wp1_options['heading_image']['url']){
                $bg_image = 'style="background-image: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url('.$wp1_options['heading_image']['url'].')"';
            };
        ?>
        <div class="container-fluid page-header" <?php echo $bg_image;?>>
            <h1 class="display-3 text-uppercase text-white mb-3"><?php wp_title("");?></h1>
        </div>
    <?php }; ?>