<?php

if(!function_exists('kastell_mkdf_footer_top_style')){

    function kastell_mkdf_footer_top_style($style){

        $page_id      = kastell_mkdf_get_page_id();
        $class_prefix = kastell_mkdf_get_unique_page_class( $page_id, true );

        $footer_top_selector      = array( $class_prefix . ' .mkdf-page-footer .mkdf-footer-top-holder' );

        $background_color = get_post_meta(get_the_ID(), 'mkdf_footer_top_background_color_meta', true );

        if ( ! empty( $background_color ) ) {
            $footer_top_style['background-color'] = $background_color;
        }

        $current_style = '';

        if ( ! empty( $footer_top_style ) ) {
            $current_style .= kastell_mkdf_dynamic_css( $footer_top_selector, $footer_top_style );
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_footer_top_style' );
}


if(!function_exists('kastell_mkdf_footer_bottom_style')){

    function kastell_mkdf_footer_bottom_style($style){

        $page_id      = kastell_mkdf_get_page_id();
        $class_prefix = kastell_mkdf_get_unique_page_class( $page_id, true );

        $footer_bottom_selector      = array( $class_prefix . ' .mkdf-page-footer .mkdf-footer-bottom-holder' );

        $background_color = get_post_meta(get_the_ID(), 'mkdf_footer_bottom_background_color_meta', true );

        if ( ! empty( $background_color ) ) {
            $footer_bottom_style['background-color'] = $background_color;
        }

        $current_style = '';

        if ( ! empty( $footer_bottom_style ) ) {
            $current_style .= kastell_mkdf_dynamic_css( $footer_bottom_selector, $footer_bottom_style );
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_footer_bottom_style' );
}