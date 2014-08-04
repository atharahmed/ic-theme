<?php

// define custom post types
$ic_post_types = array(
    'program' => array(
        'labels' => array(
            'name' => ('Program'),
            'singular_name' => ('Program'),
            'add_new' => ('Add Program'),
            'add_new_item' => ('Add New Program'),
            'edit_item' => ('Edit Program'),
            'new_item' => ('New Program'),
            'view_item' => ('View Program'),
            'search_items' => ('Search Programs'),
            'not_found' => ('No Program found'),
            'not_found_in_trash' => ('No Program found in Trash'),
            'menu_name' => 'Programs'
        ),
        'menu_position' => 100,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => 'program',
        'capability_type' => 'page',
        'rewrite' => array(
            'slug' => 'program',
            'with_front' => false
        ),
        'has_archive' => false,
        'supports' => array('title','editor','page-attributes','thumbnail')
    ),
    'team' => array(
        'labels' => array(
            'name' => ('Team Member'),
            'singular_name' => ('Member'),
            'add_new' => ('Add Team Member'),
            'add_new_item' => ('Add New Team Member'),
            'edit_item' => ('Edit Team Member'),
            'new_item' => ('New Team Member'),
            'view_item' => ('View Team Member'),
            'search_items' => ('Search Team Members'),
            'not_found' => ('No Team Member found'),
            'not_found_in_trash' => ('No Team Member found in Trash'),
            'menu_name' => 'Team Members'
        ),
        'menu_position' => 100,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'supports' => array('title','editor','page-attributes','thumbnail')
    )
);

// add custom post types
add_action('init', 'ic_custom_post_types');
function ic_custom_post_types(){
    global $ic_post_types;

    foreach( $ic_post_types as $post_type => $params ) {
        register_post_type( $post_type, $params );
        flush_rewrite_rules();
    }
};

// define custom post taxonomies
$ic_custom_taxonomies = array(
    'program_type' => array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Program Type',
            'singular_name' => 'Program Type',
            'search_items' => 'Search Program Types',
            'popular_items' => 'Popular Program Types',
            'all_items' => 'All Program Types',
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => 'Edit Type',
            'update_item' => 'Update Type',
            'add_new_item' => 'Add Program Type',
            'new_item_name' => 'New Program Type',
            'separate_items_with_commas' => 'Separate Types with commas',
            'add_or_remove_items' => 'Add or remove Program Types',
            'choose_from_most_used' => 'Choose from the most used Program Types',
            'menu_name' => 'Program Types',

        ),
        'object_type' => 'program'
    ),
    'team_member_category' => array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Team Member Category',
            'singular_name' => 'Team Member Category',
            'search_items' => 'Search Team Member Categories',
            'popular_items' => 'Popular Team Member Categories',
            'all_items' => 'All Team Member Categories',
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => 'Edit Team Member Category',
            'update_item' => 'Update Team Member Category',
            'add_new_item' => 'Add Team Member Category',
            'new_item_name' => 'New Team Member Category',
            'separate_items_with_commas' => 'Separate Team Member Categories with commas',
            'add_or_remove_items' => 'Add or remove Team Member Categories',
            'choose_from_most_used' => 'Choose from the most used Team Member Categories',
            'menu_name' => 'Team Member Categories',

        ),
        'object_type' => 'team'
    )
);

// add custom post taxonomies
function ic_custom_taxonomy(){
    global $ic_custom_taxonomies;
    
    foreach( $ic_custom_taxonomies as $taxonomy => $params ) {
        register_taxonomy($taxonomy, $params['object_type'], $params);  
    }
};
add_action('init', 'ic_custom_taxonomy');