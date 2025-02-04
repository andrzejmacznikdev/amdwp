<?php
    /**
     * Default post template
     * 
     * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
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
        the_content();
    get_footer();