<div class="programs-slider">

	<?php
    $isFrontPage = is_front_page();
    $programTemplate = '<a href="%1$s" class="program">
                <div class="bg"><img class="saturated" src="%2$s" alt="%4$s image"><img class="desaturated" src="%3$s" alt="%4$s image">
                </div>
                <div class="content">
                    <div class="title">
                        <p class="widowIgnore">%4$s</p>
                    </div>
                    <p class="icon" align="center"><img src="%5$s"></p>
                </div></a>';

    // show specific programs on the homepage
    if ($isFrontPage) {
        $args = array(
            'post_type' => 'program',
            'taxonomy' => 'program_type',
            'post__in' => array('34078', '34099', '34044', '34135'),
            'orderby' => 'post__in'
        );

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();

                // print template
                printf($programTemplate,
                    get_the_permalink(),
                    get_field('program_image_color'),
                    get_field('program_image_bw'),
                    get_the_title(),
                    get_field('main_icon')
                );
            }
        }
    }
    // randomize on other pages with one random program from each of the four categories
    else {
        $args = array(
            'post_type' => 'program',
            'taxonomy' => 'program_type'
        );

        // Get array of taxonomies
        $taxonomies = get_terms('program_type', $args);

        foreach ($taxonomies as $taxonomy) {
            $slug = $taxonomy->slug;
            $programsWithTaxonomy = get_posts(array(
                    'post_type' => 'program',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'program_type',
                            'field' => 'slug',
                            'terms' => $slug
                        )))
            );

            $countPosts = count($programsWithTaxonomy);
            $randomPost = (float)rand(1, $countPosts);
            $postId = (string)$programsWithTaxonomy[$randomPost-1]->ID;
            $post = get_post($postId);
            $programImgColor = get_field('program_image_color', $postId);
            $programImgBW = get_field('program_image_bw', $postId);
            $programIcon = get_field('main_icon', $postId);
            $programLink = get_the_permalink();
            $title = get_the_title();

            // print template
            printf($programTemplate,
                $programLink,
                $programImgColor,
                $programImgBW,
                $title,
                $programIcon);
        }
    }

    wp_reset_postdata();
	?>
	<div class="btn-wrap programs-slider-btn">
		<a href="<?php echo get_permalink(get_page_by_path('our-work')) ?>" class="btn btn-default primary">View Our Work</a>
	</div>
</div>