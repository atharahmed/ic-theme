<?php
/*
Template Name: Privacy Policy
*/

add_action('wp_enqueue_scripts', 'enqueuePrivacyScripts');
function enqueuePrivacyScripts()
{
    wp_enqueue_style('privacy-policy', get_stylesheet_directory_uri() . '/css/privacy-policy.css');
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="header-content">
	    <div class="container">
	        <div class="row">
				<div class="col-md-10 col-md-offset-1">
	                <h1 class="header hero secondary">
	                    Privacy Policy
	                </h1>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<section id="section-policy">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>
					Your privacy is important to us. To better protect your privacy, we provide this notice explaining our online information practices. This notice applies to all information collected or submitted on our website. Please note that this policy is subject to change.
				</p>
				<p class="bold-text">
					The information we collect
				</p>
				<p>
					On some pages, you can order products, make requests to book a screening or receive email/video updates, sign up for our “Schools for Schools” program, make donations, and register to attend events. Following are the types of personal information collected at these pages:
				</p>
				<ul>
					<li>Name</li>
					<li>Company/School Name</li>
					<li>Address</li>
					<li>Email Address</li>
					<li>Phone/Fax Number</li>
					<li>Credit/Debit Card Information</li>
					<li>Gender</li>
					<li>Age</li>
					<li>Date of Birth (DOB)</li>
				</ul>
				<p>
					When you use the public areas of our website, you are doing so anonymously.
				</p>
				<p class="bold-text">
					How we use the information
				</p>
				<p>
					We collect aggregate use information, such as the number of hits per page, for internal and marketing use only; we do not provide your personally identifying information to the public.
				</p>
				<p>
					We use the information you provide about yourself when conducting a transaction to complete that transaction only. We do not share this information with outside parties except to the extent necessary to complete your request.
				</p>
				<p>
					We use return email addresses to answer the email we receive. Such addresses are not used for any other purpose and are not shared with outside parties.
				</p>
				<p>
					Finally, we never use or share the personally identifiable information provided to us online in ways unrelated to the ones described above without also providing you an opportunity to opt-out or otherwise prohibit such unrelated uses.
				</p>
				<p class="bold-text">
					Our commitment to data security
				</p>
				<p>
					To prevent unauthorized access, maintain data accuracy, and ensure the correct use of information, we have put in place appropriate physical, electronic, and managerial procedures to safeguard and secure the information we collect online.
				</p>
			</div>
		</div>
	</div>
</section>
<section id="section-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4 class="header medium">
					<span class="intro">Got questions?</span>
					Contact Us
					<span class="subheader">Should you have any questions or concerns regarding this policy, feel free to contact us. You can find our contact information on the contact page.</span>
				</h4>
				<a href="<?php echo get_permalink(get_page_by_path('contact-us')); ?>" class="btn btn-default primary">Contact Us</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>