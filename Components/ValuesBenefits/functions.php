<?php

namespace Flynt\Components\ValuesBenefits;

function getACFLayout()
{
    return [
        [
            'label' => __('Values/Benefits', 'flynt'),
            'name' => 'ValuesBenefits',
            'sub_fields' => [
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
                    'rows' => 3,
                    'required' => 1,
                ],
                [
                    'label' => __('CTA', 'flynt'),
                    'name' => 'cta',
                    'type' => 'link',
                    'return_format' => 'array',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('CTA Aria Label', 'flynt'),
                    'name' => 'cta_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Features', 'flynt'),
                    'name' => 'features',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'row',
                    'button_label' => __('Add Item', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('List', 'flynt'),
                            'name' => 'list',
                            'type' => 'wysiwyg',
                            'tabs' => 'visual,text',
                            'toolbar' => 'default',
                            'media_upload' => 0,
                            'delay' => 1,
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
