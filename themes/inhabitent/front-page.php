<?php get_header(); ?>

<?php if( have_posts() ) :

//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>

    <section class="home-hero-banner">
        <?php the_post_thumbnail('full');?>
    <img 
    class="full-logo"
    src="<?php echo get_template_directory_uri();?>/assets/images/logos/inhabitent-logo-full.svg">
    </section>
    <?php the_content(); ?>
    
    <!-- Loop ends -->
    <?php endwhile;?>

    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

<?php 
$terms = get_terms(array(
    'taxonomy' => 'product-type',
    'hide_empty' => false
));?>

<!-- <?php
print_r($terms);?> //this is used to print out $terms -->

<section class="shop-categories">
    <h2>SHOP STUFF</h2>

    <?php foreach($terms as $term) : ?>
        <figure class="shop-categories-cell">

            <?php
                $file_name = $term->name . '.svg';
            ?>

            <img src='<?php echo get_template_directory_uri() . "/assets/images/product-type-icons/$file_name"?>'>
        
            <?php $descriptions = $term->description;
                echo "<p>";
                echo $descriptions;
                echo "</p>";
            ?>
            <!-- add button here -->
        </figure>
    <?php endforeach;?>
</section>


<section class="inhabitent-journal">
    <?php
    $args = array( 
        'post_type' => 'post', 
        'order' => 'ASC',
        'numberposts' => 3
        );
    $product_posts = get_posts( $args ); // returns an array of posts

    ?>
    <?php foreach ( $product_posts as $post ) : setup_postdata( $post );?>
    

        <div class="journal-cell">

            <?php the_post_thumbnail() ?> 

            <?php 
                $postDateRaw = $post->post_date;
                $postDate= date('t F Y', strtotime($postDateRaw));
                $commentCount = $post->comment_count;
                echo "<p>";
                echo $postDate . " / " . $commentCount . " Comments";
                echo "</p>";
            ?>    

            <h3><?php the_title() ?></h3>
            <!-- add button here -->

    </div>
    <?php endforeach; wp_reset_postdata(); ?>
</section>


<!-- Custom Post Loop Starts -->


    
<?php get_footer();?>