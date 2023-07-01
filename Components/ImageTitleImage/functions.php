<?php

namespace Flynt\Components\ImageTitleImage;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Image with Title and Image', 'flynt'),
            'name' => 'ImageTitleImage',
            'sub_fields' => [
                Image::getACFLayout('Top Image', 'top_image', true),
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                Image::getACFLayout('Bottom Image', 'bottom_image', true),
            ],
        ],
    ];
}
