<?php
/*
Template Name: Kony 2012
*/

add_action('wp_enqueue_scripts', 'enqueueConflictDetScripts');

function enqueueConflictDetScripts()
{
	wp_enqueue_style('kony-2012', get_stylesheet_directory_uri() . '/css/kony-2012.css', array());
	wp_enqueue_script('kony-2012', get_stylesheet_directory_uri() . '/js/kony-2012.js', array('vimeo-player-api', 'ic-email-form', 'd3-js', 'video-init'), null, true);
}

?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="container">
        <div class="row">
			<div class="col-md-12">
                <h1 class="header hero">
                   	Kony <span class="ic-icon-libertytriangle"></span> 2012
                    <span class="subheader">
                        Invisible Children
                    </span>
                </h1>
                <a href="#" id="watch-kony-2012" class="btn btn-border quaternary">Watch the film</a>
            </div>
        </div>
    </div>
</section>
<section id="section-kony-2012">
	<div id="donkey-dove">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kony-2012/donkey-dove.svg" alt="KONY 2012 logo">
	</div>
	<div class="explanation">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h4 class="header medium separator">
						<span class="intro">The campaign</span>
						An experiment
						<span class="subheader"></span>
					</h4>
					<p>The KONY 2012 campaign started as an experiment. Could an online video make an obscure war criminal famous? And if he was famous, would the world work together to stop him?</p>
					<p>The experiment yielded the fastest growing viral video of all time. The KONY 2012 film reached 100 million views in 6 days, and 3.7 million people pledged their support for efforts to arrest Joseph Kony.</p>
					<p>It proved our theory that if people only knew what Kony had been getting away with, they would be as outraged as we were. But knowing is only half the battle - Joseph Kony is still out there.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	$iframeSrc = '//player.vimeo.com/video/37119711?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=1';
	$playerId = 'video-kony';
	$videoHeader = 'Watch KONY 2012';
	$buttonText = 'Watch 29 min video';
	$videoIntro = 'The film';
	$thumbnailPathFromRoot = '/images/kony-2012/joseph-kony-thumbnail.jpg';
	get_template_part('partials/section', 'video');
?>
<section id="section-goals">
	<div class="kony-goals">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h5 class="header medium separator">
						<span class="intro">The goal</span>
						Make Him Famous
						<span class="bold-red"></span>
					</h5>
				</div>
			</div>
			<div class="row">
                <div class="col-sm-5 col-xs-12">
                    <div class="header-wrap kony-captured">
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kony-2012/icon-joseph-kony-capture.svg" alt="Our goal: see Joseph Kony captured"/>
                        </div>
                        <div class="text">
                            <p class="header small widowIgnore">Kony
							    <span class="bold-red">Captured</span>
                            </p>
                        </div>
                    </div>
					<div class="body-wrap">
                        <p>Bring awareness to Kony’s human rights abuses and bring him to justice.</p>
                    </div>
                </div>
				<div class="col-sm-5 col-sm-offset-2 col-xs-12">
					<div class="header-wrap">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kony-2012/icon-protection.svg" alt="Our goal: protect communities in central Africa from Kony"/>
						</div>
						<div class="text">
							<p class="header small widowIgnore">Communities
								<span class="bold-red">Protected</span>
							</p>
						</div>
					</div>
                    <div class="body-wrap">
                        <p>Significantly expand programs that counteract LRA violence and protect communities in central Africa.</p>
                    </div>
				</div>
            </div>
			<div class="row">
				<div class="col-sm-5 col-xs-12">
					<div class="header-wrap global-support">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kony-2012/icon-support.svg" alt="Increasing international support to stopping Joseph Kony"/>
						</div>
						<div class="text">
							<p class="header small widowIgnore">International
								<span class="bold-red">Support</span>
							</p>
						</div>
					</div>
					<div class="body-wrap">
                        <p>Have leaders from across the globe renew their commitments to stopping Joseph Kony and his LRA.</p>
                    </div>
				</div>
				<div class="col-sm-5 col-sm-offset-2 col-xs-12">
					<div class="header-wrap partner">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kony-2012/icon-kony-famous.svg" alt="Our goal: attract global attention to Kony" />
						</div>
						<div class="text">
							<p class="header small widowIgnore">Global
								<span class="bold-red">Attention</span>
							</p>
						</div>
					</div>
                    <div class="body-wrap">
                        <p>Make Joseph Kony a household name, and get as many people as possible to pledge their support for efforts to stop LRA violence.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="our-results">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h5 class="header medium separator">
						<span class="intro">The results</span>
						Unprecedented Awareness
						<span class="subheader"></span>
					</h5>
					<p>As a result of KONY 2012, millions of people learned about Joseph Kony and the LRA. International leaders and young people alike committed to doing anything they could to end the war.</p>
                	<p>We hosted a Global Summit on the LRA which brought international leaders and experts together to renew their support to end the LRA conflict. Thousands rallied in Washington, DC as a sign of solidarity on the issue. The U.S. advisors extended their deployment to assist the African Union in the counter-LRA mission. Funding for our programs allowed us to expand in ways we never thought possible.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-financials">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-lg-offset-1 col-md-5">
				<h3 class="header small separator">
					<span class="intro">Donations</span>
					Where did the money go?
					<span class="subheader"></span>
				</h3>
				<p>During our KONY 2012 campaign, we experienced a dramatic spike in funding that allowed us to significantly expand our protection and recovery programs in East and central Africa. We were committed to honoring the donors who gave in response to the campaign, and poured the funding straight into our programs: the Early Warning Network now protects 76 vulnerable communities, 1.4 million defection fliers have been distributed.</p>
				<p>The legacy of these donations stands alone as an epic victory toward impacting the lives of those affected by the LRA conflict.</p>
				<a href="http://files.invisiblechildren.com/annualreport2012/index.html" class="btn btn-border quaternary" target="_blank">View annual report</a>
			</div>
			<div class="col-lg-5 col-md-6">
				<div id="financial-chart">
					<div id="mobile-text">
						<p class="label">TOTAL EXPENSE</p>
						<p class="total">Waiting...</p>
						<p class="label" id="updateyear">million</p>
					</div>
					<div id="financial-pie-chart"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-programs">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4 class="header medium separator">
					<span class="intro">Expanding our work</span>
					Leaps and bounds
					<span class="subheader">
                        With increased funding, we dramatically extended the reach of innovative programs that aid in our entire comprehensive approach to ending the LRA conflict. 
					</span>
				</h4>
			</div>
		</div>
	</div>
    <?php get_template_part('partials/programs', 'slider'); ?>
</section>
<section id="section-donate-ask">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h5 class="header medium separator">
					<span class="intro">Donate</span>
					We'd be nothing without you
					<span class="subheader">
						For 10 years, your donations have made our work possible. Don’t give up on us now. 
					</span>
				</h5>
				<a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="btn btn-default primary">Donate Now</a>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('partials/section-email', 'share'); ?>


<?php get_footer(); ?>