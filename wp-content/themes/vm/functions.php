<?php

// Charger les champs ACF exportés :
//include_once('acf.php');

// Vérifier si la session est active ("started") ?
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Import helpers files from /includes folder
require_once(get_template_directory() . '/includes/acf-site-option.php');
require_once(get_template_directory() . '/includes/clean-backend.php');
require_once(get_template_directory() . '/includes/clean-header.php');
require_once(get_template_directory() . '/includes/custom-post-types.php');
require_once(get_template_directory() . '/includes/helpers.php');
require_once(get_template_directory() . '/includes/navigation.php');
require_once(get_template_directory() . '/includes/handle-forms.php');
require_once(get_template_directory() . '/includes/multilang.php');
require_once(get_template_directory() . '/includes/archive_queries.php');
require_once(get_template_directory() . '/includes/remove-menu.php');























