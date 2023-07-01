<?php

namespace Flynt\Components\ThriveEventPricing;

use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Event Pricing', 'flynt'),
            'name' => 'ThriveEventPricing',
            'sub_fields' => [
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Content Options', 'flynt'),
                    'name' => 'content_options',
                    'type' => 'tab',
                    'placement' => 'top',
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
                    'rows' => 2,
                    'required' => 1,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                ],
                [
                    'label' => 'Pricing Options',
                    'name' => 'pricing_options',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'label' => __('Event Pricing', 'flynt'),
                    'name' => 'tickets',
                    'type' => 'repeater',
                    'min' => 1,
                    'required' => 1,
                    'layout' => 'block',
                    'button_label' => __('Add Ticket', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => [
                                'width' => 60,
                            ],
                        ],
                        [
                            'label' => __('Border', 'flynt'),
                            'name' => 'border',
                            'type' => 'select',
                            'default_value' => 'Mind',
                            'choices' => [
                                'mind' =>
                                    'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16DBDB; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                                'heart' =>
                                    'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #FF52A1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                                'motion' =>
                                    'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6C00DB; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                                'cornbread' =>
                                    'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #F4AE2A; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            ],
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'ajax' => 1,
                            'return_format' => 'value',
                            'wrapper' => [
                                'width' => 40,
                            ],
                        ],
                        [
                            'label' => __('Schedule', 'flynt'),
                            'name' => 'schedule',
                            'type' => 'group',
                            'sub_fields' => [
                                // [
                                //     'label' => __('Icon', 'flynt'),
                                //     'name' => 'icon',
                                //     'type' => 'true_false',
                                //     'default_value' => 0,
                                //     'ui' => 1,
                                //     'ui_on_text' => __('Yes', 'flynt'),
                                //     'ui_off_text' => __('No', 'flynt'),
                                //     'wrapper' => [
                                //         'width' => 30,
                                //     ],
                                // ],
                                [
                                    'label' => __('Date', 'flynt'),
                                    'name' => 'date',
                                    'type' => 'text',
                                    'wrapper' => [
                                        'width' => 70,
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Price', 'flynt'),
                            'name' => 'price',
                            'type' => 'text',
                            'required' => 1,
                            'wrapper' => [
                                'width' => 30,
                            ],
                        ],
                        [
                            'label' => __('Purchase Link', 'flynt'),
                            'name' => 'purchase_link',
                            'type' => 'link',
                            'wrapper' => [
                                'width' => 70,
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Disclaimer', 'flynt'),
                    'name' => 'disclaimer',
                    'type' => 'text',
                ],
            ],
        ],
    ];
}