<?php

namespace Flynt\Components\HomeWhy15Five;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'HomeWhy15Five',
        'label' => __('Home Why 15Five', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
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
                'label' => __('Link', 'flynt'),
                'name' => 'link',
                'type' => 'link',
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
            Image::getACFLayout(),
            [
                'label' => __('Reasons Rows', 'flynt'),
                'name' => 'reasons_rows',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 1,
                'max' => 2,
                'layout' => 'table',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [
                        'label' => __('Reason 1', 'flynt'),
                        'name' => 'reason1',
                        'type' => 'group',
                        'required' => 1,
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
                                'required' => 1,
                                'rows' => 2,
                            ],
                        ],
                    ],
                    [
                        'label' => __('Reason 2', 'flynt'),
                        'name' => 'reason2',
                        'type' => 'group',
                        'required' => 1,
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
                                'required' => 1,
                                'rows' => 2,
                            ],
                        ],
                    ],
                    [
                        'label' => __('Reason 3', 'flynt'),
                        'name' => 'reason3',
                        'type' => 'group',
                        'required' => 1,
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
                                'required' => 1,
                                'rows' => 2,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
