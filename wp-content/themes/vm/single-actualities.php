<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="article">
        <h2 class="article__title" data-animation="show-up"><?= get_the_title() ?></h2>
        <?= get_the_post_thumbnail(get_the_ID(), 'text-media', [
            'class' => 'article__image',
            'data-animation' => 'show-up'
        ]) ?>
        <article class="article__container" data-animation="show-up">
            <time class="article__date" datetime="<?php the_time('Y-m-d') ?>">Le <?= get_the_date() ?></time>
            <h3 class="sro"><?= __hepl('Contenu de l’article') ?></h3>
            <div class="article__content wysiwyg" data-tag="wysiwyg-post">
                <?php the_content() ?>
            </div>
        </article>
    </section>
    <?php include('templates/content/flexible.php') ?>
<?php
endwhile;
else: ?>
    <p><?= __hepl('Cette actualité n’existe pas') ?>.</p>
<?php endif; ?>
    <section class="related">
        <h2 class="section__title"><?= __hepl('Autres actualités qui pourraient vous intéresser...') ?></h2>
        <div class="related__container cards-grid">
            <?php
            $actuality = new WP_Query([
                'post_type' => 'actualities',
                'orderby' => 'rand',
                'posts_per_page' => 2,
                'post__not_in' => [get_the_ID()],
            ]);

            if ($actuality->have_posts()): while ($actuality->have_posts()): $actuality->the_post(); ?>
                <?php
                $date = get_field('date');
                $title = get_the_title();
                ?>
                <article class="card">
                    <a class="card__link" href="<?= get_the_permalink() ?>" title="lien vers <?= $title ?>"></a>
                    <figure class="card__image">
                        <?= get_the_post_thumbnail(get_the_ID(), 'card'); ?>

                    </figure>
                    <div class="card__content">
                        <?php return_date_status($date); ?>
                        <h3 class="card__title"><?= $title . ' ' . __hepl('du') . ' ' . date_i18n('d F Y', $date); ?></h3>
                        <p class="card__description"><?= get_the_excerpt() ?></p>
                    </div>
                </article>
            <?php
            endwhile;

            else: ?>
                <p><?= __hepl('Il n’y a pas d’actualités') ?>.</p>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>