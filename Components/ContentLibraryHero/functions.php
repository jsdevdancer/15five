<?php

namespace Flynt\Components\ContentLibraryHero;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ContentLibraryHero', function ($data) {
    $data['content_library_hero'] = Options::getGlobal('Content Library', 'content_library_hero');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ContentLibraryHero',
        'label' => __('Content Library Hero', 'flynt'),
    ];
}
