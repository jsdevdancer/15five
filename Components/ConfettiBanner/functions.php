<?php

namespace Flynt\Components\ConfettiBanner;

use ACFLayouts\Image;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Confetti Banner', 'flynt'),
            'name' => 'ConfettiBanner',
            'sub_fields' => [
                [
                    'label' => 'Content Options',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
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
                    'rows' => 6,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => 'Style Options',
                    'name' => 'style_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                BackgroundColor::getACFLayout('white', true, false),
                [
                    'label' => 'Banner Background Color:',
                    'name' => 'bg_color',
                    'type' => 'color_picker',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 55,
                    ],
                ],
                [
                    'label' => 'Text Color:',
                    'name' => 'text_color',
                    'type' => 'color_picker',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 45,
                    ],
                ],
            ],
        ],
    ];
}
