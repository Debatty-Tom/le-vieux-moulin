<?php
function modify_actualties_archive_query($query)
{
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('actualities')) {
        $query->set('posts_per_page', 6);
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
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('pedagogical_tools')) {

        $current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

        if ($current_filter !== '') {
            // Vue filtrée : une seule taxonomie avec plus de posts
            $query->set('posts_per_page', 6);
            $query->set('orderby', 'rand');
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'pedagogical_tool_type',
                    'field' => 'slug',
                    'terms' => $current_filter,
                )
            ));
        } else {
            // Vue générale : on va afficher par sections
            // On désactive la requête principale car on utilisera des WP_Query dans le template
            $query->set('posts_per_page', 0); // Aucun post dans la requête principale
        }
    }
}

add_action('pre_get_posts', 'modify_pedagogical_tools_archive_query');