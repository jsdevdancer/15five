<?php

namespace Flynt\Components\IconButtons;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Icon Buttons', 'flynt'),
            'name' => 'IconButtons',
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
                    'rows' => 3,
                ],
                [
                    'label' => __('Buttons', 'flynt'),
                    'name' => 'buttons',
                    'type' => 'repeater',
                    'collapsed' => '',
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'block',
                    'button_label' => __('Add Button', 'flynt'),
                    'sub_fields' => [
                        Image::getACFLayout(),
                        [
                            'label' => __('Link', 'flynt'),
                            'name' => 'link',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                            'wrapper' => [
                                'width' => 70,
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
            ],
        ],
    ];
}
