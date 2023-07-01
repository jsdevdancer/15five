<?php

use Timber\Timber;

/*
 *
 * Content Cards Load More Function
 *
 */
function load_more_content_cards_posts()
{
    $paged = $_REQUEST['page'];
    $postCount = $_REQUEST['posts_per_page'];
    $taxonomy_type = $_REQUEST['taxonomy_type'];
    $taxonomy = $_REQUEST['taxonomy'];

    $args = [
        'post_type' => 'content',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'offset' => $postCount * ($paged - 1),
        'tax_query' => [
            [
                'taxonomy' => $taxonomy_type,
                'field' => 'term_id',
                'terms' => $taxonomy,
            ],
        ],
        'posts_per_page' => $postCount,
    ];

    if ($paged != '') {
        $args['paged'] = $paged;
    }

    $posts = Timber::get_posts($args);
    $message = [];

    if ($posts) {
        foreach ($posts as $post) {
            $response = [
                'data' => Timber::compile('/Components/ContentCards/Partials/card.twig', [
                    'card' => $post,
                ]),
                'page' => $paged,
            ];
            $message[] = $response;
        }
    } else {
        $message = $paged;
    }

    wp_reset_query();
    wp_reset_postdata();
    wp_send_json($message);
    wp_die();
}

add_action('wp_ajax_load_more_content_cards_posts', 'load_more_content_cards_posts');
add_action('wp_ajax_nopriv_load_more_content_cards_posts', 'load_more_content_cards_posts');

/*
 *
 * Event Cards Load More Function
 *
 */
function load_more_events_cards_posts()
{
    $paged = $_REQUEST['page'];
    $postCount = $_REQUEST['posts_per_page'];

    $args = [
        'post_type' => 'event',
        'post_status' => 'publish',
        'meta_key' => 'event_start_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'offset' => $postCount,
        'meta_query' => [
            [
                'key' => 'event_start_date',
                'value' => date('Ymd', strtotime('today')),
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ],
        'posts_per_page' => $postCount,
    ];

    if ($paged != '') {
        $args['paged'] = $paged;
    }

    $posts = Timber::get_posts($args);
    $message = [];

    if ($posts) {
        foreach ($posts as $post) {
            $response = [
                'data' => Timber::compile('/Components/EventsCards/Partials/card.twig', [
                    'card' => $post,
                ]),
                'page' => $paged,
            ];
            $message[] = $response;
        }
    } else {
        $message = $paged;
    }

    wp_reset_query();
    wp_reset_postdata();
    wp_send_json($message);
    wp_die();
}

add_action('wp_ajax_load_more_events_cards_posts', 'load_more_events_cards_posts');
add_action('wp_ajax_nopriv_load_more_events_cards_posts', 'load_more_events_cards_posts');
