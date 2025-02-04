<?php
    /**
     * Template part for displaying s-social-proof-six-icons
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $add_blocks = get_sub_field('add_blocks');

    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');

    if($separator_top === 'yes') echo '<div class="sp"></div>';
?>

<div class="s-social-proof-six-icons">
    <div class="container">
        <div class="flex flex-row p-rel md-flex-wrap md-gap-y-40 md-gap-x-10 jc-sb">
            <?php
                foreach($add_blocks as $block):
                    $header = $block['header'];
                    $description = $block['description'];
                    $icon = $block['icon'];
            ?>
                    <div class="box flex flex-col ai-c">
                        <div class="box-content flex flex-col p-rel gap-20 ai-c">
                            <div class="icon">
                                <img src="<?= $icon['url'];?>" alt="<?= $icon['alt'];?>" width="100%" height="100%" />
                            </div>
                            <div class="header h6 ai-c flex ta-c">
                                <?= $header;?>
                            </div>
                            <?php if(!empty($description)):?>
                                <div class="description ta-c">
                                    <?= $description;?>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
            <?php
                endforeach;
            ?>
        </div>
    </div>
</div>

<?php if($separator_bottom === 'yes') echo '<div class="sp"></div>';?>