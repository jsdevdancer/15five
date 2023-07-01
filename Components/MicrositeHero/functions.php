<?php

namespace Flynt\Components\MicrositeHero;

use ACFLayouts\Image;
use ACFLayouts\Video;

function getACFLayout()
{
    return [
        [
            'label' => __('Microsite Hero', 'flynt'),
            'name' => 'MicrositeHero',
            'sub_fields' => [
                [
                    'label' => 'Content Left Options',
                    'name' => 'content_left_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                Image::getACFLayout('Microsite Logo', 'section_logo', false),
                [
                    'label' => __('Section Kicker', 'flynt'),
                    'name' => 'section_kicker',
                    'type' => 'text',
                ],
                [
                    'label' => __('Section Title', 'flynt'),
                    'name' => 'section_title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Section Description', 'flynt'),
                    'name' => 'section_description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'required' => 1,
                    'wrapper' => [
                        'width' => '75',
                    ],
                ],
                [
                    'label' => __('Section Description', 'flynt'),
                    'name' => 'section_description',
                    'type' => 'textarea',
                    'rows' => 2,
                    'required' => 0,
                    'wrapper' => [
                        'width' => '75',
                    ],
                ],
                Image::getACFLayout('Details Icon', 'section_icon', true),
                [
                    'label' => __('Details Title', 'flynt'),
                    'name' => 'section_details_title',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '75',
                    ],
                ],
                [
                    'label' => __('Details Description', 'flynt'),
                    'name' => 'section_details_description',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual,text',
                    'toolbar' => 'default',
                    'media_upload' => 0,
                    'delay' => 1,
                ],
                [
                    'label' => __('Button', 'flynt'),
                    'name' => 'button',
                    'type' => 'link',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 70,
                    ],
                ],
                [
                    'label' => __('aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 30,
                    ],
                ],
                [
                    'label' => 'Content Right Options',
                    'name' => 'content_right_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Image or Vídeo?',
                    'name' => 'image_or_video',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => __('Image', 'flynt'),
                    'ui_off_text' => __('Video', 'flynt'),
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Hero Image', 'flynt'),
                    'name' => 'section_image',
                    'type' => 'image',
                    'preview_size' => 'thumbnail',
                    'return_format' => 'url',
                    'library' => 'all',
                    'max_size' => '2',
                    'mime_types' => 'png,jpg,jpeg,svg,gif',
                    'conditional_logic' => [
                    [
                        [
                        'fieldPath' => 'image_or_video',
                        'operator' => '==',
                        'value' => 1,
                        ],
                    ],
                    ],
                ],
                [
                    'label' => __('Video', 'flynt'),
                    'name' => 'video',
                    'type' => 'group',
                    'layout' => 'block',
                    'conditional_logic' => [
                        [
                            [
                            'fieldPath' => 'image_or_video',
                            'operator' => '==',
                            'value' => 0,
                            ],
                        ],
                    ],
                    'sub_fields' => [
                        [
                            'label' => __('Video Source', 'flynt'),
                            'name' => 'video_source',
                            'type' => 'radio',
                            'instructions' => __(
                                'Choose if the video is hosted on another platform and you wish to embed an iFrame or if the 
                                video is hosted in the WordPress uploads',
                                'flynt'
                            ),
                            'other_choice' => 0,
                            'save_other_choice' => 0,
                            'layout' => 'horizontal',
                            'choices' => [
                                'wistia' => __('Wistia Video ID (Lazyloaded)', 'flynt'),
                                'iframe' => __('iFrame', 'flynt'),
                                'self' => __('Self-hosted', 'flynt'),
                            ],
                            'default_value' => 'iframe',
                        ],
                        [
                            'label' => __('Video file', 'flynt'),
                            'name' => 'video_file',
                            'type' => 'file',
                            'return_format' => 'url',
                            'library' => 'all',
                            'mime_types' => 'mp4,mpeg4',
                            'required' => true,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'video_source',
                                        'operator' => '==',
                                        'value' => 'self',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Self-Hosted Video Captions', 'flynt'),
                            'name' => 'video_captions',
                            'type' => 'repeater',
                            'collapsed' => '',
                            'min' => 0,
                            'max' => 0,
                            'layout' => 'table',
                            'button_label' => 'Add Captions File',
                            'sub_fields' => [
                                [
                                    'label' => __('VTT Captions File', 'flynt'),
                                    'name' => 'vtt_file',
                                    'type' => 'file',
                                    'return_format' => 'url',
                                    'library' => 'all',
                                    'mime_types' => 'vtt',
                                ],
                                [
                                    'label' => __('Language', 'flynt'),
                                    'name' => 'lang',
                                    'type' => 'text',
                                    'instructions' => __(
                                        'Type a language code according to the ISO 639-1 standard (eg. es, en, pt)',
                                        'flynt'
                                    ),
                                ],
                                [
                                    'label' => __('File Label', 'flynt'),
                                    'name' => 'file_label',
                                    'type' => 'text',
                                ],
                            ],
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'video_source',
                                        'operator' => '==',
                                        'value' => 'self',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Embed code from video platform', 'flynt'),
                            'name' => 'iframe_code',
                            'type' => 'textarea',
                            'rows' => 8,
                            'required' => true,
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'video_source',
                                        'operator' => '==',
                                        'value' => 'iframe',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Wistia Video ID'),
                            'name' => 'wistia_id',
                            'type' => 'text',
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'video_source',
                                        'operator' => '==',
                                        'value' => 'wistia',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Video Background',
                    'name' => 'video_background',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'max_size' => 2,
                    'mime_types' => 'jpg,jpeg,png,svg,gif',
                    'conditional_logic' => [
                        [
                            [
                            'fieldPath' => 'image_or_video',
                            'operator' => '==',
                            'value' => 0,
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Add Confettis?',
                    'name' => 'confettis',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1
                ],
                [
                    'label' => 'Background Options',
                    'name' => 'bg_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Background Color:',
                    'name' => 'bg_color',
                    'type' => 'color_picker',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Text Color', 'flynt'),
                    'name' => 'text_color',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => [
                        'tide' =>
                            'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff; border-radius: 2px; border: 1px solid #cccccc; margin-left: 2px;"></div>',
                    ],
                    'default_value' => 'tide',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => 'Background Image:',
                    'name' => 'bg_images',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Desktop Image', 'flynt'),
                            'name' => 'desktop_image',
                            'type' => 'image',
                            'preview_size' => 'thumbnail',
                            'return_format' => 'url',
                            'library' => 'all',
                            'min_width' => 0,
                            'min_height' => 0,
                            'min_size' => 0,
                            'max_width' => 2500,
                            'max_height' => '',
                            'max_size' => '2',
                            'mime_types' => 'png,jpg,jpeg,svg',
                        ],
                        [
                            'label' => __('Mobile Image', 'flynt'),
                            'name' => 'mobile_image',
                            'type' => 'image',
                            'preview_size' => 'thumbnail',
                            'return_format' => 'url',
                            'library' => 'all',
                            'min_width' => 0,
                            'min_height' => 0,
                            'min_size' => 0,
                            'max_width' => 1000,
                            'max_height' => '',
                            'max_size' => '1',
                            'mime_types' => 'png,jpg,jpeg,svg',
                        ],
                    ],
                ],
            ],
        ],
    ];
}
