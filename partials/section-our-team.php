<?php global $sectionOurTeamHeaderIntro, $sectionOurTeamHeaderMain, $sectionOurTeamSubheader; ?>
<section id="section-our-team">
    <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header medium">
					<span class="intro"><?php echo $sectionOurTeamHeaderIntro; ?></span>
					<?php echo $sectionOurTeamHeaderMain; ?>
                    <span class="subheader"><?php echo $sectionOurTeamSubheader; ?></span>
				</h3>
            </div>
        </div>
        <div>
            <div class="col-md-12 col-staff clearfix">
                <?php
                $staffQuery = new WP_Query(array(
                    'post_type' => 'team',
                    'posts_per_page' => '-1',
                    'orderby' => 'rand',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team_member_category',
                            'field' => 'slug',
                            'terms' => 'staff'
                        )
                    )
                ));
                ?>
                <?php 
                if ( $staffQuery->have_posts() ) :
                    while ( $staffQuery->have_posts() ) :
                        $staffQuery->the_post();
                        $photoArray = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                        $photo = $photoArray[0];
                        if (!empty($photo)) :
                        ?>
						<div class="image-wrap inactive">
							<img src="<?php echo $photo; ?>"/>
						</div>
                    <?php endif; endwhile; endif; ?>
			</div>
            <div class="col-md-12">
				<a class="btn btn-default primary" href="<?php echo get_permalink(get_page_by_path('our-team')); ?>">Meet the team</a>
            </div>
        </div>
    </div>
</section>