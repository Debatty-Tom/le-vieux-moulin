<?php get_header(); ?>

<?php
$current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
?>

<?php if ($current_filter !== ''): ?>
    <?php get_template_part('parts/pedagogical', 'filtered', [
        'current_filter' => $current_filter,
    ]); ?>

<?php else: ?>
    <section data-animation="show-up">
        <div class="section__header pedagogical__header">
            <h2 class="section__title pedagogical__title"><?= __hepl('Tous nos outils pédagogiques') ?></h2>
        </div>

        <?php
        $terms = get_terms([
            'taxonomy' => 'pedagogical_tool_type',
            'hide_empty' => true,
        ]);
        ?>

        <?php if (!empty($terms) && !is_wp_error($terms)): ?>
            <?php foreach ($terms as $term): ?>
                <?php
                $posts_query = new WP_Query([
                    'post_type' => 'pedagogical_tools',
                    'posts_per_page' => 3,
                    'tax_query' => [
                        [
                            'taxonomy' => 'pedagogical_tool_type',
                            'field' => 'term_id',
                            'terms' => $term->term_id,
                        ]
                    ],
                    'orderby' => 'rand',
                ]);
                ?>

                <?php if ($posts_query->have_posts()): ?>
                    <section class="taxonomy-section" data-animation="show-up" data-taxonomy="<?= esc_attr($term->slug) ?>">
                        <div class="section__header">
                            <h3 class="section__title"><?= esc_html($term->name) ?></h3>
                            <?php if ($posts_query->found_posts > 3): ?>
                                <a href="<?= esc_url(get_post_type_archive_link('pedagogical_tools')) . '?filter=' . $term->slug; ?>"
                                   class="button button--outline">
                                    <?= __hepl('Voir tout') ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="cards-grid">
                            <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
                                <?php get_template_part('parts/pedagogical', 'card', [
                                    'archive_taxonomy_link' => get_term_link($term->term_taxonomy_id),
                                ]); ?>
                            <?php endwhile; ?>
                        </div>
                    </section>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?= __hepl('Il n’y a pas d’outils pédagogiques pour le moment') ?>.</p>
        <?php endif; ?>

    </section>
<?php endif; ?>

<?php get_footer(); ?>
