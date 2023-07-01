<?php

namespace Flynt\LeverAPI;

class JobPostings
{
    public static function get(string $groupBy = 'team', array $selection = [])
    {
        $header = 'mode=json';

        if (!empty($groupBy)) {
            $header .= '&group=' . $groupBy;
        }

        // if (!empty($selection['team'])) {
        //     $header .= '&team=' . urlencode($selection['team']);
        // }
        // if (!empty($selection['commitment'])) {
        //     $header .= '&commitment=' . urlencode($selection['commitment']);
        // }
        // if (!empty($selection['location'])) {
        //     $header .= '&location=' . urlencode($selection['location']);
        // }

        $url = 'https://api.lever.co/v0/postings/15five?' . $header;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);

        return json_decode($result);
    }

    /**
     * For possible future implementation of a filter
     */
    // public function getFilterOptions()
    // {
    //     $jobs = $this->getJobPostings('');

    //     $filter_options = [
    //         'teams' => [],
    //         'commitment_types' => [],
    //         'locations' => [],
    //     ];

    //     foreach ($jobs as $job) {
    //         array_push($filter_options['teams'], $job->categories->team);
    //         array_push($filter_options['commitment_types'], $job->categories->commitment);
    //         array_push($filter_options['locations'], $job->categories->location);
    //     }

    //     // Return only single values
    //     return $filter_options = [
    //         'teams' => array_flip(array_flip($filter_options['teams'])),
    //         'commitment_types' => array_flip(array_flip($filter_options['commitment_types'])),
    //         'locations' => array_flip(array_flip($filter_options['locations'])),
    //     ];
    // }

    // public function filter(array $selection)
    // {
    //     return $this->getJobPostings('team', $selection);
    // }
}
