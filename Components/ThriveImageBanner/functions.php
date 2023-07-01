<?php

namespace Flynt\Components\ThriveImageBanner;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Image Banner', 'flynt'),
            'name' => 'ThriveImageBanner',
            'sub_fields' => [
                [
                    'label' => 'Content Options',
                    'name' => 'content_option_tab',
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
                    'type' => 'wysiwyg',
                    'required' => 1,
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
                    'label' => 'Image Options',
                    'name' => 'image_option_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                Image::getACFLayout('Mockup', 'mockup', true),
            ],
        ],
    ];
}