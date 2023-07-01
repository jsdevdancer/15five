<?php

namespace Flynt\Components\Breadcrumb;

function getACFLayout()
{
    return [
        [
            'label' => __('Back Button', 'flynt'),
            'name' => 'Breadcrumb',
            'sub_fields' => [
                [
                    'label' => __('Page URL', 'flynt'),
                    'name' => 'url',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
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
