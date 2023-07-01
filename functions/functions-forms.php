<?php

/**
 * Filters the redirect destination URL and adds query arguments
 */

add_filter(
    'gform_confirmation',
    function ($confirmation, $form) {
        $thisPostID = get_queried_object_id(); // TODO only on content posts

        // Last content library post where was submitted a form
        setcookie('lclpwwsaf', $thisPostID, time() + 86400 * 30, '/'); // 86400 = 1 day

        return $confirmation;
    },
    10,
    2
);
