<?php

namespace Flynt\Components\PodcastHosts;

use ACFLayouts\Image;

function getACFLayout()
{
    return [
        [
            'label' => __('Podcast Hosts', 'flynt'),
            'name' => 'PodcastHosts',
            'type' => 'group',
            'sub_fields' => [
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'label' => __('Description', 'flynt'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'rows' => 2,
                ],
                [
                    'label' => __('Hosts', 'flynt'),
                    'name' => 'hosts',
                    'type' => 'repeater',
                    'min' => 1,
                    'layout' => 'row',
                    'button_label' => __('Add Item', 'flynt'),
                    'sub_fields' => [
                        [
                            'label' => __('Content', 'flynt'),
                            'name' => 'content',
                            'type' => 'tab',
                        ],
                        [
                            'label' => __('Name', 'flynt'),
                            'name' => 'name',
                            'type' => 'text',
                            'required' => 1,
                        ],
                        [
                            'label' => __('Title', 'title'),
                            'name' => 'title',
                            'type' => 'text',
                        ],
                        [
                            'label' => __('Host Bio', 'flynt'),
                            'name' => 'bio',
                            'type' => 'wysiwyg',
                            'tabs' => 'visual,text',
                            'toolbar' => 'default',
                            'media_upload' => 0,
                            'delay' => 1,
                            'required' => 1,
                        ],
                        Image::getACFLayout('Host Picture', 'host_picture', true),
                        Image::getACFLayout(
                            'Host Picture Background',
                            'host_picture_background',
                            true
                        ),
                        [
                            'label' => __('Options', 'flynt'),
                            'name' => 'options',
                            'type' => 'tab',
                        ],
                        [
                            'label' => __('Position', 'flynt'),
                            'name' => 'position',
                            'type' => 'button_group',
                            'choices' => [
                                'right' =>
                                    '<i class=\'dashicons dashicons-align-left\' title=\'Text on the right\'></i>',
                                'left' =>
                                    '<i class=\'dashicons dashicons-align-right\' title=\'Text on the left\'></i>',
                            ],
                            'default_value' => 'right',
                            'wrapper' => [
                                'width' => '25',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
