<?php

namespace Flynt\Components\ContentLibraryFeaturedPost;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        'name' => 'ContentLibraryFeaturedPost',
        'label' => __('Content Library Featured Post', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'content_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Kicker', 'flynt'),
                'name' => 'kicker',
                'type' => 'text',
                'required' => 0,
            ],
            [
                'label' => __('Featured Post', 'flynt'),
                'name' => 'featured_post',
                'type' => 'post_object',
                'post_type' => 'content',
                'return_format' => 'object',
                'required' => true,
                'instructions' => __('&nbsp;', 'flynt'),
                'wrapper' => [
                    'width' => '30',
                ],
            ],
            [
                'label' => __('aria-label', 'flynt'),
                'name' => 'aria_label',
                'type' => 'text',
                'instructions' => __('&nbsp;', 'flynt'),
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => 'Button label',
                'name' => 'button_label',
                'type' => 'text',
                'instructions' => __('Default: "See More"', 'flynt'),
                'wrapper' => [
                    'width' => '15',
                ],
            ],
            [
                'label' => __('Lazyload Image', 'flynt'),
                'name' => 'featured_post_image_is_lazy',
                'type' => 'true_false',
                'instructions' => __('&nbsp;', 'flynt'),
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => __('Yes', 'flynt'),
                'ui_off_text' => __('No', 'flynt'),
                'wrapper' => [
                    'width' => '15',
                ],
            ],
            [
                'label' => __('Open in new tab', 'flynt'),
                'name' => 'new_tab',
                'type' => 'true_false',
                'ui' => true,
                'ui_on_text' => __('Yes', 'flynt'),
                'ui_off_text' => __('No', 'flynt'),
                'instructions' => __('&nbsp;', 'flynt'),
                'wrapper' => [
                    'width' => '15',
                ],
            ],
            [
                'label' => __('Style', 'flynt'),
                'name' => 'style_tab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'background_color',
                'type' => 'select',
                'instructions' => __('Select background color', 'flynt'),
                'required' => 1,
                'choices' => [
                    'tide' =>
                        'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    'white' =>
                        'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                ],
                'default_value' => 'white',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select background color', 'flynt'),
            ],
            Image::getACFLayout('Pattern Image', 'pattern_image', true),
        ],
    ];
}
