<?php

function fellow_register_requests()
{
    $request_labels = array(
        'name' => _x('Requests', 'Post type general name', 'fellow-plugin'),
        'singular_name' => _x('Request', 'Post type singular name', 'fellow-plugin'),
        'menu_name' => _x('Requests', 'Admin Menu text', 'fellow-plugin'),
        'name_admin_bar' => _x('Request', 'Add New on Toolbar', 'fellow-plugin'),
        'add_new' => __('Add New', 'fellow-plugin'),
        'add_new_item' => __('Add New Request', 'fellow-plugin'),
        'new_item' => __('New Request', 'fellow-plugin'),
        'edit_item' => __('Edit Request', 'fellow-plugin'),
        'view_item' => __('View Request', 'fellow-plugin'),
        'all_items' => __('All Requests', 'fellow-plugin'),
        'search_items' => __('Search Requests', 'fellow-plugin'),
        'parent_item_colon' => __('Parent Requests:', 'fellow-plugin'),
        'not_found' => __('No requests found.', 'fellow-plugin'),
        'not_found_in_trash' => __('No requests found in Trash.', 'fellow-plugin'),
        'featured_image' => _x('Request Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'archives' => _x('Request archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'fellow-plugin'),
        'insert_into_item' => _x('Insert into request', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'fellow-plugin'),
        'uploaded_to_this_item' => _x('Uploaded to this request', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'fellow-plugin'),
        'filter_items_list' => _x('Filter requests list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'fellow-plugin'),
        'items_list_navigation' => _x('Requests list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'fellow-plugin'),
        'items_list' => _x('Requests list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'fellow-plugin'),
    );
    $request_options = array(
        'labels' => $request_labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'requests',
        ),
        'supports' => array(
            'title',
            'editor',
            'author'
        ),
        'capability_type' => array('request', 'requests'),
        'map_meta_cap' => true,
    );

    register_post_type('fellow_request', $request_options);
}