<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <?php wp_head();?>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body <?php body_class();?>>
<header>
<!-- <h1><?php bloginfo('name');?></h1> -->

<!-- chooses between the logo images using if statement -->
    <div class="logo-wrapper">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/logos/inhabitent-logo-tent.svg">
    </div>
<!-- gets the dynamic path and append with the directory-->
    <nav class ="main-menu-wrapper">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary'
        ));?>
    </nav>
    <div class="search-wrapper">
    <i class="fas fa-search fa-1x"></i>
    </div>
</header>