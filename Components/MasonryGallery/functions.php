<?php

namespace Flynt\Components\MasonryGallery;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Masonry Gallery', 'flynt'),
            'name' => 'MasonryGallery',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                ],
                Image::getACFLayout('Image 1', 'image_1', true),
                Image::getACFLayout('Image 2', 'image_2', true),
                Image::getACFLayout('Image 3', 'image_3', true),
                Image::getACFLayout('Image 4', 'image_4', true),
                Image::getACFLayout('Image 5', 'image_5', true),
                Image::getACFLayout('Image 6', 'image_6', true),
            ],
        ],
    ];
}
