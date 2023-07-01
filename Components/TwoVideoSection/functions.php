<?php

namespace Flynt\Components\TwoVideoSection;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Two Video Section', 'flynt'),
            'name' => 'TwoVideoSection',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content_tab',
                    'type' => 'tab',
                ],
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
                    'rows' => 2,
                    'required' => 1,
                ],
                [
                    'label' => __('Left Video', 'flynt'),
                    'name' => 'left_video',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Video Title', 'flynt'),
                            'name' => 'video_title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        Image::getACFLayout('Video Image', 'video_image', true),
                        Video::getACFLayout('Video', 'video'),
                    ],
                ],
                [
                    'label' => __('Right Video', 'flynt'),
                    'name' => 'right_video',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Video Title', 'flynt'),
                            'name' => 'video_title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        Image::getACFLayout('Video Image', 'video_image', true),
                        Video::getACFLayout('Video', 'video'),
                    ],
                ],
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'options_tab',
                    'type' => 'tab',
                ],
                Image::getACFLayout('Background Image', 'background_image', true),
            ],
        ],
    ];
}
