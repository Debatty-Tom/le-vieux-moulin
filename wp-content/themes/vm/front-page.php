<?php get_header(); ?>
<?php
if (have_posts()): while (have_posts()):
    the_post(); ?>
    <?php include('templates/content/flexible.php') ?>
    <?php
    $third_section_title = __hepl('Quelques outils pédagogiques');
    get_template_part('parts/section', 'cards', [
        'post_type' => 'pedagogical_tools',
        'orderby' => 'rand',
        'posts_per_page' => 3,
        'section_title' => $third_section_title,
        'see_more' => __('Voir tous les outils pédagogiques'),
    ]);
    ?>
    <?php $content = new WP_Query([
    'post_type' => 'houses',
    'orderby' => 'rand',
]);
    $index = 0;
    ?>
    <section>
        <div class="section__header">
            <h2 class="section__title"><?= __hepl('Nos maisons') ?></h2>
        </div>
        <?php if ($content->have_posts()): while ($content->have_posts()): $content->the_post(); ?>
            <?php $media_position = ($index % 2 === 0) ? 'left' : 'right'; ?>
            <?php $index++; ?>
            <?php $title = get_the_title(); ?>

            <article class="text-media">
                <div class="text-media__content-container">
                    <h3 class="text-media__content-headline">
                        <?= $title ?>
                    </h3>
                    <div class="text-media__content-text wysiwyg">
                        <?= get_the_excerpt() ?>
                    </div>
                    <div class="text-media__links__container">
                        <a class="text-media__content-link button"
                           href="<?= get_the_permalink() ?>"
                           title="Lien vers <?= $title ?>">
                            <?= __hepl('Voir la maison') ?>
                        </a>
                    </div>
                </div>
                <div class="text-media__position text-media__position--<?= $media_position ?>">
                    <?= get_the_post_thumbnail(get_the_ID(), 'text-image', array('class' => 'text-media__image')); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
        <?php wp_reset_postdata(); ?>
    </section>
    <?php
    $first_section_title = __hepl('Dernières actualités');
    get_template_part('parts/section', 'cards', [
        'post_type' => 'actualities',
        'orderby' => 'date',
        'posts_per_page' => 3,
        'section_title' => $first_section_title,
        'see_more' => __('Voir toute l’actualité'),
    ]); ?>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p><?= __hepl('La page est vide') ?>.</p>
<?php endif; ?>
<?php get_footer(); ?>







