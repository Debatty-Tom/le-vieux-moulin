<?php
$title = get_the_title();
?>

<article class="card">
    <a class="card__link" href="<?= get_the_permalink() ?>" title="lien vers <?= $title ?>"></a>
    <figure class="card__image">
        <?= get_the_post_thumbnail(get_the_ID(), 'card'); ?>
    </figure>
    <div class="card__content">
        <p class="card__description"><?= get_the_excerpt() ?></p>
        <h3 class="card__title"><?= $title ?></h3>
        <p class="card__description"><?= get_the_excerpt() ?></p>
    </div>
</article>