<?php

namespace Flynt\Components\PodcastGuests;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Podcast Guests', 'flynt'),
            'name' => 'PodcastGuests',
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
                    'required' => 1,
                ],
                [
                    'label' => __('Guests', 'flynt'),
                    'name' => 'guests',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Guest', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Name', 'flynt'),
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Position', 'flynt'),
                            'name' => 'position',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Button', 'flynt'),
                            'name' => 'button',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Button Aria Label', 'flynt'),
                            'name' => 'aria_label',
                            'type' => 'text',
                        ],
                        Image::getACFLayout(),
                    ],
                ],
            ],
        ],
    ];
}
