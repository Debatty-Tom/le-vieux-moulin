<?php get_header() ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>
<p>
    <?= get_the_title()?>
</p>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p><?= __hepl('Il n’y a pas d’outils pédagogiques') ?>.</p>
<?php endif; ?>
<?php get_footer();
