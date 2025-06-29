<?php

/*
Plugin Name: Fellow Plugin
Description: Backend for the Fellow social network
Author: Fellow
Version: 1.0.0
Text Domain: fellow-plugin
*/

const FELLOW_DOMAIN = 'fellow-plugin';

const ADMIN_OFFERING_CAPABILITIES = array(
    'edit_offerings',
    'edit_others_offerings',
    'delete_offerings',
    'publish_offerings',
    'read_private_offerings',
    'delete_private_offerings',
    'delete_published_offerings',
    'delete_others_offerings',
    'edit_private_offerings',
    'edit_published_offerings',
);

/**
 * Registers all the custom post types used by the Offerings, Proposals, and Requests plugin
 * @return void
 */
function fellow_register_custom_post_types()
{
    $offering_labels = array(
        'name' => _x('Offerings', 'Post type general name', FELLOW_DOMAIN),
        'singular_name' => _x('Offering', 'Post type singular name', FELLOW_DOMAIN),
        'menu_name' => _x('Offerings', 'Admin Menu text', FELLOW_DOMAIN),
        'name_admin_bar' => _x('Offering', 'Add New on Toolbar', FELLOW_DOMAIN),
        'add_new' => __('Add New', FELLOW_DOMAIN),
        'add_new_item' => __('Add New Offering', FELLOW_DOMAIN),
        'new_item' => __('New Offering', FELLOW_DOMAIN),
        'edit_item' => __('Edit Offering', FELLOW_DOMAIN),
        'view_item' => __('View Offering', FELLOW_DOMAIN),
        'all_items' => __('All Offerings', FELLOW_DOMAIN),
        'search_items' => __('Search Offerings', FELLOW_DOMAIN),
        'parent_item_colon' => __('Parent Offerings:', FELLOW_DOMAIN),
        'not_found' => __('No offerings found.', FELLOW_DOMAIN),
        'not_found_in_trash' => __('No offerings found in Trash.', FELLOW_DOMAIN),
        'featured_image' => _x('Offering Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', FELLOW_DOMAIN),
        'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', FELLOW_DOMAIN),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', FELLOW_DOMAIN),
        'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', FELLOW_DOMAIN),
        'archives' => _x('Offering archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', FELLOW_DOMAIN),
        'insert_into_item' => _x('Insert into offering', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', FELLOW_DOMAIN),
        'uploaded_to_this_item' => _x('Uploaded to this offering', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', FELLOW_DOMAIN),
        'filter_items_list' => _x('Filter offerings list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', FELLOW_DOMAIN),
        'items_list_navigation' => _x('Offerings list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', FELLOW_DOMAIN),
        'items_list' => _x('Offerings list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', FELLOW_DOMAIN),
    );
    $offering_options = array(
        'labels' => $offering_labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'offerings',
        ),
        'supports' => array(
            'title',
            'editor',
            'author'
        ),
        'taxonomies' => array(
            'category'
        ),
        'capability_type' => array('offering', 'offerings'),
        'map_meta_cap' => true,
    );

    register_post_type('fellow_offering', $offering_options);

}

add_action('init', 'fellow_register_custom_post_types');


function fellow_add_capabilities()
{
    $role = get_role('administrator');
    foreach (ADMIN_OFFERING_CAPABILITIES as $cap) {
        $role->add_cap($cap);
    }
}

function fellow_add_roles()
{
    add_role('fellow_member', __('Fellow Member', FELLOW_DOMAIN), array(
        'read' => true,
        'edit_offerings' => true,
        'delete_offerings' => true,
        'publish_offerings' => true,
        'read_private_offerings' => true,
        'delete_private_offerings' => true,
        'delete_published_offerings' => true,
        'edit_private_offerings' => true,
        'edit_published_offerings' => true,
    ));
}
function fellow_activation_hook()
{
    fellow_add_roles();
    fellow_add_capabilities();
    fellow_register_custom_post_types();
}

register_activation_hook(__FILE__, 'fellow_activation_hook');


function fellow_remove_roles() {
    remove_role('member');
}
function fellow_remove_capabilities()
{
    $role = get_role('administrator');
    foreach (ADMIN_OFFERING_CAPABILITIES as $cap) {
        $role->remove_cap($cap);
    }
}
function fellow_deactivation_hook()
{
    fellow_remove_roles();
    fellow_remove_capabilities();
}

register_deactivation_hook(__FILE__, 'fellow_deactivation_hook');