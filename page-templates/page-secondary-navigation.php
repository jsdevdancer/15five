<?php

/*
Template Name: Secondary Navigation Pages
*/

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();

Timber::render('templates/page-secondary-navigation.twig', $context);
