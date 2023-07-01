<?php

namespace Flynt\CustomTaxonomies;

function registerContentLibraryCategories()
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
        'rewrite' => ['slug' => 'content-category', 'with_front' => false],
        'show_in_rest' => true,
    ];

    register_taxonomy('content-category', ['content'], $args);
}
add_action('init', 'Flynt\CustomTaxonomies\registerContentLibraryCategories');

function registerContentLibraryTypes()
{
    $labels = [
        'name' => 'Types',
        'singular_name' => 'Type',
        'menu_name' => 'Types',
        'all_items' => 'All Types',
        'parent_item' => 'Parent Type',
        'parent_item_colon' => 'Parent Type:',
        'new_item_name' => 'New Type Name',
        'add_new_item' => 'Add New Type',
        'edit_item' => 'Edit Type',
        'update_item' => 'Update Type',
        'view_item' => 'View Type',
        'separate_items_with_commas' => 'Separate types with commas',
        'add_or_remove_items' => 'Add or remove types',
        'choose_from_most_used' => 'Choose from the most used',
        'popular_items' => 'Popular types',
        'search_items' => 'Search types',
        'not_found' => 'Not Found',
        'no_terms' => 'No types',
        'items_list' => 'Types list',
        'items_list_navigation' => 'Types list navigation',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'content-type', 'with_front' => false],
        'show_in_rest' => true,
    ];

    register_taxonomy('content-type', ['content'], $args);
}
add_action('init', 'Flynt\CustomTaxonomies\registerContentLibraryTypes');

function registerContentLibraryRoles()
{
    $labels = [
        'name' => 'Roles',
        'singular_name' => 'Role',
        'menu_name' => 'Roles',
        'all_items' => 'All Roles',
        'parent_item' => 'Parent Role',
        'parent_item_colon' => 'Parent Role:',
        'new_item_name' => 'New Role Name',
        'add_new_item' => 'Add New Role',
        'edit_item' => 'Edit Role',
        'update_item' => 'Update Role',
        'view_item' => 'View Role',
        'separate_items_with_commas' => 'Separate roles with commas',
        'add_or_remove_items' => 'Add or remove roles',
        'choose_from_most_used' => 'Choose from the most used',
        'popular_items' => 'Popular roles',
        'search_items' => 'Search roles',
        'not_found' => 'Not Found',
        'no_terms' => 'No roles',
        'items_list' => 'Roles list',
        'items_list_navigation' => 'Roles list navigation',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'content-role', 'with_front' => false],
        'show_in_rest' => true,
    ];

    register_taxonomy('content-role', ['content'], $args);
}
add_action('init', 'Flynt\CustomTaxonomies\registerContentLibraryRoles');

function registerContentLibraryAuthors()
{
    $labels = [
        'name' => 'Authors',
        'singular_name' => 'Author',
        'menu_name' => 'Authors',
        'all_items' => 'All Authors',
        'parent_item' => 'Parent Author',
        'parent_item_colon' => 'Parent Author:',
        'new_item_name' => 'New Author Name',
        'add_new_item' => 'Add New Author',
        'edit_item' => 'Edit Author',
        'update_item' => 'Update Author',
        'view_item' => 'View Author',
        'separate_items_with_commas' => 'Separate authors with commas',
        'add_or_remove_items' => 'Add or remove authors',
        'choose_from_most_used' => 'Choose from the most used',
        'popular_items' => 'Popular authors',
        'search_items' => 'Search authors',
        'not_found' => 'Not Found',
        'no_terms' => 'No authors',
        'items_list' => 'Authors list',
        'items_list_navigation' => 'Authors list navigation',
    ];

    $args = [
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
        'publicly_queryable' => false,
        'rewrite' => ['slug' => 'content-author', 'with_front' => false],
        'show_in_rest' => true,
    ];

    register_taxonomy('content-author', ['content'], $args);
}
add_action('init', 'Flynt\CustomTaxonomies\registerContentLibraryAuthors');
