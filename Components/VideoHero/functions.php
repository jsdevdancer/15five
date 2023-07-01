<?php

namespace Flynt\Components\VideoHero;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Video Hero', 'flynt'),
            'name' => 'VideoHero',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                Image::getACFLayout('Image', 'image', true),
                Video::getACFLayout('Video', 'video'),
            ],
        ],
    ];
}
