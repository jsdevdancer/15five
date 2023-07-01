<?php

namespace Flynt\Components\ProductFeatureContentLibrary;

function getACFLayout()
{
    return [
        [
            'label' => __('Product Feature Content Library', 'flynt'),
            'name' => 'ProductFeatureContentLibrary',
            'sub_fields' => [
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
                    'label' => __('Content Library Posts', 'flynt'),
                    'name' => 'content_library_posts',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'row',
                    'button_label' => 'Add Post',
                    'sub_fields' => [
                        [
                            'label' => __('Resource', 'flynt'),
                            'name' => 'resource',
                            'type' => 'post_object',
                            'post_type' => ['content'],
                            'return_format' => 'object',
                            'ui' => 1,
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
