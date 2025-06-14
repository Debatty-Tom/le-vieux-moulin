<?php $image = get_sub_field('image') ?>
<?php $media_position = get_sub_field('image_position') ?>

<div class="text-media__position text-media__position--<?= $media_position ?>">
    <?php if (!empty($image)): ?>
        <?= wp_get_attachment_image($image['ID'], 'text-image', false, array('class' => 'text-media__image')); ?>
    <?php endif; ?>
</div>