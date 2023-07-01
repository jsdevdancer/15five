<?php

namespace Flynt\Components\SubscriptionForm;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=SubscriptionForm', function ($data) {
    // Creates a nonce to be use in AJAX requests
    $data['nonce'] = wp_create_nonce('send_data_to_pardot');

    // gclid
    $data['gclid'] = !empty($_GET['gclid']) ? htmlspecialchars($_GET['gclid']) : '';

    return $data;
});

/**
 * Sends data to Pardot
 *
 */
function send_data_to_pardot()
{
    // Verifies the nonce, and if does not match, exit
    // if (!wp_verify_nonce($_REQUEST['nonce'], 'send_data_to_pardot')) {
    //     exit('Request not allowed.');
    // }

    //Get pardot endpoint url
    $pardot_url = $_POST['pardotUrl'];
    $current_location = $_POST['location'];

    if ($pardot_url == 'false') {
        $individual_configs = Options::getGlobal(
            'Pardot Settings for Newsletter',
            'indiviual_configs'
        );

        foreach ($individual_configs as $pair) {
            if ($pair['location'] == $current_location) {
                $pardot_url = $pair['pardot_url_2'];
            }
        }

        if ($pardot_url == 'false') {
            $pardot_url = Options::getGlobal('Pardot Settings for Newsletter', 'pardot_url_1');
        }
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $pardot_url,
        CURLOPT_POSTFIELDS => 'email=' . $_POST['email'] . '&gclid=' . $_POST['gclid'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ]);

    $response = curl_exec($curl);

    curl_close($curl);

    echo $response;

    die();
}
add_action('wp_ajax_send_data_to_pardot', 'Flynt\Components\SubscriptionForm\send_data_to_pardot');
add_action(
    'wp_ajax_nopriv_send_data_to_pardot',
    'Flynt\Components\SubscriptionForm\send_data_to_pardot'
);
