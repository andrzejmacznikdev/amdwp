<?php
    /**
     * Functions and definitions
     * 
     * @link https://developer.wordpress.org/themes/basics/theme-functions/#what-is-functions-php
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    if(!defined('ABSPATH')) {
        exit;
    }

    require get_template_directory() . '/inc/setup.php';
    require get_template_directory() . '/inc/cleanup.php';
    require get_template_directory() . '/inc/options-page-acf.php';
    require get_template_directory() . '/inc/class-nav-walker-header.php';
    if (!function_exists('is_plugin_active')) {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
    if (is_plugin_active('polylang/polylang.php')) {
        require get_template_directory() . '/inc/multilanguage.php';
    }
    require_once get_template_directory() . '/lib/Buttons.php';
    require_once get_template_directory() . '/lib/Content.php';
    require_once get_template_directory() . '/lib/Media.php';

    function addZero($number) {
        // Convert the number to a string
        $numberString = strval($number);
        
        // Check if the number contains the digit 1
        if (strlen($numberString) == 1) {
            // If it is, prepend '0' to the beginning of the string
            $numberString = '0' . $numberString;
        }
        
        return $numberString;
    }