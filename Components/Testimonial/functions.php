<?php

namespace Flynt\Components\Testimonial;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'label' => __('Testimonial', 'flynt'),
        'name' => 'Testimonial',
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'tab',
            ],
            [
                'label' => __('Testimonials', 'flynt'),
                'name' => 'testimonials',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'row',
                'button_label' => __('Add Testimonial', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Author Name', 'flynt'),
                        'name' => 'author_name',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Author Position', 'flynt'),
                        'name' => 'author_position',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Quote', 'flynt'),
                        'name' => 'quote',
                        'type' => 'textarea',
                        'maxlength' => 200,
                        'rows' => 4,
                        'required' => 1,
                    ],
                    [
                        'label' => __('Button', 'flynt'),
                        'name' => 'button',
                        'type' => 'link',
                        'return_format' => 'array',
                    ],
                    [
                        'label' => __('Button Aria Label', 'flynt'),
                        'name' => 'button_aria_label',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('SVG Company Logo', 'flynt'),
                        'name' => 'company_logo',
                        'type' => 'image',
                        'preview_size' => 'thumbnail',
                        'return_format' => 'array',
                        'library' => 'all',
                        'max_width' => 300,
                        'max_size' => '0.1',
                        'mime_types' => 'svg',
                    ],
                    Image::getACFLayout('Quote Author Photo', 'quote_author_photo'),
                ],
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'options',
                'type' => 'tab',
            ],
            Image::getACFLayout('Background Image', 'background_image'),
            [
                'label' => __('Theme', 'flynt'),
                'name' => 'theme',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'choices' => [
                    'three-sides' => __('Three Sides Offset', 'flynt'),
                    'two-sides' => __('Two Sides Offset', 'flynt'),
                ],
                'default_value' => 'three-sides',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'background_color',
                'type' => 'true_false',
                'instructions' => __('Should it have peach background color?', 'flynt'),
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'theme',
                            'operator' => '!=',
                            'value' => 'two-sides',
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Position', 'flynt'),
                'name' => 'position',
                'type' => 'button_group',
                'choices' => [
                    'right' =>
                        '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                    'left' =>
                        '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                ],
                'default_value' => 'right',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Hide on mobile?', 'flynt'),
                'name' => 'hide_mobile',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'testimonials',
                            'operator' => '<',
                            'value' => '2',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
