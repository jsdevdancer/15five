<?php

namespace Flynt\CustomPostTypes;

function registerNewsPostType()
{
    $labels = [
        'name' => __('News', 'flynt'),
        'singular_name' => __('News', 'flynt'),
        'menu_name' => __('News', 'flynt'),
        'name_admin_bar' => __('News', 'flynt'),
        'all_items' => __('All News', 'flynt'),
        'add_new_item' => __('Add News', 'flynt'),
        'add_new' => __('Add News', 'flynt'),
        'new_item' => __('New Article', 'flynt'),
        'edit_item' => __('Edit News', 'flynt'),
        'update_item' => __('Update News', 'flynt'),
        'view_item' => __('View News', 'flynt'),
        'view_items' => __('View News', 'flynt'),
        'search_items' => __('Search News', 'flynt'),
    ];

    $args = [
        'label' => __('News', 'flynt'),
        'labels' => $labels,
        'supports' => ['title', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'news', 'with_front' => false],
        'show_in_rest' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-aside',
    ];

    register_post_type('news', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerNewsPostType');
