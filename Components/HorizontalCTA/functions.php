<?php

namespace Flynt\Components\HorizontalCTA;

use ACFLayouts\Image;
use Flynt\Utils\Options;

function getACFLayout()
{
    return [
        'name' => 'HorizontalCTA',
        'label' => __('Horizontal CTA', 'flynt'),
        'sub_fields' => [
            [
                'label' => 'Content',
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'textarea',
                'required' => 1,
                'rows' => 2,
            ],
            [
                'label' => __('Cta Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'return_format' => 'array',
            ],
            Image::getACFLayout(),
            [
                'label' => __('Style Settings', 'flint'),
                'name' => 'style_tab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Section ID',
                'name' => 'section_id',
                'type' => 'text',
            ],
            [
                'label' => __('Text/Image Proportion/Division', 'flynt'),
                'name' => 'division',
                'type' => 'group',
                'instructions' => 'Select the number of columns occupied by either text or image out of 12
                                If you select more than 12 the columns will overflow to the next line',
                'sub_fields' => [
                    [
                        'label' => 'Text Columns',
                        'name' => 'text',
                        'type' => 'number',
                        'min' => 1,
                        'max' => 11,
                        'step' => 1,
                        'default_value' => 6,
                    ],
                    [
                        'label' => 'Image Columns',
                        'name' => 'image',
                        'type' => 'number',
                        'min' => 1,
                        'max' => 11,
                        'step' => 1,
                        'default_value' => 6,
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
                    'white' =>
                        'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'kin' =>
                        'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'kin-light' =>
                        'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'tide' =>
                        'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                ],
                'default_value' => 'kin-light',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select background color', 'flynt'),
            ],
        ],
    ];
}
