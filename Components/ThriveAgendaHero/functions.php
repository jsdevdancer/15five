<?php

namespace Flynt\Components\ThriveAgendaHero;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ThriveAgendaHero',
        'label' => __('Thrive Agenda Hero', 'flynt'),
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
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'return_format' => 'array',
                'required' => 1,
            ],
        ],
    ];
}