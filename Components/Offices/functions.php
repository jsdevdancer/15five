<?php

namespace Flynt\Components\Offices;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'Offices',
        'label' => __('Offices', 'flynt'),
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
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Offices', 'flynt'),
                'name' => 'offices',
                'type' => 'repeater',
                'min' => 1,
                'max' => 12,
                'layout' => 'block',
                'button_label' => __('Add Office', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Map URL', 'flynt'),
                        'name' => 'map_url',
                        'type' => 'url',
                        'required' => 1,
                    ],
                    Image::getACFLayout(),
                    [
                        'label' => __('City', 'flynt'),
                        'name' => 'city',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => '33.33',
                        ],
                    ],
                    [
                        'label' => __('State', 'flynt'),
                        'name' => 'state',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => '33.33',
                        ],
                    ],
                    [
                        'label' => __('Address', 'flynt'),
                        'name' => 'address',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => '33.33',
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Press', 'flynt'),
                'name' => 'press',
                'type' => 'group',
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
                        'type' => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'toolbar' => 'default',
                        'media_upload' => 0,
                        'delay' => 1,
                        'required' => 1,
                    ],
                ],
            ],
        ],
    ];
}
