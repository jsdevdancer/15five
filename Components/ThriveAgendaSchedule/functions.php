<?php

namespace Flynt\Components\ThriveAgendaSchedule;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThriveAgendaSchedule',
        'label' => __('Thrive Agenda Schedule', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Section ID', 'flynt'),
                'name' => 'section_id',
                'type' => 'text',
            ],
            [
                'label' => __('Day', 'flynt'),
                'name' => 'days',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Day',
                'sub_fields' =>[
                    [
                        'label' => __('Event`s Date', 'flynt'),
                        'name' => 'event_date',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => __('Month', 'flynt'),
                                'name' => 'month',
                                'type' => 'select',
                                'ui' => 1,
                                'ajax' => 1,
                                'choices' => [
                                    'January' => __('January', 'flynt'),
                                    'February' => __('February', 'flynt'),
                                    'March' => __('March', 'flynt'),
                                    'April' => __('April', 'flynt'),
                                    'May' => __('May', 'flynt'),
                                    'June' => __('June', 'flynt'),
                                    'July' => __('July', 'flynt'),
                                    'August' => __('August', 'flynt'),
                                    'September' => __('September', 'flynt'),
                                    'October' => __('October', 'flynt'),
                                    'November' => __('November', 'flynt'),
                                    'December' => __('December', 'flynt'),
                                ],
                                'wrapper' => [
                                    'width' => '34'
                                ],
                            ],
                            [
                                'label' => __('Week Day', 'flynt'),
                                'name' => 'week_day',
                                'type' => 'select',
                                'ui' => 1,
                                'ajax' => 1,
                                'choices' => [
                                    'Monday' => __('Monday', 'flynt'),
                                    'Tuesday' => __('Tuesday', 'flynt'),
                                    'Wednesday' => __('Wednesday', 'flynt'),
                                    'Thursday' => __('Thursday', 'flynt'),
                                    'Friday' => __('Friday', 'flynt'),
                                    'Saturday' => __('Saturday', 'flynt'),
                                    'Sunday' => __('Sunday', 'flynt'),
                                ],
                                'wrapper' => [
                                    'width' => '33'
                                ],
                            ],
                            [
                                'label' => __('Date', 'flynt'),
                                'name' => 'date',
                                'type' => 'number',
                                'min' => 1,
                                'max' => 31,
                                'wrapper' => [
                                    'width' => '33'
                                ],
                            ],
                        ],
                    ],  
                    [
                        'label' => __('Event Details', 'flynt'),
                        'name' => 'events',
                        'type' => 'repeater',
                        'button_label' => 'Add Event',
                        'min' => '1',                        
                        'sub_fields' =>[
                            [
                                'label' => __('Time', 'flynt'),
                                'name' => 'time',
                                'type' => 'text',
                                'wrapper' => [
                                    'width' => '25'
                                ]
                            ],
                            [
                                'label' => __('Agenda', 'flynt'),
                                'name' => 'agenda',
                                'type' => 'group',
                                'wrapper' => [
                                    'width' => '40'
                                ],
                                'sub_fields' =>[
                                    [
                                        'label' => __('Event Type', 'flynt'),
                                        'name' => 'event_type',
                                        'type' => 'select',
                                        'ui' => 1,
                                        'ajax' => 1,
                                        'choices' => [
                                            ' ' => __('None', 'flynt'),
                                            'keynote' => __('Keynote', 'flynt'),
                                            'panel' => __('Panel', 'flynt'),
                                            'workshop' => __('Workshop', 'flynt'),
                                            'fireside-chat' => __('Fireside Chat', 'flynt'),
                                        ],
                                    ],
                                    [
                                        'label' => __('Title', 'flynt'),
                                        'name' => 'title',
                                        'type' => 'text',
                                    ],
                                    [
                                        'label' => __('Description', 'flynt'),
                                        'name' => 'description',
                                        'type' => 'text',
                                    ],
                                ]

                            ],
                            [
                                'label' => __('Presenters', 'flynt'),
                                'name' => 'presenters',
                                'type' => 'repeater',
                                'button_label' => 'Add Presenter',                                
                                'wrapper' => [
                                    'width' => '35'
                                ],
                                'sub_fields' =>[
                                    [
                                        'label' => __('Name', 'flynt'),
                                        'name' => 'name',
                                        'type' => 'text',
                                    ],
                                    [
                                        'label' => __('Position', 'flynt'),
                                        'name' => 'position',
                                        'type' => 'text',
                                    ],
                                ]
                            ],
                        ]
                    ],
                ]
            ],
        ],
    ];
}