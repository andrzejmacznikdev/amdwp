<?php
    /**
     * Template part for displaying cat-box
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    global $post;

    $title = get_the_title();

    $id = get_the_ID();
    $thumbnail_id = get_post_thumbnail_id();
    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Get the alt text from the image meta
    $cat = get_the_category($id);
    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'large', ['alt' => $alt_text]);
?>

<div class="cat-box o-hidden">
    <div class="cat-box-thumbnail size-full">
        <?= $thumbnail;?>
    </div>
</div>