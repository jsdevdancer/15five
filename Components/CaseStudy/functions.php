<?php

namespace Flynt\Components\CaseStudy;

function getACFLayout()
{
    return [
        'name' => 'CaseStudy',
        'label' => __('Case Study', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Left Column', 'flynt'),
                'name' => 'left_column_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'required' => 1,
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
                    'required' => 1,
                ],
                [
                    'label' => __('Quote', 'flynt'),
                    'name' => 'quote',
                    'type' => 'text',
                    'required' => 0,
                ],
                [
                    'label' => __('Quote Name', 'flynt'),
                    'name' => 'quote_name',
                    'type' => 'text',
                    'required' => 0,
                ],
                [
                    'label' => __('Quote Company', 'flynt'),
                    'name' => 'quote_company',
                    'type' => 'text',
                    'required' => 0,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
            [
                'label' => __('Right Column', 'flynt'),
                'name' => 'right_column_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Card Title', 'flynt'),
                'name' => 'card_title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Card Style', 'flynt'),
                'name' => 'card_style',
                'type' => 'select',
                'required' => 1,
                'choices' => [
                    'tide1_kin' =>
                        'Outer Tide1 <div style="width: 8px; height: 8px; display: inline-block; background-color: #1A0D3F; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div> - Inner Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #FFF2E8; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'tide10_tide1' =>
                        'Outer Tide1 Light <div style="width: 8px; height: 8px; display: inline-block; background-color: rgba(26, 13, 63, 0.1); border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div> - Inner Tide1 <div style="width: 8px; height: 8px; display: inline-block; background-color: #1A0D3F; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'tide10_rise_ext' =>
                        'Outer Tide1 Light <div style="width: 8px; height: 8px; display: inline-block; background-color: rgba(26, 13, 63, 0.1); border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div> - Inner Rise Extended <div style="width: 8px; height: 8px; display: inline-block; background-color: #FF4B11; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                ],
                'default_value' => 'tide1_kin',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
            ],
            [
                'label' => __('Card Logo', 'flynt'),
                'name' => 'card_logo',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'mime_types' => 'svg',
                'required' => 1,
            ],
            [
                'label' => __('Card Label (small)', 'flynt'),
                'name' => 'card_label',
                'type' => 'text',
                'required' => 1,
            ],
        ],
    ];
}
