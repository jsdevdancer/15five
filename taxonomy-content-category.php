<?php

use Timber\Timber;
use Flynt\Utils\Options;

$context = Timber::get_context();

$context['content_category'] = get_queried_object();
$context['title'] = Options::getGlobal('Content Library', 'title');
$context['description'] = Options::getGlobal('Content Library', 'description');
$context['image'] = Options::getGlobal('Content Library', 'image');

// Builds the query arguments
$args = [
    'post_type' => 'content',
    'tax_query' => [
        [
            'taxonomy' => 'content-category',
            'field' => 'term_id',
            'terms' => $context['content_category']->term_taxonomy_id,
        ],
    ],
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
];

// Gets the posts
$context['content_category_posts'] = Timber::get_posts($args);

// Gets all types for posts in the category
$context['content_types'] = [];
foreach ($context['content_category_posts'] as $post) {
    // Gets all content-type of the post
    $types = wp_get_object_terms($post->ID, 'content-type');

    // Loops through all types (in case the post has more than one)
    foreach ($types as $type) {
        // If type is not yet in $context['content_types'], adds it
        $in_array = in_array($type->term_id, array_column($context['content_types'], 'id'));
        if (!$in_array) {
            $context['content_types'][] = [
                'id' => $type->term_id,
                'name' => $type->name,
            ];
        }
    }
}

// Gets all roles for posts in the category
$context['content_roles'] = [];
foreach ($context['content_category_posts'] as $post) {
    // Gets all content-role of the post
    $roles = wp_get_object_terms($post->ID, 'content-role');

    // Loops through all roles (in case the post has more than one)
    foreach ($roles as $role) {
        // If role is not yet in $context['content_roles'], adds it
        $in_array = in_array($role->term_id, array_column($context['content_roles'], 'id'));
        if (!$in_array) {
            $context['content_roles'][] = [
                'id' => $role->term_id,
                'name' => $role->name,
            ];
        }
    }
}

// Pagination
$context['pagination'] = Timber::get_pagination();

$context['content_category_posts'] = array_slice($context['content_category_posts'], 0, 16);

Timber::render('templates/taxonomies/content-category.twig', $context);
