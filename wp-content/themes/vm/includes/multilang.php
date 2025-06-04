<?php

/**
 * Récupère la valeur d'un champ ACF d'une page d'option pour la langue courante.
 *
 * Cette fonction utilise Advanced Custom Fields PRO (ACF) et Polylang
 * pour récupérer la valeur d'un champ d'option spécifique en fonction
 * de la langue active sur le site.
 *
 * @param string $field Le nom du champ ACF à récupérer.
 * @return mixed La valeur du champ, ou `false` si le champ n'existe pas.
 *
 *
 */
function get__option($field): mixed
{
    return get_field($field, pll_current_language('slug'));
}

function hepl_trad_load_textdomain(): void
{
    load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

// Exécute la fonction lors de l'initialisation du thème.
add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $translation, array $replacements = []): array|string|null
{
// 1. Récupérer la traduction de la phrase présente dans $translation
    $base = __($translation, 'hepl-trad');

// 2. Remplacer toutes les occurrences des variables par leur valeur
    foreach ($replacements as $key => $value) {
        $variable = ':' . $key;
        $base = str_replace($variable, $value, $base);
    }

// 3. Retourner la traduction complète.
    return $base;
}
