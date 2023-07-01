<?php

namespace Flynt\Components\MicrositeAgenda;

function getACFLayout()
{
    return [
        [
            'label' => __('Microsite Agenda', 'flynt'),
            'name' => 'MicrositeAgenda',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Agenda Dates', 'flynt'),
                    'name' => 'agenda_day',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 10,
                    'layout' => 'row',
                    'button_label' => __('Add Date', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Date', 'flynt'),
                            'name' => 'agenda_date',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Sessions', 'flynt'),
                            'name' => 'agenda_session',
                            'type' => 'repeater',
                            'min' => 1,
                            'max' => 10,
                            'layout' => 'row',
                            'button_label' => __('Add Session', 'flynt'),
                            'sub_fields' => [
                                [
                                    'label' => __('Session Time', 'flynt'),
                                    'name' => 'session_time',
                                    'type' => 'text',
                                    'required' => 1,
                                ],
                                [
                                    'label' => __('Session Title', 'flynt'),
                                    'name' => 'session_title',
                                    'type' => 'text',
                                    'required' => 1,
                                ],
                                [
                                    'label' => __('Session Speakers', 'flynt'),
                                    'name' => 'session_speakers',
                                    'type' => 'text',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
