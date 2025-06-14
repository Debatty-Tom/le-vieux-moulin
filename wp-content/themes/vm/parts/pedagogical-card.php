<?php
$title = get_the_title();
$link = $args['archive_taxonomy_link'] ?? get_the_permalink();
?>

<article class="card" data-animation="show-up">
    <a class="card__link" href="<?= $link ?>" title="lien vers <?= $title ?>"></a>
    <figure class="card__image">
        <?= get_the_post_thumbnail(get_the_ID(), 'card'); ?>
    </figure>
    <div class="card__content">
        <h4 class="card__title"><?= $title ?></h4>
        <p class="card__description"><?= get_the_excerpt() ?></p>
    </div>
</article>