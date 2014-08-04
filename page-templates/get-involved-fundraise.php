<?php
/*
Template Name: Get Involved - Fundraise
*/

add_action('wp_enqueue_scripts', 'enqueueGetInvolvedScripts');
function enqueueGetInvolvedScripts()
{
    wp_enqueue_style('get-involved-fundraise', get_stylesheet_directory_uri() . '/css/get-involved-fundraise.css');
    wp_enqueue_script('get-involved-fundraise', get_stylesheet_directory_uri() . '/js/get-involved-fundraise.js', array('bxslider-init-js'), null, true);
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
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/fundraise')); ?>" class="btn btn-filter selected">Fundraise</a>
				<a href="<?php echo get_permalink(get_page_by_path('/get-involved/start-a-club')); ?>" class="btn btn-filter">Start a club</a>
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
                    <span class="intro">It’s easier than you think</span>
                    Fundraising
					<span class="subheader">
						Your fundraising fuels the programs that are reducing LRA violence. You’re saving lives by helping us rescue child soldiers, protect vulnerable communities in central Africa, and rebuild what Kony destroyed in the post-conflict region.
					</span>
                </h2>
                <a href="#" class="btn btn-default primary start-fundraising">Start Fundraising</a><br/>
            </div>
        </div>
    </div>
</section>
<section id="section-fundraisers">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 images">
				<div class="photo-mosaic">
					<div class="mosaic-row top clearfix">
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/fundraise/photo-block/top-left.jpg'; ?>"/>
						</div>
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/fundraise/photo-block/top-right.jpg'; ?>"/>
						</div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
					</div>
					<div class="mosaic-row bottom clearfix">
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/fundraise/photo-block/bottom-left.jpg'; ?>"/>
						</div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/get-involved/fundraise/photo-block/bottom-right.jpg'; ?>"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 text">
				<h3 class="header small">We <img src="<?php echo get_stylesheet_directory_uri() ?>/images/donate/heart.svg" alt="love"/> our fundraisers</h3>
				<p>
					Our fundraisers do what it takes to get the job done. From bake sales to milk chugging competitions, they’re creative, tenacious, and occasionally inappropriate. You’ve collectively raised tens of millions of dollars and are the ones who can take credit for the expansion of our protection and recovery programs.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 cta">
				<h5 class="header smallest">Become part of our programs</h5>
				<a href="#" target="_blank" class="btn btn-default primary start-fundraising">Start Fundraising Now</a><br/>
                <a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="donate">Or Donate</a>
			</div>
		</div>
	</div>
</section>
<section id="section-support">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
				<h6 class="header medium separator">
					<span class="intro">Want Support?</span>
					We're Here For You
					<span class="subheader">
						Don’t be shy about getting in touch. If you have questions, need inspiration, or just want to chat about fundraising, then give us a call.
					</span>
				</h6>
                <p><span class="call-us-label">Call Us:</span> 619.562.2799 <small>EX.</small> 218</p>
            </div>
        </div>
        <?php get_template_part('partials/contact-us', 'photos'); ?>
    </div>
</section>
<section id="section-resources">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<h4 class="header medium separator">
					<span class="intro">Need Help?</span>
					We've Got You Covered
					<span class="subheader">
					</span>
				</h4>
            </div>
        </div>
        <div class="row filters">
            <div class="col-md-12">
                <a href="#" class="btn btn-filter selected" data-target="ideas">Ideas</a>
				<a href="#" class="btn btn-filter ideas" data-target="tips">Tips</a>
				<a href="#" class="btn btn-filter ideas" data-target="downloads">Downloads</a>
                <div class="separator"></div>
            </div>
        </div>
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
                            $ideas = array(
                                array(
                                    "title" => 'Write letters',
                                    "description" => 'Your friends and family care about what you care about. Write them a personal letter explaining why you’re fundraising. Ask them to donate and give them all the practical information they need to do so.',
                                    "image" => '/images/get-involved/fundraise/write-letter.jpg',
                                    "download" => 'Not sure what to say? Download this <a href="' . get_stylesheet_directory_uri() . '/pdfs/letter-to-family-and-friends.docx.zip' . '">sample letter</a>.'
                                ),
                                array(
                                    "title" => 'Get social',
                                    "description" => 'Announce your goal on social media, telling your peeps what you’re fundraising for and why. Keep people updated by mentioning it every couple of days, varying your posts with pictures, stories and thank yous. Publically thank people who’ve donated.',
                                    "image" => '/images/get-involved/fundraise/social-media.jpg'
                                ),
                                array(
                                    "title" => 'Friendly competition',
                                    "description" => 'Whether it’s dodgeball or a chili cook-off, pick something competitive, spread the word, and charge $5 for each person to come. You’ll be having fun and raising money for a good cause.',
                                    "image" => '/images/get-involved/fundraise/friendly-competition.jpg',
                                    "download" => 'Need some help? <a href="' . get_stylesheet_directory_uri() . '/pdfs/5k-how-to.pdf.zip' . '">Download our guide on how to host a 5k</a>.'
                                ),
                                array(
                                    "title" => 'Throw a party',
                                    "description" => 'Who doesn’t love a dance party? Get your friends involved, lock down a date, venue, and DJ by tapping into your networks. Sell tickets for $10-15.',
                                    "image" => '/images/get-involved/fundraise/dance-party.jpg',
                                    "download" => 'Worried about the details? <a href="' . get_stylesheet_directory_uri() . '/pdfs/dance_fundraiser_guide.pdf.zip' . '">Download our guide to throwing an epic dance party</a>.'
                                )
                            );
                        ?>

                        <?php foreach ($ideas as $idea) : ?>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1 col-xs-10 col-xs-offset-1">
                                        <img src="<?php echo get_stylesheet_directory_uri() . $idea['image']; ?>"/>
                                    </div>
                                    <div class="col-md-7 col-md-offset-0 col-xs-10 col-xs-offset-1">
                                        <p class="slide-counter">1 of 4</p>
                                        <p class="header smallest"><?php echo $idea['title']; ?></p>
                                        <div class="body">
                                            <p>
                                                <?php echo $idea['description']; ?>
                                            </p>
                                        </div>
                                        <?php if (isset($idea['download'])) : ?>
                                        <p class="footer">
                                            <?php echo $idea['download']; ?>
                                        </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="content-section tips">
					<div id="tip-1" class="tip">
						<span class="question">How do I raise money?</span>
						<div class="toggle-content">
                            <p class="answer">
                                <span class="bold-answer">Answer: </span>
                                It's been proven that people are more likely to donate when they see that somebody else has donated first. Ask a family member to get you started.
                            </p>
                            <p>     
                                Start raising money now. Do small fundraisers once a week at work or school and the money will add up.
                            </p>
                            <p>
                                The more personal your fundraising letters and social media posts are, the more effective they will be.
                            </p>
						</div>
						<span class="btn btn-continue-arrow"></span>
					</div>
				</div>
                </div>
                <div class="content-section downloads">
					<div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <?php
                            $downloads = array(
                                array(
                                    "image" => '/images/get-involved/fundraise/Intro_Kony-LRA.jpg',
                                    "name" => 'About Joseph Kony and the LRA',
                                    "description" => 'A quick fact sheet about Joseph Kony and the Lord\'s Resistance Army',
                                    "pdf" => '/pdfs/LRA_Kony_Intro.pdf.zip'
                                ),
                                array(
                                    "image" => '/images/get-involved/fundraise/Credibility.jpg',
                                    "name" => 'Cred Sheet',
                                    "description" => 'Proof that our efforts are working',
                                    "pdf" => '/pdfs/cred-sheet.pdf.zip'
                                ),
                                array(
                                    "image" => '/images/get-involved/fundraise/Fundraising_perks.jpg',
                                    "name" => 'The Impact of Giving',
                                    "description" => 'What does your fundraising achieve?',
                                    "pdf" => '/pdfs/impact-of-giving.pdf.zip'
                                ),
                                array(
                                    "image" => '/images/get-involved/fundraise/pink-flier.jpg',
                                    "name" => 'Pink Flier',
                                    "description" => 'Your own downloadable defection flier',
                                    "pdf" => '/pdfs/pink-flier.pdf.zip'
                                ),
                                array(
                                    "image" => '/images/get-involved/fundraise/yellow-flier.jpg',
                                    "name" => 'Yellow Flier',
                                    "description" => 'Your own downloadable defection flier',
                                    "pdf" => '/pdfs/yellow-flier.pdf.zip'
                                ),
                            );
                        ?>
                        <?php foreach ($downloads as $download) : ?>
                            <div class="download-item">
                                <div class="image">
                                    <div class="circle-graphic">
                                        <img src="<?php echo get_stylesheet_directory_uri() . $download['image']; ?>"/>
                                    </div>
                                </div><!--
                                --><div class="content">
                                    <p class="item-name"><?php echo $download['name']; ?></p>
                                    <p class="item-description"><?php echo $download['description']; ?></p>
                                    <a class="item-link" href="<?php echo get_stylesheet_directory_uri() . $download['pdf']; ?>"><span class="ic-icon-download-arrow"></span></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
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
					<span class="intro">With your help</span>
					We can end a war
                    <span class="subheader">
                        If you need anything else to start fundraising, send us an email.
                    </span>
				</h3>
				<a href="mailto:info@invisiblechildren.com?subject=I'm interested in fundraising" class="btn btn-default primary" id="email-us">Email Us</a>
			</div>
        </div>
    </div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>