<?php

namespace Flynt\Components\NewsletterBanner;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Newsletter Banner', 'flynt'),
            'name' => 'NewsletterBanner',
            'sub_fields' => [
                [
                    'label' => 'Content Options',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                Image::getACFLayout(),
                [
                    'label' => 'Pardot Settings',
                    'name' => 'pardot_settings',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Custom Pardot Url',
                    'name' => 'pardot_url_3',
                    'type' => 'url',
                ],
            ],
        ],
    ];
}
