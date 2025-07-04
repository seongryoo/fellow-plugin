<?php

function fellow_register_trade_categories()
{
    $cat_args = array(
        'labels' => array(
            'name' => 'Trade Categories',
            'singular_name' => 'Trade Category',
            'edit_item' => 'Edit Trade Category',
            'update_item' => 'Update Trade Category',
            'add_new_item' => 'Add New Trade Category',
            'new_item_name' => 'New Trade Category Name',
            'menu_name' => 'Trade Category',
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'trade-category'),
        'show_in_rest' => true,
        'capabilities'      => array(
            'manage_terms'  => 'manage_trade_categories',
            'edit_terms'    => 'edit_trade_categories',
            'delete_terms'  => 'delete_trade_categories',
            'assign_terms'  => 'assign_trade_categories'
        )
    );
    register_taxonomy('fellow_trade_category', array('fellow_request', 'fellow_offer'), $cat_args);
}

function fellow_insert_default_trade_categories()
{
    wp_insert_term(
        'Goods',
        'fellow_trade_category',
        array(
            'description' => 'Goods description TBA',
            'slug' => 'goods',
        )
    );
    wp_insert_term(
        'Services',
        'fellow_trade_category',
        array(
            'description' => 'Services description TBA',
            'slug' => 'services',
        )
    );
    wp_insert_term(
        'Skills',
        'fellow_trade_category',
        array(
            'description' => 'Skills description TBA',
            'slug' => 'skills',
        )
    );
}