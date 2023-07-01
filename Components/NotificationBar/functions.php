<?php

namespace Flynt\Components\NotificationBar;

use Flynt\Utils\Options;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=NotificationBar', function ($data) {
    $data['wysiwyg'] = Options::getGlobal('Notification Bar', 'wysiwyg');
    $data['button'] = Options::getGlobal('Notification Bar', 'button');
    $data['bg_type'] = Options::getGlobal('Notification Bar', 'bg_type');
    $data['bg_image'] = Options::getGlobal('Notification Bar', 'bg_image');
    $data['bg_color'] = Options::getGlobal('Notification Bar', 'bg_color');
    $data['text_color'] = Options::getGlobal('Notification Bar', 'text_color');
    $data['cookie_validity'] = Options::getGlobal('Notification Bar', 'cookie_validity');

    $data['close_icon'] = [
        'src' => Asset::requireUrl('Components/NotificationBar/Assets/close-icon.svg'),
    ];

    return $data;
});
