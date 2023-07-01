<?php

namespace Flynt\Components\HowItWorks;

function getACFLayout()
{
    return [
        'name' => 'HowItWorks',
        'label' => __('HowItWorks', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'tab',
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Step 1', 'flynt'),
                'name' => 'step_1',
                'type' => 'textarea',
                'rows' => 2,
                'required' => 1,
                'wrapper' => [
                    'width' => '33.333333',
                ],
            ],
            [
                'label' => __('Step 2', 'flynt'),
                'name' => 'step_2',
                'type' => 'textarea',
                'rows' => 2,
                'required' => 1,
                'wrapper' => [
                    'width' => '33.333333',
                ],
            ],
            [
                'label' => __('Step 3', 'flynt'),
                'name' => 'step_3',
                'type' => 'textarea',
                'rows' => 2,
                'required' => 1,
                'wrapper' => [
                    'width' => '33.333333',
                ],
            ],
            [
                'label' => __('Subtitle', 'flynt'),
                'name' => 'subtitle',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 3,
                'required' => 1,
            ],
        ],
    ];
}
