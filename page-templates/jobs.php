<?php
/*
Template Name: Jobs
*/

add_action('wp_enqueue_scripts', 'enqueueJobsScripts');
function enqueueJobsScripts()
{
    wp_enqueue_script('jobs', get_stylesheet_directory_uri() . '/js/jobs.js', array('bxslider-init-js', 'ic-email-form', 'ic-section-our-team'), null, true);
    wp_enqueue_style('jobs', get_stylesheet_directory_uri() . '/css/jobs.css');
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
    <div class="bg-image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="header hero secondary">
					Jobs
                    <span class="subheader">
                        We’re biased but we think you’ll love it here
                    </span>
				</h1>
			</div>
		</div>
	</div>
</section>
<section id="section-filter" class="filter-bar">
	<div class="container">
		<div class="row" align="center">
			<a href="#intern" class="btn btn-filter selected">Internships</a>
			<a href="#roadie" class="btn btn-filter">Roadie Positions</a>
			<a href="#staff" class="btn btn-filter">Staff Positions</a>
		</div>
	</div>
</section>
<section id="section-positions">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="spin-container"></div>
				<div id="positions" align="center"></div>
			</div>
		</div>
	</div>
</section>
<section id="section-gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3 class="header medium">
					<span class="intro">We don’t do boring</span>
					No one does it like Invisible<span class="visible-lg-inline">&nbsp;</span><span class="hidden-lg"> </span>Children
				</h3>
				<div class="slider generic">
					<ul class="bxslider">
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-12.jpg" alt="Jobs image" title="The collaboration station" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-9.jpg" alt="Jobs image" title="Artist Relations" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-13.jpg" alt="Jobs image" title="Who needs walls when you have post its and sound cancelling headphones?" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-3.jpg" alt="Jobs image" title="Staff meetings AKA inspiration hour" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-10.jpg" alt="Jobs image" title="Our interns take their work very seriously" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-4.jpg" alt="Jobs image" title="Room with a view" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-1.jpg" alt="Jobs image" title="Offsite at the 2013 Fourth Estate Leadership Summit" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-5.jpg" alt="Jobs image" title="Genius at work (we have a lot of those)" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-8.jpg" alt="Jobs image" title="Our kind of board meeting" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-11.jpg" alt="International Programs" title="Helping to end a war...one white board at a time" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-6.jpg" alt="Jobs image" title="IC's own think tank, Jedidiah Jenkins" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-7.jpg" alt="Jobs image" title="Office nature walks" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-14.jpg" alt="Jobs image" title="Working hard in the warehouse" />
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/jobs/jobs-page-15.jpg" alt="Jobs image" title="From San Diego to the jungles of DRC and CAR....our defection fliers get around" />
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
<?php
$sectionOurTeamHeaderIntro = "Meet the best in the business";
$sectionOurTeamHeaderMain = "Get to know the team";
$sectionOurTeamSubheader = "Every member of our team brings something to the table (and by table, we mean the mission of stopping the LRA). From San Diego to DC to Kampala to Obo, meet the minds behind the movement and the power behind the programs.";
get_template_part('partials/section', 'our-team');
?>
<section id="section-values">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h5 class="header medium">
                    <span class="intro">It’s not just about what you do - it’s about who you are</span>
                    Words we work by
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul>
                    <li>
                        <p class="value">Jump first fear later</p>
                        <p class="description">You won't achieve what's never been done before without taking some risks along the way.</p>
                    </li>
                    <li>
                        <p class="value">You're more powerful than you think</p>
                        <p class="description">A person who stands up for the rights of others is powerful. An organization or generation full of these people? Unstoppable.</p>
                    </li>
                    <li>
                        <p class="value">Work for results, not for credit</p>
                        <p class="description">Be confident in your abilities and humble in your accomplishments.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="section-email-sign-up" class="white">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <h5 class="header medium">
                	<span class="intro">Didn’t see a position for you?</span>
                	Sign up for job alerts
                    <span class="subheader">
						Be the first to know that we’re looking to add to the team.
                    </span>
                </h5>
			</div>
            <div class="col-md-8 col-md-offset-2">
                <?php 
                	$list_id = '32344529';
                	get_template_part('partials/email', 'form'); 
                ?>
            </div>
		</div>
	</div>
</section>
<section id="section-sign-up">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header medium separator">
					<span class="intro">Want to volunteer?</span>
					Express your interest
                    <span class="subheader">
                        If you can't intern or work for us but are interested in being a local volunteer fill out this form and we’ll be in touch.
                    </span>
				</h3>
                <a href="https://docs.google.com/a/invisiblechildren.com/spreadsheet/viewform?fromEmail=true&formkey=dHRuclNycXhkWWY3M3BKaVQ2aUlqelE6MQ" class="btn btn-default primary" target="_blank">Fill out the form</a>
			</div>
		</div>
	</div>
</section>

<?php 
	$list_id = '30917256';
	get_template_part('partials/section-email', 'share'); 
?>

<?php get_footer(); ?>

