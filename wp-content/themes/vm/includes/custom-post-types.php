<?php

// Enregistrer de nouveaux "types de contenu", qui seront stockés dans la table
// "wp_posts", avec un identifiant de type spécifique dans la colonne "post_type":
function create_houses()
{
    register_post_type('houses', [
        'label' => 'Maisons',
        'description' => 'Les maisons que vous possédez',
        'menu_position' => 6,
        'menu_icon' => 'dashicons-admin-home',
        'public' => true,
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'maisons',
        ],
        'supports' => ['title', 'excerpt', 'thumbnail'],
    ]);
}

add_action('init', 'create_houses');

function create_actualities()
{
    register_post_type('actualities', [
        'label' => 'Actualités',
        'description' => 'Les actualités de votre SRG',
        'menu_position' => 7,
        'menu_icon' => 'dashicons-calendar-alt',
        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'actualités',
        ],
        'supports' => ['title', 'excerpt', 'editor', 'thumbnail'],
    ]);
}

add_action('init', 'create_actualities');
function create_actuality_type_taxonomy()
{
    register_taxonomy('actuality_type', ['actualities'], [
        'labels' => [
            'name' => __hepl('Types d’actualité'),
            'singular_name' => __hepl('Type d’actualité'),
            'menu_name' => __hepl('Types d’actualité'),
            'all_items' => __hepl('Tous les types'),
            'edit_item' => __hepl('Modifier le type'),
            'view_item' => __hepl('Voir le type'),
            'update_item' => __hepl('Mettre à jour le type'),
            'add_new_item' => __hepl('Ajouter un nouveau type'),
            'new_item_name' => __hepl('Nom du nouveau type'),
            'search_items' => __hepl('Rechercher un type'),
            'not_found' => __hepl('Aucun type trouvé'),
        ],
        'description' => __hepl('Types d’actualités'),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_tagcloud' => false,
        'rewrite' => ['slug' => 'type-actualité'],
    ]);
}
add_action('init', 'create_actuality_type_taxonomy');


function create_pedagogical_tools()
{
    register_post_type('pedagogical_tools', [
        'label' => 'Outils pédagogiques',
        'description' => 'Les outils pédagogiques de votre SRG',
        'menu_position' => 8,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'outils-pédagogiques',
        ],
        'supports' => ['title', 'excerpt', 'editor', 'thumbnail'],
    ]);
}
add_action('init', 'create_pedagogical_tools');


function create_pedagogical_tool_type_taxonomy()
{
    register_taxonomy('pedagogical_tool_type', ['pedagogical_tools'], [
        'labels' => [
            'name' => __hepl('Types d’outil pédagogique'),
            'singular_name' => __hepl('Type d’outil pédagogique'),
            'menu_name' => __hepl('Types d’outil pédagogique'),
            'all_items' => __hepl('Tous les types'),
            'edit_item' => __hepl('Modifier le type'),
            'view_item' => __hepl('Voir le type'),
            'update_item' => __hepl('Mettre à jour le type'),
            'add_new_item' => __hepl('Ajouter un nouveau type'),
            'new_item_name' => __hepl('Nom du nouveau type'),
            'search_items' => __hepl('Rechercher un type'),
            'not_found' => __hepl('Aucun type trouvé'),
        ],
        'description' => __hepl('Types d’outil pédagogiques'),
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_tagcloud' => false,
        'rewrite' => ['slug' => 'type-outil-pédagogique'],
    ]);
}
add_action('init', 'create_pedagogical_tool_type_taxonomy');

function create_contact_form()
{
    register_post_type('contact_message', [
        'label' => 'Messages de contact',
        'description' => 'Les envois de formulaire via la page de contact',
        'menu_position' => 10,
        'menu_icon' => 'dashicons-email',
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor'],
    ]);
}

add_action('init', 'create_contact_form');