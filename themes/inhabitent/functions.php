

<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
//Adds script and stylesheets
function inhabitant_files() {
    wp_enqueue_style('inhabitant_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Lato&display=swap");
}

add_action('wp_enqueue_scripts', 'inhabitant_files');

//Adds theme support - ex: title tag
function inhabitant_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => 'Main Menu'

    ));
}

add_action('after_setup_theme', 'inhabitant_features');

function inhabitent_widgets(){
    register_sidebar(array(   //this is an associative array
        'name' => 'Sidebar Info',
        'id' => 'sidebar-info',
        'description' => 'Add a text block with your business hours',
        'before_widget' => '<aside id="%1$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class = "widget-hours">',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'inhabitent_widgets');

function inhabitent_post_types(){
    register_post_type('product', array(
        'has_archive' => true,
        'show_in_rest' => true,
        'public' => true,
        'supports' => array('title','editor','thumbnail'),       //states what we want to edit in post type
        'labels' => array(
            'name' => 'Products',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'all_items' => 'All Products',
            'singular_name' => 'Product'
        ),    
        'menu_item' => 'dashicons-store'   
    ));
}

add_action('init', 'inhabitent_post_types');

//below allows fontawesome's favicon!

add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}

?>