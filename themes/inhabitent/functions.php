

<?php


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
        'id' => 'default-sidebar-area',
        'description' => 'Add a text block with your business hours',
        'before_widget' => '<aside id="%1$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class = "sidebar-headings">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer-area',
        'description' => 'Drag and drop appropriate widgets for the footer',
        'before_widget' => '<div id="%1$s>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class = "footer-headings>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'inhabitent_widgets');

function inhabitent_post_types(){
    register_post_type('product', array(
        'has_archive' => true,
        'show_in_rest' => true,
        'public' => true, //this make it show up as a menu item
        'supports' => array('title','editor','thumbnail'),       
        //^ states what we want to edit in post type (includes place to insert thumbnail)
        'labels' => array(
            'name' => 'Products',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'all_items' => 'All Products',
            'singular_name' => 'Product'
        ),    
        'menu_item' => 'dashicons-store'   
    ));

    // Register Custom Taxonomy
	$labels = array(
		'name'                       => _x( 'Product Types', 'Taxonomy General Name', 'Product Type' ),
		'singular_name'              => _x( 'Product Type', 'Taxonomy Singular Name', 'Product Type' ),
		'menu_name'                  => __( 'Product Type', 'Product Type' ),
		'all_items'                  => __( 'All Items', 'Product Type' ),
		'parent_item'                => __( 'Parent Item', 'Product Type' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Product Type' ),
		'new_item_name'              => __( 'New Item Name', 'Product Type' ),
		'add_new_item'               => __( 'Add New Item', 'Product Type' ),
		'edit_item'                  => __( 'Edit Item', 'Product Type' ),
		'update_item'                => __( 'Update Item', 'Product Type' ),
		'view_item'                  => __( 'View Item', 'Product Type' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Product Type' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'Product Type' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'Product Type' ),
		'popular_items'              => __( 'Popular Items', 'Product Type' ),
		'search_items'               => __( 'Search Items', 'Product Type' ),
		'not_found'                  => __( 'Not Found', 'Product Type' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true, 
        //this line puts the custom post type within edit not just quick edit
    );
    
	register_taxonomy( 'product-type', array( 'product' ), $args ); //this is the registered taxonomy in WP, array specifies where it shows up

    

}

add_action('init', 'inhabitent_post_types');

//below allows fontawesome's favicon!

add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}




?>