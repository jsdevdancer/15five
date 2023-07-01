<?php

namespace Flynt\CustomPostTypes;

use ACFComposer\ACFComposer;
use Flynt\Components;
use ACFLayouts\Image;

function registerAwardsPostType()
{
    $labels = [
        'name' => __('Awards', 'flynt'),
        'singular_name' => __('Award', 'flynt'),
        'menu_name' => __('Awards', 'flynt'),
        'name_admin_bar' => __('Awards', 'flynt'),
        'all_items' => __('All Awards', 'flynt'),
        'add_new_item' => __('Add New Award', 'flynt'),
        'add_new' => __('Add New Award', 'flynt'),
        'new_item' => __('New Award', 'flynt'),
        'edit_item' => __('Edit Award', 'flynt'),
        'update_item' => __('Update Award', 'flynt'),
        'view_item' => __('View Award', 'flynt'),
        'view_items' => __('View Awards', 'flynt'),
        'search_items' => __('Search Awards', 'flynt'),
    ];

    $args = [
        'label' => __('Awards', 'flynt'),
        'labels' => $labels,
        'supports' => ['title'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'awards', 'with_front' => false],
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-awards',
    ];

    register_post_type('awards', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerAwardsPostType');

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'awardsComponents',
        'title' => 'Awards Details',
        'style' => 'standard',
        'position' => 'normal',
        'fields' => [
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Source', 'flynt'),
                'name' => 'source',
                'type' => 'text',
                'required' => 1,
            ],
            Image::getACFLayout('Badge', 'badge', true),
            [
                'label' => __('Award URL', 'flynt'),
                'name' => 'url',
                'type' => 'url',
                'required' => 1,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'awards',
                ],
            ],
        ],
    ]);
});
