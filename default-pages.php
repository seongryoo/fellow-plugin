<?php

function add_required_pages_on_activation()
{
    $needed_pages = array(
        array('post_title' => 'Member Profile', 'post_name' => 'member-profile'),
        array('post_title' => 'Discover', 'post_name' => 'discover'),
        array('post_title' => 'Home', 'post_name' => 'app-home'),
        array('post_title' => 'Offers', 'post_name' => 'app-offers'),
        array('post_title' => 'Requests', 'post_name' => 'app-requests'),
        array('post_title' => 'Community', 'post_name' => 'app-community'),
    );
    foreach ($needed_pages as $needed_page) {
        $query = new WP_Query(array('pagename' => $needed_page['post_name']));
        if (!$query->have_posts()) {
            wp_insert_post(array(
                'post_author' => 1,
                'post_title' => $needed_page['post_title'],
                'post_name' => $needed_page['post_name'],
                'post_type' => 'page',
                'post_status' => 'publish'
            ));
        }
    }

}
