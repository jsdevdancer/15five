<?php

namespace Flynt\Components\ChecklistCard;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Checklist with Card', 'flynt'),
            'name' => 'ChecklistCard',
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
                    'rows' => 2,
                ],
                [
                    'label' => __('Checklist', 'flynt'),
                    'name' => 'checklist',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'table',
                    'button_label' => __('Add Item', 'flynt'),
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
                            'type' => 'text',
                            'required' => 1,
                        ],
                    ],
                ],
                [
                    'label' => __('Card', 'flynt'),
                    'name' => 'card',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Product', 'flynt'),
                            'name' => 'product',
                            'type' => 'select',
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'ajax' => 1,
                            'return_format' => 'array',
                            'choices' => [
                                'performance' => __('Performance', 'flynt'),
                                'engagement' => __('Engagement', 'flynt'),
                                'manager-enablement' => __('Manager Enablement', 'flynt'),
                                'career-growth' => __('Career Growth', 'flynt'),
                                'other' => __('Other', 'flynt'),
                            ],
                            'default_value' => 'performance',
                        ],
                        [
                            'label' => __('Other', 'flynt'),
                            'name' => 'other',
                            'type' => 'text',
                            'required' => 1,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'product',
                                        'operator' => '==',
                                        'value' => 'other',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Type', 'flynt'),
                            'name' => 'type',
                            'type' => 'text',
                            'required' => 1,
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
                            'rows' => 2,
                            'required' => 1,
                        ],
                        [
                            'label' => __('URL'),
                            'name' => 'url',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                        ],
                        Image::getACFLayout(),
                    ],
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
                    'label' => __('aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}
