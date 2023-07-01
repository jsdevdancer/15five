<?php

namespace Flynt\Components\PromotionalCard;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'PromotionalCard',
        'label' => __('Promotional Card', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Label', 'flynt'),
                'name' => 'label',
                'type' => 'text',
                'instructions' => __(
                    'If an image is provided below, this label will not be displayed.',
                    'flynt'
                ),
            ],
            Image::getACFLayout('Image', 'image', false),
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'textarea',
                'required' => 1,
                'rows' => 2,
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'required' => 1,
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Button Aria Label', 'flynt'),
                'name' => 'button_aria_label',
                'type' => 'text',
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Style', 'flynt'),
                'name' => 'style_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Visibility', 'flynt'),
                'name' => 'visibility',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Mobile', 'flynt'),
                        'name' => 'mobile',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                    [
                        'label' => __('Desktop', 'flynt'),
                        'name' => 'desktop',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '50',
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'background_color',
                'type' => 'select',
                'instructions' => __('Select background color', 'flynt'),
                'required' => 1,
                'choices' => [
                    'u-bg--white' =>
                        'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'u-bg--rise' =>
                        'Rise <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'u-bg--motion' =>
                        'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6c00db; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--cornbread' =>
                        'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #f4ae2a; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--heart' =>
                        'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #ff52a1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--mind' =>
                        'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16dbdb; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--kin' =>
                        'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--tide' =>
                        'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--tide-light' =>
                        'Tide Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #f8f8f9; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--kin-light' =>
                        'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'u-bg--black' =>
                        'Black <div style="width: 8px; height: 8px; display: inline-block; background-color: #000000; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                ],
                'default_value' => 'u-bg--white',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select background color', 'flynt'),
            ],
            [
                'label' => __('Padding Size', 'flynt'),
                'name' => 'padding_size',
                'type' => 'select',
                'instructions' => __('Select padding size', 'flynt'),
                'required' => 1,
                'choices' => [
                    'standard-padding' => __('Standard', 'flynt'),
                    'minimal-padding' => __('Minimal', 'flynt'),
                ],
                'default_value' => 'standard-padding',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select padding size', 'flynt'),
            ],
            [
                'label' => __('Image with Padding Layout', 'flynt'),
                'name' => 'enable_padding',
                'type' => 'true_false',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => __('Enable', 'flynt'),
                'ui_off_text' => __('Disable', 'flynt'),
            ],
        ],
    ];
}
