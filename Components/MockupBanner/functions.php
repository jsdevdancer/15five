<?php

namespace Flynt\Components\MockupBanner;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Mockup Banner', 'flynt'),
            'name' => 'MockupBanner',
            'sub_fields' => [
                [
                    'label' => 'Content Options',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Kicker Text', 'flynt'),
                    'name' => 'kicker_text',
                    'type' => 'text',
                    'required' => 0,
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
                Image::getACFLayout('Mockup', 'mockup', true),
                [
                    'label' => 'Style Options',
                    'name' => 'style_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Background Color:',
                    'name' => 'bg_color',
                    'type' => 'color_picker',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => 'Text Color:',
                    'name' => 'text_color',
                    'type' => 'color_picker',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}
