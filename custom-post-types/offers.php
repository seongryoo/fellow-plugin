<?php

function fellow_register_offers()
{
    $offer_labels = array(
        'name' => _x('Offers', 'Post type general name', 'fellow-plugin'),
        'singular_name' => _x('Offer', 'Post type singular name', 'fellow-plugin'),
        'menu_name' => _x('Offers', 'Admin Menu text', 'fellow-plugin'),
        'name_admin_bar' => _x('Offer', 'Add New on Toolbar', 'fellow-plugin'),
        'add_new' => __('Add New', 'fellow-plugin'),
        'add_new_item' => __('Add New Offer', 'fellow-plugin'),
        'new_item' => __('New Offer', 'fellow-plugin'),
        'edit_item' => __('Edit Offer', 'fellow-plugin'),
        'view_item' => __('View Offer', 'fellow-plugin'),
        'all_items' => __('All Offers', 'fellow-plugin'),
        'search_items' => __('Search Offers', 'fellow-plugin'),
        'parent_item_colon' => __('Parent Offers:', 'fellow-plugin'),
        'not_found' => __('No offers found.', 'fellow-plugin'),
        'not_found_in_trash' => __('No offers found in Trash.', 'fellow-plugin'),
        'featured_image' => _x('Offer Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'fellow-plugin'),
        'archives' => _x('Offer archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'fellow-plugin'),
        'insert_into_item' => _x('Insert into offer', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'fellow-plugin'),
        'uploaded_to_this_item' => _x('Uploaded to this offer', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'fellow-plugin'),
        'filter_items_list' => _x('Filter offers list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'fellow-plugin'),
        'items_list_navigation' => _x('Offers list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'fellow-plugin'),
        'items_list' => _x('Offers list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'fellow-plugin'),
    );
    $offer_options = array(
        'labels' => $offer_labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'offers',
        ),
        'supports' => array(
            'title',
            'editor',
            'author'
        ),
        'capability_type' => array('offer', 'offers'),
        'map_meta_cap' => true,
    );

    register_post_type('fellow_offer', $offer_options);
}