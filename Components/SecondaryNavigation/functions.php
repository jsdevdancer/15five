<?php

namespace Flynt\Components\SecondaryNavigation;

use Timber;

function generateMenuPagination($menu_obj, $current_index = 0)
{
    $menu_pagination = false; // prev - slot 1 - slot 2 - slot 3 - next

    if ($menu_obj) {
        $total_page_count = sizeof($menu_obj);
        $disabled = ['class' => 'disabled'];

        if ($total_page_count <= 3 && $total_page_count > 2) {
            $third = isset($menu_obj[2]) ? $menu_obj[2] : $disabled;

            if ($current_index + 1 != $total_page_count) {
                $next = $menu_obj[$current_index + 1];
            } else {
                $next = $disabled;
            }

            if ($current_index > 0) {
                $prev = $menu_obj[$current_index - 1];
            } else {
                $prev = $disabled;
            }

            $menu_pagination = [$prev, $menu_obj[0], $menu_obj[1], $third, $next];
        } elseif ($total_page_count > 3) {
            if ($current_index == 0) {
                $menu_pagination = [
                    $disabled,
                    $menu_obj[$current_index],
                    $menu_obj[$current_index + 1],
                    $menu_obj[$current_index + 2],
                    $menu_obj[$current_index + 1],
                ];
            } elseif ($current_index >= 1 && $current_index + 1 != $total_page_count) {
                $next = isset($menu_obj[$current_index + 1])
                    ? $menu_obj[$current_index + 1]
                    : $disabled;

                $third = isset($menu_obj[$current_index + 1])
                    ? $menu_obj[$current_index + 1]
                    : $disabled;

                $menu_pagination = [
                    $menu_obj[$current_index - 1], // prev
                    $menu_obj[$current_index - 1],
                    $menu_obj[$current_index],
                    $third,
                    $next, // next
                ];
            } else {
                $prev = isset($menu_obj[$current_index - 1])
                    ? $menu_obj[$current_index - 1]
                    : $disabled;

                $menu_pagination = [
                    $prev, // prev
                    $menu_obj[$current_index - 2],
                    $menu_obj[$current_index - 1],
                    $menu_obj[$current_index],
                    $disabled, // next
                ];
            }
        }
    }

    return $menu_pagination;
}

add_filter('Flynt/addComponentData?name=SecondaryNavigation', function ($data) {
    $menu = [];
    $has_current_post = false;
    $current_index = '';
    $is_current = '';
    $data['menu'] = false;
    $data['warning'] = 'WARNING: The selected Menu does not contain the current page';

    if ($data['nav_enabled']) {
        $menu_items = new Timber\Menu($data['menu_id']);

        $menu_items = $menu_items->items;

        foreach ($menu_items as $id => $item) {
            if ($item->current) {
                $has_current_post = true;
                $current_index = $id;
                $is_current = 'current';
            } else {
                $is_current = '';
            }

            array_push($menu, [
                'class' => $is_current,
                'url' => $item->url,
                'title' => $item->post_title ?: $item->name,
            ]);
        }

        if ($has_current_post) {
            $data['menu'] = generateMenuPagination($menu, $current_index);
        }
    }

    return $data;
});

function getACFLayout()
{
    return [
        [
            'label' => 'Enable Secondary Navigation?',
            'name' => 'nav_enabled',
            'type' => 'true_false',
            'default_value' => 0,
            'ui' => 1,
        ],
        [
            'label' => 'Select Menu for Secondary Nav',
            'name' => 'menu_id',
            'type' => 'menu_choser',
        ],
    ];
}
