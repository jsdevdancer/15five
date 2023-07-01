<?php

namespace Flynt;

use Flynt\Utils\FileLoader;
use Flynt\Utils\Options;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/singleContentVideoUnlocker.php';

if (!defined('WP_ENV')) {
    define(
        'WP_ENV',
        function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production'
    );
} elseif (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
    FileLoader::loadPhpFiles('functions');
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', ['callback' => '__return_false']);

add_action('after_setup_theme', function () {
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('flynt', get_template_directory() . '/languages');
});

/**
 * Adds MobileDetectExtension functionality to Twig.
 * @param \Twig\Environment $twig The Twig environment.
 * @return \Twig\Environment
 */
function add_to_twig($twig)
{
    $twig->addExtension(new \Bes\Twig\Extension\MobileDetectExtension());
    return $twig;
}
add_filter('timber/twig', 'Flynt\add_to_twig');

/**
 * Adds global settings to timber context
 *
 */
add_filter('timber/context', function ($context) {
    /**
     * Notification Bar Logic and context
     */
    function addNotificationBarContext()
    {
        $notification_bar_active = Options::getGlobal('Notification Bar', 'bar_active');
        $notification_bar_button = Options::getGlobal('Notification Bar', 'button')['link'];
        $display_conditions = Options::getGlobal('Notification Bar', 'display_conditions');
        $data_range = Options::getGlobal('Notification Bar', 'data_range');
        $time_now = time();
        $context_show_bar = false;
        $context_bar_class = '';

        $greater_or_equal_than_start_date =
            $data_range['start_date'] === '' || $time_now >= strtotime($data_range['start_date'])
                ? true
                : false;
        $less_or_equal_than_start_date =
            $data_range['end_date'] === '' || $time_now <= strtotime($data_range['end_date'])
                ? true
                : false;
        $in_data_range =
            $greater_or_equal_than_start_date && $less_or_equal_than_start_date ? true : false;

        $notification_bar_closed = isset($_COOKIE['15five_notification_bar_closed']);

        if (
            $notification_bar_active &&
            $in_data_range &&
            (is_page() || is_single() || is_tax()) &&
            !$notification_bar_closed
        ) {
            if ($display_conditions === 'entire_site' && !is_page('empower') && !is_page('newhr')) {
                $context_show_bar = true;
            } else {
                if ($display_conditions === 'homepage' && is_front_page()) {
                    $context_show_bar = true;
                }
            }
        }

        if ($notification_bar_button) {
            $context_bar_class = 'notification-bar-active-with-button';
        } else {
            $context_bar_class = 'notification-bar-active';
        }

        return ['show_bar' => $context_show_bar, 'bar_class' => $context_bar_class];
    }

    /**
     * Drift bot facade message context
     */
    function addDriftFacadeContext()
    {
        $facade = Options::getGlobal('Drift Facade Settings', 'facade_options');
        $is_active = $facade['enable_drift'] == '' ? false : true;

        if ($is_active) {
            return $facade;
        }

        return false;
    }

    $notification_bar_context = addNotificationBarContext();

    if (stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') == false) {
        $context['website_scripts'] = Options::getGlobal('Website Settings', 'website_scripts');
    }

    $context['drift_facade'] = addDriftFacadeContext();
    $context['show_notification_bar'] = $notification_bar_context['show_bar'];
    $context['notification_bar_class'] = $notification_bar_context['bar_class'];

    return $context;
});

/**
 * Changes default max number of posts per page ("Blog pages show at most" as it affects pagination numbers
 *
 */
add_filter('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (is_tax('content-category')) {
        $query->set('posts_per_page', 16);
    }
});

/**
 * Adds the last 4 characters of a uniqid() identifier to the the uploaded file
 *
 */
add_filter(
    'wp_handle_upload_prefilter',
    function ($file) {
        $info = pathinfo($file['name']);
        $ext = empty($info['extension']) ? '' : '.' . $info['extension'];
        $name = basename($file['name'], $ext);

        $file['name'] = $name . substr(uniqid(), -4) . $ext;

        return $file;
    },
    10,
    1
);

add_filter(
    'permalink_manager_filter_default_post_uri',
    function ($default_uri, $native_slug, $post, $slug, $native_uri) {
        if ($native_uri || $post->post_type != 'content') {
            return $default_uri;
        } elseif (has_term('case-study', 'content-type', $post)) {
            $default_uri = "case-study/{$slug}";
        } elseif (has_term('on-demand', 'content-type', $post)) {
            $default_uri = "on-demand/{$slug}";
        } elseif (has_term('research', 'content-type', $post)) {
            $default_uri = "research/{$slug}";
        } elseif (has_term('ebook', 'content-type', $post)) {
            $default_uri = "ebook/{$slug}";
        } elseif (has_term('quick-guide', 'content-type', $post)) {
            $default_uri = "quick-guide/{$slug}";
        } else {
            return $default_uri;
        }

        return trim($default_uri, '/');
    },
    10,
    5
);

// Add Custom Form Validation Message for Email Excluded socket_create_listen
add_filter('gpb_validation_message', function ($validation_message) {
    // Specify the message you would like to use.
    return 'The email address entered looks like a personal email.<br>Please enter a business email address.';
});

add_filter(
    'script_loader_tag',
    function ($tag, $handle) {
        if ('google-recaptcha' !== $handle) {
            return $tag;
        }

        return str_replace(' src', ' async defer src', $tag);
    },
    10,
    2
);

// Add page info to window.PageData var to facilitate js acess
add_action('wp_enqueue_scripts', function () {
    global $post;

    $data = [
        'postID' => $post->ID,
    ];
    wp_localize_script('Flynt/assets', 'PageData', $data);
});

/**
 * Replace WP Jquery to a min version (86.5kb -> 31.3kb saving)
 */

add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        '/wp-content/themes/flynt/assets/vendors/jquery-3.6.0.min.js',
        [],
        null,
        true
    );
});

/*
    GDPR Plugin Fix: Filter to bypass the IPAPI API free service with rate limits. This uses the WebToffee's
    Ip verification domain instead.
*/
add_filter('wt_cli_use_custom_geolocation_api', '__return_true');

// disable xmlrpc
add_filter('xmlrpc_methods', function ($methods) {
    return [];
});
