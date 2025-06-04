<?php get_header();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$terms = get_terms([
    'taxonomy' => 'actuality_type',
    'hide_empty' => false,
]);
?>
    <section>
        <div class="section__header">
            <h2 class="section__title"><?= __hepl('Toute notre actualité') ?></h2>
            <div class="filter">
                <a href="<?= esc_url(get_post_type_archive_link('actualities')) ?>" class="button <?= ($current_filter === '') ? 'button--active' : ''; ?>">
                    <?= __hepl('Tout'); ?>
                </a>

                <?php foreach ($terms as $term): ?>
                    <a href="<?= esc_url(get_post_type_archive_link('actualities')) . '?filter=' . $term->slug; ?>"
                       class="button <?= ($current_filter === $term->slug) ? 'button--active' : ''; ?>">
                        <?= esc_html($term->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="cards-grid">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                        <p class="card__description"><?= get_field('description') ?></p>
                    </div>
                </article>
            <?php
            endwhile;

            else: ?>
                <p><?= __hepl('Il n’y a pas d’actualités') ?>.</p>
            <?php endif; ?>
        </div>
        <div class="pagination">
        <?php
        echo paginate_links(array(
            'prev_text' => __hepl('&laquo; Précédent'),
            'next_text' => __hepl('Suivant &raquo;'),
        ));
        wp_reset_postdata(); ?>
        </div>
    </section>
<?php get_footer();
