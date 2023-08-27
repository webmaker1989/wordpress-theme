<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
<div class="container-fluid py-2">
  <div class="row d-flex justify-content-between align-items-center">
    <div class="col-lg-4 text-center text-lg-start"><?php the_custom_logo(); ?></div>
    <div class="col-lg-4 my-2 my-lg-0">
    <?php 
    wp_nav_menu( 
    array( 
        'theme_location' => 'primary_menu',
        'container_class' => 'container-nav',
        'menu_class'      => 'main-nav d-flex justify-content-between align-items-center list-unstyled',
        'li_class'       =>  'nav-item',    //this is bootstrap li class, that is added using filter
        //'a_class'       =>   'nav-link',    //this is bootstrap a class, that is added using filter, we used though second way to add
        'active_class'  =>   'active',    //this is bootstrap li class, that is added using filter
        ) );
        ?>
    </div>
    <div class="col-lg-4 text-center text-lg-end"><a href="#" class="btn btn-primary">Link Button</a></div>
  </div>
</div>
    </header>