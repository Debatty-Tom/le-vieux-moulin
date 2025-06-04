<?php

function dw_remove_menu_items()
{
    //remove_menu_page('tools.php');
    //remove_menu_page('edit.php?post_type=acf-field-group');
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
}

add_action('admin_init', 'dw_remove_menu_items');