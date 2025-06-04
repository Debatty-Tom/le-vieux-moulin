<?php
function modify_actualties_archive_query($query)
{
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('actualities')) {
        $query->set('posts_per_page', 3);
        $query->set('meta_key', 'date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'DESC');

        $query->set('meta_query', array(
            array(
                'key' => 'date',
                'value' => date('U'),
                'type' => 'number',
                'compare' => '>='
            )
        ));

        if ($taxonomy !== '') {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'actuality_type',
                    'field' => 'slug',
                    'terms' => $taxonomy,
                )
            ));
        }
    }
}

add_action('pre_get_posts', 'modify_actualties_archive_query');

function modify_pedagogical_tools_archive_query($query)
{
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('pedagogical_tools')) {
        $query->set('posts_per_page', 3);
        $query->set('orderby', 'rand');

        if ($taxonomy !== '') {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'pedagogical_tool_type',
                    'field' => 'slug',
                    'terms' => $taxonomy,
                )
            ));
        }
    }
}

add_action('pre_get_posts', 'modify_pedagogical_tools_archive_query');