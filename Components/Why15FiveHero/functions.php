<?php

namespace Flynt\Components\Why15FiveHero;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Why 15Five Hero', 'flynt'),
            'name' => 'Why15FiveHero',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Company Logos', 'flynt'),
                    'name' => 'company_logos',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 5,
                    'layout' => 'row',
                    'button_label' => __('Add Logo', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('SVG Logo', 'flynt'),
                            'name' => 'image',
                            'type' => 'image',
                            'required' => 1,
                            'preview_size' => 'thumbnail',
                            'return_format' => 'array',
                            'library' => 'all',
                            'max_width' => 300,
                            'max_size' => '0.1',
                            'mime_types' => 'svg',
                        ],
                    ],
                ],
                [
                    'label' => __('Checkmark Cards', 'flynt'),
                    'name' => 'checkmark_cards',
                    'type' => 'repeater',
                    'collapsed' => '',
                    'min' => 1,
                    'layout' => 'table',
                    'button_label' => __('Add Card', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 2,
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
