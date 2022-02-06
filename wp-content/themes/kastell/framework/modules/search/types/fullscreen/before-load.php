<?php

if ( ! function_exists( 'kastell_mkdf_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function kastell_mkdf_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'kastell' );

        return $search_type_options;
    }

    add_filter( 'kastell_mkdf_search_type_global_option', 'kastell_mkdf_set_search_fullscreen_global_option' );
}