<?php

namespace Flynt\Components\InTheNews;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('In The News', 'flynt'),
            'name' => 'InTheNews',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('URL', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Aria Label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('News Highlights', 'flynt'),
                    'name' => 'news_highlights',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 8,
                    'layout' => 'block',
                    'button_label' => __('Add Item', 'flynt'),
                    'sub_fields' => [
                        Image::getACFLayout('Logo', 'logo', true),
                        [
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
