<?php
/*
Template Name: Financials
*/

add_action('wp_enqueue_scripts', 'enqueueFinancialScripts');
function enqueueFinancialScripts() 
{
	wp_enqueue_style('financials-styles', get_stylesheet_directory_uri() . '/css/financials.css');
	wp_enqueue_script('financials-js', get_stylesheet_directory_uri() . '/js/financials.js', array('ic-email-form', 'd3-js'), null, true);
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h1 class="header hero secondary">
                    Financials
                    <span class="subheader">
                        Here’s how we spend the money
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="section-glance">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h3 class="header annual-report">
					At a Glance
					<span class="subheader">
						A dramatic spike in funding in 2012, thanks to our KONY 2012 campaign, allowed us to significantly extend the reach of our protection and recovery programs in central and East Africa.
					</span>
				</h3>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2013/financial-statement.pdf" class="btn btn-default primary" target="_blank">View our annual report</a>
			</div>
			<div class="col-md-7">
				<div class="bar-chart vertical"></div>
			</div>
		</div>
	</div>
</section>
<section id="section-money-allocation">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header small">
					How is my donation spent?
					<span class="subheader">
						All of our expenses support our mission of ending the LRA conflict through media, mobilization, protection and recovery programs. We’re more focused than ever, ending the conflict by investing in work that directly protects vulnerable communities and dismantles the LRA.
					</span>
				</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div id="mobile-text" style="display: none">
					<p class="label">TOTAL EXPENSE</p>
					<p class="total">Waiting...</p>
					<p class="label" id="updateyear">million</p>
				</div>
				<div id="financial-pie-chart"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 yearlabel" align="center">
                <div class="row">
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter selected" id="thirteen">FY 2013</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="twelve">FY 2012</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="eleven">FY 2011</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="ten">FY 2010</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="nine">FY 2009</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="eight">FY 2008</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="seven">FY 2007</a>
                    </div>
                    <div class="btn-wrap col-md-3 col-sm-4 col-xs-6">
                        <a href="#" class="btn btn-filter" id="six">FY 2006</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-documents">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h5 class="header small">
					Don’t just take our word for it
					<span class="subheader">
						We’re a 501(c) 3 non-profit, we’re externally audited, and we have a 3 star rating on the website Charity Navigator (with four out of four stars for financial transparency). You can download our financial documents below.
					</span>
				</h5>
			</div>
		</div>
		<div class="row financials">
			<div class="col-md-4 col-md-offset-2 col-sm-6 document-cluster">
				<h4 class="header smallest">2013</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2013/financial-statement.pdf" target="_blank">2013 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2013/990.pdf" target="_blank">2013 Invisible Children Form 990</a>
			</div>
			<div class="col-md-4 col-sm-6 document-cluster">
				<h4 class="header smallest">2012</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2012/highlights.pdf" target="_blank">2012 Highlights</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2012/financial-statement.pdf" target="_blank">2012 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2012/financial-statement-annotated.pdf" target="_blank">2012 Financial Statement (Annotated)</a>
			</div>
        </div>
        <div class="row financials">
			<div class="col-md-4 col-md-offset-2 col-sm-6 document-cluster">
				<h4 class="header smallest">2011</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2011/annual-report.pdf" target="_blank">2011 Annual Report</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2011/financial-statement.pdf" target="_blank">2011 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2011/990.pdf" target="_blank">2011 Invisible Children Form 990</a>
			</div>
			<div class="col-md-4 col-sm-6 document-cluster">
				<h4 class="header smallest">2010</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2010/financial-statement.pdf" target="_blank">2010 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2010/990.pdf" target="_blank">2010 Invisible Children Form 990</a>
			</div>
        </div>
        <div class="row financials">
			<div class="col-md-4 col-md-offset-2 col-sm-6 document-cluster">
				<h4 class="header smallest">2009</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2009/financial-statement.pdf" target="_blank">2009 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2009/990.pdf" target="_blank">2009 Invisible Children Form 990</a>
			</div>
			<div class="col-md-4 col-sm-6 document-cluster">
				<h4 class="header smallest">2008</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2008/annual-report.pdf" target="_blank">2008 Annual Report</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2008/financial-statement.pdf" target="_blank">2008 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2008/990.pdf" target="_blank">2008 Invisible Children Form 990</a>
			</div>
        </div>
        <div class="row financials">
			<div class="col-md-4 col-md-offset-2 col-sm-6 document-cluster">
				<h4 class="header smallest">2007</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2007/annual-report.pdf" target="_blank">2007 Annual Report</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2007/financial-statement.pdf" target="_blank">2007 Financial Statement</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2007/990.pdf" target="_blank">2007 Invisible Children Form 990</a>
			</div>
			<div class="col-md-4 col-sm-6 document-cluster">
				<h4 class="header smallest">2006</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2006/annual-report.pdf" target="_blank">2006 Annual Report</a>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/2006/financial-statement.pdf" target="_blank">2006 Financial Statement</a>
			</div>
		</div>
		<div class="row financials">
			<div class="col-md-4 col-md-offset-2 col-sm-6 document-cluster">
				<h4 class="header smallest">Other Documents</h4>
				<a href="<?php echo get_stylesheet_directory_uri(); ?>/images/financials/forms/other/501c3-ruling.pdf" target="_blank">501(c)(3) Ruling</a>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>