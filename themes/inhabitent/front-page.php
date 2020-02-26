<?php get_header(); ?>

<?php if( have_posts() ) :

//The WordPress Loop: loads post content -->
    while( have_posts() ) :
        the_post(); ?>
    <div class="home-hero-banner">
        <?php the_post_thumbnail('full');?>
    <img 
    class="full-logo"
    src="<?php echo get_template_directory_uri();?>/assets/images/logos/inhabitent-logo-full.svg">
    </div>
    <?php the_content(); ?>
    

    <?php endwhile;?>

    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>





<!-- custom loop start -->


<!-- custom Loop End -->
    
<?php get_footer();?>