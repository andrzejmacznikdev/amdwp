<?php
    /**
     * Template part for displaying offer-box
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

    $counter = get_query_var('counter');

    $id = get_the_ID();
    $thumbnail_id = get_post_thumbnail_id();
    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Get the alt text from the image meta
    $cat = get_the_category($id);
    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'large', ['alt' => $alt_text]);
    $date_post = get_the_date('d.m.Y');
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('first_name', $author_id);
    $author_lname = get_the_author_meta('last_name', $author_id);
    $cat = get_the_category($id);
    $excerpt = get_the_excerpt();

    $shortE = wp_trim_words($excerpt, 20, '(...)');
    $title = get_the_title();
    $newTitle = wp_trim_words($title, 9, '...');
?>

<a href="<?= the_permalink();?>" class="offer-box flex flex-col p-rel gap-30">
    <div class="flex flex-col p-rel gap-20">
        <div class="counter a1"><?= $counter;?></div>
        <div class="title h6 ls-12">
            <?= $newTitle;?>
        </div>
        <div class="excerpt">
            <?= $excerpt;?>
        </div>
    </div>
    <div class="btn-simple">
        <span class="text">
            Zobacz ofertę
        </span>
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="10" viewBox="0 0 7 10" fill="none">
                <path d="M1.53553 8.53553L5.77817 4.29289M1.53553 1.46447L5.77817 5.70711" stroke="#E94E30" stroke-width="2"/>
            </svg>
        </span>
    </div>
</a>