<?php

function create_posttype() {
    // Our Homes
    $homes_label = array(
        'name' => 'Models',
        'singular_name' => 'Model',
        'add_new' => 'Add Model',
        'add_new_item' => 'Add New Model',
        'edit_item' => 'Edit Model',
        'new_item' => 'New Model',
        'all_items' => 'All Models',
        'view_item' => 'View Model',
        'search_items' => 'Search Models',
        'not_found' => 'No Models found',
        'not_found_in_trash' => 'No Models found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Models',
    );
    $homes_args = array (
        'labels' => $homes_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'homes'),
        'capability_type' => 'page',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-home',
        'supports' => array('title', 'thumbnail', 'page-attributes'),
    );

    // Our Communities
    $communities_label = array(
        'name' => 'Communities',
        'singular_name' => 'Community',
        'add_new' => 'Add Community',
        'add_new_item' => 'Add New Community',
        'edit_item' => 'Edit Community',
        'new_item' => 'New Community',
        'all_items' => 'All Communities',
        'view_item' => 'View Community',
        'search_items' => 'Search Communities',
        'not_found' => 'No Communities found',
        'not_found_in_trash' => 'No Communities found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Communities',
    );
    $communities_args = array (
        'labels' => $communities_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'communities'),
        'capability_type' => 'page',
        'has_archive' => false,
        'hierarchical' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-multisite',
        'supports' => array('title', 'editor', 'thumbnail','page-attributes'),
    );

    register_post_type('homes', $homes_args);
    register_post_type('communities', $communities_args);
}

add_action( 'init', 'create_posttype' );