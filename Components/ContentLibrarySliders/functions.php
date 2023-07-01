<?php

namespace Flynt\Components\ContentLibrarySliders;

use Timber;

add_filter('Flynt/addComponentData?name=ContentLibrarySliders', function ($data) {
    // Gets Content Library categories
    $data['content_categories'] = Timber::get_terms([
        'taxonomy' => 'content-category',
        'posts_per_page' => -1,
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC',
    ]);

    // Array to save arrays of Content Library posts, by category
    $data['content_library_posts'] = [];

    // Loops through each category and makes a query for all posts in that category
    foreach ($data['content_categories'] as $category) {
        // Builds the query arguments
        $args = [
            'post_type' => 'content',
            'tax_query' => [
                [
                    'taxonomy' => 'content-category',
                    'field' => 'term_id',
                    'terms' => $category->ID,
                ],
            ],
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        ];

        // Makes the query
        $posts = Timber::get_posts($args);

        // If there are posts, save them
        if (count($posts) > 0) {
            $data['content_library_posts'][] = [
                'category' => $category,
                'posts' => $posts,
                'total_posts' => count($posts),
            ];
        }
    }

    // Creates a nonce to be use in AJAX requests
    $data['nonce'] = wp_create_nonce('getContentLibraryPostsNonce');

    // Makes the data available in the template
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ContentLibrarySliders',
        'label' => __('Content Library Sliders', 'flynt'),
    ];
}

/**
 * Handles AJAX requests on Content Category taxonomy pages
 */
function getContentLibraryPosts()
{
    $post_per_page = 16;

    // Verifies the nonce, and if does not match, exit
    // if (!wp_verify_nonce($_REQUEST['nonce'], 'getContentLibraryPostsNonce')) {
    //     exit('Request not allowed.');
    // }

    // Gets the category id
    $categoryID = $_REQUEST['categoryID'];
    !empty($categoryID) ? $categoryID : '';

    // Gets the requested types ids. If no types were specified, gets all
    !empty($_REQUEST['typeIDs'])
        ? ($typeIDs = explode(',', $_REQUEST['typeIDs']))
        : ($typeIDs = get_terms([
            'taxonomy' => 'content-type',
            'fields' => 'ids',
        ]));

    // Gets the requested roles ids. If no roles were specified, gets all
    !empty($_REQUEST['roleIDs'])
        ? ($roleIDs = explode(',', $_REQUEST['roleIDs']))
        : ($roleIDs = get_terms([
            'taxonomy' => 'content-role',
            'fields' => 'ids',
        ]));

    // Builds the query arguments
    $args = [
        'post_type' => 'content',
        'post_status' => 'publish',
        'tax_query' => [
            'relation' => 'AND',
            [
                'taxonomy' => 'content-category',
                'field' => 'term_id',
                'terms' => $categoryID,
            ],
            [
                'taxonomy' => 'content-type',
                'field' => 'term_id',
                'terms' => $typeIDs,
            ],
            [
                'taxonomy' => 'content-role',
                'field' => 'term_id',
                'terms' => $roleIDs,
            ],
        ],
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'posts_per_archive_page' => -1,
        // 'paged' => $_REQUEST['paged'],
    ];

    // Gets the all posts ('posts_per_page' => -1,)
    $posts = Timber::get_posts($args);

    // Compiles only the posts for that specific page number
    $posts_to_compile = array_slice(
        $posts,
        $_REQUEST['paged'] != 1 ? $_REQUEST['paged'] * $post_per_page - $post_per_page : 0,
        $post_per_page
    );

    if ($posts_to_compile) {
        $html = Timber::compile('Partials/_ajax-resource-cards.twig', [
            'posts' => $posts_to_compile,
        ]);
    } else {
        $html = 'No posts found.';
    }

    if (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
    ) {
        echo json_encode(
            (object) [
                'posts' => $html,
                'pages_num' => count($posts) / $post_per_page,
            ]
        );
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    die();
}
add_action(
    'wp_ajax_get_content_library_posts',
    'Flynt\Components\ContentLibrarySliders\getContentLibraryPosts'
);
add_action(
    'wp_ajax_nopriv_get_content_library_posts',
    'Flynt\Components\ContentLibrarySliders\getContentLibraryPosts'
);
