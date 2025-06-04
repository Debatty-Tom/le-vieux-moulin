<?php

// Enregistrer les menus de navigation en fonction de l'endroit où ils sont exploités :

register_nav_menu('header', 'Le menu de navigation principal en haut de la page.');
register_nav_menu('footer', 'Le menu de navigation secondaire en bas de la page.');

// Créer une nouvelle fonction qui permet de retourner un menu de navigation formaté en un
// tableau d'objets afin de pouvoir l'afficher à notre guise dans le template.

function dw_get_navigation_links(string $location): array
{
    // Récupérer l'objet WP pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // Transformer le menu en un tableau de liens, chaque lien étant un objet personnalisé

    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;
        $link->icon = get_field('icon', $post);

        $links[] = $link;
    }

    // Retourner ce tableau d'objets (liens).
    return $links;
}
