<?php

namespace Flynt\Components\PlansPricing;

use ACFLayouts\Logos;

function getACFLayout()
{
    return [
        'name' => 'PlansPricing',
        'label' => __('Plans & Pricing'),
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
                'required' => 1,
            ],
            [
                'label' => __('Plans', 'flynt'),
                'name' => 'plans',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => __('Plan 1', 'flynt'),
                        'name' => 'plan_1',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => __('Highlighted Label', 'flynt'),
                                'name' => 'highlighted_label',
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
                                'rows' => 4,
                                'required' => 1,
                            ],
                            [
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '20',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '80',
                                ],
                            ],
                            [
                                'label' => __('Button', 'flynt'),
                                'name' => 'button',
                                'type' => 'link',
                                'return_format' => 'array',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Features', 'flynt'),
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'tabs' => 'visual,text',
                                'toolbar' => 'default',
                                'media_upload' => 0,
                                'delay' => 0,
                                'required' => 1,
                            ],
                        ],
                    ],
                    [
                        'label' => __('Plan 2', 'flynt'),
                        'name' => 'plan_2',
                        'type' => 'group',
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
                                'rows' => 4,
                                'required' => 1,
                            ],
                            [
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '20',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '80',
                                ],
                            ],
                            [
                                'label' => __('Button', 'flynt'),
                                'name' => 'button',
                                'type' => 'link',
                                'return_format' => 'array',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Features', 'flynt'),
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'tabs' => 'visual,text',
                                'toolbar' => 'default',
                                'media_upload' => 0,
                                'delay' => 0,
                                'required' => 1,
                            ],
                        ],
                    ],
                    [
                        'label' => __('Plan 3', 'flynt'),
                        'name' => 'plan_3',
                        'type' => 'group',
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
                                'rows' => 4,
                                'required' => 1,
                            ],
                            [
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '20',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '80',
                                ],
                            ],
                            [
                                'label' => __('Button', 'flynt'),
                                'name' => 'button',
                                'type' => 'link',
                                'return_format' => 'array',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                            [
                                'label' => __('Features', 'flynt'),
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'tabs' => 'visual,text',
                                'toolbar' => 'default',
                                'media_upload' => 0,
                                'delay' => 0,
                                'required' => 1,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Link', 'flynt'),
                'name' => 'plans_link',
                'type' => 'link',
                'return_format' => 'array',
            ],
            Logos::getACFLayout(),
        ],
    ];
}
