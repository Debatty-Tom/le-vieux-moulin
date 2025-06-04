<?php /* Template Name: Page "À propos" */ ?>

<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>
    <?php include('templates/content/flexible.php') ?>
    <?php get_template_part('parts/section', 'skills-svg-used'); ?>
    <?php get_template_part('parts/section', 'key-points'); ?>

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p><?= __hepl('La page est vide') ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>







