<?php

namespace Flynt\Components\WYSIWYG;

function getACFLayout()
{
    return [
        [
            'label' => __('WYSIWYG Section', 'flynt'),
            'name' => 'WYSIWYG',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('WYSIWYG', 'flynt'),
                    'name' => 'wysiwyg_field',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                    'required' => 1,
                ],
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'options',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Text Position', 'flynt'),
                    'name' => 'text_position',
                    'type' => 'button_group',
                    'choices' => [
                        'text-left' =>
                            '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                        'text-center' =>
                            '<i class=\'dashicons dashicons-align-center\' title=\'Text on the center\'></i>',
                        'text-right' =>
                            '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                    ],
                    'default_value' => 'left',
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Block Width', 'flynt'),
                    'name' => 'block_width',
                    'type' => 'select',
                    'instructions' => __('Select width', 'flynt'),
                    'required' => 1,
                    'choices' => [
                        'col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2' =>
                            '8 Columns (default)',
                        'col-12 p-0' =>
                            '12 Columns',
                        'full-bleed' =>
                            '100% Edge to Edge',
                    ],
                    'default_value' => 'col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select block width', 'flynt'),
                    'wrapper' => [
                        'width' => '75',
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
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
            ],
        ],
    ];
}
