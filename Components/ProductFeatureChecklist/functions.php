<?php

namespace Flynt\Components\ProductFeatureChecklist;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Product Feature Checklist', 'flynt'),
            'name' => 'ProductFeatureChecklist',
            'sub_fields' => [
                Image::getACFLayout('Image', 'image', false),
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Checklist', 'flynt'),
                    'name' => 'checklist',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 0,
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
            ],
        ],
    ];
}
