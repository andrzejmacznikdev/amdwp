<?php
    /**
     * Remove unnecessary defaults
     * 
     * @author amd
     * 
     * @package amwptheme
     * 
     * @version 1.0.0
     * 
     */

    add_action(
        'init',
        function () {
            remove_action( 'wp_body_open', 'gutenberg_global_styles_render_svg_filters' );
            remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
        }
    );

    // REMOVE VERSION FROM HEAD
        remove_action('wp_head', 'wp_generator');

    // REMOVE VERSION FROM RSS
        add_filter('the_generator', '__return_empty_string');

    // REMOVE VERSION FROM SCRIPTS AND STYLES
        function shapeSpace_remove_version_scripts_styles($src) {
            if (strpos($src, 'ver=')) {
                $src = remove_query_arg('ver', $src);
            }
            return $src;
        }
        add_filter('style_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);
        add_filter('script_loader_src', 'shapeSpace_remove_version_scripts_styles', 9999);

        function my_deregister_styles() {
            wp_deregister_style('dashicons');
        }

        function deregister_quantity_plus_minus_styles() {
            // Replace 'codeastrology-quantity-plus-minus' with the actual handle used by the plugin
            wp_dequeue_style('codeastrology-quantity-plus-minus');
            wp_deregister_style('codeastrology-quantity-plus-minus');
        }
        add_action('wp_enqueue_scripts', 'deregister_quantity_plus_minus_styles', 100);