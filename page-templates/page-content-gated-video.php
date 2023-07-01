<?php

/*
Template Name: Gated Video
Template Post Type: content
*/

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();

$context['content_library_main_page'] = Options::getGlobal(
    'Content Library',
    'content_library_main_page'
);

Timber::render('templates/customPostTypes/content-single-gated-video.twig', $context);
