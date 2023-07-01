<?php

namespace Flynt\Components\VideoPopupText;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Video Popup with Text', 'flynt'),
            'name' => 'VideoPopupText',
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
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'required' => 1,
                ],
                Image::getACFLayout('Image', 'image', true),
                Image::getACFLayout('Background Image', 'background_image', true),
                Video::getACFLayout('Video', 'video'),
            ],
        ],
    ];
}
