<?php
    namespace AMDWPTheme;

    class Media 
    {
        public static function simpleImage($item) : string
        {
            $image  = '<picture>';
            $image .= '<source media="(max-width: 575px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<source media="(min-width: 576px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<img src="' . $item['url'] . '" alt="' . $item['alt'] .'" width="100%" height="100%" class="size-full o-cover o-center" />';
            $image .= '</picture>';
            return $image;
        }

        public static function simpleImageContain($item) : string
        {
            $image  = '<picture>';
            $image .= '<source media="(max-width: 575px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<source media="(min-width: 576px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<img src="' . $item['url'] . '" alt="' . $item['alt'] .'" width="100%" height="100%" class="size-full o-contain o-center" />';
            $image .= '</picture>';
            return $image;
        }

        public static function banner($item) : string
        {
            $image  = '<picture>';
            $image .= '<source media="(max-width: 575px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<source media="(min-width: 576px)" srcset="' . $item['sizes']['large'] . '">';
            $image .= '<img src="' . $item['url'] . '" alt="' . $item['alt'] .'" width="100%" height="100%" class="size-full o-cover o-center" />';
            $image .= '</picture>';
            return $image;
        }
    }