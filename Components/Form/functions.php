<?php

namespace Flynt\Components\Form;

use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        'name' => 'Form',
        'label' => __('Form', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content',
                'type' => 'tab',
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Form', 'flynt'),
                'name' => 'gravity_form',
                'type' => 'forms',
                'required' => 1,
                'return_format' => 'id',
                'allow_null' => 0,
                'multiple' => 0,
            ],
            [
                'label' => __('Style Settings', 'flynt'),
                'name' => 'style_tab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => 'Section ID',
                'name' => 'section_id',
                'type' => 'text',
            ],
            BackgroundColor::getACFLayout('white'),
        ],
    ];
}
