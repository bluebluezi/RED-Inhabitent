<?php get_header(); ?>

<?php if( have_posts() ) :?>


<section class="all-products">
    <?php while( have_posts() ) :
        the_post(); ?>
    <figure class="product-cell">
    <h2><?php the_title(); ?></h2>
    <?php echo the_post_thumbnail();?>
    <?php echo '$' . get_field('price');?>
    <h3><?php the_permalink();?></h3>
    <?php the_content(); ?>
    </figure>
    
    <!-- Loop ends -->
    <?php endwhile;?>
</section>
    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
<?php get_footer();?>