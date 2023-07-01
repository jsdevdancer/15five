<?php

namespace Flynt\Components\TextImageSmallCTA;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Text Image Small CTA', 'flynt'),
            'name' => 'TextImageSmallCTA',
            'sub_fields' => [
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
                    'type' => 'textarea',
                    'rows' => 3,
                    'required' => 1,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 30,
                    ],
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'button_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 35,
                    ],
                ],
                [
                    'label' => __('Button ID', 'flynt'),
                    'name' => 'primary_button_id',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 35,
                    ],
                ],
                Image::getACFLayout('Image', 'image', true),
            ],
        ],
    ];
}
