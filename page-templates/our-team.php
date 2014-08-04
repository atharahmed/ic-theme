<?php
/*
Template Name: Our Team
*/

add_action('wp_enqueue_scripts', 'enqueueOurTeamScripts');
function enqueueOurTeamScripts()
{
    wp_enqueue_script('our-team', get_stylesheet_directory_uri() . '/js/our-team.js', array('ic-email-form'), null, true);
    wp_enqueue_style('our-team', get_stylesheet_directory_uri() . '/css/our-team.css');
}
?>

<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="header hero secondary">
                    Our Team
                    <span class="subheader">
                        of extraordinary, radical individuals.
                    </span>
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="section-filter" class="filter-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="#all" class="btn btn-filter selected">All</a>
				<a href="#executive" class="btn btn-filter">Executive</a>
				<a href="#board-member" class="btn btn-filter">Board</a>
				<a href="#advisory-council" class="btn btn-filter">Advisory Council</a>
            </div>
        </div>
    </div>
</section>
<section id="section-team-members">
    <div class="container">
        <div class="row">
            <?php
            function generateTeamMember()
            {
                global $post;

                // define team member template
                $teamMemberTemplate ='<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 team-member %1$s" data-member-name="%2$s" data-job-title="%3$s" data-bio="%4$s" data-fb="%5$s" data-twitter="%6$s" data-insta="%7$s">
                    <a href="#team-member" class="btn-circle">
                        <img src="%8$s"/>
                        <div class="overlay">
                            <div class="content">
                                <h3 class="member-name">%2$s</h3>
                                <span class="job-title">%3$s</span>
                            </div>
                        </div>
                    </a>
                </div>';

                // pull content
                $photoArray = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                $photo = $photoArray[0];
                if (empty($photo)) {
                    $photo = get_stylesheet_directory_uri() . '/images/our-team/Placeholder_Photo.svg';
                }
                $content = apply_filters( 'the_content', get_the_content() );
                $content = htmlspecialchars( str_replace( ']]>', ']]&gt;', $content ) );
                $terms = get_the_terms($post->ID, 'team_member_category');
                $classes = "";
                if (is_array($terms)) {
                    foreach($terms as $term) {
                        $classes .= " " . $term->slug;
                    }
                }

                // print
                printf($teamMemberTemplate,
                    $classes,
                    get_the_title(),
                    get_field('title'),
                    $content,
                    esc_url(get_field('facebook_profile')),
                    esc_url(get_field('twitter_profile')),
                    esc_url(get_field('instagram_profile')),
                    $photo
                );
            }

            // order team members by staff, board, advisory council
            $queries = array(
                // staff with images
                array(
                    'post_type' => 'team',
                    'posts_per_page' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'meta_key' => '_thumbnail_id',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team_member_category',
                            'field' => 'slug',
                            'terms' => 'staff'
                        )
                    )
                ),
                // staff without images
                array(
                    'post_type' => 'team',
                    'posts_per_page' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team_member_category',
                            'field' => 'slug',
                            'terms' => 'staff'
                        )
                    )
                ),
                // board
                array(
                    'post_type' => 'team',
                    'posts_per_page' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team_member_category',
                            'field' => 'slug',
                            'terms' => array('staff', 'advisory-council', 'executive'),
                            'operator' => 'NOT IN'
                        )
                    )
                ),
                // advisory council
                array(
                    'post_type' => 'team',
                    'posts_per_page' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team_member_category',
                            'field' => 'slug',
                            'terms' => array('staff', 'board-member', 'executive'),
                            'operator' => 'NOT IN'
                        )
                    )
                )
            );

            // get ids of team members with photo
            $teamWithPhotos = array();
            $the_query = new WP_Query($queries[0]);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    array_push($teamWithPhotos, get_the_ID());
                }
            }
            wp_reset_postdata();

            // set post__not_in array for staff without photos query
            $queries[1]['post__not_in'] = $teamWithPhotos;

            // generate team members
            foreach ($queries as $args) {
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        generateTeamMember();
                    }
                }

                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</section>
<section id="section-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h2 class="header medium">
                    Join the Crusade
                    <span class="subheader">We have a heart for our mission and for each other. We'd love to have you on board.</span>
                </h2>
                <a href="<?php echo get_permalink(get_page_by_path('jobs')); ?>" class="btn btn-default primary">View job openings</a>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('partials/section', 'email-share'); ?>
<?php get_footer(); ?>