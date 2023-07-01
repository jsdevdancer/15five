<?php

namespace Flynt\CustomPostTypes;

function registerEventsPostType()
{
    $labels = [
        'name' => __('Events', 'flynt'),
        'singular_name' => __('Event', 'flynt'),
        'menu_name' => __('Events', 'flynt'),
        'name_admin_bar' => __('Events', 'flynt'),
        'all_items' => __('All Events', 'flynt'),
        'add_new_item' => __('Add New Event', 'flynt'),
        'add_new' => __('Add New Event', 'flynt'),
        'new_item' => __('New Event', 'flynt'),
        'edit_item' => __('Edit Event', 'flynt'),
        'update_item' => __('Update Event', 'flynt'),
        'view_item' => __('View Event', 'flynt'),
        'view_items' => __('View Events', 'flynt'),
        'search_items' => __('Search Events', 'flynt'),
    ];

    $args = [
        'label' => __('Event', 'flynt'),
        'labels' => $labels,
        'supports' => ['title', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'event', 'with_front' => false],
        'show_in_rest' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-calendar-alt',
    ];

    register_post_type('event', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerEventsPostType');
