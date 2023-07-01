<?php

namespace Flynt\Components\TitleAndTwoColumns;

function getACFLayout()
{
    return [
        [
            'label' => __('TitleAndTwoColumns', 'flynt'),
            'name' => 'TitleAndTwoColumns',
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
                    'label' => __('Left Column', 'flynt'),
                    'name' => 'left_column',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Right Column', 'flynt'),
                    'name' => 'right_column',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
            ],
        ],
    ];
}
