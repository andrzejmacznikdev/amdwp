<?php
    /**
     * Template part for displaying s-fragments-global
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $choose_fragment_section = get_sub_field('choose_fragment_section');

    foreach($choose_fragment_section as $post):
        setup_postdata($post);
        $idPost = get_the_ID();
        // var_dump($idPost);
        if(have_rows('choose-sections')):
            while(have_rows('choose-sections', $idPost)):the_row();
                $layout = get_row_layout();
                get_template_part('parts/sections/' . $layout);
            endwhile;
        endif;
    endforeach;
    wp_reset_postdata();
?>