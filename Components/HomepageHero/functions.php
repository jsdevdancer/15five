<?php

namespace Flynt\Components\HomepageHero;

use ACFLayouts\Image;
use Flynt\Utils\JavascriptData;

add_filter('Flynt/addComponentData?name=HomepageHero', function ($data) {
    $javascript_data = ['autoplay_speed' => $data['slides_autoplay_speed']];
    JavascriptData::setDataObject($javascript_data, 'HomepageHero');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'HomepageHero',
        'label' => __('Homepage Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Subtitle', 'flynt'),
                'name' => 'subtitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'required' => 1,
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
                'label' => __('Secondary Button', 'flynt'),
                'name' => 'button_secondary',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Button ID', 'flynt'),
                'name' => 'secondary_button_id',
                'type' => 'text',
                'wrapper' => [
                    'width' => 20,
                ],
            ],
            [
                'label' => __('aria-label', 'flynt'),
                'name' => 'aria_label_secondary',
                'type' => 'text',
                'wrapper' => [
                    'width' => 30,
                ],
            ],
            [
                'label' => __('WYSIWYG', 'flynt'),
                'name' => 'wysiwyg',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1,
            ],
            Image::getACFLayout(),
            [
                'label' => __('Slides', 'flynt'),
                'name' => 'slides',
                'type' => 'repeater',
                'required' => 1,
                'min' => 2,
                'max' => 5,
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => __('SVG Logo', 'flynt'),
                        'name' => 'logo',
                        'type' => 'image',
                        'required' => 1,
                        'preview_size' => 'thumbnail',
                        'return_format' => 'array',
                        'library' => 'all',
                        'min_width' => 0,
                        'min_height' => 0,
                        'min_size' => 0,
                        'max_width' => 300,
                        'max_height' => 50,
                        'max_size' => '0.1',
                        'mime_types' => 'svg',
                        'wrapper' => [
                            'width' => '15',
                        ],
                    ],
                    [
                        'label' => __('Quote', 'flynt'),
                        'name' => 'quote',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 2,
                    ],
                    [
                        'label' => __('Person', 'flynt'),
                        'name' => 'person',
                        'type' => 'text',
                        'required' => 1,
                    ],
                ],
            ],
            [
                'label' => 'Slider Options',
                'name' => 'slider_options_tab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Slides autoplay speed (ms)', 'flynt'),
                'name' => 'slides_autoplay_speed',
                'type' => 'number',
                'wrapper' => [
                    'width' => 100,
                ],
                'placeholder' => 3000,
                'default_value' => 3000,
            ],
        ],
    ];
}
