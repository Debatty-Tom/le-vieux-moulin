<?php

// Paramétrer des tailles d'images pour le générateur de thumbnails de Wordpress :

// Sans recadrage :
add_image_size('logo', 83, 64);
add_image_size('card', 450, 200, true);
add_image_size('text-image', 650, 650);

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function dw_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/vm/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/vm/resources/scss/main.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/vm/resources/scss/main.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}

// Permet d'ajouter la possibilité d'uploader des extensions de fichiers non compatibles de base.
// Exemple : ici nous ajoutons le format SVG en tant que type d'image compatible pour l'upload.
function my_own_mime_types($mimes)
{
    // Ajout du mime type pour les fichiers SVG
    $mimes['svg'] = 'image/svg+xml';

    // Retourne le tableau des types MIME mis à jour
    return $mimes;
}

// Ajoute notre fonction de filtrage à l'action 'upload_mimes' pour permettre l'upload des fichiers SVG.
add_filter('upload_mimes', 'my_own_mime_types');

// Activer l'utilisation des vignettes (image de couverture) sur nos post types:
add_theme_support('post-thumbnails', ['actualities', 'houses', 'pedagogical_tools']);


function dw_get_page_title(): string
{
    if (is_front_page()) {
        $pageTitle = __hepl('Le vieux moulin');
    } else {
        $pageTitle = get_the_title();
    }

    return $pageTitle;
}

function dw_url_to_page_title($link): string
{
    if ($link) {
        $post_id = url_to_postid($link);
        if ($post_id) {
            return get_the_title($post_id);
        } else {
            return 'Il n’y pas de page pour ce lien';
        }
    }
    return 'Il n’y pas de lien';
}

function dw_get_canonical_url(): string
{
    return empty($_SERVER['HTTPS']) ? 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'] : 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER['REQUEST_URI'];
}

function dw_is_active(string $path): string
{
    if (dw_get_canonical_url() === $path && is_front_page()) {
        return 'active active-alt';
    } else if (dw_get_canonical_url() === $path && !is_front_page()) {
        return 'active';
    } else {
        return '';
    }
}

function filter_social_link_name(array $array)
{
    if ($array) {
        $link = $array['link'] ?? '';
        $link = trim($link);
        return explode('.', $link)[1] ?? '';
    } else {
        return __hepl('Il n’y a pas de lien');
    }
}

function dw_get_social_links(): void
{
    $social_links = get_field('social_networks', 'options');
    if ($social_links) {
        foreach ($social_links as $link) {
            $link_name = filter_social_link_name($link);
            echo '<li class="social__item"><a href="' . $link['link'] . '" class="social__link social__link__icon-' . $link_name . '" title="lien vers notre page ' . $link_name . '"><span class="sro">' . $link_name . '</span></a></li>';
        }
    }
}

function check_date($date)
{
    $now = current_time('timestamp');
    if (!$date) {
        return 'invalid';
    }

    if ($date < $now) {
        return 'past';
    }

    if ($date <= ($now + 604800)) { // 604800 seconds => 7 jours
        return 'close';
    }

    return 'future';
}

function return_date_status($date_str)
{
    $status = check_date($date_str);

    if ($status === 'past') {
        echo '<p class="card__status card__status--past">' . __hepl('Passé') . '</p>';
    } elseif ($status === 'close') {
        echo '<p class="card__status card__status--close">' . __hepl('Bientôt') . '</p>';
    } elseif ($status === 'future') {
        echo '<p class="card__status card__status--future">' . __hepl('Future') . '</p>';
    } else {
        echo '<p class="card__status card__status--erreur">Date invalide</p>';
    }
}
function dw_get_section_id(string $headline): string
{
    if (str_contains($headline, __hepl('bénévole'))) {
        return 'benevolat';
    } else if(str_contains($headline, __hepl('financier'))) {
        return 'financial';
    } else if (str_contains($headline, __hepl('matériel'))) {
        return 'material';
    } else {
        return '';
    }
}
