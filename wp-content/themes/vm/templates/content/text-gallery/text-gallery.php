<?php $gallery = get_sub_field('gallery'); ?>
<?php $media_position = get_sub_field('gallery_position') ?>

<div class="text-media__position text-media__position--<?= $media_position ?> gallery">
    <?php if (isset($gallery) && $gallery !== []): ?>
        <div class="gallery__container text-media__image" title="<?= __hepl('Voir la galerie') ?>">
            <?php foreach ($gallery as $image): ?>
                <a class="gallery__link" href="<?= wp_get_attachment_image_url($image['id'], 'full') ?>"
                   data-zoom>
                    <?= wp_get_attachment_image($image['id'], 'text-image', false, [
                        'class' => 'gallery__img',
                    ]) ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>