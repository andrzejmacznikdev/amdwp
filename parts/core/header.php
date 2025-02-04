<?php
    /**
     * Part of header
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    $main_logo = get_field('main_logo','options');

    $is_active_top_header = get_field('is_active_top_header','options');
?>

<header class="site-header p-fix w-full zi-100" id="header">
    
    <?php 
        if($is_active_top_header === 'yes'):
    ?>
        <!-- TOP HEADER -->
        <div class="site-header-top md-hide">
            <div class="container h-full">
                <div class="grid-columns">

                </div>
            </div>
        </div>
         <!-- END TOP HEADER -->
    <?php 
        endif; // end if is active top banner
    ?>
    <!-- MAIN HEADER -->
    <div class="site-header-main">
        <div class="container h-full">
            <div class="grid-columns h-full">
                <!-- MAIN LOGO -->
                <div class="grid col-1-3 col-lg-1-2 col-md-1-2 site-header-main-logo h-full">
                    <a href="<?= esc_url(home_url('/'));?>" rel="home" class="flex ai-c p-rel">
                        <div class="logo-link-img flex">
                            <img src="<?= $main_logo['url'];?>" alt="<?= $main_logo['alt'];?>" width="100%" height="100%" />
                        </div>
                    </a>
                </div>
                <!-- END MAIN LOGO -->
                <!-- MAIN MENU -->
                <div class="grid col-4-9 col-lg-4-10 h-full t-lg-hide">
                    <div class="flex main-menu p-rel">
                        <?php 
                            wp_nav_menu(
                                [
                                    'container'         =>  '',
                                    'depth'             =>  3,
                                    'fallback_cp'       =>  false,
                                    'items_wrap'        =>  '<ul class="flex ai-c h-full menu-navigation flex-row gap-20">%3$s</ul>',
                                    'theme_location'    =>  'primary_menu',
                                    'walker'            =>  new Walker_Header_Menu(),
                                ]
                            );
                        ?>
                    </div>
                </div>
                <!-- END MAIN MENU -->
                <!-- ADDITIONAL INFORMATIONS -->
                <div class="grid col-10-12 col-lg-11-12 h-full ai-c jc-fe">
                    <div class="search-content t-lg-hide">
                        <div class="search-content-input">
                            <?= do_shortcode('[wpdreams_ajaxsearchlite]');?>
                        </div>
                    </div>
                    <div class="t-lg-show hamburger">
                        <div class="hamburger-closed">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="35" height="35" fill="#FF8A00"/>
                                <line x1="8" y1="17" x2="27" y2="17" stroke="white" stroke-width="2"/>
                                <line x1="11" y1="11" x2="24" y2="11" stroke="white" stroke-width="2"/>
                                <line x1="11" y1="23" x2="24" y2="23" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="hamburger-opened">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="35" height="35" fill="#445158"/>
                                <line x1="10.4903" y1="10.5754" x2="23.9253" y2="24.0104" stroke="white" stroke-width="2"/>
                                <line y1="-1" x2="19" y2="-1" transform="matrix(-0.707107 0.707107 0.707107 0.707107 24.2188 11.2825)" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- END ADDITIONAL INFORMATIONS -->

            </div>
        </div>
    </div>
   <!-- END MAIN HEADER -->
</header>

<!-- MOBILE MENU -->
    <div class="mobile-menu">
        <div class="mobile-menu-top">

        </div>
        <div class="mobile-menu-middle">
            <div class="flex flex-col p-rel gap-20">
                <?php
                    wp_nav_menu(
                        [
                            'container'         =>      '',
                            'depth'             =>      3,
                            'fallback_cb'       =>      false,
                            'items_wrap'        =>      '<ul class="flex flex-col navigationMobile gap-10">%3$s</ul>',
                            'theme_location'    =>      'primary_menu',
                            'walker'            =>      new Walker_Header_Menu(),
                        ]
                    );
                ?>
                <?php 
                    wp_nav_menu(
                        [
                            'container'         =>  '',
                            'depth'             =>  3,
                            'fallback_cp'       =>  false,
                            'items_wrap'        =>  '<ul class="flex h-full navigationMobile flex-col gap-10">%3$s</ul>',
                            'theme_location'    =>  'secondary_menu',
                            'walker'            =>  new Walker_Header_Menu(),
                        ]
                    );
                ?>
            </div>
        </div>
        <div class="mobile-menu-bottom">

        </div>
    </div>
<!-- END MOBILE MENU -->