<?php

namespace Flynt\Components\ThreeColumnHero;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThreeColumnHero',
        'label' => __('Three Columns Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => 'Pre Title',
                'name' => 'pre_title',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'mime_types' => 'png,jpg,jpeg,svg',
                        'wrapper' => [
                            'width' => 20,
                        ],
                    ],
                    [
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => 80,
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => 'Content',
                'name' => 'columns',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 0,
                'max' => 6,
                'layout' => 'table',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 4,
                        'new_lines' => 'wpautop',
                    ],
                ],
            ],
            [
                'label' => 'Button',
                'name' => 'button',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Lable and link', 'flynt'),
                        'name' => 'button',
                        'type' => 'link',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'label' => __('Button ID', 'flynt'),
                        'name' => 'id',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => 20,
                        ],
                    ],
                    [
                        'label' => __('aria-label', 'flynt'),
                        'name' => 'aria_label',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => 30,
                        ],
                    ],
                ],
            ],

            Image::getACFLayout(),
        ],
    ];
}
