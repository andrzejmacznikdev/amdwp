<?php
    /**
     * Template part for displaying s-cta-cf
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
    $description = get_sub_field('description');
    $phones = get_sub_field('phones');
    $emails = get_sub_field('emails');
    $shortcode = get_sub_field('shortcode');
    $separator_top = get_sub_field('separator_top');
    $separator_bottom = get_sub_field('separator_bottom');

    if($separator_top === 'yes') echo '<div class="sp"></div>';
?>

<div class="s-cta-cf">
    <div class="container">
        <div class="grid-columns">
            <div class="grid col-1-4">
                <div class="flex flex-col p-rel gap-30">
                    <?= Content::displayContent($small_header, $header, $description, 'h2 ls-25');?>
                    <div class="flex flex-col p-rel gap-15">
                        <?php
                            foreach($emails as $email):
                                $email_address = $email['email_address'];
                        ?>
                                <a href="<?= $email_address['url'];?>" class="flex flex-row p-rel gap-10 ai-c global-icon-link-hover">
                                    <span class="icon">
                                        <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 2.0912C18.9172 1.51085 18.6387 0.980814 18.215 0.59717C17.7913 0.213525 17.2504 0.00166713 16.6905 0H2.30952C1.74958 0.00166713 1.20874 0.213525 0.785041 0.59717C0.361344 0.980814 0.0828343 1.51085 0 2.0912L9.5 8.53333L19 2.0912Z" fill="white"/>
                                            <path d="M9.8439 9.66736C9.74144 9.73968 9.62202 9.77815 9.5 9.77815C9.37798 9.77815 9.25856 9.73968 9.1561 9.66736L0 3.20064V13.4496C0.000670569 14.1258 0.247038 14.7741 0.685046 15.2522C1.12305 15.7303 1.71693 15.9992 2.33637 16H16.6636C17.2831 15.9992 17.8769 15.7303 18.315 15.2522C18.753 14.7741 18.9993 14.1258 19 13.4496V3.19995L9.8439 9.66736Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <span class="text">
                                        <?= $email_address['title'];?>
                                    </span>
                                </a>
                        <?php
                            endforeach;
                        ?>
                        <?php
                            foreach($phones as $phone):
                                $number_phone = $phone['number_phone'];
                        ?>
                                <a href="<?= $number_phone['url'];?>" class="flex flex-row p-rel gap-10 ai-c global-icon-link-hover">
                                    <span class="icon">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.4493 15.4119L17.5125 12.4813C16.4637 11.4346 14.6806 11.8533 14.2611 13.2139C13.9465 14.1559 12.8976 14.6793 11.9536 14.4699C9.85594 13.9466 7.02405 11.2253 6.49962 9.02732C6.18497 8.0853 6.81428 7.03865 7.75824 6.7247C9.12175 6.30604 9.54129 4.52674 8.49244 3.4801L5.55566 0.549489C4.71658 -0.183163 3.45796 -0.183163 2.72376 0.549489L0.730951 2.53812C-1.26186 4.63141 0.940721 10.1786 5.87031 15.0979C10.7999 20.0171 16.3588 22.3198 18.4565 20.2264L20.4493 18.2378C21.1836 17.4005 21.1836 16.1445 20.4493 15.4119Z" fill="white"/>
                                        </svg>
                                    </span>
                                    <span class="text">
                                        <?= $number_phone['title'];?>
                                    </span>
                                </a>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <div class="grid col-8-11">
                <div class="s-cta-cf-form">
                    <?= do_shortcode($shortcode);?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($separator_bottom === 'yes') echo '<div class="sp"></div>';?>