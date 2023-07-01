<?php

namespace Flynt\Components\ContentCards;

add_filter('Flynt/addComponentData?name=ContentCards', function ($data) {
    $posts_per_page = 8;

    $data['posts_per_page'] = $posts_per_page;

    if (!isset($paged) || !$paged) {
        $paged = 1;
    }

    if ($data['choose_taxonomy'] == 'content-category') {
        $data['taxonomy'] = $data['taxonomy_category'];
    } else {
        $data['taxonomy'] = $data['taxonomy_type'];
    }

    $data['posts'] = new \Timber\PostQuery([
        'post_type' => 'content',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'tax_query' => [
            [
                'taxonomy' => $data['choose_taxonomy'],
                'field' => 'term_id',
                'terms' => $data['taxonomy'],
            ],
        ],
        'paged' => $paged,
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('Content Library Cards', 'flynt'),
            'name' => 'ContentCards',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'text',
                ],
                [
                    'label' => __('Choose which Taxonomy to use as filter', 'flynt'),
                    'name' => 'choose_taxonomy',
                    'type' => 'radio',
                    'other_choice' => 0,
                    'save_other_choice' => 0,
                    'layout' => 'horizontal',
                    'choices' => [
                        'content-category' => __('Content Category', 'flynt'),
                        'content-type' => __('Content Type', 'flynt'),
                    ],
                    'default_value' => 'content-category',
                ],
                [
                    'label' => __('Choose Category', 'flynt'),
                    'name' => 'taxonomy_category',
                    'type' => 'taxonomy',
                    'taxonomy' => 'content-category',
                    'field_type' => 'select',
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'required' => 1,
                    'return_format' => 'id',
                    'ui' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'choose_taxonomy',
                                'operator' => '==',
                                'value' => 'content-category',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Choose Type', 'flynt'),
                    'name' => 'taxonomy_type',
                    'type' => 'taxonomy',
                    'taxonomy' => 'content-type',
                    'field_type' => 'select',
                    'add_term' => 0,
                    'save_terms' => 0,
                    'load_terms' => 0,
                    'allow_null' => 0,
                    'multiple' => 0,
                    'required' => 1,
                    'return_format' => 'id',
                    'ui' => 1,
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'choose_taxonomy',
                                'operator' => '==',
                                'value' => 'content-type',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Load More Button Label', 'flynt'),
                    'name' => 'load_more_label',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Style', 'flynt'),
                    'name' => 'style',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Heading Position', 'flynt'),
                    'name' => 'heading_position',
                    'type' => 'button_group',
                    'choices' => [
                        'left' =>
                            '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                        'center' =>
                            '<i class=\'dashicons dashicons-align-center\' title=\'Text on the center\'></i>',
                    ],
                    'default_value' => 'center',
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
