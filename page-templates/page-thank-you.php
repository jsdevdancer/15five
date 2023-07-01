<?php

/*
Template Name: Thank You Page
Template Post Type: page
*/

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

if (isset($_COOKIE['lclpwwsaf'])) {
    $postID = $_COOKIE['lclpwwsaf'];

    $image = get_field('thank_you_page_image', $postID);
    $title = get_field('thank_you_page_title', $postID);
    $description = get_field('thank_you_page_description', $postID);
    $featured_post = get_field('thank_you_page_featured_post', $postID)->ID;
    $category = get_the_terms($postID, 'content-category')[0]->term_id;

    // Custom hero
    $context['custom_hero'] =
        $image['desktop']['one_x']['old_format'] || $title || $description ? true : false;
    $context['custom_image'] = $image['desktop']['one_x']['old_format'] ? $image : null;
    $context['custom_title'] = $title ? $title : null;
    $context['custom_description'] = $description ? $description : null;

    // Featured post
    $context['previous_post_featured_post'] = $featured_post
        ? Timber::get_post($featured_post)
        : null;
}

// Related posts
if (isset($category)) {
    $context['related_posts'] = Timber::get_posts([
        'post_type' => 'content',
        'tax_query' => [
            [
                'taxonomy' => 'content-category',
                'field' => 'term_id',
                'terms' => $category,
            ],
        ],
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 4,
    ]);
} else {
    $context['related_posts'] = Timber::get_posts([
        'post_type' => 'content',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 4,
    ]);
}

Timber::render('templates/thank-you.twig', $context);
