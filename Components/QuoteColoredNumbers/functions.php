<?php

namespace Flynt\Components\QuoteColoredNumbers;

function getACFLayout()
{
    return [
        [
            'label' => __('Quote with Colored Numbers', 'flynt'),
            'name' => 'QuoteColoredNumbers',
            'sub_fields' => [
                [
                    'label' => __('Quote', 'flynt'),
                    'name' => 'quote',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Quote Author/Position', 'flynt'),
                    'name' => 'author',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Colored Numbers', 'flynt'),
                    'name' => 'colored_numbers',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 8,
                    'layout' => 'table',
                    'button_label' => __('Add Number', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Number color', 'flynt'),
                            'name' => 'number_color',
                            'type' => 'select',
                            'ui' => 1,
                            'ajax' => 1,
                            'choices' => [
                                'tide' => __('Tide (Purple)', 'flynt'),
                                'rise' => __('Rise (Orange)', 'flynt'),
                                'cornbread' => __('Cornbread (Yellow)', 'flynt'),
                                'motion' => __('Motion (Light Purple)', 'flynt'),
                            ],
                            'default_value' => 'tide',
                            'required' => 1,
                        ],
                    ],
                ],
            ],
        ],
    ];
}
