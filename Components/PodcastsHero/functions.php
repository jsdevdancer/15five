<?php

namespace Flynt\Components\PodcastsHero;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Podcasts Hero', 'flynt'),
            'name' => 'PodcastsHero',
            'sub_fields' => [
                [
                    'label' => 'Content Settings',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Section Title', 'flynt'),
                    'name' => 'section_title',
                    'type' => 'text',
                    'required' => 1,
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
                    'label' => __('Insert Newsletter form', 'flynt'),
                    'name' => 'include_form',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '25',
                    ],
                ],
                [
                    'label' => __('Podcast Links Section', 'flynt'),
                    'name' => 'podcast_links_section',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => __('Podcast Links Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                        ],
                        [
                            'label' => __('Podcast Links', 'flynt'),
                            'name' => 'podcast_links',
                            'type' => 'repeater',
                            'min' => 0,
                            'layout' => 'row',
                            'button_label' => __('Add Item', 'flynt'),
                            'sub_fields' => [
                                [
                                    'label' => __('URL', 'flynt'),
                                    'name' => 'url',
                                    'type' => 'url',
                                    'required' => 1,
                                ],
                                [
                                    'label' => __('Link aria-label', 'flynt'),
                                    'name' => 'url_aria_label',
                                    'type' => 'text',
                                    'required' => 0,
                                ],
                                Image::getACFLayout('Podcast Link Logo', 'podcast_link_logo', true),
                            ],
                        ],
                    ],
                ],
                Image::getACFLayout('Section Image', 'section_image', true),
                [
                    'label' => 'Pardot Settings',
                    'name' => 'pardot_settings',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => 'Custom Pardot Url',
                    'name' => 'pardot_url_3',
                    'type' => 'url',
                ],
            ],
        ],
    ];
}
