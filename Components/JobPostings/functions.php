<?php

namespace Flynt\Components\JobPostings;

use Flynt\LeverAPI\JobPostings;

add_filter('Flynt/addComponentData?name=JobPostings', function ($data) {
    $result = JobPostings::get();
    $jobs = [];

    foreach ($result as $team) {
        $jobs[$team->title] = [];

        foreach ($team->postings as $posting) {
            array_push($jobs[$team->title], [
                'title' => $posting->text,
                'url' => $posting->hostedUrl,
            ]);
        }
    }
    $data['jobs'] = $jobs;

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => __('JobPostings', 'flynt'),
            'name' => 'JobPostings',
            'sub_fields' => [
                [
                    'label' => __('Content', 'flynt'),
                    'name' => 'content',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Title', 'flynt'),
                    'name' => 'title',
                    'type' => 'text',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Section ID', 'flynt'),
                    'name' => 'section_id',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => '50',
                    ],
                ],
                [
                    'label' => __('Options', 'flynt'),
                    'name' => 'options',
                    'type' => 'tab',
                ],
                [
                    'label' => __('Background Color', 'flynt'),
                    'name' => 'background_color',
                    'type' => 'select',
                    'instructions' => __('Select background color', 'flynt'),
                    'required' => 1,
                    'choices' => [
                        'white' =>
                            'White <div style="width: 8px; height: 8px; display: inline-block; background-color: #ffffff; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                        'rise' =>
                            'Rise <div style="width: 8px; height: 8px; display: inline-block; background-color: #db3700; border-radius: 2px; border: 1px solid #1a0d3f; margin-left: 2px;"></div>',
                        'motion' =>
                            'Motion <div style="width: 8px; height: 8px; display: inline-block; background-color: #6c00db; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'cornbread' =>
                            'Cornbread <div style="width: 8px; height: 8px; display: inline-block; background-color: #f4ae2a; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'heart' =>
                            'Heart <div style="width: 8px; height: 8px; display: inline-block; background-color: #ff52a1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'mind' =>
                            'Mind <div style="width: 8px; height: 8px; display: inline-block; background-color: #16dbdb; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'kin' =>
                            'Kin <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff2e8; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'tide' =>
                            'Tide <div style="width: 8px; height: 8px; display: inline-block; background-color: #1a0d3f; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'tide-light' =>
                            'Tide Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #f8f8f9; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'kin-light' =>
                            'Kin Light <div style="width: 8px; height: 8px; display: inline-block; background-color: #fff7f1; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                        'black' =>
                            'Black <div style="width: 8px; height: 8px; display: inline-block; background-color: #000000; border-radius: 2px; border: 1px solid #ffffff; margin-left: 2px;"></div>',
                    ],
                    'default_value' => 'white',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 1,
                    'ajax' => 1,
                    'return_format' => 'value',
                    'placeholder' => __('Select background color', 'flynt'),
                ],
            ],
        ],
    ];
}
