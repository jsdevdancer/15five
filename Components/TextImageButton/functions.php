<?php

namespace Flynt\Components\TextImageButton;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'TextImageButton',
        'label' => __('Text Image Button', 'flynt'),
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
            ],
            [
                'label' => __('Kicker', 'flynt'),
                'name' => 'kicker',
                'type' => 'text',
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'text',
            ],
            Image::getACFLayout('Image', 'image', false),
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Button ID', 'flynt'),
                'name' => 'primary_button_id',
                'type' => 'text',
                'wrapper' => [
                    'width' => 20,
                ],
            ],
            [
                'label' => __('aria-label', 'flynt'),
                'name' => 'aria_label',
                'type' => 'text',
                'wrapper' => [
                    'width' => 30,
                ],
            ],
            [
                'label' => __('Secondary Button', 'flynt'),
                'name' => 'button_secondary',
                'type' => 'link',
                'required' => 0,
                'wrapper' => [
                    'width' => 50,
                ],
            ],
            [
                'label' => __('Button ID', 'flynt'),
                'name' => 'secondary_button_id',
                'type' => 'text',
                'wrapper' => [
                    'width' => 20,
                ],
            ],
            [
                'label' => __('aria-label', 'flynt'),
                'name' => 'aria_label_secondary',
                'type' => 'text',
                'wrapper' => [
                    'width' => 30,
                ],
            ],
            [
                'label' => __('WYSIWYG', 'flynt'),
                'name' => 'wysiwyg',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1,
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'options_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Hero Section', 'flynt'),
                'name' => 'hero_section',
                'type' => 'true_false',
                'instructions' => __('&nbsp;', 'flynt'),
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => __('Yes', 'flynt'),
                'ui_off_text' => __('No', 'flynt'),
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
            [
                'label' => __('Title Width', 'flynt'),
                'name' => 'title_width',
                'type' => 'select',
                'instructions' => __(
                    'Select appropriate # of columns that title should span (desktop only)',
                    'flynt'
                ),
                'required' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
                'choices' => [
                    'col-md-6 offset-md-3' => '6',
                    'col-md-8 offset-md-2' => '8',
                    'col-md-10 offset-md-1' => '10',
                ],
                'default_value' => 'col-md-8 offset-md-2',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select # of columns', 'flynt'),
            ],
            // TODO: Find a way to make this field conditional to button field being filled.
            [
                'label' => __('Button Style', 'flynt'),
                'name' => 'button_style',
                'type' => 'select',
                'instructions' => __('Choose button style', 'flynt'),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'choices' => [
                    'rise' =>
                        'Rise  <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'video' =>
                        'Video Button <i style=\'line-height: inherit;\' class=\'dashicons dashicons-controls-play\' title=\'Video Button\'></i>',
                ],
                'default_value' => 'rise',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Heading Tag', 'flynt'),
                'name' => 'heading_tag',
                'type' => 'select',
                'instructions' => __('Select appropriate heading tag for SEO purposes', 'flynt'),
                'required' => 1,
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'hero_section',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
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
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'hero_section',
                            'operator' => '!=',
                            'value' => '1',
                        ],
                    ],
                ],
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
            // TODO: Find a way to make this field conditional to image field having at least 1 image.
            [
                'label' => __('Full-width image', 'flynt'),
                'name' => 'full_width_image',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            // TODO: Find a way to make this field conditional to image field having at least 1 image.
            [
                'label' => __('Image Position', 'flynt'),
                'name' => 'image_position',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'choices' => [
                    'top' => __('Top', 'flynt'),
                    'bottom' => __('Bottom', 'flynt'),
                ],
                'default_value' => 'bottom',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            // TODO: Find a way to make this field conditional to image field having at least 1 image.
            [
                'label' => __('Image Spacing', 'flynt'),
                'name' => 'image_spacing',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'choices' => [
                    'small-spacing' => __('Small', 'flynt'),
                    'medium-spacing' => __('Medium', 'flynt'),
                    'large-spacing' => __('Large', 'flynt'),
                ],
                'default_value' => 'small-spacing',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            // TODO: Find a way to make this field conditional to image field having at least 1 image.
            [
                'label' => __('Cut Sides of Image?', 'flynt'),
                'name' => 'cut_image',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'full_width_image',
                            'operator' => '!=',
                            'value' => '0',
                        ],
                    ],
                ],
                'wrapper' => [
                    'width' => '25',
                ],
            ],
        ],
    ];
}
