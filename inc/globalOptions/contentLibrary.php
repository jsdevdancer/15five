<?php

namespace Flynt\contentLibraryGlobalOptions;

use Flynt\Utils\Options;

Options::addGlobal('Content Library', [
    [
        'label' => __('Content Library Main Page', 'flynt'),
        'name' => 'content_library_main_page',
        'type' => 'post_object',
        'post_type' => 'page',
        'return_format' => 'object',
        'required' => true,
    ],
    [
        'label' => 'Content Library Hero',
        'name' => 'content_library_hero',
        'type' => 'group',
        'layout' => 'row',
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
                'type' => 'textarea',
                'required' => 1,
                'rows' => 2,
            ],
            [
                'label' => __('Image', 'flynt'), // TODO Implement the Image component here
                'name' => 'image',
                'type' => 'group',
                'layout' => 'block',
                'required' => 0,
                'sub_fields' => [
                    [
                        'label' => __('Lazyload', 'flynt'),
                        'name' => 'is_lazy',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => __('Yes', 'flynt'),
                        'ui_off_text' => __('No', 'flynt'),
                    ],
                    [
                        'label' => __('Desktop', 'flynt'),
                        'name' => 'desktop',
                        'type' => 'group',
                        'layout' => 'table',
                        'sub_fields' => [
                            [
                                'label' => __('@1x', 'flynt'),
                                'name' => 'one_x',
                                'type' => 'group',
                                'layout' => 'table',
                                'sub_fields' => [
                                    [
                                        'label' => __('PNG/JPEG/SVG', 'flynt'),
                                        'name' => 'old_format',
                                        'type' => 'image',
                                        'required' => 1,
                                        'preview_size' => 'thumbnail',
                                        'return_format' => 'array',
                                        'library' => 'all',
                                        'min_width' => 0,
                                        'min_height' => 0,
                                        'min_size' => 0,
                                        'max_width' => 2000,
                                        'max_height' => '',
                                        'max_size' => '1',
                                        'mime_types' => 'png,jpg,jpeg,svg',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
]);
