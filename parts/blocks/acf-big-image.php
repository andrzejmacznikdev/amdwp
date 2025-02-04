<?php
    /**
     * Template part for displaying acf-big-image
     * 
     * @author amd
     * 
     * @package amdwootheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $add_image = get_field('add_image');
?>

<div class="acf-big-image mt-20">
    <a href="<?= $add_image['url'];?>" data-lightbox="Duże zdjęcie">
        <div class="acf-big-image-bcg"></div>
        <picture>
            <source media="(max-width: 575px)" srcset="<?= $add_image['sizes']['large'];?>">
            <source media="(min-width: 576px)" srcset="<?= $add_image['sizes']['large'];?>">
            <img src="<?= $add_image['url'];?>" alt="<?= $add_image['alt'];?>" width="100%" height="100%" />
        </picture>
    </a>
</div>