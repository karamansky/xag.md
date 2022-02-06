<?php

if ( ! function_exists( 'kastell_mkdf_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function kastell_mkdf_search_body_class( $classes ) {
		$classes[] = 'mkdf-fullscreen-search';
		$classes[] = 'mkdf-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kastell_mkdf_search_body_class' );
}

if ( ! function_exists( 'kastell_mkdf_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kastell_mkdf_get_search() {
		kastell_mkdf_load_search_template();
	}
	
	add_action( 'kastell_mkdf_before_page_header', 'kastell_mkdf_get_search' );
}

if ( ! function_exists( 'kastell_mkdf_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kastell_mkdf_load_search_template() {
        kastell_mkdf_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search' );
	}
}

if ( ! function_exists( 'kastell_mkdf_search_styles' ) ) {
    /**
     * Sets per page styles for header top bar
     *
     * @param $styles
     *
     * @return array
     */
    function kastell_mkdf_search_styles( $styles ) {
        $search_style = array();

        $background_image = kastell_mkdf_options()->getOptionValue('search_background_image');
        if (!empty($background_image)) {
            $search_style['background-image'] = 'url('.$background_image.')';
            $search_style['background-position'] = 'center 0';
            $search_style['background-size'] = 'cover';
            $search_style['background-repeat'] = 'no-repeat';
        } else {
            $search_style['background-color'] = '#000';
        }

        $selector = array(
            '.mkdf-fullscreen-search-holder'
        );

        $search_style = kastell_mkdf_dynamic_css($selector, $search_style);

        $current_style = $search_style . $styles;

        return $current_style;
    }

    add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_search_styles' );
}