<?php

/*
Template Name: Microsite

*/

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

// Set Microsite variable
$context['is_microsite'] = 'true';

Timber::render('templates/page-microsite.twig', $context);
