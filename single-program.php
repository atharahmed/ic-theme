<?php
/*
Template Name: Programs - Single Program
*/

add_action('wp_enqueue_scripts', 'enquequeProgramScripts');

function enquequeProgramScripts()
{
	$deps = array('ic-email-form', 'fancybox', 'fancybox-media');
	if (get_field('slideshow')) {
		array_push($deps, 'bxslider-init-js');
	}
	wp_enqueue_style('program-styles', get_stylesheet_directory_uri() . '/css/single-program.css', array('fancybox'));
	wp_enqueue_script('program-js', get_stylesheet_directory_uri() . '/js/single-program.js', $deps, null, true);
}

	$currentID = get_the_ID();

	// Get custom post taxonomy
	$term = get_the_term_list($currentID, 'program_type');

	$args = array(
		'post_type'=>'program',
		'program_type' => $term,
		'exclude' => array($currentID)
		);

	$taxonomies = get_posts($args); 
	$random_number = (float)rand()/(float)getrandmax();
	$post_index = floor($random_number * count($taxonomies));
	$post_id = (string)$taxonomies[$post_index]->ID;
	$post_title = (string)$taxonomies[$post_index]->post_title;
	$post_content = (string)$taxonomies[$post_index]->post_content;
	$post_content = wp_trim_words($post_content, 40);
	$img_color = get_field('program_image_color', $post_id);
	$post_permalink = get_the_permalink($post_id);
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image" style="background-image: url(<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', false, '' ); echo $src[0]; ?>)"></div>
	<div class="black-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="top-icon">
					<img src="<?php echo get_field('main_icon'); ?>">
				</div>
				<h2 class="header hero secondary">
					<?php the_title(); ?>
				</h2>
			</div>
		</div>
	</div>
</section>
<section id="section-content" class="program-text">
	<?php if (get_field('video')) :  ?>
		<div class="watch-video">
			<a href="<?php the_field('video'); ?>" class="btn btn-default primary fancybox video">Watch the video</a>
		</div>
	<?php endif; ?>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 post-content first">
					<?php if (have_posts()) :
						while (have_posts()) :
							the_post();
								$content = get_the_content();
								echo splitParagraphs($content, 1);
						endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
    <?php
    $stat1 = get_field('stat_1');
    if (!empty($stat1)) :
    ?>
	<div class="program-stats">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h3 class="header medium separator">
						Statistics
						<span class="subheader"></span>
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
					<p class="statistic">
						<?php the_field('stat_1'); ?>
						<span class="description">
							<?php the_field('stat_1_description'); ?>
						</span>
					</p>

					<?php if (get_field('stat_2')) : ?>
						<p class="statistic">
							<?php the_field('stat_2'); ?>
							<span class="description">
								<?php the_field('stat_2_description'); ?>
							</span>
						</p>
					<?php endif; ?>

					<?php if (get_field('stat_3')) : ?>
						<p class="statistic">
							<?php the_field('stat_3'); ?>
							<span class="description">
								<?php the_field('stat_3_description'); ?>
							</span>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
    <?php endif; ?>
</section>
<section id="section-slider" class="program-text">
	<div class="container">
		<?php if (get_field('slideshow')) {  ?>
			<div class="row" id="bxslider">
				<div class="col-md-10 col-md-offset-1">
					<?php get_template_part('partials/bxslider', 'slideshow'); ?>
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 post-content second">
				<?php if (have_posts()) :
					while (have_posts()) :
						the_post();
							$content = get_the_content();
							echo splitParagraphs($content, 2);
					endwhile;
				endif;
				?>
			</div>
		</div>
		<div class="row">
			<?php get_template_part('partials/social', 'share'); ?>
		</div>
	</div>
</section>
<section id="section-next">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1">
				<a class="btn-circle" href="<?php echo $post_permalink; ?>" style="background-image: url(<?php echo $img_color; ?>)">
					<div class="overlay">
						<div class="content">
							<p>Read More</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-5 col-md-6" id="up-next">
				<h5 class="header small">You might like...
				</h5>
				<a href="<?php echo $post_permalink; ?>" class="next-title"><?php echo $post_title; ?></a>
				<p><?php echo $post_content; ?></p>
				 <a href="<?php echo $post_permalink; ?>" class="btn btn-border primary">Read More</a>
			</div>
		</div>
	</div>
</section>
<section id="section-donate">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header smallest">With Your Help</h3>
				<h2 class="header medium">We can save lives
					<span class="subheader">
						Your donations make our work possible. Because of you, our work can continue.
					</span>
				</h2>
				<a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="btn btn-default primary">Donate</a>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/section-email', 'share'); ?>

<?php get_footer(); ?>