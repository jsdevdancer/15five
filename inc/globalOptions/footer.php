<?php

namespace Flynt\footerGlobalOptions;

use Flynt\Utils\Options;
use ACFLayouts\Image;

Options::addGlobal('Footer Settings', [
    [
        'label' => __('Top Footer', 'flynt'),
        'name' => 'top_footer',
        'type' => 'tab',
        'placement' => 'top',
    ],
    Image::getACFLayout(),
    [
        'label' => __('Small Title', 'flynt'),
        'name' => 'small_title',
        'type' => 'text',
        'wrapper' => [
            'width' => '50',
        ],
    ],
    [
        'label' => __('Title', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        'required' => 1,
        'wrapper' => [
            'width' => '50',
        ],
    ],
    [
        'label' => __('Main Button', 'flynt'),
        'name' => 'main_button',
        'type' => 'link',
        'required' => 1,
        'wrapper' => [
            'width' => '33',
        ],
    ],
    [
        'label' => __('Pricing Button', 'flynt'),
        'name' => 'pricing_button',
        'type' => 'link',
        'wrapper' => [
            'width' => '33',
        ],
    ],
    [
        'label' => __('Pricing Label', 'flynt'),
        'name' => 'pricing_label',
        'type' => 'text',
        'wrapper' => [
            'width' => '33',
        ],
    ],
    [
        'label' => __('Footer', 'flynt'),
        'name' => 'footer',
        'type' => 'tab',
        'placement' => 'top',
    ],
    [
        'label' => 'Form',
        'name' => 'form',
        'type' => 'forms',
        'required' => 1,
        'return_format' => 'post_object',
        'allow_null' => 0,
        'multiple' => 0,
    ],
    [
        'label' => __('App Store URL', 'flynt'),
        'name' => 'app_store_url',
        'type' => 'url',
        'required' => 1,
        'wrapper' => [
            'width' => '50',
        ],
    ],
    [
        'label' => __('Play Store URL', 'flynt'),
        'name' => 'play_store_url',
        'type' => 'url',
        'required' => 1,
        'wrapper' => [
            'width' => '50',
        ],
    ],
    [
        'label' => __('Socials', 'flynt'),
        'name' => 'social_media',
        'type' => 'repeater',
        'required' => 1,
        'max' => 5,
        'layout' => 'table',
        'sub_fields' => [
            [
                'label' => __('Social Media Name', 'flynt'),
                'name' => 'name',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'choices' => [
                    'facebook' => __('Facebook', 'flynt'),
                    'instagram' => __('Instagram', 'flynt'),
                    'linkedin' => __('LinkedIn', 'flynt'),
                    'twitter' => __('Twitter', 'flynt'),
                ],
                'default_value' => 'facebook',
            ],
            [
                'label' => __('URL', 'flynt'),
                'name' => 'url',
                'type' => 'url',
                'required' => 1,
            ],
        ],
    ],
    [
        'label' => __('Privacy Policy', 'flynt'),
        'name' => 'footer_privacy_policy',
        'type' => 'link',
        'required' => 1,
        'wrapper' => [
            'width' => '33.33333',
        ],
    ],
    [
        'label' => __('Terms & Conditions', 'flynt'),
        'name' => 'footer_terms_conditions',
        'type' => 'link',
        'required' => 1,
        'wrapper' => [
            'width' => '33.33333',
        ],
    ],
    [
        'label' => __('Security', 'flynt'),
        'name' => 'footer_security',
        'type' => 'link',
        'wrapper' => [
            'width' => '33.33333',
        ],
    ],
]);
