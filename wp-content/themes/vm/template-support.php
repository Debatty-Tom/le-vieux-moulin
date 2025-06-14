<?php /* Template Name: Page "Faire un don" */ ?>

<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>
    <section class="support__container" data-animation="show-up">
        <h2 class="support__title section__title" data-animation="show-up">
            <?php if (str_contains(get_the_title(), ' don')) :?>
                <?= __hepl('Nous soutenir') ?>
            <?php else: ?>
                <?= get_the_title() ?>
            <?php endif; ?>
        </h2>
        <p class="support__content" data-animation="show-up">
            <?= get_field('support_text') ?>
        </p>
    </section>
    <?php include('templates/content/flexible.php') ?>
<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p><?= __hepl('La page est vide') ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>