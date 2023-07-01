<?php

namespace Flynt\Components\MicrositeNavigation;

// use Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;

// add_action('init', function () {
//     register_nav_menus([
//         'microsite_menu' => __('Microsite Menu', 'flynt'),
//     ]);
// });

add_filter('Flynt/addComponentData?name=MicrositeNavigation', function ($data) {
    global $post;

    $data['image'] = get_field('image', $post->ID);
    $data['microsite_menu'] = get_field('microsite_menu', $post->ID);
    $data['nav_button'] = get_field('nav_button', $post->ID);

    $hero_settings = get_field('hero_settings', $post->ID);
    if($hero_settings){

        $cta_type = $hero_settings['cta_type'];
        
        if ($cta_type == 'modal') {
            $data['iframe_code'] = $hero_settings['microsite_iframe_code'];
        }
    }

    $data['burger'] = [
        'src' => Asset::requireUrl('Components/MicrositeNavigation/Assets/burger.svg'),
    ];
    $data['burger_close'] = [
        'src' => Asset::requireUrl('Components/MicrositeNavigation/Assets/burger-close.svg'),
    ];
    $data['bar_active'] = Options::getGlobal('Notification Bar', 'bar_active');

    return $data;
});

/**
 * Adds menu button to 'Microsite Menu'
 */
// acf_add_local_field_group([
//     'key' => 'menu_button',
//     'title' => __('Menu Button', 'flynt'),
//     'fields' => [
//         [
//             'key' => 'button1_group',
//             'label' => __('Button 1', 'flynt'),
//             'name' => 'button1',
//             'type' => 'group',
//             'sub_fields' => [
//                 [
//                     'key' => 'button1_link',
//                     'label' => __('Button 1 Link', 'flynt'),
//                     'name' => 'link',
//                     'type' => 'link',
//                     'required' => 1,
//                     'return_format' => 'array',
//                 ],
//                 [
//                     'key' => 'button1_aria_label',
//                     'label' => __('Button 1 aria-label', 'flynt'),
//                     'name' => 'aria_label',
//                     'type' => 'text',
//                 ],
//             ],
//         ],
//     ],
//     'location' => [
//         [
//             [
//                 'param' => 'nav_menu',
//                 'operator' => '==',
//                 'value' => 'location/microsite_menu',
//             ],
//         ],
//     ],
//     'menu_order' => 0,
//     'position' => 'normal',
//     'style' => 'default',
//     'label_placement' => 'top',
//     'instruction_placement' => 'label',
//     'hide_on_screen' => '',
//     'active' => true,
//     'description' => '',
// ]);