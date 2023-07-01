<?php

namespace Flynt\Components\Awards;

use ACFLayouts\Image;
use ACFLayouts\AwardCards;

add_filter('Flynt/addComponentData?name=Awards', function ($data) {
    $i = 0;

    if ($data['categories']) {
        foreach ($data['categories'] as $category) {
            $cat_id = $category['category']->ID;

            $data['categories'][$i]['posts'] = new \Timber\PostQuery([
                'post_type' => 'awards',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => -1,
                'tax_query' => [
                    [
                        'taxonomy' => 'awards-category',
                        'field' => 'term_id',
                        'terms' => $cat_id,
                    ],
                ],
            ]);

            $i++;
        }
    }

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('Awards', 'flynt'),
            'name' => 'Awards',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
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
                Image::getACFLayout('Image', 'image', true),
                AwardCards::getACFLayout(),
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'options',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Show illustration on mobile?', 'flynt'),
                    'name' => 'mobile_illustration',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Heading Style', 'flynt'),
                    'name' => 'heading_style',
                    'type' => 'select',
                    'instructions' => __(
                        'Select appropriate heading style for design purposes (mobile)',
                        'flynt'
                    ),
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                    'choices' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                    ],
                    'default_value' => 'h1',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select heading style', 'flynt'),
                ],
            ],
        ],
    ];
}
