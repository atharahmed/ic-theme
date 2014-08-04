<?php
/*
Template Name: Get Involved - Start A Club
*/

add_action('wp_enqueue_scripts', 'enqueueGetInvolvedScripts');
function enqueueGetInvolvedScripts()
{
    wp_enqueue_style('get-involved-club', get_stylesheet_directory_uri() . '/css/get-involved-club.css');
    wp_enqueue_script('get-involved-club', get_stylesheet_directory_uri() . '/js/get-involved-club.js', array('bxslider-init-js'), null, true);
}

?>

<?php get_header(); ?>

<div id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header hero">Get Involved
                    <span class="subheader">
                        Use your voice, your time, your talent, or your wallet. Beggars can’t be choosers.
                    </span>
				</h1>
			</div>
		</div>
	</div>
</div>
<section id="section-filter" class="filter-bar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/fundraise')); ?>" class="btn btn-filter">Fundraise</a>
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/start-a-club')); ?>" class="btn btn-filter selected">Start a club</a>
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/advocate')); ?>" class="btn btn-filter">Advocate</a>
			</div>
		</div>
	</div>
</section>
<section id="section-intro">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="header medium separator">
					<span class="intro">Give your time</span>
					Start a club
					<span class="subheader">
						One of the best ways to take action is to host a screening of our media or start a club at your college, school, workplace, or place of worship.
					</span>
				</h2>
				<a href="#" class="btn btn-default primary start-a-club">Start a club</a><br/>
			</div>
		</div>
	</div>
</section>
<section id="section-volunteers">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 images">
				<div class="photo-mosaic">
					<div class="mosaic-row top clearfix">
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/start-a-club/photo-block/top-left.jpg'; ?>"/>
						</div>
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/start-a-club/photo-block/top-right.jpg'; ?>"/>
						</div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
					</div>
					<div class="mosaic-row bottom clearfix">
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/start-a-club/photo-block/bottom-left.jpg'; ?>"/>
						</div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/start-a-club/photo-block/bottom-right.jpg'; ?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 text">
				<h3 class="header small">We <img src="<?php echo get_stylesheet_directory_uri() ?>/images/donate/heart.svg" alt="Love"/> our club members</h3>
				<p>
					Invisible Children Clubs are a great way to engage people in the mission to end the LRA conflict, as well as meet like-minded people who share your passion for justice. Clubs host screenings, spread awareness, fundraise, and participate in the advocacy efforts that are reducing LRA violence. 
				</p>
				<p>
					Why not start one at your college, school, or workplace? These clubs need fearless leaders willing to do the legwork to gather people and get them inspired to be part of our mission.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 cta">
				<h6 class="header smallest">Join our Facebook group</h6>
				<a href="https://www.facebook.com/invisiblechildren.clubs" target="_blank" class="btn btn-default primary start-volunteering">Official IC Club Group</a><br/>
				<a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="donate">Or Donate</a>
			</div>
		</div>
	</div>
</section>
<section id="section-culture">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
				<h3 class="header medium">
					<span class="intro">It's all thanks to you</span>
					Our clubs make the difference
				</h3>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div class="slider generic">
					<ul class="bxslider">
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-3.jpg" alt="Get involved image" title="" alt="Bake sale for Invisible Children" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-4.jpg" alt="Get involved image" title="" alt="Activists using their voices to end the LRA conflict" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-5.jpg" alt="Get involved image" title="" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-6.jpg" alt="Get involved image" title="" alt="Our international Invisible Children activists" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-1.jpg" alt="Get involved image" title="" alt="Invisible Children club painting mural" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-7.jpg" alt="Get involved image" title="" alt="Invisible Children club making a difference locally" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/start-a-club/start-club-8.jpg" alt="Get involved image" title="" />
						</li>
					</ul>
					<div class="outside-controls">
						<div id="slider-prev"></div> 
						<div id="slider-next"></div>
					</div>
					<div class="caption">
						<p class="slide-counter"></p>
						<p class="picture-caption"></p>
					</div>
				</div>
            </div>
		</div>
	</div>
</section>
<section id="section-sign-up">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header medium separator">
					<span class="intro">Interested?</span>
					Express your interest
                    <span class="subheader">
                        Drop us an email to tell us if you’re interested in being part of a club or a club leader and we’ll be in touch.
                    </span>
				</h3>
                <a href="mailto:clubs@invisiblechildren.com?subject=I'm interested in starting a club" class="btn btn-default primary" id="email-us">Email Us</a>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>