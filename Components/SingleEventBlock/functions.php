<?php

namespace Flynt\Components\SingleEventBlock;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Single Event Block', 'flynt'),
            'name' => 'SingleEventBlock',
            'sub_fields' => [
                Image::getACFLayout('Event Image', 'image', true),
                [
                    'label' => __('Event Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'default_value' => __('Virtual Event', 'flynt'),
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Event Start Date', 'flynt'),
                    'name' => 'event_start_date',
                    'type' => 'date_picker',
                    'display_format' => 'd.m.Y',
                    'return_format' => 'Y-m-d',
                    'first_day' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Event Title', 'flynt'),
                    'name' => 'event_title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Event Description', 'flynt'),
                    'name' => 'event_description',
                    'type' => 'textarea',
                    'rows' => 8,
                    'new_lines' => 'wpautop',
                ],
                [
                    'label' => __('Event Button', 'flynt'),
                    'instructions' => 'Fill with Link, Label and "open in new tab" options',
                    'name' => 'event_button',
                    'type' => 'link',
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
                [
                    'label' => __('WYSIWYG', 'flynt'),
                    'name' => 'wysiwyg',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                ],
            ],
        ],
    ];
}
