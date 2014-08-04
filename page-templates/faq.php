<?php
/*
Template Name: FAQ
*/

add_action('wp_enqueue_scripts', 'enqueueFAQScripts');
function enqueueFAQScripts() 
{
	wp_enqueue_style('faq-styles', get_stylesheet_directory_uri() . '/css/faq.css');
	wp_enqueue_script('faq-js', get_stylesheet_directory_uri() . '/js/faq.js', array('jquery', 'ic-email-form', 'spin-js', 'bootstrap-validator'), null, true);
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
			<div class="col-md-10 col-md-offset-1">
                <h1 class="header hero secondary">
                    FAQs
                    <span class="subheader">
                        Got a question? Maybe it’s asked frequently.
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="section-faqs">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div id="donation-questions" class="question-categories">
					<div class="clickable-region"></div>
					<div class="header-wrap">
                        <span class="ic-icon-dollabill faq-icon"></span>
                        <div class="text">
                            <h2 class="question-type">Questions about donating</h2>
                        </div>
                    </div>
                    <div class="toggle-content" style="display: none">
					<?php
						$donationQuestions = array(
							array(
								"question" => 'How can I donate to Invisible Children?',
								"answer" => 'You can make an online donation <a href="' . get_permalink(get_page_by_path('donate')) . '">HERE</a>. Alternatively, you can send a check to 961 S. 16th St., San Diego, CA 92113.'
							),
							array(
								"question" => 'When I donate, where does my money go?',
								"answer" => 'Donations fund our life-saving programs. Learn about them <a href="' . get_permalink(get_page_by_path('our-work')) . '">HERE</a>.'
							),
							array(
								"question" => 'What percentage of my donation goes towards programs?',
								"answer" => 'We are committed to making supporter’s donations go as far as possible to impact the end of the LRA conflict. All our costs are therefore essential to running our life-saving programs, but you can see a more detailed break down <a href="' . get_permalink(get_page_by_path('financials')) . '">HERE</a>.'
							),
							array(
								"question" => 'How do I give monthly?',
								"answer" => 'It’s quick and easy to sign up online <a href="' . get_permalink(get_page_by_path('donate')) . '">HERE</a> or give us a call on 619.562.2799 x218 and we’ll help get you set up.'
							),
							array(
								"question" => 'I’m a monthly donor, and some of my information has changed - how do I update it?',
								"answer" => 'Give us a call on 619.562.2799 x218, or send an email to <a href="mailto:info@invisiblechildren.com">info@invisiblechildren.com</a> - we would love to get you updated.'
							),
							array(
								"question" => 'Can I claim back tax on my donation?',
								"answer" => 'If you’re in the U.S., yes. You’ll get your tax receipt automatically emailed for online donations (so you might want to check we’ve got the correct email address for you). For offline donations, we’ll snail-mail your receipt. If you have any questions, or haven’t received a tax receipt and think you should have, email <a href="mailto:info@invisiblechildren.com">info@invisiblechildren.com</a>. Sorry international supporters - we love you just as much, but you can’t claim back tax on your donations.'
							)
						); ?>

					<?php foreach ($donationQuestions as $question) : ?>
						<div class="question-answered">
							<p class="question widowIgnore"><?php echo html_entity_decode(urldecode($question['question'])); ?></p>
							<p class="answer widowIgnore"><span class="bold-answer">Answer: </span><?php echo html_entity_decode(urldecode($question['answer'])); ?></p>
						</div>
					<?php endforeach; ?>

					</div>
					<span class="btn btn-continue-arrow"></span>
				</div>
				<div id="organization-questions" class="question-categories">
					<div class="clickable-region"></div>
					<div class="header-wrap">
                        <span class="ic-icon-invisiblelogo faq-icon"></span>
                        <div class="text">
                            <h2 class="question-type">Questions about Invisible Children</h2>
                        </div>
                    </div>
					<div class="toggle-content" style="display: none">
						<?php 
							$icQuestions = array(
								array(
									"question" => 'How can I help?',
									"answer" => 'The sky’s the limit. We would love to have you help in any (or all) of the following ways - Tell everyone you know about this conflict and why you care about it. Go to our Get Involved pages: donate or fundraise for our life-saving programs; become an IC Citizen and ask your leaders to take action; come and volunteer or intern with us; see if there’s a job opening that matches your skills.'
								),
								array(
									"question" => 'Why do you only focus on the LRA conflict - aren’t there a lot of important issues you could be working on?',
									"answer" => 'Historically the LRA conflict had been one of the most forgotten and neglected humanitarian issues on the planet. We started working on this issue because we became friends with those affected by the war, and refused to do nothing. We’ve now become experts on the conflict, and believe in finishing the job we started. We also think that you prove the universal through the specific - that is, if we can show that the world doesn’t have to put up with Joseph Kony, then we prove that the would shouldn\'t put up with any warlord.'
								),
								array(
									"question" => 'Why do you invest in media?',
									"answer" => 'Our movement started with a film, which we made to tell the world about the unseen war we discovered. We believe that media is a powerful way to bring people into the story and engage them to take action to end the war. Plus, though its quality might fool you, it’s a way to spread the word without breaking the bank - check out our financials <a href="' . get_permalink(get_page_by_path('financials')) . '">HERE</a>.'
								),
								array(
									"question" => 'Where do you work?',
									"answer" => 'We work in the Democratic Republic of Congo, Central African Republic, South Sudan and northern Uganda. We have regional offices in Kampala, Obo, and Gulu, and our headquarters is in San Diego.'
								),
								array(
									"question" => 'What did KONY 2012 achieve?',
									"answer" => 'In short, a lot. Find out more <a href="' . get_permalink(get_page_by_path('kony-2012')) . '">HERE</a>.'
								),
								array(
									"question" => 'Are you politically affiliated?',
									"answer" => 'No, thanks for asking.'
								),
								array(
									"question" => 'Do you work with the military?',
									"answer" => 'We are not affiliated with the military. We believe in ending the war through proactively peaceful means. We do however think that the counter-LRA mission is an essential component towards achieving peace, and strongly support the presence of U.S. military advisors in the conflict region to advise and assist the African-Union led mission.'
								),
								array(
									"question" => 'Why does Invisible Children work in Uganda - the conflict isn’t there anymore, right?',
									"answer" => 'Correct - the LRA left Uganda in 2006. Northern Uganda experienced two decades of conflict, so our work there is related to post-conflict recovery. Learn more about our recovery work <a href="' . get_permalink(get_page_by_path('our-work')) . '">HERE</a>.'
								)
							);
						?>

						<?php foreach ($icQuestions as $question) : ?>
							<div class="question-answered">
								<p class="question widowIgnore"><?php echo $question['question']; ?></p>
								<p class="answer widowIgnore">
									<span class="bold-answer">Answer: </span>
									 <?php echo $question['answer']; ?>
								</p>
							</div>
						<?php endforeach; ?>
					</div>
					<span class="btn btn-continue-arrow"></span>
				</div>
				<div id="general-questions" class="question-categories">
					<div class="clickable-region"></div>
					<div class="header-wrap">
                        <span class="ic-icon-question faq-icon"></span>
                        <div class="text">
                            <h2 class="question-type">General Questions</h2>
                        </div>
                    </div>
					<div class="toggle-content" style="display: none">

						<?php 
							$generalQuestions = array(
								array(
									"question" => 'Why hasn’t Kony been caught yet?',
									"answer" => 'Million dollar question. He’s operating in some of the densest jungle and most remote regions in the world, where there is very little infrastructure, and where pursuit is extremely challenging. Regional governments lack the military capacity to track him down, and are additionally dealing with other rebel groups and instabilities. Kony has also been able to take advantage of ‘safe havens’, such as in Sudan, where the counter-LRA forces cannot pursue him.'
								),
								array(
									"question" => 'Where is Kony right now?',
									"answer" => 'It’s highly likely that he’s in Kafia Kingi, a Sudanese controlled ‘enclave’ bordering South Sudan and the Central African Republic. It’s a place where Kony has been able to return time and time again to take refuge, from which he’s been able to continue to direct his fighters to attack civilians in neighbouring countries, and an area where African Union-led forces (assisted by U.S. advisers) cannot go.'
								),
								array(
									"question" => 'How did the LRA conflict start?',
									"answer" => 'The LRA was an evolution of the ‘Holy Spirit Movement’, started in 1986 supposedly to free the northern Uganda from government oppression. Learn more about the history of the conflict <a href="' . get_permalink(get_page_by_path('conflict')) . 'history' . '">HERE</a>.'
								),
								array(
									"question" => 'How many soldiers are currently in the LRA? ',
									"answer" => 'There are around 200 combatants, which doesn’t count women and children used as ‘wives’ and porters. This is the smallest the  group has ever been, but they have a disproportionately large impact. Learn more about the LRA <a href="' . get_permalink(get_page_by_path('conflict')) . 'the-lra' . '">HERE</a>.'
								),
								array(
									"question" => 'Isn’t that a fairly low number - why don’t you just accept that as success?',
									"answer" => 'While a 90% reduction in the size of the LRA over the last ten years is a huge achievement, Kony has shown that he is a master of regeneration. If we remove the pressure, it is likely that he will take the chance to regroup and grow his force back to it’s former strength. Plus, ending a war doesn’t mean ending 90% of it.'
								),
								array(
									"question" => 'Where is the LRA active now?',
									"answer" => 'The LRA is spread across an area approximately the the size of California, operating across the borders of the Democratic Republic of Congo, Central African Republic, and South Sudan.'
								),
								array(
									"question" => 'What happens if Kony gets captured?',
									"answer" => 'Kony has been indicted by the International Criminal Court, so if the counter-LRA efforts achieve their mission of Kony’s capture, he will be handed over to be tried at the hague.'
								)
							);
						?>
						<?php foreach ($generalQuestions as $question) : ?>
							<div class="question-answered">
								<p class="question widowIgnore"><?php echo $question['question']; ?></p>
								<p class="answer widowIgnore">
									<span class="bold-answer">Answer: </span>
									 <?php echo $question['answer']; ?>
								</p>
							</div>
						<?php endforeach; ?>
					</div>
					<span class="btn btn-continue-arrow"></span>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-engagement">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<h3 class="header medium">
					<span class="intro">More questions?</span>
					Contact Us Directly
					<span class="subheader">Don’t be a stranger. Visit us, call us, email us.</span>
				</h3>
			</div>
		</div>
		<?php get_template_part('partials/contact-us', 'photos'); ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a class="btn btn-default primary" href="<?php echo get_permalink(get_page_by_path('contact-us')); ?>">Contact Us</a>
            </div>
        </div>
	</div>
</section>

<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>