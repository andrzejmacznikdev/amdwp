<?php
    namespace AMDWPTheme;

    class Content
    {
        public static function displayContent($smallHeader, $header, $description, $h) 
        {
            $r = '<div class="flex flex-col p-rel gap-30">';
            $r .= '<div class="flex flex-col p-rel gap-20">';
            if(!empty($smallHeader)):
                $r .= '<div class="small-header">' . $smallHeader . '</div>';
            endif;
            if(!empty($header)):
                $r .= '<div class="main-header ' . $h . '">' . $header . '</div>';
            endif;
            $r .= '</div>';
            if(!empty($description)):
                $r .= '<div class="description">' . $description . '</div>';
            endif;
            $r .= '</div>';

            return $r;
        }

        public static function breadcrumbPosts($title)
        {
            $blogPage = get_field('blog-page', 'options');
            $homePage = get_home_url();

            $r = '<ul class="flex flex-row p-rel gap-5 ai-c">';
            $r .= '<li><a href="' . esc_url($homePage) . '" class="hover-link">Home</a></li>';
            $r .= '<li class="separator"></li>';
            $r .= '<li><a href="' . esc_url($blogPate['url']) . '" class="hover-link">' . $blogPage['title'] . '</a></li>';
            $r .= '<li class="separator"></li>';
            $r .= '<li><span class="current-page">' . esc_html($title) . '</span></li>';

            return $r;
        }
        public static function displayDescription($description, $class)
        {
            $r = '<div class="description ' . $class . '">';
            $r .= $description;
            $r .= '</div>';

            return $r;
        }
        public static function displayHeaders($smallHeader, $header, $h)
        {
            $r = '<div class="flex flex-col p-rel gap-20">';
                if(!empty($smallHeader)):
                    $r .= '<div class="small-header">' . $smallHeader . '</div>';
                endif;
                if(!empty($header)):
                    $r .= '<div class="main-header '.$h .'">' . $header .'</div>';
                endif;
            $r .= '</div>';
        }
    }