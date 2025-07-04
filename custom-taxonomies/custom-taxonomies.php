<?php

require_once(plugin_dir_path(__FILE__) . '/trade-categories.php');

/**
 * Registers all the custom taxonomies used by the Offers, Proposals, and Requests plugin
 * @return void
 */
function fellow_register_custom_taxonomies() {
    fellow_register_trade_categories();
    fellow_insert_default_trade_categories();
}