<?php

namespace Flynt\Components\TextImage;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Text Image Section', 'flynt'),
            'name' => 'TextImage',
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
                    'type' => 'textarea',
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
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
                Image::getACFLayout('Image', 'image', true),
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
                        'left' =>
                            '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                        'center' =>
                            '<i class=\'dashicons dashicons-align-center\' title=\'Text on the center\'></i>',
                        'right' =>
                            '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                    ],
                    'default_value' => 'left',
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Increase spacing', 'flynt'),
                    'name' => 'increase_spacing',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Full width description', 'flynt'),
                    'name' => 'full_width_description',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Vertical center text', 'flynt'),
                    'name' => 'vertical_center_text',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'text_position',
                                'operator' => '!=',
                                'value' => 'center',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Image First on Mobile', 'flynt'),
                    'name' => 'mobile_position',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Display Image on Mobile', 'flynt'),
                    'name' => 'mobile_image',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Heading Tag', 'flynt'),
                    'name' => 'heading_tag',
                    'type' => 'select',
                    'instructions' => __(
                        'Select appropriate heading tag for SEO purposes',
                        'flynt'
                    ),
                    'required' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                    'choices' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6',
                    ],
                    'default_value' => 'h2',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select heading tag', 'flynt'),
                ],
                [
                    'label' => __('Heading Style', 'flynt'),
                    'name' => 'heading_style',
                    'type' => 'select',
                    'instructions' => __(
                        'Select appropriate heading style for design purposes',
                        'flynt'
                    ),
                    'required' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                    'choices' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                    ],
                    'default_value' => 'h1',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select heading style', 'flynt'),
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'background_color',
                    'type' => 'select',
                    'instructions' => __('Select background color', 'flynt'),
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                    'choices' => [
                        'white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                        'kin' =>
                            'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'kin-light' =>
                            'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'tide' =>
                            'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
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
