<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'thankYouPage',
        'title' => __('Thank You Page', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'thankYouPageComponents',
                'label' => 'Thank You Page Components',
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\ThankYouPageHero\getACFLayout(),
                    Components\ContentLibraryFeaturedPost\getACFLayout(),
                    Components\ThankYouPageSomethingElse\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-thank-you.php',
                ],
            ],
        ],
    ]);
});
