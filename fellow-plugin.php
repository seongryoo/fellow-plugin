<?php

/*
Plugin Name: Fellow Plugin
Description: Backend for the Fellow social network
Author: Fellow
Version: 1.0.0
Text Domain: fellow-plugin
*/

require_once(plugin_dir_path(__FILE__) . 'default-pages.php');

require_once(plugin_dir_path(__FILE__) . 'custom-post-types/custom-post-types.php');

require_once(plugin_dir_path(__FILE__) . 'custom-taxonomies/custom-taxonomies.php');


register_activation_hook(__FILE__, 'add_required_pages_on_activation');

const ADMIN_OFFER_CAPABILITIES = array(
    'edit_offers',
    'edit_others_offers',
    'delete_offers',
    'publish_offers',
    'read_private_offers',
    'delete_private_offers',
    'delete_published_offers',
    'delete_others_offers',
    'edit_private_offers',
    'edit_published_offers',
);

function fellow_init_actions()
{
    fellow_register_custom_post_types();
    fellow_register_custom_taxonomies();
}

add_action('init', 'fellow_init_actions');


function fellow_add_capabilities()
{
    $role = get_role('administrator');
    foreach (ADMIN_OFFER_CAPABILITIES as $cap) {
        $role->add_cap($cap);
    }
}

function fellow_add_roles()
{
    add_role('fellow_member', __('Fellow Member', 'fellow_plugin'), array(
        'read' => true,
        'edit_offers' => true,
        'delete_offers' => true,
        'publish_offers' => true,
        'read_private_offers' => true,
        'delete_private_offers' => true,
        'delete_published_offers' => true,
        'edit_private_offers' => true,
        'edit_published_offers' => true,
    ));
}
function fellow_activation_hook()
{
    fellow_add_roles();
    fellow_add_capabilities();
    fellow_register_custom_post_types();
}

register_activation_hook(__FILE__, 'fellow_activation_hook');


function fellow_remove_roles()
{
    remove_role('member');
}
function fellow_remove_capabilities()
{
    $role = get_role('administrator');
    foreach (ADMIN_OFFER_CAPABILITIES as $cap) {
        $role->remove_cap($cap);
    }
}
function fellow_deactivation_hook()
{
    fellow_remove_roles();
    fellow_remove_capabilities();
}

register_deactivation_hook(__FILE__, 'fellow_deactivation_hook');