<?php get_header(); ?>
<?php
if(have_posts()): while(have_posts()): the_post(); ?>
    <?php include('templates/content/flexible.php') ?>
    <?php
    $first_section_title = __hepl('Dernières actualités');
    get_template_part('parts/section', 'cards', [
        'post_type' => 'actualities',
        'orderby' => 'date',
        'posts_per_page' => 3,
        'section_title' => $first_section_title,
        'see_more' => __('Voir toute l’actualité'),
    ]);

    $second_section_title = __hepl('Nos maisons');
    get_template_part('parts/section', 'cards', [
        'post_type' => 'houses',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'section_title' => $second_section_title,
    ]);

    $third_section_title = __hepl('Quelques outils pédagogiques');
    get_template_part('parts/section', 'cards', [
        'post_type' => 'pedagogical_tools',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'section_title' => $third_section_title,
        'see_more' => __('Voir tous les outils pédagogiques'),
    ]);

    ?>
<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p><?= __hepl('La page est vide') ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>







