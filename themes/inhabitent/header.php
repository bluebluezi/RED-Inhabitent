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
    
<a href="<?php echo site_url();?>"
    <div class="logo-wrapper">
        <img src="<?php echo get_template_directory_uri();?>/assets/images/logos/inhabitent-logo-tent.svg">
    </div>
</a>
<!-- gets the dynamic path and append with the directory-->
    <nav class ="main-menu-wrapper">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary'
        ));?>
    </nav>

    <!-- <nav class="<?php echo is_page(array('About', 'Home')) ? 'transparent' : 'opaque' ;?>">
    <?php wp_nav_menu(array(
        'theme_location' => 'main'
    )) ;?>
</nav> -->
    <div class="header-search">
        <?php get_search_form();?>
    </div>
</header>
