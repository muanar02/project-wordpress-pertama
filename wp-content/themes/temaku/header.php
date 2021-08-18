<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php
  $favicon = get_field('favicon', 'options');
  if(!empty( $favicon )):
  ?>
      <link rel="icon" type="image/png" sizes="16x16"  href="<?= esc_url($favicon['url']); ?>">
  <?php else: ?>
      <link rel="icon" type="image/png" sizes="16x16"  href="<?= esc_url(get_template_directory_uri()); ?>/assets/img/favicon.ico">
  <?php endif; ?>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar" role="navigation">
    <div class="container">
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
      <?php
      $logo = get_field('logo', 'options');
      if(!empty( $logo )):
      ?>
          <img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" height="50">
      <?php else: ?>
          <img src="<?= esc_url(get_template_directory_uri()); ?>/assets/img/logo-back-white.jpg" alt="image-logo" height="50">
      <?php endif; ?>
      </a>
      
      <!-- Brand and toggle get grouped for better mobile display -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
        aria-controls="bs-example-navbar-collapse-1" aria-expanded="false"
        aria-label="<?php esc_attr_e('Toggle navigation'); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
        <?php
        wp_nav_menu( array(
          'theme_location'    => 'main-menu',
          'depth'             => 2,
          'container'         => 'ul',
          'menu_class'        => 'nav navbar-nav mr-auto',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ));
        ?>
        <form action="<?= esc_url(home_url('/')); ?>" class="form-inline my-2 my-lg-0">
          <div class="input-group mr-sm-2">
            <input type="search" name="s" class="form-control" placeholder="<?php esc_html_e('Search...'); ?>" aria-label="Search" aria-describedby="button-addon2">
            <div class="input-group-append">
              <button class="btn btn-light" type="submit" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>

  <!-- carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/assets/img/carousel1.jpg" class="image-carousel d-block w-100"
          alt="image-carousel">
      </div>
      <div class="carousel-item">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/assets/img/carousel2.jpg" class="image-carousel d-block w-100"
          alt="image-carousel">
      </div>
      <div class="carousel-item">
        <img src="<?= esc_url(get_template_directory_uri()); ?>/assets/img/carousel3.jpg" class="image-carousel d-block w-100"
          alt="image-carousel">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>