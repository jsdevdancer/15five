<?php

namespace Flynt\CustomPostTypes;

function registerContentLibraryPostType()
{
    $labels = [
        'name' => __('Content Library', 'flynt'),
        'singular_name' => __('Content Library', 'flynt'),
        'menu_name' => __('Content Library', 'flynt'),
        'name_admin_bar' => __('Content Library', 'flynt'),
        'all_items' => __('All Posts', 'flynt'),
        'add_new_item' => __('Add New Post', 'flynt'),
        'add_new' => __('Add New Post', 'flynt'),
        'new_item' => __('New Posts', 'flynt'),
        'edit_item' => __('Edit Post', 'flynt'),
        'update_item' => __('Update Posts', 'flynt'),
        'view_item' => __('View Posts', 'flynt'),
        'view_items' => __('View Posts', 'flynt'),
        'search_items' => __('Search Posts', 'flynt'),
    ];

    $args = [
        'label' => __('Content Library', 'flynt'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => ['slug' => 'content', 'with_front' => false],
        'show_in_rest' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-book-alt',
    ];

    register_post_type('content', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerContentLibraryPostType');
