<?php

namespace Flynt\Components\TextImageFramed;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'label' => __('Text with Framed Image', 'flynt'),
        'name' => 'TextImageFramed',
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'tab',
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
            ],
            [
                'label' => __('Button Aria Label', 'flynt'),
                'name' => 'button_aria_label',
                'type' => 'text',
            ],
            Image::getACFLayout('Photo', 'photo'),
            [
                'label' => __('Options', 'flynt'),
                'name' => 'options',
                'type' => 'tab',
            ],
            Image::getACFLayout('Background Image', 'background_image'),
            [
                'label' => __('Hide on mobile?', 'flynt'),
                'name' => 'hide_mobile',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
            ],
        ],
    ];
}
