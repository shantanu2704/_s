<?php

if (!function_exists('shantanu_google_fonts')) {

    function shantanu_google_fonts() {

        $font_family = array(
            'Lora:400,400i,700,700i',
            'Nunito:400,400i,700',
        );

        $subset = array(
            'latin-ext',
        );

        $font_family_str = implode('|', $font_family);

        $subset_str = implode(',', $subset);

        $url = "://fonts.googleapis.com/css";

        $src = add_query_arg(
                array(
            'family' => $font_family_str,
            'subset' => $subset_str
                ), $url);
        wp_enqueue_style($shantanu_font_style, $src);
    }
    
    add_action('wp_enqueue_style', 'shantanu_google_fonts');

}


