<?php

namespace ACFLayouts;

class Logos
{
    public static function getACFLayout()
    {
        return [
            'label' => __('Client Logos', 'flynt'),
            'name' => 'client_logos',
            'type' => 'group',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Logos', 'flynt'),
                    'name' => 'logos',
                    'type' => 'repeater',
                    'required' => 1,
                    'min' => 5,
                    'max' => 5,
                    'layout' => 'table',
                    'sub_fields' => [
                        [
                            'label' => __('SVG Logo', 'flynt'),
                            'name' => 'image',
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
                    ],
                ],
            ],
        ];
    }
}
