<?php

require_once(plugin_dir_path(__FILE__) . '/offers.php');
require_once(plugin_dir_path(__FILE__) . '/requests.php');

/**
 * Registers all the custom post types used by the Offers, Proposals, and Requests plugin
 * @return void
 */
function fellow_register_custom_post_types() {
    fellow_register_offers();
    fellow_register_requests();
}