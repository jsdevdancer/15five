<?php

namespace Flynt\GlobalOptions;

use Flynt\Utils\Options;

// TODO check twig implementation
// Website global settings
Options::addGlobal('Website Settings', [
    [
        'label' => 'Website Scripts',
        'name' => 'website_scripts',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
            [
                'label' => 'Run tracking scripts?',
                'name' => 'run_tracking_scripts',
                'type' => 'true_false',
                'ui' => true,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ],
            [
                'label' => 'Before head closing tag',
                'name' => 'before_head_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'After body opening tag',
                'name' => 'after_body_opening_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'Before body closing tag',
                'name' => 'before_body_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
        ],
    ],
]);

// Options::addGlobal('Microsite Tickets iFrame', [
//     [
//         'label' => __('iFrame code', 'flynt'),
//         'name' => 'iframe_code',
//         'type' => 'textarea',
//         'rows' => 4,
//     ],
// ]);

Options::addGlobal('Drift Facade Settings', [
    [
        'label' => 'Settings',
        'name' => 'facade_options',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => 'Enable Drift',
                'name' => 'enable_drift',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => 'Enable Facade',
                'name' => 'enable_facade',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => 'Drift ID',
                'name' => 'drift_id',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => 'Sliding message - GLOBAL',
                'name' => 'global_message',
                'type' => 'text',
                'instructions' => 'Leave this empty to hide it',
            ],
            [
                'label' => 'Page specific sliding messages',
                'name' => 'drift_sliding_messages',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'table',
                'button_label' => 'Add Page',
                'sub_fields' => [
                    [
                        'label' => 'Page:',
                        'name' => 'page',
                        'type' => 'post_object',
                        'post_type' => ['page'],
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'id',
                        'ui' => 1,
                        'wrapper' => [
                            'width' => 30,
                        ],
                    ],
                    [
                        'label' => 'Drift Message for this page:',
                        'name' => 'page_sliding_message',
                        'type' => 'textarea',
                        'rows' => 4,
                        'new_lines' => 'wpautop',
                    ],
                ],
            ],
        ],
    ],
]);

Options::addGlobal('Pardot Settings for Newsletter', [
    [
        'label' => 'Standard Pardot Url',
        'name' => 'pardot_url_1',
        'type' => 'url',
        'required' => 1,
    ],
    [
        'label' => 'Individual Form Settings',
        'instructions' =>
            'This will override the standard setting for the selected forms. For the forms that are set on individual components the url can also be set in each component which overrides this setting for said form',
        'name' => 'indiviual_configs',
        'type' => 'repeater',
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => 'Add Item',
        'sub_fields' => [
            [
                'label' => 'Form Location:',
                'name' => 'location',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'choices' => [
                    'footer-form' => 'Footer',
                    'newsletter-form' => 'Newsletter Banners',
                    'podcast-form' => 'Podcasts Heros',
                ],
                'default_value' => '',
                'required' => 1,
            ],
            [
                'label' => 'Pardot URL:',
                'name' => 'pardot_url_2',
                'type' => 'url',
                'required' => 1,
            ],
        ],
    ],
]);
