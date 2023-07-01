<?php

namespace Flynt\Components\ThankYouPageSomethingElse;

function getACFLayout()
{
    return [
        'name' => 'ThankYouPageSomethingElse',
        'label' => __('Thank You Page Something Else', 'flynt'),
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
                'label' => __('Links', 'flynt'),
                'name' => 'links',
                'type' => 'repeater',
                'layout' => 'table',
                'min' => 3,
                'max' => 9,
                'button_label' => __('Add Link', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                    ],
                ],
            ],
        ],
    ];
}
