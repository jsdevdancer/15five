<?php

namespace Flynt\Components\MicrositeFooter;

use Timber;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=MicrositeFooter', function ($data) {
    global $post;

    $data['footer_social_menu'] = Options::getGlobal('Footer Settings', 'social_media');
    $data['footer'] = get_field('footer_background', $post->ID);
    return $data;
});