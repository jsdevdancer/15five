<?php

namespace Flynt\Components\ContactUs;

use ACFLayouts\Image;

add_filter('Flynt/addComponentData?name=ContactUs', function ($data) {
    $data['thank_you'] = isset($_GET['thank_you']) && $_GET['thank_you'] === 'true' ? true : false;

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ContactUs',
        'label' => __('Contact Us', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'tab',
            ],

            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Kicker', 'flynt'),
                'name' => 'kicker',
                'type' => 'text',
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
                'label' => __('List with Icons', 'flynt'),
                'name' => 'list',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('List Item', 'flynt'),
                        'name' => 'list_items',
                        'type' => 'repeater',
                        'min' => 0,
                        'max' => 4,
                        'layout' => 'table',
                        'sub_fields' => [
                            [
                                'label' => __('SVG Icon', 'flynt'),
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                                'max_size' => '0.1',
                                'wrapper' => [
                                    'width' => '10',
                                ],
                            ],
                            [
                                'label' => __('Label', 'flynt'),
                                'name' => 'label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '40',
                                ],
                            ],
                            [
                                'label' => __('Description', 'flynt'),
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 5,
                                'wrapper' => [
                                    'width' => '50',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Links', 'flynt'),
                'name' => 'links',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Show Image Links Section?', 'flynt'),
                        'name' => 'show_links',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => __('Yes', 'flynt'),
                        'ui_off_text' => __('No', 'flynt'),
                    ],
                    [
                        'label' => __('Accent Image', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'max_size' => '0.1',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'show_links',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'show_links',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Links', 'flynt'),
                        'name' => 'links',
                        'type' => 'repeater',
                        'collapsed' => '',
                        'min' => 1,
                        'max' => 3,
                        'layout' => 'table',
                        'button_label' => __('Add Link', 'flynt'),
                        'sub_fields' => [
                            [
                                'label' => __('Link', 'flynt'),
                                'name' => 'link',
                                'type' => 'link',
                                'return_format' => 'array',
                            ],
                            [
                                'label' => __('aria-label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                            ],
                        ],
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'show_links',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Logos', 'flynt'),
                'name' => 'logos',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Show Logos Section?', 'flynt'),
                        'name' => 'show_logos',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => __('Yes', 'flynt'),
                        'ui_off_text' => __('No', 'flynt'),
                    ],
                    [
                        'label' => __('Headline', 'flynt'),
                        'name' => 'headline',
                        'type' => 'text',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'show_logos',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Logos', 'flynt'),
                        'name' => 'logos',
                        'type' => 'repeater',
                        'min' => 0,
                        'max' => 5,
                        'layout' => 'table',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'show_logos',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                        'sub_fields' => [
                            [
                                'label' => __('SVG Logo', 'flynt'),
                                'name' => 'image',
                                'type' => 'image',
                                'required' => 1,
                                'preview_size' => 'thumbnail',
                                'return_format' => 'array',
                                'library' => 'all',
                                'min_width' => 0,
                                'min_height' => 0,
                                'min_size' => 0,
                                'max_width' => 300,
                                'max_height' => '',
                                'max_size' => '0.1',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Form', 'flynt'),
                'name' => 'form',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Form Title', 'flynt'),
                        'name' => 'gravity_form_title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Form', 'flynt'),
                        'name' => 'gravity_form',
                        'type' => 'forms',
                        'required' => 1,
                        'return_format' => 'id',
                        'allow_null' => 0,
                        'multiple' => 0,
                    ],
                ],
            ],
            [
                'label' => __('Success Message', 'flynt'),
                'name' => 'success_message',
                'type' => 'text',
                'required' => true,
            ],
        ],
    ];
}
