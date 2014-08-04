<?php
/*
Template Name: Home
*/

add_action('wp_enqueue_scripts', 'enqueueHomeScripts');
function enqueueHomeScripts()
{
    wp_enqueue_script('home', get_stylesheet_directory_uri() . '/js/home.js', array('jquery.videobackground', 'jquery.scrollTo', 'ic-email-form'), null, true);
    wp_enqueue_style('home', get_stylesheet_directory_uri() . '/css/home.css');
}

?>

<?php get_header(); ?>
<section id="section-home-heading" class="page-header">
	<div class="video-bg"></div>
	<div class="transparent-bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="header hero">End a War
					<span class="subheader">
						The Lord’s Resistance Army (LRA) is a brutal rebel group of abducted soldiers. Invisible Children exists to stop them and bring every captive home to their families.
					</span>
				</h1>
				<a class="btn primary btn-default green" href="<?php echo get_permalink(get_page_by_path('our-story')); ?>">Our Story</a>
			</div>
		</div>
	</div>
</section>
<section id="section-kony-intro">
	<div class="bg-img-wrap">
		<img src="<?php echo get_stylesheet_directory_uri()?>/images/home/kony-kid.png" alt="Joseph Kony & child soldier image"/>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="header medium separator">War is hell
                    <span class="subheader"></span>
				</h2>
				<p>
                    For nearly 30 years, a warlord named Joseph Kony has terrorized East and central Africa.
                    He has kidnapped over 30,000 children to strengthen his army, forcing the boys to become soldiers and the girls to become sex slaves.
                    Kony instructs the members of his LRA to abduct, threaten, destroy, and murder in the name of his spiritual powers.
                </p>
				<p>
                    In central Africa, there are currently hundreds of thousands of people displaced because of LRA violence, and many of those who remain
                    in their communities live in fear of the rebel group. Thousands of families have children missing from the decades of armed conflict,
                    unsure if their loved ones are dead or alive.
                </p>
				<a href="<?php echo get_permalink(get_page_by_path('conflict')); ?>" class="btn btn-border secondary">Learn More</a><br/>
				<a href="#" class="btn btn-continue-arrow">Continue</a>
			</div>
		</div>
	</div>
</section>
<section id="section-our-work" class="white clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="header medium">We’re pursuing peace
					<span class="subheader">
						We are ending the LRA conflict in the only way we know how: through innovative programs that protect communities in central Africa,
                        and lay the foundation for lasting peace in the post-conflict region.
					</span>
                </h2>
			</div>
		</div>
	</div>
    <?php get_template_part('partials/programs', 'slider'); ?>
</section>
<section id="section-get-involved" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="header medium separator">
                    We need you 
					<span class="subheader">
						We’re at the mercy of your time, talent, and money to end Joseph Kony’s war. Please say yes.
					</span>
				</h2>
			</div>
		</div>
        <div class="row">
            <div class="col-sm-4 action-item">
                <a class="btn-circle learn" href="<?php echo get_permalink(get_page_by_path('conflict')); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/home/learn.svg" alt="Learn about the LRA conflict"/>
					<div class="overlay">
                        <div class="content">
						    <h3 class="header smallest">Learn</h3>
						</div>
					</div>
                </a>
                <p>Read up on the LRA conflict & discover why our work is so crucial</p>
                <a href="<?php echo get_permalink(get_page_by_path('conflict')); ?>" class="btn btn-default primary">Learn</a>
            </div>
			<div class="col-sm-4 action-item">
				<a class="btn-circle give" href="<?php echo get_permalink(get_page_by_path('donate')); ?>">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/home/give.svg" alt="Donate to help rescue child soldiers"/>
					<div class="overlay">
						<div class="content">
							<h3 class="header smallest">Donate</h3>
						</div>
					</div>
				</a>
				<p>Our work is funded by our supporters & your donations literally save lives</p>
				<a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="btn btn-default primary">Donate</a>
			</div>
			<div class="col-sm-4 action-item">
				<a class="btn-circle advocate" href="<?php echo get_permalink(get_page_by_path('get-involved/fundraise')); ?>">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/home/advocate.svg" alt="Become an activist for change" />
					<div class="overlay">
						<div class="content">
							<h3 class="header smallest">Act</h3>
						</div>
					</div>
				</a>
				<p>See how you can help end LRA violence & become an activist for change</p>
				<a href="<?php echo get_permalink(get_page_by_path('get-involved/fundraise')); ?>" class="btn btn-default primary">Act</a>
			</div>
            <div class="col-sm-12">
				<a href="#" class="btn btn-continue-arrow">Continue</a>
            </div>
        </div>
	</div>
</section>
<section id="section-news">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="header medium">
                    <span class="intro">The Blog</span>
                    Updates &amp; Inspiration
                </h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <?php
                $recent_posts = wp_get_recent_posts(array('numberposts' => 10, 'post_status' => 'publish'));
                function printBlogPost($post, $classes, $styles)
                {
                    printf('<a href="%1$s"  class="%2$s" style="%3$s">
                            <span class="date">%4$s</span>
                            <span class="title">%5$s</span>
                        </a>',
                        get_permalink( $post["ID"] ),
                        $classes,
                        $styles,
                        date('F j, Y', strtotime($post['post_date'])),
                        $post['post_title']
                    );
                }
                ?>
				<div class="news-column left">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        $blogPost = $recent_posts[$i];
                        $classes = $i == 1 ? 'post with-bg-image' : 'post';
                        $thumbnailID = get_post_thumbnail_id( $blogPost["ID"] );
                        $thumbnailArray = wp_get_attachment_image_src( $thumbnailID, 'large' );
                        $styles = $i == 1 ? 'background-image: url(' . $thumbnailArray[0] . ')' : '';
                        printBlogPost($blogPost, $classes, $styles);
                    }?>
				</div>
				<div class="news-column middle">
                    <?php
                    for ($i = 3; $i < 7; $i++) {
                        $blogPost = $recent_posts[$i];
                        $classes = $i == 3 || $i == 5 ? 'post with-bg-image' : 'post';
                        $thumbnailID = get_post_thumbnail_id( $blogPost["ID"] );
                        $thumbnailArray = wp_get_attachment_image_src( $thumbnailID, 'large' );
                        $styles = $i == 3 || $i == 5 ? 'background-image: url(' . $thumbnailArray[0] . ')' : '';
                        printBlogPost($blogPost, $classes, $styles);
                    }?>
				</div>
				<div class="news-column right">
                    <?php
                    for ($i = 7; $i < 10; $i++) {
                        $blogPost = $recent_posts[$i];
                        $classes = $i == 8 ? 'post with-bg-image' : 'post';
                        $thumbnailID = get_post_thumbnail_id( $blogPost["ID"] );
                        $thumbnailArray = wp_get_attachment_image_src( $thumbnailID, 'large' );
                        $styles = $i == 8 ? 'background-image: url(' . $thumbnailArray[0] . ')' : '';
                        printBlogPost($blogPost, $classes, $styles);
                    }?>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-4">
				<a href="<?php echo get_permalink(get_page_by_path('blog')); ?>" class="btn btn-border quaternary btn-blog">See more on the blog</a>
			</div>
		</div>
	</div>
</section>
<section id="section-email-sign-up" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h2 class="header medium">Be the First to Know
                    <span class="subheader">
						Get exclusive updates on the conflict - and what we’re doing to stop it - straight to your inbox
                    </span>
                </h2>
			</div>
            <div class="col-md-8 col-md-offset-2">
                <?php get_template_part('partials/email', 'form'); ?>
            </div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php get_template_part('partials/social', 'share'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
