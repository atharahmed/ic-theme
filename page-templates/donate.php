<?php
/*
Template Name: Donate
*/

add_action('wp_enqueue_scripts', 'enqueueDonateScripts');
function enqueueDonateScripts()
{
    wp_enqueue_script('donate', get_stylesheet_directory_uri() . '/js/donate.js', array('auto-numeric'), null, true);
    wp_enqueue_style('donate', get_stylesheet_directory_uri() . '/css/donate.css');
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="donate-form" method="get" action="https://give.invisiblechildren.com/checkout/donation" target="_blank">
                    <h1 class="header medium">
                        Donate
                        <span class="subheader">Your donations help end a war</span>
                    </h1>
					<div class="form-group donation-input-group">
						<input id="donation-input" type="text" name="amount" class="form-control" placeholder="35.00" autocomplete="off"/>
					</div>
                    <div class="form-group frequency-btn-group">
                        <button type="submit" name="eid" value="10513" class="btn btn-default primary once" onClick="_gaq.push(['_trackEvent', 'Donate Button', 'click', 'Donate Once', this.form.amount.value]);">Once</button>
                        <button type="submit" name="eid" value="23394" class="btn btn-default primary monthly" onClick="_gaq.push(['_trackEvent', 'Donate Button', 'click', 'Donate Monthly', this.form.amount.value]);">Monthly</button>
                    </div>
                    <a href="#give-by-check" class="check-link fancybox check">Give by check</a>
                    <div id="give-by-check" class="donate-modal">
                        <p>Mail your checks to:</p>
                        <p>Invisible Children<br/>961 S. 16th St.<br/>San Diego, CA 92113</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="section-stories">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="header medium">
                    <span class="intro">Changing the ending one person at a time</span>
                    Transforming Lives
                    <span class="subheader">The work we’ve been able to do because of donations has transformed the lives of those affected by LRA violence. These stories show that you couldn’t make a better investment.</span>
                </h2>
            </div>
        </div>
        <div class="row stories">
			<div class="col-sm-4 story">
				<div class="circle-graphic">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/thomas-pic.jpg'; ?>" alt="Thomas image">
				</div>
				<p class="header smallest separator">
					Thomas
					<span class="subheader">Thomas wants to be a doctor when he grows up. As a student in Invisible Children's donor-funded scholarship program, he is well on his way to a white coat.</span>
				</p>
				<a href="#storyone" class="btn btn-border quaternary fancybox story" rel="gallery">Read More</a>
                <div id="storyone" class="donate-modal">
                    <div class="story-intro">
                        <div class="circle-graphic">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/thomas-pic.jpg'; ?>" alt="Thomas image">
                        </div>
                        <div class="abductee-info">
                            <h3 class="header smallest">
                                Thomas
                                <span class="subheader">Legacy Scholarship Recipient</span>
                            </h3>
                        </div>
                    </div>
                    <div class="story-body">
                        <p class="name">Thomas wants to be a doctor</p>
                        <p>Akena Thomas attends Pope Paul Secondary School, one of Invisible Children's partner schools in Uganda. He is first in his class of 177 students. With his dream of studying medicine, he says, "I should put much effort into some subjects like biology, chemistry, and physics." It's a good thing physics is his favorite subject.</p>
                        <p>Help kids like Thomas</p>
                        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
                    </div>
                </div>
			</div>
			<div class="col-sm-4 story">
				<div class="circle-graphic">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/agnes-pic.jpg'; ?>" alt="Agnes image">
				</div>
				<p class="header smallest separator">
					Agnes
					<span class="subheader">Before, Agnes had to walk a mile and a half each way to get water. Now, thanks to boreholes built through Invisible Children's WASH program, clean water is just a few minutes' walk down the road.</span>
				</p>
				<a href="#storytwo" class="btn btn-border quaternary fancybox story" rel="gallery">Read More</a>
                <div id="storytwo" class="donate-modal">
                    <div class="story-intro">
                        <div class="circle-graphic">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/agnes-pic.jpg'; ?>" alt="Agnes image">
                        </div>
                        <div class="abductee-info">
                            <h3 class="header smallest">
                                Agnes
                                <span class="subheader">Mother of two</span>
                            </h3>
                        </div>
                    </div>
                    <div class="story-body">
                        <p class="name">Agnes now has easy access to water</p>
                        <p>Akello Agnes is a busy mother of two. With the convenient new water source nearby, she has more time to spend in her garden planting food to feed her family. She also sells the produce she grows at the local market, and the money she makes goes towards paying her children's school fees.</p>
                        <p>Help families like Agnes'</p>
                        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
                    </div>
                </div>
			</div>
			<div class="col-sm-4 story">
				<div class="circle-graphic">
					<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/opondo-pic.jpg'; ?>" alt="Opondo image">
				</div>
				<p class="header smallest separator">
					Opondo
					<span class="subheader">When he was 10 years old, Opondo was abducted by the LRA. After 15 years in captivity, he escaped holding an Invisible Children "come home" flier which told him where and how to surrender.</span>
				</p>
				<a href="#storythree" class="btn btn-border quaternary fancybox story" rel="gallery">Read More</a>
                <div id="storythree" class="donate-modal">
                    <div class="story-intro">
                        <div class="circle-graphic">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/opondo-pic.jpg'; ?>" alt="Opondo image">
                        </div>
                        <div class="abductee-info">
                            <h5 class="header smallest">
                                Opondo
                                <span class="subheader">Former Abductee</span>
                            </h5>
                            <p>
                                <span class="bold-text">Adbucted:</span> June 1998
                            </p>
                            <p>
                                <span class="bold-text">Returned:</span> August 2013
                            </p>
                        </div>
                    </div>
                    <div class="story-body">
                        <p class="name">Opondo used to be a child soldier</p>
                        <p>In June 1998, LRA rebels kidnapped Opondo from his home. He was forced to kill innocent civilians and brainwashed into believing that he'd be killed if he tried to escape. Then, in August 2013, after finding a "come home" flier telling him how to escape, 25-year-old Opondo left the LRA for good. After several weeks at the Invisible Children-funded rehabilitation center in Uganda, he was reunited with his family.</p>
                        <p>Help former child soldiers like Opondo</p>
                        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
                    </div>
                </div>
			</div>
        </div>
    </div>
</section>
<section id="section-recurring-donors">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 images">
                <div class="photo-mosaic">
                    <div class="mosaic-row top clearfix">
                        <div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/photo-block/top-left.jpg'; ?>" alt="Invisible Children donor"/>
                        </div>
                        <div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/photo-block/top-right.jpg'; ?>" alt="Invisible Children donors"/>
                        </div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
                    </div>
					<div class="mosaic-row bottom clearfix">
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/photo-block/bottom-left.jpg'; ?>" alt="Invisible Children donor"/>
						</div>
						<div class="color-block">
							<img src="http://placehold.it/133x133"/>
						</div>
						<div class="photo">
							<img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/photo-block/bottom-right.jpg'; ?>" alt="Invisible Children donor"/>
						</div>
					</div>
                </div>
            </div>
			<div class="col-sm-6 text">
                <h3 class="header small">We <img src="<?php echo get_stylesheet_directory_uri() ?>/images/donate/heart.svg" alt="Love"/> our monthly donors</h3>
                <p>They’re the backbone of our funding, faithfully committing to give what they can every month to help end the LRA conflict. They making our life&#8209;changing work in East and central Africa possible.</p>
				<p>It’s easy to sign up and all donations are tax&#8209;deductible. Win&#8209;win.</p>
			</div>
        </div>
        <div class="row">
            <div class="col-md-12 cta">
                <h4 class="header smallest">Make our work possible</h4>
                <a href="https://give.invisiblechildren.com/checkout/donation?eid=23394" target="_blank" class="btn btn-default primary">Become a monthly donor</a>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>