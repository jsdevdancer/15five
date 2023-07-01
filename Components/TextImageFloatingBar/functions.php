<?php

namespace Flynt\Components\TextImageFloatingBar;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Text Image Floating Bar', 'flynt'),
            'name' => 'TextImageFloatingBar',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'section_title',
                    'instructions' => __('Title outside the section', 'flynt'),
                    'type' => 'text',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Section Description', 'flynt'),
                    'name' => 'section_description',
                    'instructions' => __('Description outside the section', 'flynt'),
                    'type' => 'textarea',
                    'rows' => 2,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
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
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'wrapper' => [
                        'width' => 40,
                    ],
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'button_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 40,
                    ],
                ],
                [
                    'label' => __('Activate Tooltip', 'flynt'),
                    'name' => 'activate_tooltip',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => 20,
                    ],
                ],
                [
                    'label' => __('Tooltip', 'flynt'),
                    'name' => 'tooltip',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Tooltip Text', 'flynt'),
                            'name' => 'tooltip_text',
                            'type' => 'text',
                        ],
                        [
                            'label' => __('Tooltip Icon', 'flynt'),
                            'name' => 'tooltip_icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'mime_types' => 'svg',
                        ],
                    ],
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'activate_tooltip',
                                'operator' => '!=',
                                'value' => '0',
                            ],
                        ],
                    ],
                ],
                Image::getACFLayout(),
                [
                    'label' => __('Style', 'flynt'),
                    'name' => 'style',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Image border', 'flynt'),
                    'name' => 'image_border',
                    'type' => 'button_group',
                    'choices' => [
                        'left' => __('Left', 'flynt'),
                        'right' => __('Right', 'flynt'),
                    ],
                    'default_value' => 'left',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Tooltip Position', 'flynt'),
                    'name' => 'tooltip_position',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'choices' => [
                        'top' => __('Top', 'flynt'),
                        'bottom' => __('Bottom', 'flynt'),
                        'inside' => __('Inside photo', 'flynt'),
                    ],
                    'default_value' => 'top',
                    'wrapper' => [
                        'width' => '50',
                    ],
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'activate_tooltip',
                                'operator' => '!=',
                                'value' => '0',
                            ],
                        ],
                    ],
                ],
                Image::getACFLayout('Background Illustration', 'background_illustration', true),
            ],
        ],
    ];
}
