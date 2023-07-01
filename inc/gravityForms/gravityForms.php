<?php

use Twig\TwigFunction;

/* Remove anchor after submit forms */
add_filter('gform_confirmation_anchor', '__return_false');

/* Change Loading Spinner */
add_filter('gform_ajax_spinner_url', 'spinner_image', 10, 2);
function spinner_image()
{
    return get_stylesheet_directory_uri() . '/assets/images/spinner.gif';
}

// Use like: {{ gravityForm(form.id, 'false', 'false', 'true') }}
add_action('timber/twig/filters', function ($twig) {
    $twig->addFunction(
        new TwigFunction('gravityForm', function ($id, $title, $description, $ajax) {
            $shortcode =
                '[gravityform id="' .
                $id .
                '" title="' .
                $title .
                '" description="' .
                $description .
                '" ajax="' .
                $ajax .
                '"]';
            $do_shortcode = do_shortcode($shortcode);
            return $do_shortcode;
        })
    );

    return $twig;
});

/**
 * Filters the submit buttons.
 * Replaces the forms <input> buttons with <button> while maintaining attributes from original <input>.
 *
 * @param string $button Contains the <input> tag to be filtered.
 * @param object $form Contains all the properties of the current form.
 *
 * @return string The filtered button.
 */

add_filter('gform_submit_button_1', 'input_to_button', 10, 2);
function input_to_button($button, $form)
{
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="utf-8" ?>' . $button);
    $input = $dom->getElementsByTagName('input')->item(0);
    $classes = $input->getAttribute('class');
    $classes = 'button button--rise button--text--white light-focus';
    $input->setAttribute('class', $classes);
    $new_button = $dom->createElement('input');
    $new_button->appendChild($dom->createTextNode($input->getAttribute('value')));
    foreach ($input->attributes as $attribute) {
        $new_button->setAttribute($attribute->name, $attribute->value);
    }
    $input->parentNode->replaceChild($new_button, $input);

    return $dom->saveHtml($new_button);
}

// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed.
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_cdata_open', 'wrap_gform_cdata_open', 1);
add_filter('gform_cdata_close', 'wrap_gform_cdata_close', 99);

function wrap_gform_cdata_open($content = '')
{
    if (!do_wrap_gform_cdata()) {
        return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ' . $content;
    return $content;
}

function wrap_gform_cdata_close($content = '')
{
    if (!do_wrap_gform_cdata()) {
        return $content;
    }
    $content .= ' }, false );';
    return $content;
}

function do_wrap_gform_cdata()
{
    if (
        is_admin() ||
        (defined('DOING_AJAX') && DOING_AJAX) ||
        isset($_POST['gform_ajax']) ||
        isset($_GET['gf_page']) || // Admin page (eg. form preview).
        doing_action('wp_footer') ||
        did_action('wp_footer')
    ) {
        return false;
    }
    return true;
}
