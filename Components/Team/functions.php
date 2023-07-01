<?php

namespace Flynt\Components\Team;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Team', 'flynt'),
            'name' => 'Team',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'team_bg_color',
                    'type' => 'select',
                    'instructions' => __(
                        'Select section background color',
                        'flynt'
                    ),
                    'required' => 1,
                    'choices' => [
                        'u-bg--kin' =>
                            'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #fff2e8; margin-left: 2px;"></div>',
                        'u-bg--kin-light' =>
                            'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'u-bg--tide-light' =>
                            'Tide Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #e5e5e5; border-radius: 2px; border: 1px solid #e5e5e5; margin-left: 2px;"></div>',
                        'u-bg--white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    ],
                    'default_value' => 'u-bg--kin',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select color', 'flynt'),
                ],
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Team Members', 'flynt'),
                    'name' => 'team',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Member', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Color', 'flynt'),
                            'name' => 'color',
                            'type' => 'select',
                            'instructions' => __(
                                'Select color for offset square behind picture',
                                'flynt'
                            ),
                            'required' => 1,
                            'choices' => [
                                'rise' =>
                                    'Rise <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                                'motion' =>
                                    'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6c00db; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                                'cornbread' =>
                                    'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #f4ae2a; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                                'heart' =>
                                    'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #ff52a1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                                'mind' =>
                                    'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16dbdb; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                                'tide' =>
                                    'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            ],
                            'default_value' => 'rise',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'ajax' => 1,
                            'return_format' => 'value',
                            'placeholder' => __('Select color', 'flynt'),
                        ],

                        [
                            'label' => __('Name', 'flynt'),
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Position', 'flynt'),
                            'name' => 'position',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        Image::getACFLayout('Image', 'image', true),
                    ],
                ],
            ],
        ],
    ];
}
