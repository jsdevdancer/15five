<?php

namespace Flynt\CustomTaxonomies;

function registerNewsCategories()
{
    $labels = [
        'name' => 'Categories',
        'singular_name' => 'Category',
        'menu_name' => 'Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'new_item_name' => 'New Category Name',
        'add_new_item' => 'Add New Category',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'view_item' => 'View Category',
        'separate_items_with_commas' => 'Separate categories with commas',
        'add_or_remove_items' => 'Add or remove categories',
        'choose_from_most_used' => 'Choose from the most used',
        'popular_items' => 'Popular categories',
        'search_items' => 'Search categories',
        'not_found' => 'Not Found',
        'no_terms' => 'No categories',
        'items_list' => 'Categories list',
        'items_list_navigation' => 'Categories list navigation',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'rewrite' => ['slug' => 'news-category', 'with_front' => false],
        'show_in_rest' => true,
    ];

    register_taxonomy('news-category', ['news'], $args);
}
add_action('init', 'Flynt\CustomTaxonomies\registerNewsCategories');
