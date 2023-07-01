<?php

namespace Flynt\Components\TwoColumnTextSection;

function getACFLayout()
{
    return [
        [
            'label' => __('Two Column Text Section', 'flynt'),
            'name' => 'TwoColumnTextSection',
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
                    'label' => __('Left Column', 'flynt'),
                    'name' => 'left_column',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Column Title', 'flynt'),
                            'name' => 'column_title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Column Description', 'flynt'),
                            'name' => 'column_description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                        ],
                    ],
                ],
                [
                    'label' => __('Right Column', 'flynt'),
                    'name' => 'right_column',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Column Title', 'flynt'),
                            'name' => 'column_title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Column Description', 'flynt'),
                            'name' => 'column_description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                        ],
                    ],
                ],
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'options_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'label' => __('Left Column', 'flynt'),
                    'name' => 'options_left_column',
                    'type' => 'group',
                    'wrapper' => [
                        'width' => '50',
                    ],
                    'sub_fields' => [
                        [
                            'label' => __('Text Position', 'flynt'),
                            'name' => 'text_align',
                            'type' => 'button_group',
                            'choices' => [
                                'text-left' =>
                                    '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Text on the left\'></i>',
                                'text-center' =>
                                    '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Text on the center\'></i>',
                                'text-right' =>
                                    '<i class=\'dashicons dashicons-editor-alignright\' title=\'Text on the right\'></i>',
                            ],
                            'default_value' => 'text-center',
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Right Column', 'flynt'),
                    'name' => 'options_right_column',
                    'type' => 'group',
                    'wrapper' => [
                        'width' => '50',
                    ],
                    'sub_fields' => [
                        [
                            'label' => __('Text Position', 'flynt'),
                            'name' => 'text_align',
                            'type' => 'button_group',
                            'choices' => [
                                'text-left' =>
                                    '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Text on the left\'></i>',
                                'text-center' =>
                                    '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Text on the center\'></i>',
                                'text-right' =>
                                    '<i class=\'dashicons dashicons-editor-alignright\' title=\'Text on the right\'></i>',
                            ],
                            'default_value' => 'text-center',
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
