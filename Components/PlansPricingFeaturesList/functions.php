<?php

namespace Flynt\Components\PlansPricingFeaturesList;

use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=PlansPricingFeaturesList', function ($data) {
    $data['checkmark'] = [
        'src' => Asset::requireUrl(
            'Components/PlansPricingFeaturesList/Assets/checkmark-light.svg'
        ),
    ];
    $data['cross'] = [
        'src' => Asset::requireUrl('Components/PlansPricingFeaturesList/Assets/cross.svg'),
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'PlansPricingFeaturesList',
        'label' => __('Plans & Pricing: Features List', 'flynt'),
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
                'label' => __('Back Button'),
                'name' => 'back_button',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => __('Link'),
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'wrapper' => [
                            'width' => 70,
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
                ],
            ],
            [
                'label' => __('Plans'),
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
                                'label' => __('Label', 'flynt'),
                                'name' => 'label',
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
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '25',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '75',
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
                                'label' => __('Button Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Plan 2', 'flynt'),
                        'name' => 'plan_2',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => __('Label', 'flynt'),
                                'name' => 'label',
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
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '25',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '75',
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
                                'label' => __('Button Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Plan 3', 'flynt'),
                        'name' => 'plan_3',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => __('Label', 'flynt'),
                                'name' => 'label',
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
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '25',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '75',
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
                                'label' => __('Button Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Plan 4', 'flynt'),
                        'name' => 'plan_4',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => __('Label', 'flynt'),
                                'name' => 'label',
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
                                'label' => __('Price', 'flynt'),
                                'name' => 'price',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '25',
                                ],
                            ],
                            [
                                'label' => __('Price Description', 'flynt'),
                                'name' => 'price_description',
                                'type' => 'text',
                                'required' => 1,
                                'wrapper' => [
                                    'width' => '75',
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
                                'label' => __('Button Aria Label', 'flynt'),
                                'name' => 'aria_label',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => 50,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Table List', 'flynt'),
                'name' => 'table_list',
                'type' => 'flexible_content',
                'layouts' => [
                    [
                        'label' => 'Table Section',
                        'name' => 'table_section',
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'label' => __('Title', 'flynt'),
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'label' => 'Rows',
                                'name' => 'rows',
                                'type' => 'repeater',
                                'min' => 1,
                                'layout' => 'table',
                                'button_label' => __('Add New Row', 'flynt'),
                                'sub_fields' => [
                                    [
                                        'label' => __('Title', 'flynt'),
                                        'name' => 'title',
                                        'type' => 'textarea',
                                        'rows' => 5,
                                        'required' => 1,
                                        'wrapper' => [
                                            'width' => 14,
                                        ],
                                    ],
                                    [
                                        'label' => __('Description', 'flynt'),
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'rows' => 5,
                                        'required' => 0,
                                        'wrapper' => [
                                            'width' => 14,
                                        ],
                                    ],
                                    [
                                        'label' => __('Plan 1', 'flynt'),
                                        'name' => 'plan_1',
                                        'type' => 'group',
                                        'sub_fields' => [
                                            [
                                                'label' => __('Type', 'flynt'),
                                                'name' => 'type',
                                                'type' => 'select',
                                                'allow_null' => 0,
                                                'multiple' => 0,
                                                'ui' => 1,
                                                'ajax' => 0,
                                                'choices' => [
                                                    'check' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/checkmark-light.svg' .
                                                        '">',
                                                    'cross' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/cross.svg' .
                                                        '">',
                                                    'wysiwyg' => __('WYSIWYG', 'flynt'),
                                                ],
                                                'default_value' => 'check',
                                                'required' => 1,
                                            ],
                                            [
                                                'label' => __('WYSIWYG', 'flynt'),
                                                'name' => 'wysiwyg',
                                                'type' => 'wysiwyg',
                                                'tabs' => 'visual,text',
                                                'toolbar' => 'default',
                                                'media_upload' => 0,
                                                'delay' => 1,
                                                'conditional_logic' => [
                                                    [
                                                        [
                                                            'fieldPath' => 'type',
                                                            'operator' => '==',
                                                            'value' => 'wysiwyg',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'wrapper' => [
                                            'width' => 18,
                                        ],
                                    ],
                                    [
                                        'label' => __('Plan 2', 'flynt'),
                                        'name' => 'plan_2',
                                        'type' => 'group',
                                        'sub_fields' => [
                                            [
                                                'label' => __('Type', 'flynt'),
                                                'name' => 'type',
                                                'type' => 'select',
                                                'allow_null' => 0,
                                                'multiple' => 0,
                                                'ui' => 1,
                                                'ajax' => 0,
                                                'choices' => [
                                                    'check' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/checkmark-light.svg' .
                                                        '">',
                                                    'cross' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/cross.svg' .
                                                        '">',
                                                    'wysiwyg' => __('WYSIWYG', 'flynt'),
                                                ],
                                                'default_value' => 'check',
                                                'required' => 1,
                                            ],
                                            [
                                                'label' => __('WYSIWYG', 'flynt'),
                                                'name' => 'wysiwyg',
                                                'type' => 'wysiwyg',
                                                'tabs' => 'visual,text',
                                                'toolbar' => 'default',
                                                'media_upload' => 0,
                                                'delay' => 1,
                                                'conditional_logic' => [
                                                    [
                                                        [
                                                            'fieldPath' => 'type',
                                                            'operator' => '==',
                                                            'value' => 'wysiwyg',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'wrapper' => [
                                            'width' => 18,
                                        ],
                                    ],
                                    [
                                        'label' => __('Plan 3', 'flynt'),
                                        'name' => 'plan_3',
                                        'type' => 'group',
                                        'sub_fields' => [
                                            [
                                                'label' => __('Type', 'flynt'),
                                                'name' => 'type',
                                                'type' => 'select',
                                                'allow_null' => 0,
                                                'multiple' => 0,
                                                'ui' => 1,
                                                'ajax' => 0,
                                                'choices' => [
                                                    'check' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/checkmark-light.svg' .
                                                        '">',
                                                    'cross' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/cross.svg' .
                                                        '">',
                                                    'wysiwyg' => __('WYSIWYG', 'flynt'),
                                                ],
                                                'default_value' => 'check',
                                                'required' => 1,
                                            ],
                                            [
                                                'label' => __('WYSIWYG', 'flynt'),
                                                'name' => 'wysiwyg',
                                                'type' => 'wysiwyg',
                                                'tabs' => 'visual,text',
                                                'toolbar' => 'default',
                                                'media_upload' => 0,
                                                'delay' => 1,
                                                'conditional_logic' => [
                                                    [
                                                        [
                                                            'fieldPath' => 'type',
                                                            'operator' => '==',
                                                            'value' => 'wysiwyg',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'wrapper' => [
                                            'width' => 18,
                                        ],
                                    ],
                                    [
                                        'label' => __('Plan 4', 'flynt'),
                                        'name' => 'plan_4',
                                        'type' => 'group',
                                        'sub_fields' => [
                                            [
                                                'label' => __('Type', 'flynt'),
                                                'name' => 'type',
                                                'type' => 'select',
                                                'allow_null' => 0,
                                                'multiple' => 0,
                                                'ui' => 1,
                                                'ajax' => 0,
                                                'choices' => [
                                                    'check' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/checkmark-light.svg' .
                                                        '">',
                                                    'cross' =>
                                                        '<img src="' .
                                                        get_template_directory_uri() .
                                                        '/Components/PlansPricingFeaturesList/Assets/cross.svg' .
                                                        '">',
                                                    'wysiwyg' => __('WYSIWYG', 'flynt'),
                                                ],
                                                'default_value' => 'check',
                                                'required' => 1,
                                            ],
                                            [
                                                'label' => __('WYSIWYG', 'flynt'),
                                                'name' => 'wysiwyg',
                                                'type' => 'wysiwyg',
                                                'tabs' => 'visual,text',
                                                'toolbar' => 'default',
                                                'media_upload' => 0,
                                                'delay' => 1,
                                                'conditional_logic' => [
                                                    [
                                                        [
                                                            'fieldPath' => 'type',
                                                            'operator' => '==',
                                                            'value' => 'wysiwyg',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'wrapper' => [
                                            'width' => 18,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'button_label' => __('Add New Table Section', 'flynt'),
            ],
        ],
    ];
}
