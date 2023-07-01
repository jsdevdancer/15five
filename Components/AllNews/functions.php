<?php

namespace Flynt\Components\AllNews;

add_filter('Flynt/addComponentData?name=AllNews', function ($data) {
    global $paged;

    if (!isset($paged) || !$paged) {
        $paged = 1;
    }

    $data['posts'] = new \Timber\PostQuery([
        'post_type' => 'news',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 16,
        'paged' => $paged,
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('All News', 'flynt'),
            'name' => 'AllNews',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Back Button', 'flynt'),
                    'name' => 'back_button',
                    'type' => 'link',
                    'return_format' => 'array',
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Back Button Aria Label', 'flynt'),
                    'name' => 'back_button_aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}
