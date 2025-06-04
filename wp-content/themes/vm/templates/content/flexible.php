<?php
$text_media = 'text-media';
$text_gallery = 'text-gallery';
$text_image = 'text-image';
$text_flexible = 'text-flexible';

if (have_rows('content')):
    while (have_rows('content')): the_row();
        if (get_row_layout() === $text_media):
            $media_type = $text_media;
            include('flexible_template.php');
        elseif (get_row_layout() === $text_gallery):
            $media_type = $text_gallery;
            include('flexible_template.php');
        elseif (get_row_layout() === $text_image):
            $media_type = $text_image;
            include('flexible_template.php');
        elseif (get_row_layout() === $text_flexible):
            $media_type = $text_flexible;
            include('flexible_template.php');
        endif;
    endwhile;
endif;