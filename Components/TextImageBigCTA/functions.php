<?php

namespace Flynt\Components\TextImageBigCTA;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Text Image Big CTA', 'flynt'),
            'name' => 'TextImageBigCTA',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                ],
                [
                    'label' => __('Link', 'flynt'),
                    'name' => 'url',
                    'type' => 'link',
                    'return_format' => 'array',
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'button_aria_label',
                    'type' => 'text',
                ],
                Image::getACFLayout(),
            ],
        ],
    ];
}
