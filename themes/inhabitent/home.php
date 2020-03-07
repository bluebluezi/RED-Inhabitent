<?php get_header(); ?>

<?php if( have_posts() ) :
//The WordPress Loop: loads post content 
?>
<div class="blog-post-index-container">
    <section class="blog-post-index-content">
        <?php while( have_posts() ) : the_post();?>
        <figure class="blog-post">
            <div class="post-image-container">
                <?php echo the_post_thumbnail();?>
                <div class="post-title-wrapper">
                    <h2><?php the_title(); ?></h2>
                </div>
                <div class ="post-info-wrapper">
                <?php 
                    $postDateRaw = $post->post_date;
                    $postDate= date('t F Y', strtotime($postDateRaw));
                    $commentCount = $post->comment_count;
                    $author = $post->post_author;
                    echo "<p>";
                    echo $postDate . " / " . $commentCount . " Comments" . " / By " .
                        get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                    echo "</p>";    
                ?>
                </div>
            </div>

            <figcaption class="blog-post-content">
                <?php echo wp_trim_words(get_the_content(), 50, '[...]'); ?>
            </figcaption>

            <a class="post-button" href="<?php the_permalink();?>">
            Read More →
            </a>
            <!-- button here -->
        </figure>
        <!-- Loop ends -->
        <?php endwhile;?>
    </section>
    <?php get_sidebar();?>
</div>


<?php else : ?>
    <div class="blogpost-index-wrapper">
        <section class ="blogpost-index-content">
            <p>No posts found</p>
        </section>
        <?php get_sidebar();?>
    </div>
        
<?php endif;?>


<?php get_footer();?>
