<?php

namespace Flynt\Components\Navigation;

use Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;

add_action('init', function () {
    register_nav_menus([
        'main_menu' => __('Main Menu', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=Navigation', function ($data) {
    $data['main_menu'] = new Timber\Menu('main_menu');
    $data['logo'] = [
        'src' => Asset::requireUrl('Components/Navigation/Assets/15-five-logo.svg'),
    ];
    $data['burger'] = [
        'src' => Asset::requireUrl('Components/Navigation/Assets/burger.svg'),
    ];
    $data['burger_close'] = [
        'src' => Asset::requireUrl('Components/Navigation/Assets/burger-close.svg'),
    ];
    $data['bar_active'] = Options::getGlobal('Notification Bar', 'bar_active');

    return $data;
});

/**
 * Adds aria-label field to nav_menu_item
 */
acf_add_local_field_group([
    'key' => 'nav_menu_item_aria_label_field_group_key',
    'fields' => [
        [
            'key' => 'nav_menu_item_aria_label',
            'label' => __('aria-label', 'flynt'),
            'name' => 'aria_label',
            'type' => 'text',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'nav_menu_item',
                'operator' => '==',
                'value' => 'location/main_menu',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
]);

/**
 * Adds mega menu custom fields to 'Main Menu' menu items
 */
acf_add_local_field_group([
    'key' => 'mega_menus',
    'title' => __('Mega Menus', 'flynt'),
    'fields' => [
        [
            'key' => 'has_mega_menu',
            'label' => __('Has mega menu?', 'flynt'),
            'name' => 'has_mega_menu',
            'type' => 'true_false',
            'default_value' => 0,
            'ui' => 1,
            'ui_on_text' => __('Yes', 'flynt'),
            'ui_off_text' => __('No', 'flynt'),
        ],
        [
            'key' => 'type_of_mega_menu',
            'label' => __('Type of Mega Menu', 'flynt'),
            'name' => 'type_of_mega_menu',
            'type' => 'select',
            'conditional_logic' => [
                [
                    [
                        'field' => 'has_mega_menu',
                        'operator' => '==',
                        'value' => 1,
                    ],
                ],
            ],
            'choices' => [
                'type1' => __('Type 1: Why 15Five/Resources/Company', 'flynt'),
                'type2' => __('Type 2: Products', 'flynt'),
            ],
            'default_value' => 'type1',
            'ui' => 1,
            'return_format' => 'value',
        ],
        [
            'key' => 'type1_mega_menu',
            'label' => __('Type 1: Mega Menu', 'flynt'),
            'name' => 'type1_mega_menu',
            'type' => 'group',
            'conditional_logic' => [
                [
                    [
                        'field' => 'type_of_mega_menu',
                        'operator' => '==',
                        'value' => 'type1',
                    ],
                ],
            ],
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'type1_left_panel',
                    'label' => __('Left Panel', 'flynt'),
                    'name' => 'left_panel',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'type1_left_panel_links_repeater',
                            'label' => __('Links Repeater', 'flynt'),
                            'name' => 'links',
                            'type' => 'repeater',
                            'min' => 1,
                            'max' => 6,
                            'layout' => 'table',
                            'sub_fields' => [
                                [
                                    'key' => 'type1_left_panel_link_group',
                                    'label' => __('Link Group', 'flynt'),
                                    'name' => 'link',
                                    'type' => 'group',
                                    'layout' => 'block',
                                    'sub_fields' => [
                                        [
                                            'key' => 'type1_left_panel_link_group_title',
                                            'label' => __('Title', 'flynt'),
                                            'name' => 'title',
                                            'type' => 'link',
                                            'required' => 1,
                                            'return_format' => 'array',
                                        ],
                                        [
                                            'key' => 'type1_left_panel_link_group_aria_label',
                                            'label' => __('aria-label', 'flynt'),
                                            'name' => 'aria_label',
                                            'type' => 'text',
                                        ],
                                        [
                                            'key' => 'type1_left_panel_link_group_description',
                                            'label' => __('Description', 'flynt'),
                                            'name' => 'description',
                                            'type' => 'textarea',
                                            'rows' => 2,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'key' => 'type1_right_panel',
                    'label' => __('Right Panel', 'flynt'),
                    'name' => 'right_panel',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'type1_right_panel_show_on_mobile',
                            'label' => __('Show on Mobile?', 'flynt'),
                            'name' => 'show_on_mobile',
                            'type' => 'true_false',
                            'default_value' => 0,
                            'ui' => 1,
                            'ui_on_text' => __('Yes', 'flynt'),
                            'ui_off_text' => __('No', 'flynt'),
                        ],
                        [
                            'key' => 'type1_right_panel_title',
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'key' => 'type1_right_panel_description',
                            'label' => __('Description', 'flynt'),
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 2,
                        ],
                        [
                            'key' => 'type1_right_panel_links_repeater',
                            'label' => __('Links Repeater', 'flynt'),
                            'name' => 'links',
                            'type' => 'repeater',
                            'layout' => 'table',
                            'sub_fields' => [
                                [
                                    'key' => 'type1_right_panel_link_group',
                                    'label' => __('Link Group', 'flynt'),
                                    'name' => 'link',
                                    'type' => 'group',
                                    'layout' => 'block',
                                    'sub_fields' => [
                                        [
                                            'key' => 'type1_right_panel_link_group_title',
                                            'label' => __('Title', 'flynt'),
                                            'name' => 'title',
                                            'type' => 'link',
                                            'required' => 1,
                                            'return_format' => 'array',
                                        ],
                                        [
                                            'key' => 'type1_right_panel_link_group_aria_label',
                                            'label' => __('aria-label', 'flynt'),
                                            'name' => 'aria_label',
                                            'type' => 'text',
                                        ],
                                        [
                                            'key' => 'type1_right_panel_link_group_description',
                                            'label' => __('Description', 'flynt'),
                                            'name' => 'description',
                                            'type' => 'textarea',
                                            'rows' => 2,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'key' => 'type2_mega_menu',
            'label' => __('Type 2: Mega Menu', 'flynt'),
            'name' => 'type2_mega_menu',
            'type' => 'group',
            'conditional_logic' => [
                [
                    [
                        'field' => 'type_of_mega_menu',
                        'operator' => '==',
                        'value' => 'type2',
                    ],
                ],
            ],
            'layout' => 'block',
            'sub_fields' => [
                [
                    'key' => 'type_2_left_panel',
                    'label' => __('Type 2 Left Panel', 'flynt'),
                    'name' => 'left_panel',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'type2_left_panel_title',
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'key' => 'type2_left_panel_links_repeater',
                            'label' => __('Links Repeater', 'flynt'),
                            'name' => 'links',
                            'type' => 'repeater',
                            'min' => 1,
                            'max' => 3,
                            'layout' => 'table',
                            'sub_fields' => [
                                [
                                    'key' => 'type2_left_panel_link_group',
                                    'label' => __('Link Group', 'flynt'),
                                    'name' => 'link',
                                    'type' => 'group',
                                    'layout' => 'block',
                                    'sub_fields' => [
                                        [
                                            'key' => 'type2_left_panel_link_group_title',
                                            'label' => __('Title', 'flynt'),
                                            'name' => 'title',
                                            'type' => 'link',
                                            'required' => 1,
                                            'return_format' => 'array',
                                        ],
                                        [
                                            'key' => 'type2_left_panel_link_group_aria_label',
                                            'label' => __('aria-label', 'flynt'),
                                            'name' => 'aria_label',
                                            'type' => 'text',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'key' => 'type_2_right_panel',
                    'label' => __('Type 2 Right Panel', 'flynt'),
                    'name' => 'right_panel',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'type_2_right_panel_title',
                            'label' => __('Title', 'flynt'),
                            'name' => 'title',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'key' => 'type_2_right_panel_products_repeater',
                            'label' => __('Products', 'flynt'),
                            'name' => 'products',
                            'type' => 'repeater',
                            'min' => 3,
                            'max' => 4,
                            'layout' => 'table',
                            'sub_fields' => [
                                [
                                    'key' => 'type_2_right_panel_product_image',
                                    'label' => __('Image', 'flynt'),
                                    'name' => 'image',
                                    'type' => 'image',
                                    'required' => 1,
                                    'return_format' => 'array',
                                    'preview_size' => 'thumbnail',
                                    'library' => 'all',
                                    'min_width' => 24,
                                    'min_height' => 24,
                                    'min_size' => 0,
                                    'max_width' => 72,
                                    'max_height' => 72,
                                    'max_size' => '0.1',
                                    'mime_types' => 'png,jpg,jpeg,svg',
                                    'wrapper' => [
                                        'width' => '15',
                                    ],
                                ],
                                [
                                    'key' => 'type_2_right_panel_product_hover_color',
                                    'label' => __('Hover Color', 'flynt'),
                                    'name' => 'hover_color',
                                    'type' => 'color_picker',
                                    'required' => 1,
                                    'default_value' => 'rgba(26, 13, 63, 0.03)',
                                    'wrapper' => [
                                        'width' => '10',
                                    ],
                                ],
                                [
                                    'key' => 'type_2_right_panel_product_link',
                                    'label' => __('Link', 'flynt'),
                                    'name' => 'link',
                                    'type' => 'link',
                                    'required' => 1,
                                    'return_format' => 'array',
                                    'wrapper' => [
                                        'width' => '30',
                                    ],
                                ],
                                [
                                    'key' => 'type_2_right_panel_product_link_aria_label',
                                    'label' => __('aria-label', 'flynt'),
                                    'name' => 'aria_label',
                                    'type' => 'textarea',
                                    'rows' => 5,
                                    'wrapper' => [
                                        'width' => '15',
                                    ],
                                ],
                                [
                                    'key' => 'type_2_right_panel_product_description',
                                    'label' => __('Description', 'flynt'),
                                    'name' => 'description',
                                    'type' => 'textarea',
                                    'required' => 1,
                                    'rows' => 5,
                                    'wrapper' => [
                                        'width' => '30',
                                    ],
                                ],
                            ],
                        ],
                        [
                            'key' => 'type_2_right_panel_product_see_all_link',
                            'label' => __('See All Link', 'flynt'),
                            'name' => 'see_all_link',
                            'type' => 'link',
                            'required' => 1,
                            'return_format' => 'array',
                        ],
                        [
                            'key' => 'type_2_right_panel_product_see_all_link_aria_label',
                            'label' => __('aria-label', 'flynt'),
                            'name' => 'see_all_link_aria_label',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'nav_menu_item',
                'operator' => '==',
                'value' => 'location/main_menu',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
]);

/**
 * Adds menu buttons to 'Main Menu'
 */
acf_add_local_field_group([
    'key' => 'menu_buttons',
    'title' => __('Menu Buttons', 'flynt'),
    'fields' => [
        [
            'key' => 'button1_group',
            'label' => __('Button 1', 'flynt'),
            'name' => 'button1',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'button1_link',
                    'label' => __('Button 1 Link', 'flynt'),
                    'name' => 'link',
                    'type' => 'link',
                    'required' => 1,
                    'return_format' => 'array',
                ],
                [
                    'key' => 'button1_aria_label',
                    'label' => __('Button 1 aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                ],
            ],
        ],
        [
            'key' => 'button2',
            'label' => __('Button 2', 'flynt'),
            'name' => 'button2',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'button2_link',
                    'label' => __('Button 2 Link', 'flynt'),
                    'name' => 'link',
                    'type' => 'link',
                    'required' => 1,
                    'return_format' => 'array',
                ],
                [
                    'key' => 'button2_aria_label',
                    'label' => __('Button 2 aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                ],
            ],
        ],
    ],
    'location' => [
        [
            [
                'param' => 'nav_menu',
                'operator' => '==',
                'value' => 'location/main_menu',
            ],
        ],
    ],
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
]);
