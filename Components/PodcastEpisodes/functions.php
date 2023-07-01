<?php

namespace Flynt\Components\PodcastEpisodes;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Podcast Episodes', 'flynt'),
            'name' => 'PodcastEpisodes',
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
                    'rows' => 3,
                    'required' => 1,
                ],
                [
                    'label' => __('Episode', 'flynt'),
                    'name' => 'episodes',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Episode', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Episode Picture', 'flynt'),
                            'name' => 'episode_picture_tab',
                            'type' => 'tab',
                        ],
                        Image::getACFLayout('Episode Picture', 'image', true),
                        Image::getACFLayout(
                            'Episode Picture Background',
                            'background',
                            true
                        ),
                        [
                            'label' => __('Episode Content', 'flynt'),
                            'name' => 'episode_picture_content',
                            'type' => 'tab',
                        ],
                        [
                            'label' => __('Season (optional)', 'flynt'),
                            'name' => 'season',
                            'type' => 'text',
                        ],
                        [
                            'label' => __('Episode Number (optional)', 'flynt'),
                            'name' => 'number',
                            'type' => 'number',
                        ],
                        [
                            'label' => __('Publish Date (optional)', 'flynt'),
                            'name' => 'publish_date',
                            'type' => 'date_picker',
                            'display_format' => 'F d, Y',
                            'return_format' => 'F d, Y',
                            'first_day' => 1
                        ],
                        [
                            'label' => __('Episode Title', 'flynt'),
                            'name' => 'episode_title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Episode Description', 'flynt'),
                            'name' => 'episode_description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                        ],
                        [
                            'label' => __('Podcast Player Embed Code', 'flynt'),
                            'name' => 'embed_code',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 1,
                        ],
                        [
                            'label' => __('Transcript Link (optional)', 'flynt'),
                            'name' => 'button',
                            'type' => 'link',
                            'return_format' => 'array',
                        ],
                        [
                            'label' => __('Link Aria Label', 'flynt'),
                            'name' => 'aria_label',
                            'type' => 'text',
                        ],
                        [
                            'label' => __('Options', 'flynt'),
                            'name' => 'options',
                            'type' => 'tab',
                        ],
                        [
                            'label' => __('Position', 'flynt'),
                            'name' => 'position',
                            'type' => 'button_group',
                            'choices' => [
                                'right' =>
                                    '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                                'left' =>
                                    '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                            ],
                            'default_value' => 'right',
                            'wrapper' => [
                                'width' => '25',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
