<?php
add_action( 'wp_enqueue_scripts', 'enqueue404Scripts' );
function enqueue404Scripts()
{
    wp_enqueue_style( '404', get_stylesheet_directory_uri() . '/css/404.css');
    //wp_enqueue_script( 'contact-js', get_stylesheet_directory_uri() . '/js/contact-us.js', array( 'fancybox', 'spin-js', 'bootstrap-validator', 'ic-email-form' ), null, false );
}
?>
<?php get_header(); ?>
<section id="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
				<h1 class="header hero">
                    <span class="intro">Uh oh...</span>
                    404!
                    <span class="subheader">
                        The page you're looking for does not exist!
                    </span>
                </h1>
            </div>
		</div>
    </div>
</section>
<?php get_footer(); ?>
