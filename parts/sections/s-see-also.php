<?php
    /**
     * Template part for displaying s-see-also
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
    $choose_posts = get_sub_field('choose_posts');
    $link_button = get_sub_field('link_button');
    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');

    if($separator_top === 'yes') echo '<div class="sp"></div>';
?>

<div class="s-see-also">
    <div class="container">
        <div class="flex flex-col p-rel gap-30">
            <div class="flex flex-col p-rel gap-20">
                <?php if(!empty($small_header)):?>
                    <div class="small-header">
                        <?= $small_header;?>
                    </div>
                <?php endif;?>
                <div class="flex flex-row jc-sb">
                    <div class="main-header h2">
                        <?= $header;?>
                    </div>
                    <?php if(!empty($link_button['url'])):?>
                        <div class="s-see-also-button sm-hide">
                            <?= Buttons::btnSimple($link_button);?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <?php
                if($choose_posts){
                    foreach($choose_posts as $post):
                        setup_postdata($post);  
                            // get_template_part();
                    endforeach;
                } else {
                    $args = array(
                        'post_type'     =>  'uslugi',
                        'posts_per_page'    =>  4,
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()) {
                        while($query->have_posts()):$query->the_post();
                            // get_template_part();
                        endwhile;
                    }
                }
            ?>
        </div>
    </div>
</div>
<?php if($separator_bottom === 'yes') echo '<div class="sp"></div>';?>