<?php

namespace Flynt\Components\Spacer;

function getACFLayout()
{
    return [
        [
            'label' => __('Spacer', 'flynt'),
            'name' => 'spacer',
            'sub_fields' => [
                [
                    'label' => __('Mobile', 'flynt'),
                    'name' => 'mobile',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Increase or reduce space?', 'flynt'),
                            'name' => 'increase_reduce',
                            'type' => 'radio',
                            'instructions' => __(
                                'Do you want to increase spacing between two components or reduce it?',
                                'flynt'
                            ),
                            'other_choice' => 0,
                            'save_other_choice' => 0,
                            'layout' => 'horizontal',
                            'choices' => [
                                'none' => __('None', 'flynt'),
                                'increase' => __('Increase', 'flynt'),
                                'reduce' => __('Reduce', 'flynt'),
                            ],
                            'default_value' => 'none',
                        ],
                        [
                            'label' => __('Size', 'flynt'),
                            'name' => 'increase',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'increase_reduce',
                                        'operator' => '==',
                                        'value' => 'increase',
                                    ],
                                ],
                            ],
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                        [
                            'label' => __('Size', 'flynt'),
                            'name' => 'reduce',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'increase_reduce',
                                        'operator' => '==',
                                        'value' => 'reduce',
                                    ],
                                ],
                            ],
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Desktop', 'flynt'),
                    'name' => 'desktop',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Increase or reduce space?', 'flynt'),
                            'name' => 'increase_reduce',
                            'type' => 'radio',
                            'instructions' => __(
                                'Do you want to increase spacing between two components or reduce it?',
                                'flynt'
                            ),
                            'other_choice' => 0,
                            'save_other_choice' => 0,
                            'layout' => 'horizontal',
                            'choices' => [
                                'none' => __('None', 'flynt'),
                                'increase' => __('Increase', 'flynt'),
                                'reduce' => __('Reduce', 'flynt'),
                            ],
                            'default_value' => 'none',
                        ],
                        [
                            'label' => __('Size', 'flynt'),
                            'name' => 'increase',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'increase_reduce',
                                        'operator' => '==',
                                        'value' => 'increase',
                                    ],
                                ],
                            ],
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                        [
                            'label' => __('Size', 'flynt'),
                            'name' => 'reduce',
                            'type' => 'number',
                            'min' => 0,
                            'step' => 1,
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'increase_reduce',
                                        'operator' => '==',
                                        'value' => 'reduce',
                                    ],
                                ],
                            ],
                            'wrapper' => [
                                'width' => '50',
                            ],
                        ],
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'background_color',
                    'type' => 'select',
                    'instructions' => __('Select background color', 'flynt'),
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
                    'placeholder' => __('Select background color', 'flynt'),
                ],
            ],
        ],
    ];
}
