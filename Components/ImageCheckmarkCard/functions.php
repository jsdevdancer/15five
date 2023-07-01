<?php

namespace Flynt\Components\ImageCheckmarkCard;

use ACFLayouts\Image;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Image Checkmark Card', 'flynt'),
            'name' => 'ImageCheckmarkCard',
            'sub_fields' => [
                [
                    'label' => 'Content',
                    'name' => 'card_content',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0
                ],
                [
                    'label' => 'Heading',
                    'name' => 'heading',
                    'type' => 'text',
                    'required' => 0,
                ],
                [
                    'label' => __('Cards', 'flynt'),
                    'name' => 'cards',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Card', 'flynt'),
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
                            'rows' => 2,
                            'required' => 1,
                        ],
                        [
                            'label' => 'Display Image',
                            'name' => 'display_image',
                            'type' => 'true_false',
                            'default_value' => 1,
                            'ui' => 1
                        ],
                        [
                            'label' => __('Image', 'flynt'),
                            'name' => 'image',
                            'type' => 'group',
                            'layout' => 'block',
                            'required' => 0,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'display_image',
                                        'operator' => '==',
                                        'value' => 1,
                                    ],
                                ],
                            ],
                            'sub_fields' => [
                                [
                                    'label' => __('Lazyload', 'flynt'),
                                    'name' => 'is_lazy',
                                    'type' => 'true_false',
                                    'default_value' => 1,
                                    'ui' => 1,
                                    'ui_on_text' => __('Yes', 'flynt'),
                                    'ui_off_text' => __('No', 'flynt'),
                                ],
                                [
                                    'label' => __('Desktop', 'flynt'),
                                    'name' => 'desktop',
                                    'type' => 'group',
                                    'layout' => 'table',
                                    'sub_fields' => [
                                        [
                                            'label' => __('@1x', 'flynt'),
                                            'name' => 'one_x',
                                            'type' => 'group',
                                            'layout' => 'table',
                                            'sub_fields' => [
                                                [
                                                    'label' => __('PNG/JPEG/SVG', 'flynt'),
                                                    'name' => 'old_format',
                                                    'type' => 'image',
                                                    'required' => 0,
                                                    'preview_size' => 'thumbnail',
                                                    'return_format' => 'array',
                                                    'library' => 'all',
                                                    'min_width' => 0,
                                                    'min_height' => 0,
                                                    'min_size' => 0,
                                                    'max_width' => 2000,
                                                    'max_height' => '',
                                                    'max_size' => '1',
                                                    'mime_types' => 'png,jpg,jpeg,svg',
                                                ],
                                            ],
                                        ],
                                        [
                                            'label' => __('@2x', 'flynt'),
                                            'name' => 'two_x',
                                            'type' => 'group',
                                            'layout' => 'table',
                                            'sub_fields' => [
                                                [
                                                    'label' => __('PNG/JPEG/SVG', 'flynt'),
                                                    'name' => 'old_format',
                                                    'type' => 'image',
                                                    'required' => 0,
                                                    'preview_size' => 'thumbnail',
                                                    'return_format' => 'array',
                                                    'library' => 'all',
                                                    'min_width' => 0,
                                                    'min_height' => 0,
                                                    'min_size' => 0,
                                                    'max_width' => 4000,
                                                    'max_height' => '',
                                                    'max_size' => '3',
                                                    'mime_types' => 'png,jpg,jpeg,svg',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'wrapper' => [
                                        'width' => '100',
                                    ],
                                ],
                                [
                                    'label' => __('Mobile', 'flynt'),
                                    'name' => 'mobile',
                                    'type' => 'group',
                                    'layout' => 'table',
                                    'sub_fields' => [
                                        [
                                            'label' => __('@1x', 'flynt'),
                                            'name' => 'one_x',
                                            'type' => 'group',
                                            'layout' => 'table',
                                            'sub_fields' => [
                                                [
                                                    'label' => __('PNG/JPEG/SVG', 'flynt'),
                                                    'name' => 'old_format',
                                                    'type' => 'image',
                                                    'required' => 0,
                                                    'preview_size' => 'thumbnail',
                                                    'return_format' => 'array',
                                                    'library' => 'all',
                                                    'min_width' => 0,
                                                    'min_height' => 0,
                                                    'min_size' => 0,
                                                    'max_width' => 1000,
                                                    'max_height' => '',
                                                    'max_size' => '1',
                                                    'mime_types' => 'png,jpg,jpeg,svg',
                                                ],
                                            ],
                                        ],
                                        [
                                            'label' => __('@2x', 'flynt'),
                                            'name' => 'two_x',
                                            'type' => 'group',
                                            'layout' => 'table',
                                            'sub_fields' => [
                                                [
                                                    'label' => __('PNG/JPEG/SVG', 'flynt'),
                                                    'name' => 'old_format',
                                                    'type' => 'image',
                                                    'required' => 0,
                                                    'preview_size' => 'thumbnail',
                                                    'return_format' => 'array',
                                                    'library' => 'all',
                                                    'min_width' => 0,
                                                    'min_height' => 0,
                                                    'min_size' => 0,
                                                    'max_width' => 2000,
                                                    'max_height' => '',
                                                    'max_size' => '1',
                                                    'mime_types' => 'png,jpg,jpeg,svg',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'wrapper' => [
                                        'width' => '100',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Options',
                    'name' => 'card_options',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0
                ],
                BackgroundColor::getACFLayout('white', true, false),
            ],
        ],
    ];
}
