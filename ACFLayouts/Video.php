<?php

namespace ACFLayouts;

class Video
{
    public static function getACFLayout(string $video_label = 'Video', string $video_name = 'video')
    {
        return [
            'label' => __($video_label, 'flynt'),
            'name' => $video_name,
            'type' => 'group',
            'layout' => 'block',
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
                    'required' => 0,
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
                    'required' => 0,
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
        ];
    }
}