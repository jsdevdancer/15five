<?php

namespace Flynt\Components\VideoTestimonial;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Video Testimonial', 'flynt'),
            'name' => 'VideoTestimonial',
            'sub_fields' => [
                [
                    'label' => 'Video Options',
                    'name' => 'video_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                Image::getACFLayout('Video Background Image', 'bg_image', true),
                Video::getACFLayout('Video', 'video'),
                [
                    'label' => 'Quote Options',
                    'name' => 'content_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'label' => 'Logo',
                    'name' => 'logo',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => 180,
                    'mime_types' => 'svg,png',
                ],
                [
                    'label' => 'Author/Person',
                    'name' => 'author',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => 'Quote',
                            'name' => 'quote',
                            'type' => 'textarea',
                            'rows' => 2,
                            'new_lines' => 'br',
                        ],
                        [
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                        ],
                        [
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'text',
                        ],
                    ],
                ],
                [
                    'label' => 'Style Options',
                    'name' => 'style_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                [
                    'label' => 'Enable Image Overlay?',
                    'name' => 'image_overlay',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'choices' => [
                        'overlay' => 'Yes',
                        'false' => 'No',
                    ],
                    'default_value' => 'false',
                ],
                [
                    'label' => 'Background Image (lazyloaded)',
                    'name' => 'quote_bg_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'mime_types' => 'jpg,jpeg,svg',
                ],
            ],
        ],
    ];
}
