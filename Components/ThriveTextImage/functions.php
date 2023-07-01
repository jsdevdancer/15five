<?php

namespace Flynt\Components\ThriveTextImage;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Text Image', 'flynt'),
            'name' => 'ThriveTextImage',
            'sub_fields' => [
                [
                    'label' => __('Image options', 'flynt'),
                    'name' => 'image_tab',
                    'type' => 'tab',
                ],
                Image::getACFLayout('Image', 'image', true),
                Image::getACFLayout('Background', 'background', true),
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Content options', 'flynt'),
                    'name' => 'content_tab',
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
                    'type' => 'wysiwyg',
                    'required' => 1,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 0,
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
            ],
        ],
    ];
}