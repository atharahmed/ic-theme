<?php

foreach (glob(dirname(__FILE__).'/includes/*.php') as $filename)
	require_once($filename);

//Add Featured Image Support
add_theme_support('post-thumbnails');

// Clean up the <head>
add_action('init', 'removeHeadLinks');
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}

remove_action('wp_head', 'wp_generator');

add_action( 'init', 'register_menus' );
function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'main-secondary-nav' => 'Main Secondary Navigation',
			'main-tertiary-nav' => 'Main Tertiary Navigation',
			'footer-nav' => 'Footer Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}

add_action( 'widgets_init', 'register_widgets' );
function register_widgets(){

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

//Page Slug Body Class
add_filter( 'body_class', 'add_slug_body_class' );
function add_slug_body_class( $classes ) 
{
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}

add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// Get Facebook image for Open Graph meta tags
function get_fbimage() {
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
	if ( has_post_thumbnail($post->ID)) {
		$fbimage = $src[0];
	} else {
		global $post, $posts;
		$fbimage = '';

		if($post->post_content) {
			$output = preg_match_all('/<img\s+[^>]*src="([^"]*)"[^>]*>/i',
			$post->post_content, $matches);
            if (count($matches[1]) > 0) {
			    $fbimage = $matches[1][0];
            }
		}
	}
	if (empty($fbimage)) {
		$fbimage = get_stylesheet_directory_uri() . "/images/default-image.jpg";
	}
	return $fbimage;
}

// Get and trim excerpt for meta description
function my_excerpt($text, $excerpt)
{
    if ($excerpt) return $excerpt;

    $raw_excerpt = $text;
    $text = strip_shortcodes( $text );

    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', 55);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
    } else {
            $text = implode(' ', $words);
    }

    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

// Split blog content into two sections
function splitParagraphs($string, $index) {
	$string = get_content_with_formatting($string);
	$paragraphs = explode("</p>", $string, 30);
	$paragraphLength = count($paragraphs);
	$halfWayPoint = floor(count($paragraphs) / 2);
	$firstHalf = array();
	$secondHalf = array();

	if ($index == 1) {
		for ($i = 0; $i < $halfWayPoint; $i++) {
			array_push($firstHalf, $paragraphs[$i]);
		}
		$firstHalf = implode("", $firstHalf);
		return $firstHalf;
	}	
	else {
		for ($i = $halfWayPoint; $i < $paragraphLength; $i++) {
			array_push($secondHalf, $paragraphs[$i]);
		}
		$secondHalf = implode("", $secondHalf);
		return $secondHalf;
	}
}

// Include content formatting tags
function get_content_with_formatting($content){
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

// add svg mime type to uploads
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// strip shortcodes from excerpt
add_filter( 'the_excerpt', 'remove_media_credit_from_excerpt' );
function remove_media_credit_from_excerpt( $excerpt ) {
    return preg_replace ('/\[media-credit[^\]]*\](.*)\[\/media-credit\]/', '$1', $excerpt);
}

function ic_display_ga_code()
{
    $options = get_option('ic_theme_options');
    $multiple_accounts = explode(",", $options['google_analytics']);

    if (is_array($multiple_accounts)) {

        $gaCode = "";
        $domainTemplate = "
        <!-- BEGIN GOOGLE ANALYTICS CODE -->
        <script type='text/javascript'>
            var _gaq = _gaq || [];
            var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
            _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
            _gaq.push(['_setAccount', '%s']);
            _gaq.push(['_setDomainName', 'invisiblechildren.com']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_trackPageview']);
        </script>
        ";

        foreach ($multiple_accounts as $acct) {
            $account_id = trim($acct);
            $gaCode .= sprintf($domainTemplate, $account_id);
        }

        $gaCode .= "
        <script type='text/javascript'>
          (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
          })();
        </script>
        <!-- END GOOGLE ANALYTICS CODE -->
        ";

        print $gaCode;
    }
}
