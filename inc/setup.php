<?php
    /**
     * Setup functions
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    add_filter( 'wpcf7_load_js', '__return_false' );
    add_filter( 'wpcf7_load_css', '__return_false' );
    add_filter( 'wpcf7_autop_or_not', '__return_false' );

    define('themeUrl', get_template_directory_uri());
    define('mainUrl', home_url());

    add_action(
        'wp_enqueue_scripts',
        function () {
            if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
                wpcf7_enqueue_scripts();
            }
        }
    );
    wp_enqueue_script('jquery');
    add_action("init", function() {
        // First line of defence defused
        add_filter('upload_mimes', function ($mimes) {
            $mimes['svg'] = 'image/svg+xml';
            return $mimes;
        });
    
        // Add the XML Declaration if it's missing (otherwise WordPress does not allow uploads)
        add_filter("wp_handle_upload_prefilter", function ($upload) {
            if (!empty($upload["type"]) && $upload["type"] === "image/svg+xml") {
                $contents = file_get_contents($upload["tmp_name"]);
                if (strpos($contents, "<?xml") === false) {
                    file_put_contents($upload["tmp_name"], '<?xml version="1.0" encoding="UTF-8"?>' . $contents);
                }
            }
            return $upload;
        }, 10, 1);
    });

    add_theme_support( 'post-thumbnails' );

    add_action(
        'wp_enqueue_scripts',
        function () {
            $themeVersion = wp_get_theme()->get( 'Version' );
    
            wp_deregister_style( 'wp-block-library' );
            wp_dequeue_style( 'global-styles' );
            wp_dequeue_style( 'classic-theme-styles' );
    
            wp_enqueue_script( 'amdwptheme-scripts', get_stylesheet_directory_uri() . '/dist/js/scripts.js', [], $themeVersion, true );
            wp_enqueue_style( 'amdwptheme-styles', get_stylesheet_directory_uri()  . '/dist/css/main.css' , [], $themeVersion );
        }
    );

    add_action(
        'init',
        function() {
            register_nav_menus(
                [
                    'primary_menu'      =>  __('Header Menu', 'amdwptheme'),
                    'secondary_menu'      =>  __('Top Menu', 'amdwptheme'),
                ]
            );
        }
    );
?>