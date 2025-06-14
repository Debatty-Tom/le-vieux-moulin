<?php

if ($args['orderby'] === 'date') {
    $today = date('U');
    $content = new WP_Query([
        'post_type' => $args['post_type'],
        'meta_query' => array(
            array(
                'key' => 'date',
                'value' => $today,
                'type' => 'number',
                'compare' => '>='
            )
        ),
        'meta_key' => 'date',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_page' => $args['posts_per_page'],
        'post__not_in' => [get_the_ID()],
    ]);
} else {
    $content = new WP_Query([
        'post_type' => $args['post_type'],
        'orderby' => $args['orderby'],
        'posts_per_page' => $args['posts_per_page'],
        'post__not_in' => [get_the_ID()],
    ]);
}
?>

<section data-animation="show-up">
    <div class="section__header">
        <h2 class="section__title"><?= $args['section_title'] ?></h2>
        <?php if ($args['post_type'] !== 'houses'): ?>
            <a href="<?= get_post_type_archive_link($args['post_type']); ?>" class="section__see-more button arrow-right"><?= __hepl($args['see_more']) ?></a>
        <?php endif; ?>
    </div>
    <div class="cards-grid">
        <?php if ($content->have_posts()): while ($content->have_posts()):
            $content->the_post(); ?>
            <?php
            $date = get_field('date');
            $title = get_the_title();
            ?>
            <article class="card" data-animation="show-up">
                <a class="card__link" href="<?= get_the_permalink()?>" title="lien vers <?= $title ?>"></a>
                <figure class="card__image">
                    <?= get_the_post_thumbnail(get_the_ID(), 'card'); ?>

                </figure>
                <div class="card__content">
                    <?php if ($args['post_type'] === 'actualities'): ?>
                        <?php return_date_status($date); ?>
                        <h3 class="card__title"><?= $title . ' ' . __hepl('du') . ' ' . date_i18n('d F Y', $date); ?></h3>
                    <?php else: ?>
                        <h3 class="card__title"><?= $title ?></h3>
                    <?php endif; ?>
                    <p class="card__description"><?= get_the_excerpt() ?></p>
                </div>
            </article>
        <?php
        endwhile;
        endif;
        wp_reset_postdata(); ?>
    </div>
</section>