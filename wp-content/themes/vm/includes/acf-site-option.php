<?php

function create_site_options_page(): void
{
    if (function_exists('acf_add_options_page')) {
        // Page principale
        acf_add_options_page([
            'page_title' => 'Site Options',
            'menu_title' => 'Site Settings',
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Company settings',
            'menu_title' => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Social networks',
            'menu_title' => 'Social networks',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title' => 'Footer settings',
            'menu_title' => 'Bas de page',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');
