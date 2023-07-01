<?php

namespace Flynt\Components\GradientBackgroundSection;

use Flynt\Components\Spacer;
use Flynt\Components\Iframe;
use Flynt\Components\ImageTitleImage;
use Flynt\Components\ValuesBenefits;
use Flynt\Components\JobPostings;

function getACFLayout()
{
    return [
        [
            'label' => __('Gradient Background Section', 'flynt'),
            'name' => 'GradientBackgroundSection',
            'sub_fields' => [
                [
                    'label' => __('Sub-components', 'flynt'),
                    'name' => 'sub_components',
                    'type' => 'flexible_content',
                    'button_label' => __('Add Component', 'flynt'),
                    'min' => 1,
                    'layouts' => [
                        Spacer\getACFLayout(),
                        Iframe\getACFLayout(),
                        ImageTitleImage\getACFLayout(),
                        ValuesBenefits\getACFLayout(),
                        JobPostings\getACFLayout(),
                    ],
                ],
            ],
        ],
    ];
}
