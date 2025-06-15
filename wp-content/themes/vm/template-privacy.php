<?php /* Template Name: "Mentions Légales" */ ?>
<?php get_header() ?>
<?php if (have_posts()): while (have_posts()):
    the_post(); ?>
    <section class="juridic" data-tag="wysiwyg" data-animation="show-up">
        <h2 class="juridic__title"><?= __hepl('Mentions légales') ?></h2>
        <p class="juridic__date"><?= __hepl('Dernière mise à jour') ?> <?= get_the_modified_date() ?></p>
        <section class="container__legal wysiwyg" data-tag="wysiwyg" data-animation="show-up">
            <?= get_the_content() ?>
        </section>
    </section>
<?php endwhile;
else: ?>
    <p><?= __hepl('La page est vide') ?>.</p>
<?php endif; ?>
<?php get_footer() ?>