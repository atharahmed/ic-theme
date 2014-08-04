<?php $images = get_field('slideshow'); ?>
<div class="slider generic">
	<ul class="bxslider">
		<?php  if (is_array($images)) : foreach( $images as $image ) : ?>
		<li>
			<img src="<?php echo $image["sizes"]["large"]; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['caption']; ?>" />
		</li>
		<?php endforeach; endif; ?>
	</ul>
	<div class="outside-controls">
		<div id="slider-prev"></div> 
		<div id="slider-next"></div>
	</div>
	<div class="caption">
		<p class="slide-counter"></p>
		<p class="picture-caption"></p>
	</div>
</div>