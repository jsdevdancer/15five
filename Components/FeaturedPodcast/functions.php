<?php

namespace Flynt\Components\FeaturedPodcast;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Featured Podcast', 'flynt'),
            'name' => 'FeaturedPodcast',
            'sub_fields' => [
                [
                    'label' => __('Section Title', 'flynt'),
                    'name' => 'section_title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Display Player Embed?', 'flynt'),
                    'name' => 'display_player',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                ],
                [
                    'label' => __('Podcast Player Embed Code', 'flynt'),
                    'name' => 'embed_code',
                    'type' => 'textarea',
                    'rows' => 4,
                    'required' => 0,
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'display_player',
                                'operator' => '==',
                                'value' => 1,
                            ],
                        ],
                    ],
                ],
                Image::getACFLayout(
                    'Image','image',false, [
                ]),
                [
                    'label' => __('Category', 'flynt'),
                    'name' => 'category',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Season', 'flynt'),
                    'name' => 'season',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
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
                    'label' => __('First Reference', 'flynt'),
                    'name' => 'first_reference',
                    'type' => 'tab',
                ],                
                Image::getACFLayout(
                    'Picture',
                    'first_refer_picture',
                    false
                ),
                [
                    'label' => __('Name', 'flynt'),
                    'name' => 'first_refer_name',
                    'type' => 'text',
                    'required' => 0, 
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'first_refer_description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'required' => 0, 
                ],
                [
                    'label' => __('Second Reference', 'flynt'),
                    'name' => 'second_reference',
                    'type' => 'tab',
                ],
                Image::getACFLayout(
                    'Picture',
                    'second_refer_picture',
                    false
                ),
                [
                    'label' => __('Name', 'flynt'),
                    'name' => 'second_refer_name',
                    'type' => 'text',
                    'required' => 0, 
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'second_refer_description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'required' => 0, 
                ],
            ],
        ],
    ];
}
