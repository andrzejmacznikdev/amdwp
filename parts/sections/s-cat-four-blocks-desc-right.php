<?php
    /**
     * Template part for displaying s-cat-four-blocks-desc-right
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
    use AMDWPTheme\Buttons;

    $small_header = get_sub_field('small_header');
    $header = get_sub_field('header');
    $description = get_sub_field('description');
    $add_links = get_sub_field('add_links');
    $choose_cat = get_sub_field('choose_cat');

    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');

    if($separator_top === 'yes') echo'<div class="sp"></div>'

?>

<div class="s-cat-four-blocks-desc-right">
    <div class="container">
        <div class="grid-columns md-gap-y-30 sm-gap-y-20">
            <div class="grid col-1-6 col-md-1-8 col-sm-1-6">
                <div class="flex flex-row p-rel flex-wrap gap-25 h-max-content">
                    <?php
                        foreach ($choose_cat as $post):
                            setup_postdata($post);
                            get_template_part('parts/boxes/cat-box');
                        endforeach;
                    ?>
                </div>  
            </div>
            <div class="grid col-8-11 col-md-1-8 col-sm-1-6">
                <div class="flex flex-col p-rel gap-30">
                    <?= Content::displayContent($small_header, $header, $description, 'main-header h2 ls-25');?>
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