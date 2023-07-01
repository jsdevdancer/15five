<?php

namespace Flynt\Components\IntegrationsCards;

use ACFLayouts\Image;

add_filter('Flynt/addComponentData?name=IntegrationsCards', function ($data) {
    $categories = $data['categories'];

    for ($i = 0; $i < sizeof($categories); $i++) {
        $cat_id = $categories[$i]['category']->ID;

        $data['categories'][$i]['posts'] = new \Timber\PostQuery([
            'post_type' => 'integrations',
            'post_status' => ['publish'],
            'orderby' => 'date',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => [
                [
                    'taxonomy' => 'integrations-category',
                    'field' => 'term_id',
                    'terms' => $cat_id,
                ],
            ],
        ]);
    }

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('Partner Integrations Cards', 'flynt'),
            'name' => 'IntegrationsCards',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'text',
                ],
                [
                    'label' => __('Categories', 'flynt'),
                    'name' => 'categories',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Taxonomy', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Choose Category', 'flynt'),
                            'name' => 'category',
                            'type' => 'taxonomy',
                            'taxonomy' => 'integrations-category',
                            'field_type' => 'select',
                            'add_term' => 0,
                            'save_terms' => 0,
                            'load_terms' => 0,
                            'allow_null' => 0,
                            'multiple' => 0,
                            'required' => 1,
                            'return_format' => 'object',
                            'ui' => 1,
                        ],
                    ],
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'background_color',
                    'type' => 'select',
                    'instructions' => __('Select background color', 'flynt'),
                    'required' => 1,
                    'choices' => [
                        'white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                        'off_grey' =>
                            'Off Grey <div style="width: 8px; height: 8px; display: inline-block; background-color: #F8F8F9; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    ],
                    'default_value' => 'white',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select background color', 'flynt'),
                ],
            ],
        ],
    ];
}
