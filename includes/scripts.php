<?php

/* Register scripts */
add_action('init', 'theme_register_scripts');
function theme_register_scripts()
{
    // Libraries
    wp_register_script('modernizr', get_stylesheet_directory_uri() . '/bower_components/modernizr/modernizr.js', null, '2.6.2', false);
    wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js', array('jquery'), '3.1.0', true);
    wp_register_script('imager', get_stylesheet_directory_uri() . '/bower_components/imager.js/dist/Imager.min.js', null, '1.0', true);
    wp_register_script('jquery.videobackground', get_stylesheet_directory_uri() . '/bower_components/jquery-videobackground/build/release/jquery.videobackground.min.js', array('jquery'), null, true);
    wp_register_script('jquery.scrollTo', get_stylesheet_directory_uri() . '/bower_components/jquery.scrollTo/jquery.scrollTo.min.js', array('jquery'), '1.4.11', true);
    wp_register_script('jquery.bxslider', get_stylesheet_directory_uri() . '/bower_components/bxslider-4/jquery.bxslider.min.js', array('jquery'), '4.1.1', true);
    wp_register_script('select2', get_stylesheet_directory_uri() . '/bower_components/select2/select2.min.js', array('jquery'), '3.4.6', true);
    wp_enqueue_script('bootstrap-validator', get_stylesheet_directory_uri() . '/bower_components/bootstrapValidator/dist/js/bootstrapValidator.min.js', array('jquery'), null, true);
    wp_register_script('spin-js', get_stylesheet_directory_uri() . '/bower_components/spin.js/spin.js', null, '1.0', true);
    wp_register_script('fancybox', get_stylesheet_directory_uri() . '/bower_components/fancybox/source/jquery.fancybox.pack.js', array('jquery'), '2.1', true);
    wp_register_script('fancybox-media', get_stylesheet_directory_uri() . '/bower_components/fancybox/source/helpers/jquery.fancybox-media.js', array('fancybox'), '2.1', true);
    wp_register_script('d3-js', get_stylesheet_directory_uri() . '/bower_components/d3/d3.min.js', null, '3.4.8', true);
    wp_register_script('vimeo-player-api', get_stylesheet_directory_uri() . '/bower_components/vimeo-player-api/javascript/froogaloop.min.js', null, '1.7.1', true);
    wp_register_script('auto-numeric', get_stylesheet_directory_uri() . '/bower_components/autoNumeric/autoNumeric.js', array('jquery'), '1.9.22', true);
    wp_register_script('jquery.transit', get_stylesheet_directory_uri() . '/bower_components/jquery.transit/jquery.transit.js', array('jquery'), '0.9.9', true);
    wp_register_script('perfect-scrollbar', get_stylesheet_directory_uri() . '/bower_components/perfect-scrollbar/min/perfect-scrollbar-0.4.10.with-mousewheel.min.js', array('jquery'), null, true);
    wp_register_script('jquery.placeholder', get_stylesheet_directory_uri() . '/bower_components/jquery-placeholder/jquery.placeholder.js', array('jquery'), null, true);
    wp_register_script('jquery.widowFix', get_stylesheet_directory_uri() . '/js/vendor/jquery.widowFix.min.js', array('jquery'), null, true);

    // Global
    wp_register_script('ic-global', get_stylesheet_directory_uri() . '/js/global.js', array('modernizr', 'jquery', 'bootstrap', 'imager', 'select2', 'jquery.scrollTo', 'jquery.transit', 'perfect-scrollbar', 'jquery.placeholder', 'jquery.widowFix', 'fancybox', 'fancybox-media'), '1.0', true);

    // IC scripts
    wp_register_script('ic-email-form', get_stylesheet_directory_uri() . '/js/email-submit-form.js', array('bootstrap-validator', 'spin-js'), null, true);
    wp_register_script('ic-section-our-team', get_stylesheet_directory_uri() . '/js/section-our-team.js', array('jquery'), null, true);
    wp_register_script('bxslider-init-js', get_stylesheet_directory_uri() . '/js/slideshow.js', array('jquery.bxslider'), '1.0', true);
    wp_register_script('video-init', get_stylesheet_directory_uri() . '/js/video-section.js', array('jquery'), '1.0', true);

    /* Register styles */

    // Libraries
    wp_register_style('jquery.bxslider', get_stylesheet_directory_uri() . '/bower_components/bxslider-4/jquery.bxslider.css', null, '4.1.1');
    wp_register_style('select2', get_stylesheet_directory_uri() . '/bower_components/select2/select2.css', null, '4.1.1');
    wp_register_style('select2-bootstrap', get_stylesheet_directory_uri() . '/bower_components/select2/select2-bootstrap.css', null, '4.1.1');
    wp_register_style('fancybox', get_stylesheet_directory_uri() . '/bower_components/fancybox/source/jquery.fancybox.css', null, '2.1');
    wp_register_style('perfect-scrollbar', get_stylesheet_directory_uri() . '/bower_components/perfect-scrollbar/min/perfect-scrollbar-0.4.10.min.css', null, '2.1');
}


/**
 * Enqueue global scripts and styles
 */
add_action('wp_enqueue_scripts', 'theme_enqueue_globals');
function theme_enqueue_globals()
{
    // Load our local version jQuery and move to footer if we're not in the admin
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', false, '1.11.0', true);
    }

    // scripts
    wp_enqueue_script('ic-global');
    wp_enqueue_script('ic-email-form');

    //styles
    wp_enqueue_style('select2');
    wp_enqueue_style('select2-bootstrap');
    wp_enqueue_style('perfect-scrollbar');
    wp_enqueue_style('fancybox');
}