<?php
$use_main_query = $use_main_query ?? false;
$term_name = $term_name ?? '';
$current_filter = $args['current_filter'] ?? '';
$filtered_term = get_term_by('slug', $current_filter, 'pedagogical_tool_type');
?>

<section>
    <div class="section__header">
        <h2 class="section__title"><?= esc_html($filtered_term->name) ?></h2>
    </div>

    <div class="cards-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php $title = get_the_title(); ?>
            <?php get_template_part('parts/pedagogical', 'card'); ?>
        <?php endwhile; ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'prev_text' => __hepl('&laquo; Précédent'),
                    'next_text' => __hepl('Suivant &raquo;'),
                ));
                ?>
            </div>
        <?php else: ?>
            <p><?= __hepl('Il n’y a pas d’outils pédagogiques pour le moment') ?>.</p>
        <?php endif; ?>
    </div>
</section>