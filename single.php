<?php

add_action('wp_enqueue_scripts', 'enqueueSingleScripts');
function enqueueSingleScripts()
{
	$deps = array('ic-email-form');
	if (get_field('slideshow')) {
		array_push($deps, 'bxslider-init-js');
	}

    wp_enqueue_script('blog-single', get_stylesheet_directory_uri() . '/js/blog-single.js', $deps, null, true);
    wp_enqueue_style('blog-single', get_stylesheet_directory_uri() . '/css/blog-single.css');
}
?>

<?php
global $post;
$currentID = get_the_ID();
$currentPost = get_post($currentID);

// Get a random category
$categories = get_the_category(get_the_ID());
$random_number = (float)rand()/(float)getrandmax();
$category_index = floor($random_number * count($categories));
$category_slug = $categories[$category_index]->slug;

// Get top 10 posts from that category
$args = array(
    'category' => $category_slug,
    'orderby'  => 'post_date',
    'posts_per_page'  => 10,
    'exclude' => array($currentID)
);

// grab random post and setup for loop
$posts = get_posts($args);
$post_index = floor($random_number * count($posts));
$post = $posts[$post_index];
setup_postdata($post);

// extract data
$post_title = get_the_title();
$post_excerpt = get_the_excerpt();
$post_permalink = get_the_permalink();
$post_thumbnail_array = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), '', false, '' );
$post_thumbnail = $post_thumbnail_array[0];

// reset the post data
wp_reset_postdata();
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
    <?php
    $featuredImageArray = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    $featuredImage = $featuredImageArray[0];

    if (empty($featuredImage)) {
        $featuredImage = get_stylesheet_directory_uri() . '/images/blog/header-bg.jpg';
    }
    ?>
	<div class="bg-image" style="background-image: url(<?php echo $featuredImage; ?> );"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header hero secondary">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</div>
</section>
<section id="section-content">
	<div class="post-content">
		<div class="container">
			<div class="row" id="text-content">
				<div class="col-md-8 col-md-offset-2">
                    <?php echo splitParagraphs($currentPost->post_content, 1); ?>
				</div>
			</div>
			<?php if (get_field('slideshow')) : ?>
            <div class="row slideshow">
                <div class="col-md-10 col-md-offset-1">
                    <?php get_template_part('partials/bxslider', 'slideshow'); ?>
                </div>
            </div>
			<?php endif; ?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php echo splitParagraphs($currentPost->post_content, 2); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="social-share">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div></div>
					<?php get_template_part('partials/social', 'share'); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-next">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1">
				<a class="btn-circle" href="<?php echo $post_permalink; ?>" style="background-image: url(<?php echo $post_thumbnail; ?>)">
					<div class="overlay">
						<div class="content">
							<p>Read More</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-5 col-md-6" id="up-next">
				<h5 class="header small">You’ll probably be interested in…</h5>
				<a class="next-title" href="<?php echo $post_permalink; ?>">
					<?php echo $post_title; ?>
				</a>
				<p><?php echo $post_excerpt; ?></p>
				 <a href="<?php echo $post_permalink; ?>" class="btn btn-border primary">Read This</a>
			</div>
		</div>
	</div>
</section>
<section id="section-email-sign-up">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header smallest">Don’t miss out</h3>
				<h2 class="header medium">Sign up for updates
                    <span class="subheader">
						Get all the latest news and our exclusive content straight to your email inbox.
                    </span>
				</h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
                <?php get_template_part('partials/email', 'form'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
