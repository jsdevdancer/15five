<?php

namespace Flynt\Components\ComplementaryFeatures;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Complementary Features', 'flynt'),
            'name' => 'ComplementaryFeatures',
            'sub_fields' => [
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
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
                    'rows' => 3,
                ],
                [
                    'label' => __('Complementary Features'),
                    'name' => 'comp_features',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 9,
                    'layout' => 'row',
                    'button_label' => __('Add Feature', 'flynt'),
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
                            'label' => __('Feature Type', 'flynt'),
                            'name' => 'type',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Feature Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Feature Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 2,
                            'required' => 1,
                        ],
                        [
                            'label' => __('Feature URL'),
                            'name' => 'url',
                            'type' => 'link',
                            'return_format' => 'array',
                            'required' => 1,
                        ],
                        Image::getACFLayout('Feature Image', 'image', true),
                    ],
                ],
            ],
        ],
    ];
}
