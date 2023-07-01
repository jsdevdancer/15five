<?php

namespace Flynt\Components\ProductFeatureHero;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Product Feature Hero', 'flynt'),
            'name' => 'ProductFeatureHero',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Product URL', 'flynt'),
                    'name' => 'product_url',
                    'type' => 'link',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Product URL Aria Label', 'flynt'),
                    'name' => 'product_url_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('SVG Product Icon', 'flynt'),
                    'name' => 'product_icon',
                    'type' => 'image',
                    'preview_size' => 'thumbnail',
                    'return_format' => 'array',
                    'library' => 'all',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 300,
                    'max_height' => '',
                    'max_size' => '0.1',
                    'mime_types' => 'svg',
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'button_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 4,
                ],
                [
                    'label' => 'Image/Video',
                    'name' => 'video_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Overlay', 'flynt'),
                    'name' => 'overlay',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => __('Yes', 'flynt'),
                    'ui_off_text' => __('No', 'flynt'),
                    'wrapper' => [
                        'width' => 20,
                    ],
                ],
                [
                    'label' => __('Full Image Width', 'flynt'),
                    'name' => 'image_width',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '20',
                    ],
                ],
                [
                    'label' => __('White Bottom Background', 'flynt'),
                    'name' => 'white_background',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '20',
                    ],
                ],
                [
                    'label' => __('Img/Video Background', 'flynt'),
                    'name' => 'component_background',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '20',
                    ],
                ],
                [
                    'label' => __('Video', 'flynt'),
                    'name' => 'is_video',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => __('Yes', 'flynt'),
                    'ui_off_text' => __('No', 'flynt'),
                    'wrapper' => [
                        'width' => 20,
                    ],
                ],
                Image::getACFLayout('Video Background Image', 'feature_image', true),
                Video::getACFLayout('Video', 'video'),
            ],
        ],
    ];
}