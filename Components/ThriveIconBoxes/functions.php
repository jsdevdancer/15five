<?php

namespace Flynt\Components\ThriveIconBoxes;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThriveIconBoxes',
        'label' => __('Thrive Icon Boxes', 'flynt'),
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
                'label' => __('Kicker', 'flynt'),
                'name' => 'kicker',
                'type' => 'text',
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Button ID', 'flynt'),
                'name' => 'primary_button_id',
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
            [
                'label' => __('Our Platform 1', 'flynt'),
                'name' => 'our_platform1_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Our Platform 1', 'flynt'),
                'name' => 'our_platform1',
                'type' => 'group',
                'required' => 0,
                'sub_fields' => [
                    Image::getACFLayout(),
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
                        'required' => 1,
                        'rows' => 2,
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
            [
                'label' => __('Our Platform 2', 'flynt'),
                'name' => 'our_platform2_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Our Platform 2', 'flynt'),
                'name' => 'our_platform2',
                'type' => 'group',
                'required' => 0,
                'sub_fields' => [
                    Image::getACFLayout(),
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
                        'required' => 1,
                        'rows' => 2,
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
            [
                'label' => __('Our Platform 3', 'flynt'),
                'name' => 'our_platform3_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Our Platform 3', 'flynt'),
                'name' => 'our_platform3',
                'type' => 'group',
                'sub_fields' => [
                    Image::getACFLayout('Image', 'image', false),
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Description', 'flynt'),
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
        ],
    ];
}