<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>
    <?php include('templates/content/flexible.php') ?>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p><?= __hepl('Cette maison n’existe pas') ?>.</p>
<?php endif; ?>
    <section class="related" data-animation="show-up">
        <h2 class="section__title"><?= __hepl('Autres maison qui pourraient vous intéresser...') ?></h2>
        <div class="related__container">
            <?php
            $house = new WP_Query([
                'post_type' => 'houses',
                'orderby' => 'rand',
                'posts_per_page' => 1,
                'post__not_in' => [get_the_ID()],
            ]);

            if ($house->have_posts()): while ($house->have_posts()): $house->the_post(); ?>
                <?php
                $title = get_the_title();
                ?>
                <article class="card" data-animation="show-up">
                    <a class="card__link" href="<?= get_the_permalink() ?>" title="lien vers <?= $title ?>"></a>
                    <figure class="card__image">
                        <?= get_the_post_thumbnail(get_the_ID(), 'card'); ?>

                    </figure>
                    <div class="card__content">
                        <h3 class="card__title"><?= $title ?></h3>
                        <p class="card__description"><?= get_field('description') ?></p>
                    </div>
                </article>
            <?php endwhile;
            else: ?>
                <p><?= __hepl('Il n’y a pas d’autres maisons') ?>.</p>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>

