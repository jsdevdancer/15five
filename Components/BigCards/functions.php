<?php

namespace Flynt\Components\BigCards;

use ACFLayouts\Image;
use ACFLayouts\BackgroundColor;

function getACFLayout()
{
    return [
        [
            'label' => __('Big Cards', 'flynt'),
            'name' => 'BigCards',
            'sub_fields' => [
                [
                    'label' => 'Content',
                    'name' => 'content_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 6,
                ],
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                ],
                [
                    'label' => __('Cards', 'flynt'),
                    'name' => 'cards',
                    'type' => 'repeater',
                    'min' => 1,
                    'max' => 4,
                    'layout' => 'row',
                    'button_label' => __('Add Card', 'flynt'),
                    'sub_fields' => [
                        Image::getACFLayout('Image', 'image', true),
                        [
                            'label' => __('Text Position', 'flynt'),
                            'name' => 'text_position',
                            'type' => 'button_group',
                            'choices' => [
                                'text-left' =>
                                    '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                                'text-center' =>
                                    '<i class=\'dashicons dashicons-align-center\' title=\'Text on the center\'></i>',
                                'text-right' =>
                                    '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                            ],
                            'default_value' => 'text-left',
                            'wrapper' => [
                                'width' => '25',
                            ],
                        ],
                        [
                            'label' => __('Card Kicker'),
                            'name' => 'kicker',
                            'type' => 'text',
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'card_layout',
                                        'operator' => '==',
                                        'value' => 'step-card',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'label' => __('Card Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Card Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 6,
                            'required' => 1,
                        ],
                        [
                            'label' => __('Card URL', 'flynt'),
                            'name' => 'url',
                            'type' => 'url',
                        ],
                        [
                            'label' => __('Button Label', 'flynt'),
                            'name' => 'url_label',
                            'type' => 'text',
                            'conditional_logic' => [
                                [
                                    [
                                        'fieldPath' => 'card_layout',
                                        'operator' => '==',
                                        'value' => 'step-card',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => __('Style Settings', 'flynt'),
                    'name' => 'style_tab',
                    'type' => 'tab',
                    'placement' => 'top',
                    'endpoint' => 0,
                ],
                [
                    'label' => __('Card Layout', 'flynt'),
                    'name' => 'card_layout',
                    'type' => 'select',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 0,
                    'choices' => [
                        'simple' => 'Simple',
                        'step-card' => 'step-card, Step and Link',
                    ],
                    'default_value' => 'simple',
                ],
                BackgroundColor::getACFLayout('white', true, false),
            ],
        ],
    ];
}
