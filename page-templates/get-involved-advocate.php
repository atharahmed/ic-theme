<?php
/*
Template Name: Get Involved - Advocate
*/

add_action('wp_enqueue_scripts', 'enqueueGetInvolvedScripts');
function enqueueGetInvolvedScripts()
{
    wp_enqueue_style('get-involved', get_stylesheet_directory_uri() . '/css/get-involved-advocate.css');
    wp_enqueue_script('get-involved', get_stylesheet_directory_uri() . '/js/get-involved-advocate.js', null, null, true);
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
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/start-a-club')); ?>" class="btn btn-filter">Start a club</a>
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/advocate')); ?>" class="btn btn-filter selected">Advocate</a>
			</div>
		</div>
	</div>
</section>
<section id="section-intro">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="header medium separator">
					<span class="intro">Use your voice</span>
					IC Citizen
					<span class="subheader">
						We’ve seen that when we raise our voices collectively and relentlessly for justice, we can change the course of history. Become part of the story, and ask your leaders to take action to end the LRA conflict.
					</span>
				</h2>
				<a href="#" class="btn btn-default primary start-advocating">Advocate</a><br/>
				<!--<a href="http://vimeo.com/85977828" class="watch-video fancybox video">Watch video</a>-->
			</div>
		</div>
	</div>
</section>
<section id="section-numbers">
    <div class="top">
		<div class="container">
            <div class="col-md-12">
                <h6 class="header medium">
                    <span class="intro">What we’ve achieved</span>
                    By the Numbers
                </h6>
            </div>
		</div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/numbers-transition.svg"/>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12">
                    <div class="header-wrap bill clearfix">
                        <div class="icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-bill.svg" alt="Bills Invisible Children has signed into law"/>
                        </div>
                        <div class="text">
                            <p class="header small"><span class="number">2</span> Bills
							    <span class="subheader">Signed into law</span>
                            </p>
                        </div>
                    </div>
					<div class="body-wrap">
                        <p>
                            Our activists were key to success of The LRA Disarmament and Northern Uganda Recovery Act (2010), which was the most widely supported Africa-related piece of legislation on record in U.S. history, and the Rewards for Justice expansion legislation, passed in 2013.
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 col-sm-offset-2 col-xs-12">
					<div class="header-wrap partner">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-partner.svg" alt="Partners Invisible Children advocates with"/>
						</div>
						<div class="text">
							<p class="header small">Partners
								<span class="subheader">Best in the business</span>
							</p>
						</div>
					</div>
                    <div class="body-wrap">
                        <p>
                            We work closely with civil society partners in LRA-affected areas, as well as advocacy groups like The Resolve LRA Crisis Initiative and The Enough Project in Washington, DC. We continue to achieved much more together than we could alone.
                        </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5 col-xs-12">
					<div class="header-wrap lobby">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-congress.svg" alt="Invisible Children has facilitated lobby meetings to advocate on behalf of vulnerable communities"/>
						</div>
						<div class="text">
							<p class="header small"><span class="number">1077</span> Lobby
								<span class="subheader">Meetings facilitated</span>
							</p>
						</div>
					</div>
                    <div class="body-wrap">
                        <p>
                            Since 2008, thousands of young activists have meet in person with their representatives to tell them about the LRA conflict, and urge them to respond. This dedication has put the LRA on the agenda of world leaders like never before.
                        </p>
                    </div>
				</div>
				<div class="col-sm-5 col-sm-offset-2 col-xs-12">
					<div class="header-wrap activist">
						<div class="icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-activist.svg" alt="Signed pledge cards to advocate for protection of communities in central and East Africa"/>
						</div>
						<div class="text">
							<p class="header small"><span class="number">3.7</span> million
								<span class="subheader">Signed pledge cards</span>
							</p>
						</div>
					</div>
					<div class="body-wrap">
                        <p>
                            We’ve written letters, held meetings on Capitol Hill, marched, slept in the streets, as well as signing pledges - all to convince our government leaders to use their power to support peace and justice for vulnerable communities in central and East Africa.
                        </p>
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
					Sign up today
                    <span class="subheader">
                        Submit your email to become part of IC Citizen. You’ll get regular email updates, and the opportunity to take action to end the LRA conflict.
                    </span>
				</h3>
				<a href="mailto:citizen@invisiblechildren.com?subject=I'm interested in political advocacy" class="btn btn-default primary" id="email-us">Email Us</a>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>