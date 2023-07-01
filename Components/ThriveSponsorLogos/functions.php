<?php

namespace Flynt\Components\ThriveSponsorLogos;

function getACFLayout()
{
    return [
        'name' => 'ThriveSponsorLogos',
        'label' => __('Thrive Sponsor Logos', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Section ID', 'flynt'),
                'name' => 'section_id',
                'type' => 'text',
            ],
            [
                'label' => __('Headline', 'flynt'),
                'name' => 'headline',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Logos', 'flynt'),
                'name' => 'logos',
                'type' => 'repeater',
                'required' => 1,
                'min' => 1,
                'max' => 5,
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
                        'max_width' => 350,
                        'max_height' => '',
                        'max_size' => '0.1',
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
                    'kin' =>
                        'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
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
        ],
    ];
}