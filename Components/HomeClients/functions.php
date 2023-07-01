<?php

namespace Flynt\Components\HomeClients;

use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=HomeClients', function ($data) {
    $data['stars'] = [
        'src' => Asset::requireUrl('Components/HomeClients/Assets/stars.svg'),
    ];

    $data['padding_variables'] =
        '
    --padding-mobile-top:' .
        $data['padding']['mobile']['top'] .
        'px;
    --padding-mobile-bottom:' .
        $data['padding']['mobile']['bottom'] .
        'px;
    --padding-desktop-top:' .
        $data['padding']['desktop']['top'] .
        'px;
    --padding-desktop-bottom:' .
        $data['padding']['desktop']['top'] .
        'px;
    ';

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'HomeClients',
        'label' => __('Home Clients', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('G2 Logo (optional)', 'flynt'),
                'name' => 'g2_logo',
                'type' => 'image',
                'preview_size' => 'thumbnail',
                'return_format' => 'array',
                'library' => 'all',
                'min_width' => 0,
                'min_height' => 0,
                'min_size' => 0,
                'max_width' => 300,
                'max_height' => '',
                'max_size' => '0.1',
                'mime_types' => 'svg',
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
                'label' => __('G2 Rating (optional)', 'flynt'),
                'name' => 'g2_rating',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => __('SVG Stars', 'flynt'),
                        'name' => 'stars_icon',
                        'type' => 'image',
                        'preview_size' => 'thumbnail',
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_width' => 0,
                        'min_height' => 0,
                        'min_size' => 0,
                        'max_width' => 300,
                        'max_height' => '',
                        'max_size' => '0.1',
                        'mime_types' => 'svg',
                    ],
                    [
                        'label' => __('Label', 'flynt'),
                        'name' => 'stars_label',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'label' => __('Logos (optional)', 'flynt'),
                'name' => 'logos',
                'type' => 'repeater',
                'min' => 0,
                'max' => 7,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => __('SVG Logo', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'required' => 1,
                        'preview_size' => 'thumbnail',
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_width' => 0,
                        'min_height' => 0,
                        'min_size' => 0,
                        'max_width' => 300,
                        'max_height' => '',
                        'max_size' => '0.1',
                        'mime_types' => 'svg',
                    ],
                ],
            ],
            [
                'label' => __('Reviews', 'flynt'),
                'name' => 'reviews',
                'type' => 'repeater',
                'required' => 1,
                'min' => 3,
                'max' => 9,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => __('Review', 'flynt'),
                        'name' => 'review',
                        'type' => 'group',
                        'layout' => 'table',
                        'required' => 1,
                        'sub_fields' => [
                            [
                                'label' => __('Quote', 'flynt'),
                                'name' => 'quote',
                                'type' => 'textarea',
                                'required' => 1,
                                'rows' => 2,
                                'wrapper' => [
                                    'width' => '40',
                                ],
                            ],
                            [
                                'label' => __('Person', 'flynt'),
                                'name' => 'person',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '30',
                                ],
                            ],
                            [
                                'label' => __('Position', 'flynt'),
                                'name' => 'position',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '30',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'options_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'background_color',
                'type' => 'select',
                'instructions' => __('Select background color', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
                'choices' => [
                    'white' =>
                        'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'kin-light' =>
                        'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'tide' =>
                        'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                ],
                'default_value' => 'white',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select background color', 'flynt'),
            ],
            [
                'label' => 'Background Image (lazyloaded)',
                'name' => 'bg_image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'mime_types' => 'jpg,jpeg,svg',
            ],
            [
                'label' => 'Custom Vertical Spacing',
                'name' => 'padding',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Mobile',
                        'name' => 'mobile',
                        'type' => 'group',
                        'wrapper' => ['width' => 50],
                        'sub_fields' => [
                            [
                                'label' => 'Top',
                                'name' => 'top',
                                'type' => 'number',
                                'min' => 0,
                                'step' => 1,
                                'append' => 'px',
                                'default_value' => 20,
                                'placeholder' => 20,
                            ],
                            [
                                'label' => 'Bottom',
                                'name' => 'bottom',
                                'type' => 'number',
                                'step' => 1,
                                'append' => 'px',
                                'default_value' => 20,
                                'placeholder' => 20,
                            ],
                        ],
                    ],
                    [
                        'label' => 'Desktop',
                        'name' => 'desktop',
                        'type' => 'group',
                        'wrapper' => ['width' => 50],
                        'sub_fields' => [
                            [
                                'label' => 'Top',
                                'name' => 'top',
                                'type' => 'number',
                                'min' => 0,
                                'step' => 1,
                                'append' => 'px',
                                'default_value' => 20,
                                'placeholder' => 20,
                            ],
                            [
                                'label' => 'Bottom',
                                'name' => 'bottom',
                                'type' => 'number',
                                'step' => 1,
                                'append' => 'px',
                                'default_value' => 20,
                                'placeholder' => 20,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
