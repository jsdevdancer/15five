<?php

namespace Flynt\Components\ContentLibraryCategories;

use Timber;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ContentLibraryCategories', function ($data) {
    $data['content_categories'] = Timber::get_terms([
        'taxonomy' => 'content-category',
        'posts_per_page' => -1,
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC',
    ]);

    $data['main_page'] = Options::getGlobal('Content Library', 'content_library_main_page');
    $data['queried_object'] = get_queried_object();

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'ContentLibraryCategories',
        'label' => __('Content Library Categories', 'flynt'),
    ];
}
