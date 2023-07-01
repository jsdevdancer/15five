<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponentsMicrosite',
        'title' => 'Microsite Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'label' => __('Header', 'flynt'),
                'name' => 'header_tab',
                'type' => 'tab',
            ],
            [
                'label' => __('SVG Logo', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'required' => 1,
                'preview_size' => 'thumbnail',
                'return_format' => 'array',
                'library' => 'all',
                'min_width' => 0,
                'min_height' => 0,
                'min_size' => 0,
                'max_width' => 350,
                'max_height' => '',
                'max_size' => '0.1',
                'layout' => 'block',
            ],
            [
                'label' => 'Microsite Navigation Menu',
                'name' => 'microsite_menu',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'table',
                'button_label' => 'Add Item',
                'min' => 0,
                'sub_fields' => [
                    [
                        'label' => 'Menu item',
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'required' => 1,
                    ],
                    [
                        'label' => 'Item aria-label',
                        'name' => 'aria_label',
                        'type' => 'text',
                    ],
                ],
            ],
            [
                'label' => __('Nav Button', 'flynt'),
                'name' => 'nav_button',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Button Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                        'required' => 1,
                        'return_format' => 'array',
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                    [
                        'label' => __('Button Color', 'flynt'),
                        'name' => 'button_color',
                        'type' => 'select',
                        'default_value' => 'Rise',
                        'choices' => [
                            'rise' =>
                                'Rise <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                            'tide' =>
                                'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1A0D3F; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            'motion' =>
                                'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6C00DB; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                            'cornbread' =>
                                'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #F4AE2A; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        ],
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 1,
                        'return_format' => 'value',
                        'wrapper' => [
                            'width' => 50,
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Footer', 'flynt'),
                'name' => 'footer_tab',
                'type' => 'tab',
            ],
            [
                'label' => __('Footer Backgorund', 'flynt'),
                'name' => 'footer_background',
                'type' => 'select',
                'default_value' => 'kin',
                'choices' => [
                    'kin' =>
                        'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    'tide' =>
                        'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1A0D3F; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    ],
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
            ],
            [
                'label' => __('Hero Section', 'flynt'),
                'name' => 'hero_tab',
                'type' => 'tab',
            ],
            [
                'label' => 'Hero Section Settings',
                'name' => 'hero_settings',
                'type' => 'group',
                'sub_fields' => [
                    [
                        'label' => 'CTA Type:',
                        'name' => 'cta_type',
                        'type' => 'select',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'choices' => [
                            'modal' => 'Modal with iframe',
                            'link' => 'Simple link (Filled in the component itself)',
                        ],
                        'default_value' => 'modal',
                    ],
                    [
                        'label' => __('iFrame code', 'flynt'),
                        'name' => 'microsite_iframe_code',
                        'type' => 'textarea',
                        'rows' => 4,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'cta_type',
                                    'operator' => '==',
                                    'value' => 'modal',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Components', 'flynt'),
                'name' => 'components_tab',
                'type' => 'tab',
            ],
            [
                'name' => 'pageComponentsMicrosite',
                'label' => __('Microsite Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\BigCards\getACFLayout(),
                    Components\ClientLogos\getACFLayout(),
                    Components\ConfettiBanner\getACFLayout(),                    
                    Components\ContentCards\getACFLayout(),
                    Components\FeaturedPodcast\getACFLayout(),
                    Components\IconButtons\getACFLayout(),
                    Components\Iframe\getACFLayout(),
                    Components\ImageCheckmarkCard\getACFLayout(),
                    Components\ImageTitleImage\getACFLayout(),
                    Components\LineButton\getACFLayout(),
                    Components\MasonryGallery\getACFLayout(),
                    Components\MicrositeAgenda\getACFLayout(),
                    Components\MicrositeHero\getACFLayout(),
                    Components\MockupBanner\getACFLayout(),
                    Components\ProductFeatureHero\getACFLayout(),
                    Components\PromotionalCard\getACFLayout(),
                    Components\Spacer\getACFLayout(),
                    Components\Team\getACFLayout(),
                    Components\Testimonial\getACFLayout(),
                    Components\TextImage\getACFLayout(),
                    Components\TextImageBigCTA\getACFLayout(),
                    Components\TextImageButton\getACFLayout(),
                    Components\TextImageFloatingBar\getACFLayout(),
                    Components\TextImageSmallCTA\getACFLayout(),
                    Components\TitleAndTwoColumns\getACFLayout(),
                    Components\TwoColumnResourceLinks\getACFLayout(),
                    Components\TwoColumnTextSection\getACFLayout(),
                    Components\TwoVideoSection\getACFLayout(),
                    Components\ValuesBenefits\getACFLayout(),
                    Components\VideoPopupText\getACFLayout(),
                    Components\WYSIWYG\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/microsite.php',
                ],
            ],
        ],
    ]);
});