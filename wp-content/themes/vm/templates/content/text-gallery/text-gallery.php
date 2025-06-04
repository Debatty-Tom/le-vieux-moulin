<?php $gallery = get_sub_field('gallery'); ?>

<div class="gallery">
    <?php if (!isset($gallery) && $gallery !== []): ?>
    <div class="gallery__container" title="<?= __hepl('Voir la galerie') ?>">
        <?php foreach ($gallery as $image): ?>
            <a class="gallery__link" href="<?= wp_get_attachment_image_url($image['id'], 'full') ?>"
               data-zoom>
                <?= wp_get_attachment_image($image['id'], 'medium', false, [
                    'class' => 'gallery__img',
                ]) ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>