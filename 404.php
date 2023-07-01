<?php

use Timber\Timber;

try {
    $context = Timber::get_context();

    Timber::render('templates/404.twig', $context); // TODO 404 template?
} catch (Error $e) {
    if (empty($_GET['status'])) {
        $home = home_url();
        header('Location: ' . $home . '?status=1');
        exit();
    } else {
        echo '<h1> Something wrong happened, please contact customer support - Error Code: 001 </h1>';
    }
}
