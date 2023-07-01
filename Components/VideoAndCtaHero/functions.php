<?php

namespace Flynt\Components\VideoAndCtaHero;

use ACFLayouts\Image;
use ACFLayouts\Video;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Video and CTA Hero', 'flynt'),
            'name' => 'VideoAndCtaHero',
            'sub_fields' => [
                [
                    'label' => 'Content Options',
                    'name' => 'content_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'required' => 1,
                ],
                [
                    'label' => __('Subtitle', 'flynt'),
                    'name' => 'subtitle',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => 'Primary Button',
                    'name' => 'button',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Button', 'flynt'),
                            'name' => 'link',
                            'type' => 'link',
                            'required' => 1,
                            'wrapper' => [
                                'width' => 50,
                            ],
                        ],
                        [
                            'label' => __('Button ID', 'flynt'),
                            'name' => 'id',
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
                    ],
                ],
                [
                    'label' => 'Secondary Button',
                    'name' => 'secondary_button',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Button', 'flynt'),
                            'name' => 'link',
                            'type' => 'link',
                            'required' => 1,
                            'wrapper' => [
                                'width' => 50,
                            ],
                        ],
                        [
                            'label' => __('Button ID', 'flynt'),
                            'name' => 'id',
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
                    ],
                ],
                [
                    'label' => 'Video Options',
                    'name' => 'video_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                Image::getACFLayout('Video Background Image', 'bg_image', true),
                Video::getACFLayout('Video', 'video'),
                [
                    'label' => 'Style Settings',
                    'name' => 'style_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Enable Image Overlay?',
                    'name' => 'image_overlay',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'choices' => [
                        'overlay' => 'Yes',
                        'false' => 'No',
                    ],
                    'default_value' => 'false',
                ],
                BackgroundColor::getACFLayout('kin-light', true, false),
            ],
        ],
    ];
}
