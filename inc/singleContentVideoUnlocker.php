<?php

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

add_action('wp_ajax_single_content_video_unlocker', __NAMESPACE__ . '\\singleContentVideoUnlocker');
add_action(
    'wp_ajax_nopriv_single_content_video_unlocker',
    __NAMESPACE__ . '\\singleContentVideoUnlocker'
);

function singleContentVideoUnlocker()
{
    $postID = $_REQUEST['postID'];

    $context['post'] = new Post($postID);
    $context['content_library_main_page'] = Options::getGlobal(
        'Content Library',
        'content_library_main_page'
    );

    $result = Timber::compile(
        get_stylesheet_directory() . '/Components/_Objects/UnlockedContentVideo/index.twig',
        $context
    );

    if (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
    ) {
        echo json_encode($result);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    die();
}
