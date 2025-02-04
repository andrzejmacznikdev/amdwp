<?php
    /**
     * Template part for displaying hero text left
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     *
     */

    defined('ABSPATH') || exit;

    use AMDWPTheme\Buttons;
    use AMDWPTheme\Content;
    use AMDWPTheme\Media;

    $sliders = get_sub_field('sliders');
?>

<div class="hero-two mt-h w-full p-rel">
    <div class="container h-full">
        <div class="heroOneSwiper swiper">
            <div class="swiper-wrapper">
                <?php
                    foreach($sliders as $slide):
                        $small_header = $slide['small_header'];
                        $header = $slide['header'];
                        $description = $slide['description'];
                        $image = $slide['image'];
                        $add_links = $slide['add_links'];
                ?>
                    <div class="swiper-slide">
                        <div class="hero-two-slider flex flex-row p-rel jc-sb md-flex-wrap">
                            <div class="hero-two-slider-left flex-row global-image">
                                <?= Media::simpleImage($image);?>
                            </div>
                            <div class="hero-two-slider-right">
                                <div class="flex flex-col p-rel gap-30">
                                    <?= Content::displayContent($small_header, $header, $description, 'h1 main-header');?>
                                    <?php if(!empty($add_links[0])):?>
                                        <div class="buttons flex flex-row p-rel gap-10 flex-wrap">
                                            <?php
                                                $count = 1;
                                                foreach($add_links as $link):
                                                    $link_button = $link['link_button'];
                                                    if($count % 2 !== 0){
                                                        echo Buttons::btnPrimary($link_button);
                                                    } else {
                                                        echo Buttons::btnSecondary($link_button);
                                                    }
                                                    $count++;
                                                endforeach;
                                            ?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endforeach;
                ?>
            </div>
            <div class="hero-two-pagination pagination-swiper">
                <div class="swiper-pagination-hero-two"></div>
            </div>
        </div>
    </div>
</div>