<?php

namespace Flynt\Components\EventsCards;

add_filter('Flynt/addComponentData?name=EventsCards', function ($data) {
    $posts_per_page = 8;

    $data['posts_per_page'] = $posts_per_page;

    if (!isset($paged) || !$paged) {
        $paged = 1;
    }

    $data['posts'] = new \Timber\PostQuery([
        'post_type' => 'event',
        'post_status' => 'publish',
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'event_start_date',
                'value' => date('Ymd', strtotime('today')),
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ],
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    ]);

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('Events Cards', 'flynt'),
            'name' => 'EventsCards',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Kicker', 'flynt'),
                    'name' => 'kicker',
                    'type' => 'text',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'text',
                ],
                [
                    'label' => __('Load More Button Label', 'flynt'),
                    'name' => 'load_more_label',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('No events message', 'flynt'),
                    'name' => 'no_events_message',
                    'type' => 'text',
                    'required' => 1,
                ],
                [
                    'label' => __('Style', 'flynt'),
                    'name' => 'style',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Heading Position', 'flynt'),
                    'name' => 'heading_position',
                    'type' => 'button_group',
                    'choices' => [
                        'left' =>
                            '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                        'center' =>
                            '<i class=\'dashicons dashicons-align-center\' title=\'Text on the center\'></i>',
                    ],
                    'default_value' => 'center',
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'background_color',
                    'type' => 'select',
                    'instructions' => __('Select background color', 'flynt'),
                    'required' => 1,
                    'choices' => [
                        'white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                        'off_grey' =>
                            'Off Grey <div style="width: 8px; height: 8px; display: inline-block; background-color: #F8F8F9; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                    ],
                    'default_value' => 'white',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select background color', 'flynt'),
                ],
            ],
        ],
    ];
}
