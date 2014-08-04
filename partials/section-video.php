<?php global $iframeSrc, $playerId, $buttonText, $videoHeader, $videoIntro, $thumbnailPathFromRoot; ?>

<section class="watch-video">
	<div class="video-overlay">
		<img class="video-thumbnail" src="<?php echo get_stylesheet_directory_uri() . $thumbnailPathFromRoot; ?>">
		<div class="background-opaque"></div>
		<div class="video-description">
			<?php if ($videoHeader) : ?>
				<h3 class="header medium">
					<span class="intro"><?php echo $videoIntro; ?></span>
					<?php echo $videoHeader; ?>
				</h3>
			<?php endif; ?>
			<a href="#" class="btn btn-border quaternary watch-video-btn">
				<span class="ic-icon-playbutton"></span>
				<?php echo $buttonText; ?>
			</a>
		</div>
	</div>
	<div class="video-container">
		<iframe class="details-video" id="<?php echo $playerId; ?>" data-src="<?php echo $iframeSrc . '&api=1&player_id=' . $playerId; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
</section>