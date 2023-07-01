<?php

namespace Flynt\CustomPostTypes;

function registerEditorsPostType()
{
    $labels = [
        'name' => __('Editor', 'flynt'),
        'singular_name' => __('Editor', 'flynt'),
        'menu_name' => __('Blocks', 'flynt'),
        'name_admin_bar' => __('Blocks', 'flynt'),
        'all_items' => __('All Pages', 'flynt'),
        'add_new_item' => __('Add Page', 'flynt'),
        'add_new' => __('Add New', 'flynt'),
        'new_item' => __('New Page', 'flynt'),
        'edit_item' => __('Edit Pages', 'flynt'),
        'update_item' => __('Update Pages', 'flynt'),
        'view_item' => __('View Pages', 'flynt'),
        'view_items' => __('View Pages', 'flynt'),
        'search_items' => __('Search Pages', 'flynt'),
    ];

    $args = [
        'label' => __('Editor', 'flynt'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-schedule',
    ];

    register_post_type('Editor', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerEditorsPostType');