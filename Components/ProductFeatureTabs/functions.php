<?php

namespace Flynt\Components\ProductFeatureTabs;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Product Feature Tabs', 'flynt'),
            'name' => 'ProductFeatureTabs',
            'sub_fields' => [
                [
                    'label' => __('Product ID', 'flynt'),
                    'name' => 'product_id',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Product Name', 'flynt'),
                    'name' => 'product_name',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('SVG Product Icon', 'flynt'),
                    'name' => 'product_icon',
                    'type' => 'image',
                    'required' => 1,
                    'preview_size' => 'thumbnail',
                    'return_format' => 'array',
                    'library' => 'all',
                    'min_width' => 0,
                    'min_height' => 0,
                    'min_size' => 0,
                    'max_width' => 300,
                    'max_height' => '',
                    'max_size' => '0.1',
                    'mime_types' => 'svg',
                ],
                [
                    'label' => __('Product Title', 'flynt'),
                    'name' => 'product_title',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Product Description', 'flynt'),
                    'name' => 'product_description',
                    'type' => 'textarea',
                    'rows' => 8,
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                Image::getACFLayout('Product Illustration', 'product_illustration', true),
                [
                    'label' => __('Product Features', 'flynt'),
                    'name' => 'product_features',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => 'Add Feature',
                    'sub_fields' => [
                        [
                            'label' => __('Feature Name', 'flynt'),
                            'name' => 'feature_name',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Feature Description', 'flynt'),
                            'name' => 'feature_description',
                            'type' => 'textarea',
                            'rows' => 8,
                            'required' => 1,
                        ],
                        [
                            'label' => __('Feature Button', 'flynt'),
                            'name' => 'feature_button',
                            'type' => 'link',
                        ],
                        [
                            'label' => __('Feature Button Aria Label', 'flynt'),
                            'name' => 'feature_button_aria_label',
                            'type' => 'text',
                        ],
                        Image::getACFLayout('Feature Image', 'feature_image', true),
                    ],
                ],
            ],
        ],
    ];
}
