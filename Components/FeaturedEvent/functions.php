<?php

namespace Flynt\Components\FeaturedEvent;

add_filter('Flynt/addComponentData?name=FeaturedEvent', function ($data) {
    $data['latest_on_demand'] = new \Timber\PostQuery([
        'post_type' => 'content',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1,
        'tax_query' => [
            [
                'taxonomy' => 'content-type',
                'field' => 'slug',
                'terms' => 'on-demand',
            ],
        ],
    ]);

    $data['featured_event'] = new \Timber\PostQuery([
        'post_type' => 'event',
        'post_status' => 'publish',
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'tax_query' => [
            [
                'taxonomy' => 'event-category',
                'field' => 'slug',
                'terms' => 'featured',
            ],
        ],
        'meta_query' => [
            [
                'key' => 'event_start_date',
                'value' => date('Ymd', strtotime('today')),
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ],
    ]);

    $data['next_event'] = new \Timber\PostQuery([
        'post_type' => 'event',
        'post_status' => 'publish',
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'tax_query' => [
            [
                'taxonomy' => 'event-category',
                'field' => 'slug',
                'terms' => 'featured',
                'operator' => 'NOT IN',
            ],
        ],
        'meta_query' => [
            [
                'key' => 'event_start_date',
                'value' => date('Ymd', strtotime('today')),
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ],
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('Featured Event', 'flynt'),
            'name' => 'FeaturedEvent',
            'sub_fields' => [
                [
                    'label' => __('Event Button Label', 'flynt'),
                    'name' => 'event_button_label',
                    'type' => 'text',
                    'default_value' => __('Reserve Your Spot', 'flynt'),
                    'required' => 1,
                    'wrapper' => [
                        'width' => 33.333333,
                    ],
                ],
                [
                    'label' => __('Open events in new tab', 'flynt'),
                    'name' => 'events_new_tab',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Webinar Button Label', 'flynt'),
                    'name' => 'webinar_button_label',
                    'type' => 'text',
                    'default_value' => __('Watch Now', 'flynt'),
                    'required' => 1,
                    'wrapper' => [
                        'width' => 33.333333,
                    ],
                ],
                [
                    'label' => __('aria-label', 'flynt'),
                    'name' => 'aria_label',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 33.333333,
                    ],
                ],
                [
                    'label' => __('Open webinars in new tab', 'flynt'),
                    'name' => 'webinars_new_tab',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Event Kicker', 'flynt'),
                    'name' => 'event_kicker',
                    'type' => 'text',
                    'default_value' => __('Virtual Event', 'flynt'),
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
                [
                    'label' => __('Webinar Kicker', 'flynt'),
                    'name' => 'webinar_kicker',
                    'type' => 'text',
                    'default_value' => __('On Demand Webinar', 'flynt'),
                    'required' => 1,
                    'wrapper' => [
                        'width' => 50,
                    ],
                ],
            ],
        ],
    ];
}
