<?php
/*
Template Name: Conflict - Overview
*/

add_action('wp_enqueue_scripts', 'enqueueConflictOverviewScripts');
function enqueueConflictOverviewScripts()
{
    wp_enqueue_script('conflict-overview', get_stylesheet_directory_uri() . '/js/conflict-overview.js', array('ic-email-form', 'bxslider-init-js', 'vimeo-player-api', 'video-init'), null, true);
    wp_enqueue_style('conflict-overview', get_stylesheet_directory_uri() . '/css/conflict-overview.css');
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h1 class="header hero">
                    War Is Hell
                    <span class="subheader">
                        For almost three decades, Joseph Kony and his rebel army have gotten away with murder. 
                    </span>
                </h1>
				<a href="#" class="btn btn-continue-arrow">Continue</a>
            </div>
        </div>
    </div>
</section>
<section id="section-intro">
    <div class="introduction">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
					<h2 class="header medium separator">
						Wreaking Havoc Since 1986
                        <span class="subheader">
                            Joseph Kony is the self-appointed ‘messiah’ of the Lord’s Resistance Army (LRA) and oversees the rebel group responsible for Africa’s longest running armed conflict. After spending 20 years in Uganda, the LRA now operate in small, mobile groups across central Africa. They’re sneaky and dangerous and their priority is self-preservation. 
                        </span>
					</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$playerId = 'details-video';
$buttonText = 'Watch video';
$thumbnailPathFromRoot = '/images/conflict-overview/conflict-details/kony-thumbnail.jpg';
$videoIntro = 'The Conflict';
$videoHeader = 'A Brief Overview';
$iframeSrc = '//player.vimeo.com/video/28628155?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1';
get_template_part('partials/section', 'video');
?>
<section id="section-players">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="header medium">
                    <span class="subheader">
                        The LRA conflict is as complex as it is devastating.
                    </span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 player">
                <a class="btn-circle" href="<?php echo get_permalink(get_page_by_path('conflict/history')); ?>">
                    <div class="delayed-image-load" data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/history{pixel_ratio}.jpg" data-alt="alternative text"></div>
                    <div class="overlay">
                        <div class="content">
                            <p class="first-line">Learn about</p>
                            <p class="second-line">the history</p>
                        </div>
                    </div>
                </a>
                <p class="header smallest">The History
                    <span class="subheader">An account of Africa’s longest running armed conflict</span>
                </p>
                <a class="btn btn-default secondary" href="<?php echo get_permalink(get_page_by_path('conflict/history')); ?>">Learn More</a>
            </div>
            <div class="col-sm-4 player">
                <a class="btn-circle" href="<?php echo get_permalink(get_page_by_path('conflict/the-lra')); ?>">
                    <img class="delayed-image-load" data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/rebel{pixel_ratio}.jpg" data-alt="alternative text">/>
                    <div class="overlay">
                        <div class="content">
                            <p class="first-line">Learn about</p>
                            <p class="second-line">the LRA</p>
                        </div>
                    </div>
                </a>
                <p class="header smallest">The Rebel Army
                    <span class="subheader">How it was formed & why it still exists</span>
                </p>
                <a class="btn btn-default secondary" href="<?php echo get_permalink(get_page_by_path('conflict/the-lra')); ?>">Learn More</a>
            </div>
            <div class="col-sm-4 player">
                <a class="btn-circle" href="<?php echo get_permalink(get_page_by_path('conflict/kony')); ?>">
                    <img class="delayed-image-load" data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/kony{pixel_ratio}.jpg" data-alt="alternative text"/>
                    <div class="overlay">
                        <div class="content">
                            <p class="first-line">Learn about</p>
                            <p class="second-line">Kony</p>
                        </div>
                    </div>
                </a>
                <p class="header smallest">The Warlord
                    <span class="subheader">Ugandan rebel army leader Joseph Kony</span>
                </p>
                <a class="btn btn-default secondary" href="<?php echo get_permalink(get_page_by_path('conflict/kony')); ?>">Learn More</a>
            </div>
        </div>
    </div>
</section>
<section id="section-statistics">
    <div class="dark-overlay"></div>
    <div class="container">
        <div class="row overview">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="header medium separator">
                    <span class="intro">The Conflict</span>
                    We will not ignore this war
                    <span class="subheader">
                        We believe that where you live shouldn’t determine whether you live, and we refuse to give the LRA the power to decide. There are several key things that need to happen in order to achieve the end of their reign. 
                    </span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
				<div class="icon attacks">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/attacks-icon.svg"/>
				</div>
                <p class="stats widowIgnore">1,634
                    <span class="label">Attacks</span>
                </p>
            </div>
            <div class="col-sm-4">
				<div class="icon abductions">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/abductions-icon.svg"/>
				</div>
                <p class="stats widowIgnore">4,812
                    <span class="label">Abductions</span>
                </p>
            </div>
            <div class="col-sm-4">
				<div class="icon killings">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/killings-icon.svg"/>
				</div>
                <p class="stats widowIgnore">2,328
                    <span class="label">Killings</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a class="crisis-tracker-logo" href="http://lracrisistracker.org" target="_blank">
                    <span class="attribution">Stats provided by the:</span>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="section-summary">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="header medium separator">
                        <span class="intro">We can stop this</span>
                        What needs to happen?
                    </h3>
                </div>
            </div>
        </div>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/conflict-overview/stats-transition.svg"/>
	</div>
    <div class="bottom">
        <div class="container">
            <div class="row content">
                <div class="col-md-10 col-md-offset-1">
                    <div class="content-section ideas">
                        <div class="slider">
                            <div class="outside-controls">
                                <div id="slider-prev"></div>
                                <div id="slider-next"></div>
                            </div>
                            <ul class="bxslider">
                                <?php
                                    $slides = array(
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_1.jpg',
                                            "title" => 'Help LRA members peacefully surrender',
                                            "content" => 'Many members of the LRA want to come home, but are afraid to escape because they fear punishment from the LRA, and are uncertain about what awaits them upon their return. We counter these fears through “come home” messaging -  radio and helicopter broadcasts, as well as fliers - giving abducted soldiers the motivation and information they need to escape. We also work with local communities through our <a href="' . home_url() . '/program/safe-reporting-sites' . '">“Community Defection Committee” program,</a> so that they can be central participants in the effort to encourage and facilitate the safe defections.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_2.jpg',
                                            "title" => 'Support LRA captives as they return home',
                                            "content" => 'The existing mechanisms for returning former LRA combatants home lack coordination and sufficient resources, resulting in lengthy bureaucratic delays. LRA returnees are often reunited with their communities months later without proper counseling and treatment, leaving the individuals with high levels of trauma and making reintegration very difficult. <a href="' . home_url() . '/program/rehabilitation-project' . '">Rehabilitation and reintegration</a> support needs to be a priority throughout the LRA affected region.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_3.jpg',
                                            "title" => 'Protect communities with early-warning systems',
                                            "content" => 'Many communities targeted by LRA violence do not have the ability to report attacks to security forces or humanitarian groups who can provide life-saving services. By equipping these communities with a <a href="' . home_url() . '/program/early-warning-network' . '">basic communication infrastructure</a>, they would be able to report LRA attacks to other communities, receive warning when LRA groups are active nearby, and alert security and humanitarian groups.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_4.jpg',
                                            "title" => 'Increase military protection of civilians',
                                            "content" => 'The LRA traditionally targets vulnerable communities located in remote areas and without military protection. Additionally, in the past, when the LRA has been pursued by security forces, they have perpetrated significant reprisal attacks against defenseless communities. Regional militaries and UN peacekeepers in regions such as Bas Uele, DR Congo, and the Mbomou and Haut-Kotto prefectures in CAR must coordinate with one another and prioritize effective community protection mechanisms to help prevent LRA violence.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_5.jpg',
                                            "title" => 'Remove LRA safe havens',
                                            "content" => 'Reports continue to indicate that Kony is moving between very remote, hard-to-access areas of northeastern CAR and Kafia Kingi, a Sudanese controlled ‘enclave’ bordering South Sudan and the Central African Republic. It is extremely difficult for regional forces to reach northeastern CAR to act of timely intelligence of Kony, and President al-Bashir of Sudan has not taken any steps to ensure that Kony cannot enjoy safe haven in Kafia Kingi. Additionally, LRA groups have continued to move further west and north in CAR, committing large-scale attacks and abductions while being out of reach of African Union forces.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_6.jpg',
                                            "title" => 'Fund regional counter LRA efforts',
                                            "content" => 'In March 2012, the African Union, with the support of the UN, announced the launch of its RCI-LRA, focused on strengthening the capacities of LRA-affected countries to protect their citizens from attack, arrest top LRA leadership and dismantle the LRA ranks, and deliver humanitarian assistance to communities in need of support. However, the ability of the RCI-LRA to deliver on its goals depends on financial support from the international community.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_7.jpg',
                                            "title" => 'Strengthen regional cooperation',
                                            "content" => 'To end LRA atrocities, the regional governments of Uganda, Central African Republic, South Sudan, Sudan and DR Congo, as well as international peacekeeping forces operating in LRA-affected areas, need to work together. The LRA has been active in the border regions of these nations since 2006. Because the LRA is moving throughout several countries, it is important that regional forces pursuing the LRA and international peacekeepers helping to stabilize the region are able to track LRA groups across borders.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_8.jpg',
                                            "title" => 'Set  U.S. advisors up for success',
                                            "content" => 'Since their deployment in October of 2011, U.S. military advisors have significantly contributed to the progress of regional counter-LRA efforts through creative defection programs, intelligence gathering and analysis, and cross-border information sharing. Still, the work of the advisors has been consistently hamstrung due to things like a lack of sufficient mobility assets and uncertainty about their duration of their mission.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_9.jpg',
                                            "title" => 'Promote justice and reconciliation in Uganda',
                                            "content" => 'Long before the LRA conflict started, there was tension between various ethnic and political groups in Uganda. The dynamics of the LRA rebellion -- including the way that the Ugandan government responded -- both capitalized on and exacerbated these tensions. While the LRA is no longer active in northern Uganda, the peace and reconciliation conversations need to continue and be built upon to sustain the relative peace that Uganda knows today.'
                                        ),
                                        array(
                                            "image" => '/images/conflict-overview/Resolution_10.jpg',
                                            "title" => 'Recovery support for LRA-affected communities',
                                            "content" => 'Northern Uganda faced a severe humanitarian crisis for more than 20 years. The LRA conflict disrupted the livelihood, social structures, and education of a generation. <a href="' . home_url() . '/program/legacy-scholarship-program' . '">Access to quality education</a> and <a href="' . home_url() . '/program/vsla' . '">economic opportunity</a> has the potential to aid in the transition to sustainable peace and development as well as reduce the probability of a similar conflict igniting in the future. Similarly, the international community must commit to supporting the recovery needs of LRA-affected communities in South Sudan, DRC, and CAR.'
                                        )
                                    );

                                    foreach ($slides as $slide) :
                                ?>
    								<li>
    									<div class="row">
    										<div class="col-lg-3 col-lg-offset-1 col-xs-12">
                                                <div class="circle-graphic">
    											    <img src="<?php echo get_stylesheet_directory_uri() . $slide['image']; ?>"/>
    											</div>
    										</div>
    										<div class="col-lg-7 col-lg-offset-0 col-xs-12">
    											<p class="slide-counter">1 of 4</p>
    											<p class="header smallest widowIgnore">
                                                    <?php echo $slide['title']; ?>
    											</p>
    											<div class="body">
    												<p>
    													<?php echo $slide['content']; ?>
    												</p>
    											</div>
    										</div>
    									</div>
    								</li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-our-work">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="header medium">We’re pursuing peace
					<span class="subheader">
                        Our programs protect communities in central Africa and provide a foundation for lasting peace in the post-conflict region.
					</span>
				</h2>
			</div>
		</div>
	</div>
    <?php get_template_part('partials/programs', 'slider'); ?>
</section>
<section id="section-get-involved">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h5 class="header medium">
                    We’re nothing without you
                    <span class="subheader">
                        We’ve never been closer to ending the war, but we can’t do it without your help. (Literally. No chance.) 
                    </span>
                </h5>
                <a href="<?php echo get_permalink(get_page_by_path('get-involved/fundraise')); ?>" class="btn btn-border primary">Get involved</a>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('partials/section-email', 'share'); ?>

<?php get_footer(); ?>