<?php get_header();
?>

    <h1>Shop Stuff</h1>

    <nav class ="product-categories">
        <?php wp_nav_menu(array(
            'theme_location' => 'producttype'
        ));?>
    </nav>

<!--this queries items that are 'product' and limits the post 
to 16 products per page for the query-->
<?php query_posts(array(  
    'post_type' => array( 'product', ),
    'posts_per_page' => 16, 
    ));
?>

<?php if( have_posts() ) :?>
<section class="all-products">
    <?php while( have_posts() ) :
        the_post(); ?>
   
    <figure class="product-cell">
        <div class="product-img-wrapper">
            <?php echo the_post_thumbnail();?>
        </div>
        <figcaption class="product-cell-text">
            <span class="product-name"><?php the_title(); ?></span>
            <span class="product-price"><?php echo '$' . get_field('price');?></span>
            <p class="product-cell-placeholder">
                ......................................................
            </p>
            
            
        </figcaption>
        
    </figure>
    
    <!-- Loop ends -->
    <?php endwhile;?>
</section>
    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>