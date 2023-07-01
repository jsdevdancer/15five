<?php

namespace Flynt\Components\LineButton;

use ACFLayouts\Image;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Line Button', 'flynt'),
            'name' => 'LineButton',
            'sub_fields' => [
                [
                    'label' => 'Content',
                    'name' => 'content',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0
                ],
                [
                    'label' => __('Type Content', 'flynt'),
                    'name' => 'type_content',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => __('Button', 'flynt'),
                    'ui_off_text' => __('Text', 'flynt'),
                ],
                [
                    'label' => 'Button',
                    'name' => 'button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'type_content',
                                'operator' => '==',
                                'value' => 1,
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Button Aria Label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'type_content',
                                'operator' => '==',
                                'value' => 1,
                            ],
                        ],
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Text Label', 'flynt'),
                    'name' => 'text_label',
                    'type' => 'text',
                    'conditional_logic' => [
                        [
                            [
                                'fieldPath' => 'type_content',
                                'operator' => '==',
                                'value' => 0,
                            ],
                        ],
                    ],
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Position', 'flynt'),
                    'name' => 'position',
                    'type' => 'button_group',
                    'choices' => [
                        'start' =>
                            '<i class=\'dashicons dashicons-align-left\' title=\'Align on the left\'></i>',
                        'center' =>
                            '<i class=\'dashicons dashicons-align-center\' title=\'Align on the center\'></i>',
                        'end' =>
                            '<i class=\'dashicons dashicons-align-right\' title=\'Align on the right\'></i>',
                    ],
                    'default_value' => 'center',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => 'Options',
                    'name' => 'bg_section',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0
                ],
                BackgroundColor::getACFLayout('white', true, false),
                [
                    'label' => __('Active lines?', 'flynt'),
                    'name' => 'lines',
                    'type' => 'true_false',
                    'default_value' => 1,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
            ],
        ],
    ];
}
