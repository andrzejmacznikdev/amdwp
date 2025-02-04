<?php
    /**
     * Template part for displaying acf-button-header
     * 
     * @author amd
     * 
     * @package amdwootheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $add_buttons = get_field('add_buttons');

    use AMDWooTheme\Buttons;

?>
<div class="acf-button-header mt-20 sm-mt-0">
    <div class="flex flex-row p-rel gap-10">
        <?php
            $count = 1;
            foreach($add_buttons as $buttons):
                $link_button = $buttons['link_button'];
                if($count % 2 !==0) {
                    echo Buttons::btnPrimary($link_button);
                } else {
                    echo Buttons::btnSecondary($link_button);
                }
            $count++;
            endforeach;
        ?>
    </div>
</div>