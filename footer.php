<?php
    /**
     * The template for displaying footer of the pages
     * 
     * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#footer-php
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;
?>
        </main>
        <?php get_template_part('parts/core/footer');?>
        <script type="text/javascript" src="/wp-content/themes/amdwp/swiper/swiper-bundle.min.js"></script>
        <script src="/wp-content/themes/amdwp/dist/lightbox/js/lightbox.js"></script>
        <?php wp_footer();?>
    </body>
</html>
