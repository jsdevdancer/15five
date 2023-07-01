<?php

namespace Flynt\Components\TransformPricing;

add_filter('Flynt/addComponentData?name=TransformPricing', function ($data) {
    if ($data['plans']) {
        $data['col_size'] = 12 / sizeof($data['plans']);
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'TransformPricing',
        'label' => __('Transform Pricing'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => '',
                'name' => '',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Item',
                'sub_fields' => [],
            ],
            [
                'label' => __('Plans', 'flynt'),
                'name' => 'plans',
                'type' => 'repeater',
                'button_label' => 'Add Item',
                'min' => 2,
                'max' => 3,
                'sub_fields' => [
                    [
                        'label' => __('Plan', 'flynt'),
                        'name' => 'plan',
                        'type' => 'group',
                        'sub_fields' => [
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
                                'label' => __('Description', 'flynt'),
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 4,
                                'required' => 1,
                            ],
                            [
                                'label' => __('Features', 'flynt'),
                                'name' => 'features',
                                'type' => 'group',
                                'sub_fields' => [
                                    [
                                        'label' => __('Features', 'flynt'),
                                        'name' => 'features',
                                        'type' => 'wysiwyg',
                                        'tabs' => 'visual,text',
                                        'toolbar' => 'default',
                                        'media_upload' => 0,
                                        'delay' => 1,
                                        'required' => 1,
                                    ],
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
        ],
    ];
}
