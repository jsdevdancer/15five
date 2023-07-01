<?php

namespace Flynt\Components\ThriveAgendaBoxes;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThriveAgendaBoxes',
        'label' => __('Thrive Agenda Boxes', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Section ID', 'flynt'),
                'name' => 'section_id',
                'type' => 'text',
            ],
            [
                'label' => __('Kicker', 'flynt'),
                'name' => 'kicker',
                'type' => 'text',
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 0,
            ],
            [
                'label' => __('Cards', 'flynt'),
                'name' => 'cards_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Card', 'flynt'),
                'name' => 'cards',
                'type' => 'repeater',
                'min' => 3,
                'max' => 3,
                'layout' => 'block',
                'required' => 1,
                'button_label' => __('Add event', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Date', 'flynt'),
                        'name' => 'date',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'label' => __('Top Border', 'flynt'),
                        'name' => 'border',
                        'type' => 'select',
                        'default_value' => 'Mind',
                        'choices' => [
                            'mind' =>
                                'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16DBDB; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                            'heart' =>
                                'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #FF52A1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            'motion' =>
                                'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6C00DB; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            'cornbread' =>
                                'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #F4AE2A; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        ],
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 1,
                        'return_format' => 'value',
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'label' => __('Events', 'flynt'),
                        'name' => 'events',
                        'type' => 'repeater',
                        'min' => 1,
                        'layout' => 'block',
                        'required' => 1,
                        'button_label' => __('Add event', 'flynt'),
                        'sub_fields' => [
                            [
                                'label' => __('Event', 'flynt'),
                                'name' => 'name',
                                'type' => 'text',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}