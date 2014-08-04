<?php
/*
Template Name: Contact Us
*/
add_action( 'wp_enqueue_scripts', 'enqueueContactScripts' );
function enqueueContactScripts()
{
	wp_enqueue_style( 'contact-styles', get_stylesheet_directory_uri() . '/css/contact-us.css', array('fancybox') );
    wp_enqueue_script( 'contact-js', get_stylesheet_directory_uri() . '/js/contact-us.js', array( 'fancybox', 'spin-js', 'bootstrap-validator', 'ic-email-form' ), null, false );
}
?>
<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h1 class="header hero secondary">
                    Contact Us
                    <span class="subheader">
                        Because we love making new friends
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="section-call">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4 class="header medium separator">
                    <span class="intro">Contact us directly</span>
                    Give us a call
                    <span class="subheader">
                        Our uber friendly customer service team is here to assist you.
                    </span>
				</h4>
				<p id="phone-number"><span id="call">Call Us:</span> 619.562.2799 <small>EX.</small> 218</p>
			</div>
		</div>
		<?php get_template_part('partials/contact-us', 'photos'); ?>
		<div class="row">
			<div class="col-md-12">
                <?php echo do_shortcode("[desk_contact_chat_widget_embed]"); ?>
			</div>
		</div>
	</div>
</section>
<section id="section-email">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h4 class="header medium">
                    Email Us
                    <span class="subheader">
                        Send us your questions about your donation, purchase, or any general inquiry and we'll get back to you as soon as possible.
                    </span>
                </h4>
                <form action="https://invisiblechildren.desk.com/customer/widget/emails" enctype="multipart/form-data" method="post" novalidate="novalidate" id="email-submit-form" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <div class="row">
                        <div class="col-md-6 input">
                            <div class="form-group">
                                <input class="form-control" id="interaction_name" maxlength="100" name="interaction[name]" size="100" type="text" value="" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6 input">
                            <div class="form-group select-group">
                                <select class="form-control select2" data-placeholder="Category" name="ticket[labels_new]">
                                    <option></option>
                                    <option value="General Inquiry - One-time Donation,IC Donation">Donation Question</option>
                                    <option value="IC Donation">Merchandise Question</option>
                                    <option value="General Question,IC Donation">General Inquiry</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 input">
                            <div class="form-group">
                                <input class="form-control" id="interaction_email" maxlength="100" name="interaction[email]" size="100" type="text" value="" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-md-12 input">
                            <div class="form-group">
                                <input class="form-control" id="interaction_email" maxlength="100" name="email[subject]" size="100" type="text" value="" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-12 input">
                            <div class="form-group">
                                <textarea class="form-control" cols="40" id="email_body" name="email[body]" rows="20" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 input">
                            <div class="form-group">
                                <input class="btn btn-default primary" id="email_submit" name="commit" type="submit" value="Submit">
                            </div>
                        </div>
					</div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="section-visit">
	<div id="dark-overlay"></div>
	<div class="container" id="visit">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h5 class="header medium" itemprop="address">
                    <span class="intro">Stop by and say "hi."</span>
					<span itemprop="streetAddress">961 S 16th St.</span><br/><span itemprop="addressLocality">San Diego</span>, <span itemprop="addressRegion">California</span> 92113
				</h5>
				<a href="https://www.google.com/maps/place/961+S+16th+St/@32.7044409,-117.1496664,17z/data=!3m1!4b1!4m2!3m1!1s0x80d953682b66e059:0x5e489ff2f9853b3b" class="btn btn-border quaternary" target="_blank">Map It</a>
				<div id="social-buttons">
					<a href="https://www.facebook.com/invisiblechildren" class="btn btn-social facebook white" target="_blank"></a>
					<a href="https://twitter.com/Invisible" target="_blank" class="btn btn-social twitter white"></a>
					<a href="https://plus.google.com/+invisiblechildren/" target="_blank" class="btn btn-social google-plus white"></a>
					<a href="http://vimeo.com/invisible" target="_blank" class="btn btn-social vimeo white"></a>
					<a href="https://www.youtube.com/user/invisiblechildreninc" target="_blank" class="btn btn-social youtube white"></a>
				</div>
				<p id="office-info">
					<span class="title">Office:</span> <span itemprop="telephone">619.562.2799</span> <span class="title">// Fax:</span> <span itemprop="faxNumber">619.660.0689</span>
				</p>
			</div>
		</div>
	</div>
</section>


<?php get_template_part('partials/section-email', 'share'); ?>
<?php get_footer(); ?>