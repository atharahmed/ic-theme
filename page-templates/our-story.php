<?php
/*
Template Name: Our Story
*/
add_action('wp_enqueue_scripts', 'enqueueOurStoryScripts');
function enqueueOurStoryScripts()
{
    wp_enqueue_style('our-story', get_stylesheet_directory_uri() . '/css/our-story.css');
    wp_enqueue_script('our-story', get_stylesheet_directory_uri() . '/js/our-story.js', array('vimeo-player-api', 'ic-section-our-team', 'video-init'), null, true);
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="values-circle">
					<h1 class="header">
						<span class="ethos">We believe in the</span>
						<span id="green-value">Equal & inherent</span>
						<span id="big-value">Value</span>
						of all human life
					</h1>
				</div>
				<a href="#" class="btn btn-continue-arrow">Continue</a>
			</div>
		</div>
	</div>
</section>
<section id="section-story">
	<div class="intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" id="content-column">
					<h5 class="header medium separator">
						<span class="intro dark">The beginning</span>
						A friendship became a responsibility
						<span class="subheader"></span>
					</h5>
					<p>In 2003, three young filmmakers named Jason, Bobby and Laren traveled to East Africa in search of a story. And they found much more than that. They discovered a war in Uganda that had been going on for 20 years where a brutal warlord named Joseph Kony and his rebel army, the Lord’s Resistance Army (LRA), were abducting children and forcing them to become soldiers.  </p>
					<p>They became friends with Jacob, a boy who had escaped the LRA. He was mourning the loss of his brother - who had been murdered by the group - and feared for his own life. They promised Jacob that they would do everything they could to stop Kony and end the war. So they made the first of many films that would spread the word about the war nobody knew about.</p>
					<a href="https://www.youtube.com/watch?v=2zNCJ8txFBY" class="btn btn-border quaternary fancybox video">Learn More</a>
				</div>
			</div>
		</div>
	</div>
	<div class="secondary-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					<h5 class="header medium separator">
						<span class="intro green">The conflict</span>
						We discovered the unseen
						<span class="subheader"></span>
					</h5>
					<p>Joseph Kony kidnaps children from their homes and makes them his soldiers. He forces many to murder their own families and commits brutal acts of mutilation to instil fear in local populations. He’s gotten away with it for almost three decades, abducting over 30,000 children, and is currently responsible for the displacement of hundreds of thousands of people in central Africa. </p>
					<p>In 2003, Jan Egeland (at the time, UN Under-Secretary-General for Humanitarian Affairs and Emergency Relief Coordinator) called the LRA conflict “the biggest forgotten, neglected humanitarian emergency in the world.” True that.</p>
					<a href="<?php echo get_permalink(get_page_by_path('conflict')); ?>" class="btn btn-border quaternary">Learn about the war</a>
				</div>
			</div>
		</div>
	</div>
	<div class="tertiary-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					<h4 class="header medium separator">
						<span class="intro dark">The mission</span>
						A responsibility became a movement
						<span class="subheader"></span>
					</h4>
					<p>We made film after film exposing the different faces of the LRA conflict and hit the road to share the films with everyone we could. This was the origin of our ‘Roadie’ model, where passionate young people would volunteer their time to travel across the U.S. screening our films and asking people to join in our crusade by lending their time, talent, and money. </p>
					<p>We had to go beyond telling the story and began doing what we could for the communities who had suffered at the hands of the LRA. We started the Legacy Scholarship Program where motivated students who had been affected by the war were given access to secondary education so they could fulfill their potential in the wake of destruction. We established Schools for Schools, where thousands of North American students fundraised to rebuild schools that Kony’s army had destroyed. While investing in these recovery programs, we realized we needed to up the ante and call on influential leaders because they held the power to end what had become Africa’s longest running armed conflict.</p>
					<a href="<?php echo get_permalink(get_page_by_path('our-work')); ?>" class="btn btn-border quaternary">Our work</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
	$iframeSrc = '//player.vimeo.com/video/61062998?color=c8ae73&amp;autoplay=1';
	$playerId = 'video-our-story';
	$videoHeader = 'What we\'ve accomplished';
	$videoIntro = 'Speaking out';
	$buttonText = 'Watch 7 min video';
	$thumbnailPathFromRoot = '/images/our-story/our-story-thumbnail.jpg';
	get_template_part('partials/section', 'video'); 
?>
<section id="section-numbers">
	<div class="container">
		<div class="row">
            <div class="col-md-12">
                <h4 class="header medium separator">
                    <span class="intro">We put on our political hats</span>
                    We became activists
                    <span class="subheader"></span>
                </h4>
            </div>
		</div>
        <div class="row">
            <div class="col-sm-5 col-xs-12">
                <div class="header-wrap bill">
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
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-partner.svg" alt="Partners Invisible Children has worked with"/>
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
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-congress.svg" alt="Invisible Children has facilitated 926 lobby meetings"/>
					</div>
					<div class="text">
						<p class="header small widowIgnore"><span class="number">1077</span> Lobby Meetings
							<span class="subheader">facilitated</span>
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
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/get-involved/advocate/icon-activist.svg" alt="Signed pledge cards to protect communities in central and East Africa" />
					</div>
					<div class="text">
						<p class="header small"><span class="number">3.7</span> million signed
							<span class="subheader">pledge cards</span>
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
</section>

<section id="section-kony-2012">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="header medium separator">
					<span class="intro">We went viral</span>
					And set the world on fire
					<span class="subheader"></span>
				</h4>
				<h2 class="header hero">
                   	Kony <span class="ic-icon-libertytriangle"></span> 2012
                </h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>The KONY 2012 campaign started as an experiment. Could an online video make an obscure war criminal famous? And if he was famous, would the world work together to stop him? The experiment yielded the fastest growing viral video of all time. The KONY 2012 film reached 100 million views in 6 days, and 3.7 million people pledged their support for efforts to arrest Joseph Kony.</p>
				<a href="<?php echo get_permalink(get_page_by_path('kony-2012')); ?>" class="btn btn-border secondary">Learn More</a>
			</div>
		</div>
	</div>
</section>

<section id="section-programs">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="header medium separator">
					<span class="intro">Protecting communities</span>
					We developed life-saving programs
					<span class="subheader">
                        Our recovery programs flourished in the post-conflict region, and in 2011, the LRA experts on our team started working on protection initiatives. We went to the front lines of the war to implement innovative programs that would prevent LRA attacks, protect vulnerable communities, and dismantle the LRA from within.
					</span>
				</h2>
			</div>
		</div>
	</div>
    <?php get_template_part('partials/programs', 'slider'); ?>
</section>
<?php
$sectionOurTeamHeaderIntro = "Our team";
$sectionOurTeamHeaderMain = "It’s more than a job";
$sectionOurTeamSubheader = "The members of our team are diverse but united by the mission of stopping the LRA. From San Diego to DC to Kampala to Obo, meet the minds behind the movement and the power behind the programs.";
get_template_part('partials/section', 'our-team');
get_template_part('partials/section-email', 'share'); ?>


<?php get_footer(); ?>