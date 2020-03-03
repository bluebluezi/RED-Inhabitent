<?php get_header(); ?>

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
            <p><?php the_title(); ?></p>
            <p class="product-cell-placeholder">............................................................</p>
            <p><?php echo '$' . get_field('price');?></p>
            
            
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