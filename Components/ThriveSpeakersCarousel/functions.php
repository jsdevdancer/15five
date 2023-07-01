<?php

namespace Flynt\Components\ThriveSpeakersCarousel;

use Flynt\Utils\JavascriptData;

add_filter('Flynt/addComponentData?name=ThriveSpeakersCarousel', function ($data) {
    $javascript_data = ['autoplay_speed' => $data['slides_autoplay_speed']];
    JavascriptData::setDataObject($javascript_data, 'ThriveSpeakersCarousel');

    return $data;
});
function getACFLayout()
{
    return [
        [
            'label' => __('Thrive Speakers Carousel', 'flynt'),
            'name' => 'ThriveSpeakersCarousel',
            'sub_fields' => [
                [
                    'label' => __('Slides', 'flynt'),
                    'name' => 'slides',
                    'type' => 'repeater',
                    'required' => 1,
                    'min' => 6,
                    'layout' => 'table',
                    'sub_fields' => [
                        [
                            'label' => __('Portrait', 'flynt'),
                            'name' => 'portrait',
                            'type' => 'image',
                            'required' => 1,
                            'return_format' => 'array',
                            'library' => 'all',
                            'min_width' => 0,
                            'min_height' => 0,
                            'min_size' => 0,
                        ],
                        [
                            'label' => __('Name', 'flynt'),
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 0,
                        ],
                        [
                            'label' => __('Position', 'flynt'),
                            'name' => 'position',
                            'type' => 'text',
                            'required' => 0,
                        ],
                    ],
                ],
                [
                    'label' => __('Slides autoplay speed (ms)', 'flynt'),
                    'name' => 'slides_autoplay_speed',
                    'type' => 'number',
                    'wrapper' => [
                        'width' => 100,
                    ],
                    'placeholder' => 3000,
                    'default_value' => 3000,
                ],
            ],
        ],
    ];
}