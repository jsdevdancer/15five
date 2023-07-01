<?php

namespace ACFLayouts;

class BackgroundColor
{
    /**
     * Renders background color selector with brand colors. Label => 'background_color'
     */
    public static function getACFLayout(
        string $standard_color,
        bool $light_colors = true,
        bool $dark_colors = true
    ) {
        $colors = [];

        $dark = [
            'tide' =>
                'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
        ];

        $light = [
            'white' =>
                'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
            'kin' =>
                'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
            'kin-light' =>
                'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
            'tide-light' =>
                'Tide Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #F8F8F9; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
        ];

        if ($light_colors) {
            $colors = $light;
        }

        if ($dark_colors) {
            $colors = array_merge($colors, $dark);
        }

        return [
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'background_color',
                'type' => 'select',
                'instructions' => __('Select background color', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
                'choices' => $colors,
                'default_value' => $standard_color,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 1,
                'return_format' => 'value',
                'placeholder' => __('Select background color', 'flynt'),
            ],
        ];
    }
}
