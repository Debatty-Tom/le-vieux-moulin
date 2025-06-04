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
    <p><?= __hepl('Cet outil pédagogique n’existe pas') ?>.</p>
<?php endif; ?>
    <section class="related">
        <h2 class="section__title"><?= __hepl('Autres outils pédagogiques qui pourraient vous intéresser...') ?></h2>
        <div class="related__container cards-grid">
            <?php
            $pedagogical_tools = new WP_Query([
                'post_type' => 'pedagogical_tools',
                'orderby' => 'rand',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
            ]);

            if ($pedagogical_tools->have_posts()): while ($pedagogical_tools->have_posts()): $pedagogical_tools->the_post(); ?>
                <?php
                ?>
                <?php get_template_part('parts/pedagogical', 'card'); ?>
            <?php
            endwhile;

            else: ?>
                <p><?= __hepl('Il n’y a pas d’outil pédagogique') ?>.</p>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>