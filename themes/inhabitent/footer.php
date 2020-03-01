//wp_footer inject required scripts in this location of the html
<?php wp_footer();?>

</body>


<footer>
    <?php get_sidebar('footer');?>
    <div class ="footer-logo-wrapper">
        <img src='<?php echo get_template_directory_uri() . "/assets/images/logos/inhabitent-logo-text-dark.svg"?>'>
    
    </div>

    <p>copyright &copy 2020 inhabitent</p>

</footer>


</html>