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

<section class="product-categories">
    <h2>SHOP STUFF</h2>
    <div class="product-categories-container">
        

        <?php foreach($terms as $term) : ?>
            
            <figure class="product-categories-cell">

                <?php
                    $file_name = $term->name . '.svg';
                ?>

                <img src='<?php echo get_template_directory_uri() . "/assets/images/product-type-icons/$file_name"?>'>
            
                <?php $descriptions = $term->description;
                    echo "<p>";
                    echo $descriptions;
                    echo "</p>";
                ?>

                <a class="product-categories-button" href="<?php the_permalink();?>">
                    
                    <?php $name = $term->name;
                        echo $name . " stuff";
                    ?>

                </a>
                <!-- add button here -->
            </figure>
        <?php endforeach;?>
    </div>
</section>


<section class="inhabitent-journal">
    <h2>Inhabitent Journal</h2>
    <div class="inhabitent-journal-container">
        
        <?php
        $args = array( 
            'post_type' => 'post', 
            'order' => 'ASC',
            'numberposts' => 3
            );
        $product_posts = get_posts( $args ); ?> <!-- returns an array of posts-->

        <?php foreach ( $product_posts as $post ) : setup_postdata( $post );?>
        
            <figure class="inhabitent-journal-cell">

                <?php the_post_thumbnail() ?> 

                <figcaption class="inhabitent-journal-cell-text">

                    <?php 
                        $postDateRaw = $post->post_date;
                        $postDate= date('t F Y', strtotime($postDateRaw));
                        $commentCount = $post->comment_count;
                        echo "<p>";
                        echo $postDate . " / " . $commentCount . " Comments";
                        echo "</p>";
                    ?>    

                    <h3><?php the_title() ?></h3>
                </figcaption>
                <a class="inhabitent-journal-button" href="<?php the_permalink();?>">
                    Read Entry
                </a>

            </figure>
    
        <?php endforeach; wp_reset_postdata(); ?>
        
    </div>
</section>

<!-- Custom Post Loop Starts -->
<section class="adventure-blogs">

    <?php
        $args = array( 
            'post_type' => 'adventure', 
            'order' => 'ASC',
            'numberposts' => 4
            );
        $adventure_posts = get_posts( $args ); ?><!-- // returns an array of posts-->

    <h2>Latest Adventures</h2>
    <div class="adventure-blogs-container">
        <?php foreach ( $adventure_posts as $post ) : setup_postdata( $post );?>

            <figure class="adventure-cell">
                <?php the_post_thumbnail() ?>
                <h3><?php the_title() ?></h3>
                <!-- add button here -->
                <a class="custom-posttype-button" href="<?php the_permalink();?>">
                    Read More
                </a>
            </figure>

        <?php endforeach; wp_reset_postdata(); ?>

        <a class="more-adventures-button" href="<?php the_permalink();?>">
            More Adventures
        </a>
    </div>

</section>


    
<?php get_footer();?>