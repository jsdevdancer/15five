<?php

namespace Flynt\Components\NewsTabs;

use Timber\Timber;

add_filter('Flynt/addComponentData?name=NewsTabs', function ($data) {
    $categories = Timber::get_terms('news-category', [
        'hide_empty' => '1',
    ]);

    $data['categories'] = $categories;

    $i = 0;

    foreach ($categories as $category) {
        $cat_id = $category->ID;

        $category->posts = new \Timber\PostQuery([
            'post_type' => 'news',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 8,
            'tax_query' => [
                [
                    'taxonomy' => 'news-category',
                    'field' => 'term_id',
                    'terms' => $cat_id,
                ],
            ],
        ]);

        $i++;
    }

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('News Tabs', 'flynt'),
            'name' => 'NewsTabs',
            'sub_fields' => [
                [
                    'label' => __('View More Button', 'flynt'),
                    'name' => 'view_more',
                    'return_format' => 'array',
                    'type' => 'link',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('View More Aria Label', 'flynt'),
                    'name' => 'view_more_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}
