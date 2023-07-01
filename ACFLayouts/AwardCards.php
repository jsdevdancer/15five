<?php

namespace ACFLayouts;

class AwardCards
{
    public static function getACFLayout()
    {
        return [
            [
                'label' => __('Pick Awards of Categories?', 'flynt'),
                'name' => 'pick_awards_categories',
                'type' => 'radio',
                'other_choice' => 0,
                'save_other_choice' => 0,
                'layout' => 'horizontal',
                'choices' => [
                    'awards' => __('Awards', 'flynt'),
                    'categories' => __('Categories', 'flynt'),
                ],
                'default_value' => 'awards',
            ],
            [
                'label' => __('Awards', 'flynt'),
                'name' => 'awards',
                'type' => 'repeater',
                'min' => 3,
                'max' => 8,
                'layout' => 'row',
                'button_label' => __('Add Award', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Award', 'flynt'),
                        'name' => 'award',
                        'type' => 'post_object',
                        'post_type' => ['awards'],
                        'return_format' => 'object',
                        'ui' => 1,
                    ],
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'pick_awards_categories',
                            'operator' => '==',
                            'value' => 'awards',
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Categories', 'flynt'),
                'name' => 'categories',
                'type' => 'repeater',
                'min' => 1,
                'layout' => 'row',
                'button_label' => __('Add Taxonomy', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Choose Category', 'flynt'),
                        'name' => 'category',
                        'type' => 'taxonomy',
                        'taxonomy' => 'awards-category',
                        'field_type' => 'select',
                        'add_term' => 0,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'required' => 1,
                        'return_format' => 'object',
                        'ui' => 1,
                    ],
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'pick_awards_categories',
                            'operator' => '==',
                            'value' => 'categories',
                        ],
                    ],
                ],
                [
                    'label' => __('Show more button label', 'flynt'),
                    'name' => 'show_more_label',
                    'type' => 'text',
                    'default_value' => __('Show more', 'flynt'),
                    'required' => 1,
                ],
                [
                    'label' => __('Show less button label', 'flynt'),
                    'name' => 'show_less_label',
                    'type' => 'text',
                    'default_value' => __('Show less', 'flynt'),
                    'required' => 1,
                ],
            ],
        ];
    }
}
