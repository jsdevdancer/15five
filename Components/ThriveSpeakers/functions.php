<?php

namespace Flynt\Components\ThriveSpeakers;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Speakers', 'flynt'),
            'name' => 'ThriveSpeakers',
            'sub_fields' => [
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Headline', 'flynt'),
                    'name' => 'headline',
                    'type' => 'text',
                    'required' => 0,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 3,
                    'required' => 0,
                ],
                [
                    'label' => __('Speakers', 'flynt'),
                    'name' => 'speakers',
                    'type' => 'repeater',
                    'min' => 1,
                    'required' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Speaker', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Speaker Picture', 'flynt'),
                            'name' => 'speaker_picture_tab',
                            'type' => 'tab',
                        ],
                        Image::getACFLayout('Speaker Picture', 'image', true),
                        [
                            'label' => __('Speaker Content', 'flynt'),
                            'name' => 'speaker_picture_content',
                            'type' => 'tab',
                        ],
                        [
                            'label' => __('Kicker', 'flynt'),
                            'name' => 'kicker',
                            'type' => 'text',
                            'required' => 0,
                        ],
                        [
                            'label' => __('Headline', 'flynt'),
                            'name' => 'headline',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Name', 'flynt'),
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 0,
                        ],
                        [
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'rows' => 1,
                            'required' => 0,
                        ],
                        [
                            'label' => __('Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 3,
                            'required' => 0,
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