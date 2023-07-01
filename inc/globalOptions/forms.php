<?php

namespace Flynt\Forms;

use Flynt\Utils\Options;

Options::addGlobal('Form Settings', [
    [
        'label' => __('Disclosure', 'flynt'),
        'name' => 'gravity_form_disclosure',
        'type' => 'wysiwyg',
        'required' => 1,
        'default_value' => __(
            'You can unsubscribe or modify your email preference at any time. To learn more, review our Privacy Policy<.',
            'flynt'
        ),
        'media_upload' => 0,
        'toolbar' => 'full',
        'delay' => 0,
    ],
]);
