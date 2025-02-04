<?php
    /**
     * The template for displaying all default pages
     * 
     * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    get_header();
 
        $idPost = get_the_ID();

        echo 'test';
    
        while(have_rows('choose-hero', $idPost)):the_row();
            $layout_hero = get_row_layout();
            get_template_part('parts/hero/' . $layout_hero);
        endwhile;
 
         while(have_rows('choose-sections', $idPost)):the_row();
            $layout = get_row_layout();
            get_template_part('parts/sections/' . $layout);
        endwhile;
     
    get_footer();