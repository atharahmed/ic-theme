<?php
$categoryTitle = strtolower(single_cat_title('', false));

add_action('wp_enqueue_scripts', 'enqueueBlogScripts');
function enqueueBlogScripts()
{
    wp_enqueue_script('blog', get_stylesheet_directory_uri() . '/js/blog.js', array('ic-email-form'), null, true);
    wp_enqueue_style('blog', get_stylesheet_directory_uri() . '/css/blog.css');
}

?>
<?php get_header(); ?>

<section id="section-header" class="page-header">
	<div class="bg-image"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="header hero secondary">
					Blog
                    <span class="subheader">
                        Updates and inspiration
                    </span>
				</h1>
			</div>
		</div>
	</div>
</section>
<section id="section-filter">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
                <div class="controls-wrap">
                    <form action="<?php echo home_url(); ?>/blog/category/" method="get" class="categories-form">
                        <div class="form-group categories">
                            <select class="form-control select2 category-select" data-placeholder="Filter by category">
                                <option></option>
                                <?php
                                $categories = get_categories();
                                $categoryTemplate = '<option value="%1$s" %2$s>%3$s</option>';
                                foreach($categories as $category){
                                    printf($categoryTemplate,
                                        get_category_link($category->cat_ID),
                                        strtolower($category->name) == $categoryTitle ? 'selected' : '',
                                        strtolower($category->name));
                                }
                                ?>
                            </select>
                        </div>
                    </form>
                    <?php get_search_form(); ?>
                </div>
			</div>
		</div>
	</div>
</section>
<section id="section-posts">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php
        $featuredImageArray = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
        $featuredImage = $featuredImageArray[0];

        if (empty($featuredImage)) {
            $featuredImage = get_stylesheet_directory_uri() . '/images/blog/header-bg.jpg';
        }
        ?>
        <div class="post">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn-circle" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $featuredImage; ?>);">
                            <div class="overlay">
                                <div class="content">
                                    <p>Read More</p>
                                </div>
                            </div>
                        </a>
                        <p class="date"><?php the_date(); ?></p>
                        <p class="author">by <?php the_author(); ?></p>
                    </div>
                    <div class="col-md-7">
                        <a href="<?php the_permalink(); ?>">
                            <p class="header small"><?php the_title(); ?></p>
                        </a>
                        <div class="excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn btn-border primary">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
<section id="section-pagination">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="controls-wrap" align="center">
                <?php
                    $totalposts = $wp_query->found_posts;
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $per_page = get_query_var('posts_per_page');
                    $last_page = ceil($totalposts / $per_page);

                    if($last_page > $paged) { 
                        echo '<div class="blog-buttons"><a href="'.get_pagenum_link($paged + 1).'" class="btn btn-default solid primary"><span class="ic-icon-left-arrow nav-arrow"></span>Older Posts</a></div>';
                    }

                    if($paged > 1) { 
                        echo '<div class="blog-buttons"><a href="'.get_pagenum_link($paged - 1).'" class="btn btn-default solid primary">Newer Posts<span class="ic-icon-right-arrow nav-arrow"></span></a></div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="section-email-sign-up">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="header smallest">Don’t miss out</h3>
				<h2 class="header medium">Sign up for updates
                    <span class="subheader">
						Get all the latest news and our exclusive content straight to your email inbox.
                    </span>
				</h2>
			</div>
			<div class="col-md-8 col-md-offset-2">
                <?php get_template_part('partials/email', 'form'); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>