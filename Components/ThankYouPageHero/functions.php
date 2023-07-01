<?php

namespace Flynt\Components\ThankYouPageHero;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThankYouPageHero',
        'label' => __('Thank You Page Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
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
                'type' => 'text',
                'required' => 1,
            ],
        ],
    ];
}
