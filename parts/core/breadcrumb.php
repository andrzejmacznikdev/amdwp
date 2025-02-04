<?php
    /**
     * Template part for displaying breadcrumb
     * 
     * @author amd
     * 
     * @package amdwptheme
     * 
     * @version 1.0.0
     * 
     */

    defined('ABSPATH') || exit;

    if (function_exists('pll_home_url')) {
        // Get the home URL for the current language
        $home_url = pll_home_url();
    } else {
        // Fallback to the default home URL if Polylang is not active
        $home_url = home_url();
    }
    $post_categories = get_the_category();
    $breadcrumbs = '<a href="' . esc_url($home_url) . '" class="breadcrumb-link ms2 c-grey">Strona główna</a>';
    $current_page_id = 224;

    $lang = get_locale();

    if($lang === 'pl_PL') { 
        $target_language = 'pl';
    } elseif($lang === 'uk') {
        $target_language = 'uk';
    }
    $translated_page_id = pll_get_post($current_page_id, $target_language);
    $translated_permalink = get_permalink($translated_page_id);

    $breadcrumbs .= ' <span class="separator"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2.5 1L6.5 5L2.5 9" stroke="#FFBC6C" stroke-width="2"/></svg></span>';
    $breadcrumbs .= '<a href="/aktualnosci" class="breadcrumb-link s1">'.pll__('Aktualności', 'AMD WP Theme') .'</a>';
    
    $breadcrumbs .= ' <span class="separator"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M2.5 1L6.5 5L2.5 9" stroke="#FFBC6C" stroke-width="2"/></svg></span>';
    $breadcrumbs .= '<span class="breadcrumb-title s1 c-orange">' .get_the_title().'</span>' ;
    
    echo $breadcrumbs;