<?php get_header(); ?>

<?php if( have_posts() ) :
//The WordPress Loop: loads post content 
?>
<div class="blog-post-index-wrapper">
    <section class="blog-post-index-content">
    <?php while( have_posts() ) :
            the_post(); 
            print_r($post) ?>
    <figure class="blog-post">
        <!-- <div class="post-image-wrapper">
            <?php echo the_post_thumbnail('full');?>
        </div> -->
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
                echo $postDate . " / " . $commentCount . " Comments" . " " .
                     get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
                echo "</p>";
                
            ?>
        </div>
        <figcaption>
        <?php echo wp_trim_words(get_the_content(), 20, '[...]'); ?>
        <figcaption>
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