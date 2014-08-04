<?php global $yoast_meta_description, $list_id; ?>
<section class="email-and-share">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-email-share" id="first-col">
				<p>Sign-up for email updates</p>
				<?php get_template_part('partials/email', 'form'); ?>
			</div>
			<div class="col-md-6 col-sm-6 col-email-share">
				<p>Think people should hear about this? Share it.</p>
				<a href="<?php echo the_permalink(); ?>" data-image="<?php echo get_fbimage(); ?>" data-title="<?php echo the_title();?>" data-desc="<?php echo $yoast_meta_description; ?>" class="btn btn-social facebook share"></a>

				<a href="https://twitter.com/intent/tweet?url=<?php echo the_permalink(); ?>&amp;text=<?php echo the_title(); ?>&amp;via=invisible" target="_blank" class="btn btn-social twitter share"></a>

				<a href="https://plus.google.com/share?url=<?php echo urlencode(the_permalink());?>" class="btn btn-social google-plus share"></a>
			</div>
        </div>
	</div>
</section>