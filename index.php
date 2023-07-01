<?php

use Timber\Timber;
use Timber\Post;
use Timber\PostQuery;
use Flynt\Utils\Options;

use const Flynt\Archives\POST_TYPES;

try {
    $context = Timber::get_context();
    $context['post'] = new Post();
    $context['posts'] = new PostQuery();

    Timber::render('templates/index.twig', $context);
} catch (Error $e) {
    if (empty($_GET['status'])) {
        $home = home_url();
        header('Location: ' . $home . '?status=1');
        exit();
    } else {
        echo '<h1> Something wrong happened, please contact customer support - Error Code: 001 </h1>';
    }
}
