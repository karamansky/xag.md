<?php

if ( ! function_exists( 'kastell_mkdf_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function kastell_mkdf_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'kastell' );
		
		return $type;
	}
	
	add_filter( 'kastell_mkdf_title_type_global_option', 'kastell_mkdf_set_title_standard_type_for_options' );
	add_filter( 'kastell_mkdf_title_type_meta_boxes', 'kastell_mkdf_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'kastell_mkdf_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function kastell_mkdf_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'kastell_mkdf_default_title_type_global_option', 'kastell_mkdf_set_title_standard_type_as_default_options' );
}