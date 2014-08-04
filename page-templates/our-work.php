<?php
/*
Template Name: Our Work
*/
add_action('wp_enqueue_scripts', 'enqueueOurWorkScripts');
function enqueueOurWorkScripts()
{
    wp_enqueue_style('our-work', get_stylesheet_directory_uri() . '/css/our-work.css');
    wp_enqueue_script('our-work', get_stylesheet_directory_uri() . '/js/our-work.js', array('d3-js'), null, true);
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="header hero secondary">
					Our Work
				</h2>
			</div>
		</div>
	</div>
</section>
<section id="section-filter" class="filter-bar">
    <div class="container">
        <div class="row">
	        <div class="col-md-12">
				<a href="#" class="btn btn-filter selected" id="all">All</a>
				<a href="#" class="btn btn-filter" id="media">Media</a>
				<a href="#" class="btn btn-filter" id="mobilization">Mobilization</a>
				<a href="#" class="btn btn-filter" id="protection">Protection</a>
				<a href="#" class="btn btn-filter" id="recovery">Recovery</a>
            </div>
        </div>
    </div>
</section>
<section id="section-overview">
	<div class="program-description">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 header-column">
					<h2 class="header medium all">
						Nobody does it like us
						<span class="subheader">
							We have a single objective: to permanently end the LRA conflict. We’re achieving this by tackling the problem from all sides through a comprehensive approach of addressing immediate needs and long term effects.
						</span>
					</h2>
					<h2 class="header medium media">
						Media
						<span class="subheader">
							We create films that document and tell the world about the crimes of Joseph Kony and his LRA. We introduce new audiences to the conflict, create mass awareness, and inspire global action. 
						</span>
					</h2>
					<h2 class="header medium mobilization">
						Mobilization
						<span class="subheader">
							If it’s a movement, people have to be moving. We get out on the road to spread the story of the conflict and encourage people to help advance international efforts to end LRA atrocities. 
						</span>
					</h2>
					<h2 class="header medium protection">
						Protection
						<span class="subheader">
							We work with regional partners and local leaders to build and expand systems that warn remote communities of LRA attacks. We have programs in place that give abductees the information and encouragement they need to peacefully surrender. 
						</span>
					</h2>
					<h2 class="header medium recovery">
						Recovery
						<span class="subheader">
							We work to rebuild the lives and communities that Kony has tried to destroy. We rehabilitate children affected by the LRA, and invest in education and economic recovery programs that promote lasting peace in the post-conflict region.
						</span>
					</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="section-programs">
	<div id="inner-programs">
		<?php 
			$args = array(
				'post_type' => 'program',
				'showposts' => 20
			);

			query_posts($args);

			if (have_posts())
				while ( have_posts() ) : the_post(); 
					$postId = get_the_ID();
					$programImgColor = get_field('program_image_color', $postId);
					$programImgBW = get_field('program_image_bw', $postId);
					$programIcon = get_field('main_icon', $postId);
					$programLink = get_the_permalink();
					$title = get_the_title();
					$post = get_post($postId);
					$slug = $post->post_name;
					$programterms = get_the_terms($postId, "program_type");
					foreach ( $programterms as $term ) {
						$term = $term->slug;
					}

					$programTemplate = '<a href="%1$s" class="program %2$s">
						<div class="bg"><img class="saturated" src="%3$s" alt="%5$s image"><img class="desaturated" src="%4$s" alt="%5$s image">
						</div>
						<div class="content">
							<p class="title widowIgnore">%5$s</p>
							<p class="icon" align="center"><img src="%6$s"></p>
						</div></a>';

					printf($programTemplate, $programLink, $term, $programImgColor, $programImgBW, $title, $programIcon);
			endwhile;
			
			wp_reset_query(); 
		?>
		<div class="clearfix">
	</div>
</section>

<section id="section-proof">
    <div class="proof-row">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="header medium separator">
                        Our programs work
                        <span class="subheader">
                            The different facets of what we do have worked together to dramatically reduce LRA violence. The numbers show that the approach we’re taking to end the conflict is extremely effective.
                        </span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="proof-row grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-md-offset-1 col-sm-8 col-sm-offset-2">
                    <h3 class="header small">
                        <span class="smaller-text">LRA combatants have</span><br>decreased
                        <span class="subheader">
                            A three-fold effort between our programs, community partners and targeted international military operations has increased security while making the possibility of an LRA-free world more real than ever before. 
                        </span>
                    </h3>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12" id="chart-position">
                    <div id="bar-chart"></div>
                </div>
            </div>
        </div>
    </div>
	<div class="proof-row">
		<div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-md-offset-1 col-md-push-5 col-sm-8 col-sm-offset-2">
                    <h3 class="header small">
                        <span class="smaller-text">Former soldiers are</span><br>coming home
                        <span class="subheader">
                            We have developed initiatives to target those in captivity and encourage their escape. In dramatically dismantling the LRA's core fighting force, we reunite broken families while bringing stability and peace to affected communities.
                        </span>
                    </h3>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-1 col-md-pull-6 col-sm-12">
                    <div class="circle-graphic" id="returnees-bubble">
                        <p id="returnees-count">83</p>
                        <p id="returnees-stat"><span class="bolder">Returnees</span><br>in 2013 alone</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="proof-row grey">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-md-offset-1 col-sm-8 col-sm-offset-2">
                    <h3 class="header small" id="gaining-peace">
                        <span class="smaller-text">People are gaining</span><br>peace of mind
                        <span class="subheader">
                            Countless families and communities are finally empowered to take control of their futures after decades of living in fear.
                        </span>
                    </h3>
                    <a href="#storyone" class="btn btn-border primary fancybox story" rel="gallery">View stories</a>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-12">
                	<div id="image-closure">
                		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-work/children-programs-page.jpg" alt="Children who have benefited from our work image">
                	</div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="hidden">
	<div id="storyone" class="donate-modal" rel="group">
	    <div class="story-intro">
	        <div class="circle-graphic">
	            <img src="<?php echo get_stylesheet_directory_uri() . '/images/our-work/jimmy-pic.jpg'; ?>" alt="Jimmy image">
	        </div>
	        <div class="abductee-info">
	            <h3 class="header smallest">
	                Ocaya Jimmy
	                <span class="subheader">Former child soldier</span>
	            </h3>
	            <p>
                    <span class="bold-text">Adbucted:</span> at 9 years old
                </p>
	        </div>
	    </div>
	    <div class="story-body">
	        <p class="name">Education allows Ocaya Jimmy to regain future</p>
	        <p>Ocaya Jimmy was abducted when he was only 9-years-old. They broke into his house, tortured his cousin and abducted Ocaya Jimmy and his four cousins. Luckily, Ocaya Jimmy was able to escape the Lord’s Resistance Army and return home.</p>
	        <p>
	        	Ocaya Jimmy is now a Legacy Scholarship Program scholar at Ugandan Christian University in Kampala, and is an example of resilience. If you have an education, Jimmy explains, you cannot be robbed of it.  “Maybe the thieves, the LRA, they can come and rob you everything, but you can use that education to take back everything that you have lost,” he added. Jimmy joined the Legacy Scholarship Program in 2007 as a secondary school student and plans to graduate from university in 2015 with a degree in Agriculture.
	        </p>
	        <p>Help former child soldiers like Jimmy.</p>
	        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
	    </div>
	</div>

	<a href="#storytwo" class="btn btn-border primary fancybox story" rel="gallery"></a>
	<div id="storytwo" class="donate-modal">
	    <div class="story-intro">
	        <div class="circle-graphic">
	            <img src="<?php echo get_stylesheet_directory_uri() . '/images/donate/opondo-pic.jpg'; ?>" alt="Opondo image">
	        </div>
	        <div class="abductee-info">
	            <h3 class="header smallest">
	                Opondo
	                <span class="subheader">Former child soldier</span>
	            </h3>
	            <p>
                    <span class="bold-text">Adbucted:</span> 1998
                </p>
                <p>
                    <span class="bold-text">Returned:</span> August 21, 2013
                </p>
	        </div>
	    </div>
	    <div class="story-body">
	        <p class="name">Opondo Escapes Kony’s Lord’s Resistance Army</p>
	        <p>LRA rebels raided Lamwolode, Uganda, and brutally kidnapped a ten-year-old boy named Opondo. He was stolen from his family, forced to kill innocent civilians, and brainwashed into believing that escape was impossible. 15 years later, while listening to an Invisible Children sponsored program on UBC Shortwave radio, Opondo overheard former LRA member call him out by name. He urged Opondo to safely surrender and provided reassurance that he would not be harmed if he did. Later, a letter was found by the road from the LRA group stating they wanted to surrender. Invisible Children heard about the letter and took immediate action by rallying supporters to donate to a Flash Action Alert. In just over 48 hours, we were able to raise enough to drop 20,000 “come home” fliers over the area near Garamba National Park where the group was suspected to be hiding. On August 21, Opondo, now 25, came out of the bush and surrendered to UN peacekeepers and Congolese security forces holding both a flier and his shortwave radio in his hands.</p>

	        <p>Help former child soldiers like Opondo.</p>
	        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
	    </div>
	</div>
	<a href="#storythree" class="btn btn-border primary fancybox story" rel="gallery"></a>
	<div id="storythree" class="donate-modal">
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
	        <p>
	        	Before, Agnes had to walk a mile and a half each way to get water. Now, thanks to boreholes built through Invisible Children's WASH program, clean water is just a few minutes' walk down the road.
	        </p>
	        <p>
	        	Akello Agnes is a busy mother of two. With the convenient new water source nearby, she has more time to spend in her garden planting food to feed her family. She also sells the produce she grows at the local market, and the money she makes goes towards paying her children's school fees.
	        </p>
	        <p>Help families like Agnes'.</p>
	        <a href="https://give.invisiblechildren.com/checkout/donation?eid=10513" class="btn btn-default primary" target="_blank">Donate</a>
	    </div>
	</div>
</div>

<section id="section-donate-ask">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header medium">
					Keep on keepin’ on
					<span class="subheader">
						Your donations make our work possible. Because of you, our work can continue. 
					</span>
				</h3>
				<a href="<?php echo get_permalink(get_page_by_path('donate')); ?>" class="btn btn-default primary">Donate</a>
			</div>
		</div>
	</div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>