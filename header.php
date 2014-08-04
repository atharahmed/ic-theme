<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes() ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|'); ?></title>
		<meta property="fb:app_id" content="325146157507863" />
        <?php
        global $post;
        $yoast_meta_description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
        ?>
        <?php wp_head() ?>
		<link rel="author" href="">
		<script type="text/javascript" src="//use.typekit.net/gyk1pdc.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    </head>
    <body <?php body_class() ?>>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=750120015012009";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
    	<div class="push-menu right">
            <div class="menu-scroll-container">
                <div class="menu-wrap">
                    <a href="#" id="close-btn" class="ic-icon-close"></a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-nav',
                        'container' => 'nav',
                        'container_class' => 'navigation-items',
                        'container_id' => 'main-nav',
                        'menu' => 'Main Navigation'
                    )); ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-secondary-nav',
                        'container' => 'nav',
                        'container_class' => 'navigation-items',
                        'container_id' => 'main-secondary-nav',
                        'menu' => 'Main Secondary Navigation'
                    )); ?>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'main-tertiary-nav',
                        'container' => 'nav',
                        'container_class' => 'navigation-items',
                        'container_id' => 'main-tertiary-nav',
                        'menu' => 'Main Tertiary Navigation'
                    )); ?>
                    <div id="menu-social">
                        <div class="facebook">
                            <div class="fb-like" data-href="https://www.facebook.com/invisiblechildren" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        </div>
                        <div class="twitter">
                            <a href="https://twitter.com/invisible" class="twitter-follow-button" data-show-count="false">Follow @invisible</a>
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>
                        <div id="menu-made-for"><b>Made in San Diego, CA</b> for our friends in Central Africa</div>
                    </div>
                </div>
			</div>
		</div>
		<header id="site-header">
			<a href="<?php echo home_url(); ?>" id="header-logo-link"></a>
			<a href="#" id="header-menu-link">Menu</a>
		</header>
        <div id="fixed-buttons" class="hidden-xs hidden-sm">
            <?php if($post->post_name != 'donate') : ?>
			<a id="fixed-donate" href="<?php echo get_permalink(get_page_by_path('donate')); ?>"><span class="ic-icon-heart"></span>Donate</a>
            <?php endif; ?>
        </div>
		
