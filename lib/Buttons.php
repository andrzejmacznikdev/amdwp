<?php
    namespace AMDWPTheme;

    class Buttons
    {
        public static function btnPrimary($button): string
        {
            $btn = '<a href="' . esc_url($button['url']).'" target="' . esc_attr($button['target']).'" class="btn btn-primary">';
            $btn .= '<span class="text">' . esc_html($button['title']).'</span>';
            $btn .= '<span class="icon"></span>';
            $btn .= '</a>';

            return $btn;
        }

        public static function btnSecondary($button): string
        {
            $btn = '<a href="' . esc_url($button['url']) . '" target="' . esc_attr($button['target']) . '" class="btn btn-secondary">';
            $btn .= '<span class="text">' . esc_html($button['title']) . '</span>';
            $btn .= '<span class="icon"></span>';
            $btn .= '</a>';

            return $btn;
        }

        public static function btnSimple($button): string
        {
            $btn = '<a href="' . esc_url($button['url']) . '" target="' . esc_attr($button['target']) . '" class="btn-simple">';
            $btn .= '<span class="text">' . esc_html($button['title']) . '</span>';
            $btn .= '<span class="icon"></span>';
            $btn .= '</a>';

            return $btn;
        }
    }