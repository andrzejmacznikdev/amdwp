<?php
    /**
     * Template part for displaying s-offer-slider-header-left
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    use AMDWPTheme\Content;

    $small_header = get_sub_field('small_header');
    $header = get_sub_field('header');
    $choose_posts = get_sub_field('choose_posts');
    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');

    if($separator_top === 'yes') echo '<div class="sp"></div>';
?>

<div class="s-offer-slider-header-left">
    <div class="container">
        <div class="flex flex-row p-rel jc-sb s-offer-slider-header-left-content md-flex-col">
            <div class="s-offer-slider-header-left-headers flex flex-col p-rel">
                <?= Content::displayContent($small_header, $header, '','h2 main-header ls-25');?>
            </div>
            <div class="s-offer-slider-header-left-slider">
                <div class="offersSlider swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $counter = 1;
                            foreach($choose_posts as $post):
                                setup_postdata($post);
                                $count = addZero($counter);
                                set_query_var('counter', $count);
                                    echo '<div class="swiper-slide">';
                                        get_template_part('parts/boxes/offer-box');
                                    echo '</div>';
                            $counter++;
                            endforeach;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($separator_bottom === 'yes') echo '<div class="sp"></div>';?>