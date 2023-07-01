<?php

namespace Flynt\CustomPostTypes;

use ACFComposer\ACFComposer;
use ACFLayouts\Image;

function registerIntegrationsPostType()
{
    $labels = [
        'name' => __('Integrations', 'flynt'),
        'singular_name' => __('Integration', 'flynt'),
        'menu_name' => __('Integrations', 'flynt'),
        'name_admin_bar' => __('Integrations', 'flynt'),
        'all_items' => __('All Integrations', 'flynt'),
        'add_new_item' => __('Add New Integration', 'flynt'),
        'add_new' => __('Add New Integration', 'flynt'),
        'new_item' => __('New Integration', 'flynt'),
        'edit_item' => __('Edit Integration', 'flynt'),
        'update_item' => __('Update Integration', 'flynt'),
        'view_item' => __('View Integration', 'flynt'),
        'view_items' => __('View Integrations', 'flynt'),
        'search_items' => __('Search Integrations', 'flynt'),
    ];

    $args = [
        'label' => __('Integrations', 'flynt'),
        'labels' => $labels,
        'supports' => ['title'],
        'hierarchical' => false,
        'public' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'integrations', 'with_front' => false],
        'show_in_rest' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-rest-api',
    ];

    register_post_type('integrations', $args);
}

add_action('init', '\Flynt\CustomPostTypes\registerIntegrationsPostType');

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'integrationsComponents',
        'title' => 'Partner Integration Details',
        'style' => 'standard',
        'position' => 'normal',
        'fields' => [
          Image::getACFLayout('Integrations Card', 'card_image', true),
          [
              'label' => __('Partner Name', 'flynt'),
              'name' => 'partnerName',
              'type' => 'text',
              'required' => 1,
          ],
          [
              'label' => __('Description', 'flynt'),
              'name' => 'description',
              'type' => 'text',
          ],
          [
              'label' => __('URL', 'flynt'),
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
                    'value' => 'integrations',
                ],
            ],
        ],
    ]);
});
