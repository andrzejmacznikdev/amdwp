<?php
    /**
     * Template part for displaying acf-gallery-block
     * 
     * @author amd
     * 
     * @package amdwootheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $gallery = get_field('gallery');

?>

<div class="acf-gallery flex flex-row p-rel gap-20 flex-wrap">
    <?php
        foreach($gallery as $img):
    ?>
        <a href="<?= $img['url'];?>" data-lightbox="Galeria">
            <picture>
                <source media="(max-width: 575px)" srcset="<?= $img['sizes']['large'];?>">
                <source media="(min-width: 576px)" srcset="<?= $img['sizes']['large'];?>">
                <img src="<?= $img['url'];?>" alt="<?= $img['alt'];?>" width="100%" height="100%" />
            </picture>
        </a>
    <?php
        endforeach;
    ?>
</div>