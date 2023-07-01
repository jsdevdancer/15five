<?php

namespace Flynt\notificationBarOptions;

use Flynt\Utils\Options;

Options::addGlobal('Notification Bar', [
    [
        [
            'label' => __('Controls', 'flynt'),
            'name' => 'controls_tab',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'label' => __('Is Notification Bar Active?', 'flynt'),
            'name' => 'bar_active',
            'type' => 'true_false',
            'default_value' => 0,
            'ui' => 1,
        ],
        [
            'label' => __('Date Range'),
            'name' => 'data_range',
            'type' => 'group',
            'instructions' => __(
                'Select the date range when the notification bar is active, in Coordinated Universal Time (UTC)',
                'flynt'
            ),
            'sub_fields' => [
                [
                    'label' => __('Start Date', 'flynt'),
                    'name' => 'start_date',
                    'type' => 'date_time_picker',
                    'show_date' => 'true',
                    'display_format' => 'Y-m-d H:i:s',
                    'return_format' => 'Y-m-d H:i:s',
                    'show_week_number' => 'true',
                    'picker' => 'slider',
                    'save_as_timestamp' => 'true',
                    'get_as_timestamp' => 'true',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('End Date', 'flynt'),
                    'name' => 'end_date',
                    'type' => 'date_time_picker',
                    'show_date' => 'true',
                    'display_format' => 'Y-m-d H:i:s',
                    'return_format' => 'Y-m-d H:i:s',
                    'show_week_number' => 'true',
                    'picker' => 'slider',
                    'save_as_timestamp' => 'true',
                    'get_as_timestamp' => 'true',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Display Conditions', 'flynt'),
            'name' => 'display_conditions',
            'type' => 'select',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'choices' => [
                'homepage' => __('Homepage', 'flynt'),
                'entire_site' => __('Entire Site', 'flynt'),
            ],
            'default_value' => 'homepage',
            'instructions' => __(
                'Select where you want the bar to be displayed. Content Library posts are always excluded.',
                'flynt'
            ),
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Cookie Validity', 'flynt'),
            'name' => 'cookie_validity',
            'type' => 'group',
            'instructions' => __(
                'Select for how long you want the notification bar to be disabled after the user clicks on the close 
                button.',
                'flynt'
            ),
            'sub_fields' => [
                [
                    'label' => __('Type', 'flynt'),
                    'name' => 'type',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'choices' => [
                        'session' => __('Session', 'flynt'),
                        'period' => __('Period', 'flynt'),
                    ],
                    'default_value' => 'session',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Nº of Hours', 'flynt'),
                    'name' => 'hours',
                    'type' => 'number',
                    'step' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'type',
                                'operator' => '==',
                                'value' => 'period',
                            ],
                        ],
                    ],
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Content', 'flynt'),
            'name' => 'content_tab',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'label' => __('WYSIWYG', 'flynt'),
            'name' => 'wysiwyg',
            'type' => 'wysiwyg',
            'tabs' => 'visual,text',
            'toolbar' => 'default',
            'media_upload' => 0,
            'delay' => 1,
            'required' => 1,
            'instructions' => __('Recommended maximum of 100 characters.', 'flynt'),
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Button', 'flynt'),
            'name' => 'button',
            'type' => 'group',
            'sub_fields' => [
                [
                    'label' => __('Link', 'flynt'),
                    'name' => 'link',
                    'type' => 'link',
                    'return_format' => 'array',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Aria Label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Style', 'flynt'),
            'name' => 'style_tab',
            'type' => 'tab',
            'placement' => 'top',
        ],
        [
            'label' => __('Background Type', 'flynt'),
            'name' => 'bg_type',
            'type' => 'select',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'choices' => [
                'bg_image' => __('Background Image', 'flynt'),
                'solid_bg' => __('Solid Background', 'flynt'),
            ],
            'default_value' => 'bg_image',
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
        [
            'label' => __('Background Image', 'flynt'),
            'name' => 'bg_image',
            'type' => 'group',
            'layout' => 'block',
            'required' => 1,
            'sub_fields' => [
                [
                    'label' => __('Desktop Image', 'flynt'),
                    'name' => 'desktop_image',
                    'type' => 'image',
                    'preview_size' => 'thumbnail',
                    'return_format' => 'url',
                    'library' => 'all',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 2000,
                    'max_height' => '',
                    'max_size' => '1',
                    'mime_types' => 'png,jpg,jpeg,svg',
                ],
                [
                    'label' => __('Mobile Image', 'flynt'),
                    'name' => 'mobile_image',
                    'type' => 'image',
                    'preview_size' => 'thumbnail',
                    'return_format' => 'url',
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
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bg_type',
                        'operator' => '==',
                        'value' => 'bg_image',
                    ],
                ],
            ],
        ],
        [
            'label' => __('Background Color', 'flynt'),
            'name' => 'bg_color',
            'type' => 'select',
            'required' => 1,
            'choices' => [
                'white' =>
                    'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                'rise' =>
                    'Rise <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                'motion' =>
                    'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6c00db; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'cornbread' =>
                    'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #f4ae2a; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'heart' =>
                    'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #ff52a1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'mind' =>
                    'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16dbdb; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'kin' =>
                    'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'tide' =>
                    'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'tide-light' =>
                    'Tide Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #f8f8f9; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'kin-light' =>
                    'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                'black' =>
                    'Black <div style="width: 8px; height: 8px; display: inline-block; background-color: #000000; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
            ],
            'default_value' => 'white',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 1,
            'return_format' => 'value',
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bg_type',
                        'operator' => '==',
                        'value' => 'solid_bg',
                    ],
                ],
            ],
        ],
        [
            'label' => __('Text Color', 'flynt'),
            'name' => 'text_color',
            'type' => 'select',
            'required' => 1,
            'choices' => [
                'white' =>
                    'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                'tide' =>
                    'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
            ],
            'default_value' => 'white',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 1,
            'return_format' => 'value',
            'conditional_logic' => [
                [
                    [
                        'fieldPath' => 'bar_active',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
        ],
    ],
]);
