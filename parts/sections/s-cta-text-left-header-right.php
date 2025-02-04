<?php
    /**
     * Template part for displaying s-cta-text-left-header-right
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

    $small_header = get_sub_field('small_header');
    $header = get_sub_field('header');
    $description = get_sub_field('description');
    $add_links = get_sub_field('add_links');

    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');
    if($separator_top === 'yes') echo '<div class="sp"></div>';

?>

<div class="s-cta-text-left-header-right">
    <div class="container">
        <div class="grid-columns md-gap-y-30 sm-gap-y-20">
            <div class="grid col-2-5 col-md-1-8 col-sm-1-6">
                <div class="description a1">
                    <?= $description;?>
                </div>
            </div>
            <div class="grid col-7-12 col-md-1-8 col-sm-1-6">
                <div class="flex flex-col gap-30">
                    <?= Content::displayContent($small_header, $header, '','h2 ls-25 main-header');?>
                    <?php 
                        if(!empty($add_links[0])):
                    ?>
                    <div class="buttons flex flex-row flex-wrap gap-10">
                        <?php
                                $count = 1;
                                foreach($add_links as $link):
                                    $link_button = $link['link_button'];
                                    if($count % 2 !== 0) {
                                        echo Buttons::btnPrimary($link_button);
                                    } else {
                                        echo Buttons::btnSecondary($link_button);
                                    }
                                    $count++;
                                endforeach;
                        ?>
                    </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($separator_bottom === 'yes') echo '<div class="sp"></div>';?>