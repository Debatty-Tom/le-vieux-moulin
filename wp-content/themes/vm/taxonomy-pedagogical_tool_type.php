<?php get_header(); ?>
<?php $media_position_count = 1 ?>
<section class="pedagogical__container">
    <h2 class="section__title pedagogical__title">
        <?= get_the_archive_title() ?>
    </h2>
    <?php
    // On ouvre "la boucle" (The Loop), la structure de contrôle
    // de contenu propre à Wordpress:
    if (have_posts()): while (have_posts()): the_post(); ?>
        <?php $media_position_count++ ?>
        <?php $media_position = $media_position_count % 2 === 0 ? "right" : "left"; ?>
        <section class="text-media">
            <div class="text-media__content-container">
                <h3 class="text-media__content-headline">
                    <?= get_the_title() ?>
                </h3>
                <div class="text-media__content-text">
                    <?= get_the_content() ?>
                </div>
            </div>
            <div class="text-media__position text-media__position--<?= $media_position ?>">
                <?= get_the_post_thumbnail(get_the_ID(), 'text-image', array('class' => 'text-media__image')); ?>
            </div>
        </section>
    <?php
        // On ferme "la boucle" (The Loop):
    endwhile;
    else: ?>
        <p><?= __hepl('La page est vide') ?>.</p>
    <?php endif; ?>
</section>
<?php get_footer(); ?>

