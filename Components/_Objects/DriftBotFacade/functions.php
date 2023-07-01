<?php

namespace Flynt\Components\DriftBotFacade;

add_filter('Flynt/addComponentData?name=DriftBotFacade', function ($data) {
    global $post;
    $message = $data['facade_options']['global_message'];
    $page_messages = $data['facade_options']['drift_sliding_messages'];

    if (!empty($page_messages)) {
        foreach ($page_messages as $item) {
            if ($item['page'] == $post->ID) {
                $message = $item['page_sliding_message'];
            }
        }
    }

    $data['drift_enabled'] = $data['facade_options']['enable_drift'];
    $data['facade_enabled'] = $data['facade_options']['enable_facade'];
    $data['drift_id'] = $data['facade_options']['drift_id'];
    $data['message'] = $message;

    return $data;
});
