<?php

namespace Flynt\Components\Footer;

use Timber;
use Flynt\Utils\Options;

add_action('widgets_init', function () {
    $args = [
        'before_title' => '<div class="h6 title u-text-white">',
        'after_title' => '</div>',
        'before_widget' => '<div class="widget footer-menu %2$s"><div class="content">',
        'after_widget' => '</div></div>',
    ];

    register_sidebar(
        array_merge($args, [
            'name' => 'Footer Widget Area #1',
            'id' => 'footer-widget-area-1',
            'description' =>
                'Widgets in this area will be displayed in the first column in the footer.',
        ])
    );

    register_sidebar(
        array_merge($args, [
            'name' => 'Footer Widget Area #2',
            'id' => 'footer-widget-area-2',
            'description' =>
                'Widgets in this area will be displayed in the second column in the footer.',
        ])
    );

    register_sidebar(
        array_merge($args, [
            'name' => 'Footer Widget Area #3',
            'id' => 'footer-widget-area-3',
            'description' =>
                'Widgets in this area will be displayed in the third column in the footer.',
        ])
    );

    register_sidebar(
        array_merge($args, [
            'name' => 'Footer Widget Area #4',
            'id' => 'footer-widget-area-4',
            'description' =>
                'Widgets in this area will be displayed in the fourth column in the footer.',
        ])
    );

    register_sidebar(
        array_merge($args, [
            'name' => 'Footer Widget Area #5',
            'id' => 'footer-widget-area-5',
            'description' =>
                'Widgets in this area will be displayed in the fifth column in the footer.',
        ])
    );
});

add_filter('Flynt/addComponentData?name=Footer', function ($data) {
    $data['footer_widget_1'] = Timber::get_widgets('footer-widget-area-1');
    $data['footer_widget_2'] = Timber::get_widgets('footer-widget-area-2');
    $data['footer_widget_3'] = Timber::get_widgets('footer-widget-area-3');
    $data['footer_widget_4'] = Timber::get_widgets('footer-widget-area-4');
    $data['footer_widget_5'] = Timber::get_widgets('footer-widget-area-5');

    $data['top_footer_image'] = Options::getGlobal('Footer Settings', 'image');
    $data['top_footer_small_title'] = Options::getGlobal('Footer Settings', 'small_title');
    $data['top_footer_title'] = Options::getGlobal('Footer Settings', 'title');
    $data['top_footer_button'] = Options::getGlobal('Footer Settings', 'main_button');
    $data['top_footer_pricing_button'] = Options::getGlobal('Footer Settings', 'pricing_button');
    $data['top_footer_pricing_label'] = Options::getGlobal('Footer Settings', 'pricing_label');
    $data['footer_form'] = Options::getGlobal('Footer Settings', 'form');
    $data['footer_app_store_url'] = Options::getGlobal('Footer Settings', 'app_store_url');
    $data['footer_play_store_url'] = Options::getGlobal('Footer Settings', 'play_store_url');
    $data['footer_social_menu'] = Options::getGlobal('Footer Settings', 'social_media');
    $data['footer_copyright'] = Options::getGlobal('Footer Settings', 'footer_copyright');
    $data['footer_terms_conditions'] = Options::getGlobal('Footer Settings', 'footer_terms_conditions');
    $data['footer_privacy_policy'] = Options::getGlobal('Footer Settings', 'footer_privacy_policy');
    $data['footer_security'] = Options::getGlobal('Footer Settings', 'footer_security');

    return $data;
});
