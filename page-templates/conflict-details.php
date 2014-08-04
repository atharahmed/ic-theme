<?php
/*
Template Name: Conflict - Detail Page
*/

add_action('wp_enqueue_scripts', 'enqueueConflictDetScripts');

function enqueueConflictDetScripts() 
{
	$deps = array();
	if (get_field('slideshow')) {
		array_push($deps, 'bxslider-init-js');
	}
	wp_enqueue_style('conflict-details', get_stylesheet_directory_uri() . '/css/conflict-details.css', array());
	wp_enqueue_script('conflict-details', get_stylesheet_directory_uri() . '/js/conflict-details.js', $deps, null, true);
}


// Get list of conflict detail pages
$conflictDetailPages = get_pages(array(
    'child_of' => 33826,
    'sort_column' => 'menu_order',
    'sort_order' => 'asc'
));

// determine the first and last page indexes
$firstPage = 0;
$lastPage = count($conflictDetailPages) - 1;

// figure out index of current page
$currentPage;
foreach ($conflictDetailPages as $index => $page) {
    if ($page->post_name == $post->post_name) {
        $currentPage = $index;
    }
}

// Get next conflict detail page
switch ($currentPage) {
	case $lastPage:
		$nextID = $conflictDetailPages[0]->ID;
		break;
	default:
		$nextID = $conflictDetailPages[$currentPage+1]->ID;
		break;
}

?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
    <?php $headerImage = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), '', false, '' ); ?>
	<div class="bg-image" style="background-image: url(<?php echo $headerImage[0]; ?>)"></div>
	<div class="header-content">
	    <div class="container">
	        <div class="row">
				<div class="col-md-10 col-md-offset-1">
	                <h1 class="header hero secondary">
	                    <?php the_title(); ?>
	                    <span class="subheader">
	                        <?php the_field('subheading'); ?>
	                    </span>
	                </h1>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="filter-section filter-bar">
	    <div class="container">
	        <div class="row">
		        <div class="col-md-12">
		        	<?php
						// Html for button navigation
						foreach($conflictDetailPages as $page) {
                            $permalink = get_permalink($page);
                            $classes = "btn btn-filter red";
							$title = '';

                            // determine button title
                            switch($page->post_name) {
                                case 'history':
                                    $title = 'History';
                                    break;
                                case 'the-lra':
                                    $title = 'The LRA';
                                    break;
                                case 'kony':
                                    $title = 'Kony';
                                    break;
                            }

                            // determine if button is associated with current page
							if ($post->post_name == $page->post_name) {
                                $classes .= ' selected';
                            }

                            // print
                            $buttonTemplate = '<a href="%1$s" class="%2$s">%3$s</a>';
							printf($buttonTemplate, $permalink, $classes, $title);
						}
		        	?>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<section id="section-synopsis">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="header medium separator">
					<span class="intro">
						<?php the_field('overview_intro'); ?>
					</span>
					<?php the_field('overview_header'); ?>
					<span class="subheader">
						<?php the_field('overview'); ?>
					</span>
				</h1>
			</div>
		</div>
	</div>
</section>
<?php if (get_field('slideshow')) : ?>
<section id="section-slideshow">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php get_template_part('partials/bxslider', 'slideshow'); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section id="section-da-beef">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h5 class="header medium separator">
					<?php the_field('content_heading'); ?>
					<span class="subheader"></span>
				</h5>
			</div>
		</div>
		<div class="row text-section">
			<div class="col-md-8 col-md-offset-2">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php get_template_part('partials/social', 'share'); ?>
			</div>
		</div>
	</div>
</section>
<?php
global $post;
$nextPost = get_post($nextID);
$post = $nextPost;
setup_postdata($post);
?>
<section id="section-next">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-2 col-md-4 col-md-offset-1">
				<a href="<?php the_permalink(); ?>" class="btn-circle" style="background-image: url(<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($nextID), '', false, '' ); echo $src[0]; ?>)">
					<div class="overlay">
						<div class="content">
							<p>Read More</p>
						</div>
                    </div>
				</a>
			</div>
			<div class="col-lg-5 col-md-6" id="up-next">
				<h6 class="header small">Up Next</h6>
				<a href="<?php the_permalink(); ?>" class="next-title"><?php the_title(); ?></a>
				<p><?php $overview = get_field('overview', $nextID); echo wp_trim_words($overview, 30, '...'); ?></p>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn btn-border primary">Read More</a>
			</div>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>
<section id="section-programs">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header medium">We're changing the course of history
					<span class="subheader">
						We’re seeking an end to this war once and for all. Our programs protect communities in central Africa and promote recovery in the post-conflict region.
					</span>
				</h3>
				<a href="<?php echo get_permalink(get_page_by_path('our-work')); ?>" class="btn btn-default primary">View Our Work</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>