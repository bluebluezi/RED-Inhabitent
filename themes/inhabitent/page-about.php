<?php get_header(); ?>

<?php if( have_posts() ) :

//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
        <!-- <div class ="about"
             style = "background-image: url(<?php echo get_the_post_thumbnail_url();?>);
                     width:100%; height:500px;">
        </div> -->
    <section class= "about-hero-banner">    
        <?php the_post_thumbnail('full');?>
        <h2><?php the_title(); ?></h2>
    
    </section>
    <!-- <h3><?php the_permalink();?></h3> -->

    <section class="about-content">
        <div class="about-content-container">
            <?php the_content(); ?>
        </div>
    </section>
    <!-- Loop ends -->
    <?php endwhile;?>



<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>