<?php

namespace Flynt\Components\G2Awards;

use ACFLayouts\AwardCards;
use ACFLayouts\Image;

add_filter('Flynt/addComponentData?name=G2Awards', function ($data) {
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
            'label' => __('G2 Awards', 'flynt'),
            'name' => 'G2Awards',
            'sub_fields' => [
                [
                    'label' => 'Title',
                    'name' => 'section_title',
                    'type' => 'text',
                ],
                [
                    'label' => 'Subtitle',
                    'name' => 'section_subtitle',
                    'type' => 'text',
                ],
                [
                    'label' => 'Quote',
                    'name' => 'quote',
                    'type' => 'group',
                    'sub_fields' => [
                        [
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'text',
                        ],
                        [
                            'label' => 'Author',
                            'name' => 'author',
                            'type' => 'text',
                        ],
                        [
                            'label' => 'Author Description',
                            'name' => 'description',
                            'type' => 'text',
                        ],
                    ],
                ],
                AwardCards::getACFLayout(),
                Image::getACFLayout(),
            ],
        ],
    ];
}
