<?php

namespace Flynt\Components\TwoColumnResourceLinks;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Two Column Resource Links', 'flynt'),
            'name' => 'TwoColumnResourceLinks',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                Image::getACFLayout(),
                [
                    'label' => __('Left Column', 'flynt'),
                    'name' => 'left_column',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'left_title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'left_description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'required' => 1,
                ],
                [
                    'label' => __('Resources', 'flynt'),
                    'name' => 'left_resources',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 5,
                    'layout' => 'table',
                    'button_label' => __('Add Resource', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Resource', 'flynt'),
                            'name' => 'resource',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                        ],
                    ],
                ],
                [
                    'label' => __('Right Column', 'flynt'),
                    'name' => 'right_column',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'right_title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'right_description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'required' => 1,
                ],
                [
                    'label' => __('Resources', 'flynt'),
                    'name' => 'right_resources',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 5,
                    'layout' => 'table',
                    'button_label' => __('Add Resource', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Resource', 'flynt'),
                            'name' => 'resource',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
