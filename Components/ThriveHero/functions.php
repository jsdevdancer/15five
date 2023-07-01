<?php

namespace Flynt\Components\ThriveHero;

use ACFLayouts\Image;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Hero', 'flynt'),
            'name' => 'ThriveHero',
            'sub_fields' => [
                [
                    'label' => __('Logo Options', 'flynt'),
                    'name' => 'logo_options',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                Image::getACFLayout('Logo', 'logo', false),
                Image::getACFLayout('Tagline', 'tagline', false),
                [
                    'label' => 'Content Options',
                    'name' => 'content_options',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Headline', 'flynt'),
                    'name' => 'headline',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 6,
                ],
                [
                    'label' => __('Primary Button', 'flynt'),
                    'name' => 'primary_button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Secondary Button', 'flynt'),
                    'name' => 'secondary_button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}