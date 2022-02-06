<?php

if ( ! function_exists( 'kastell_mkdf_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function kastell_mkdf_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'kastell' );
		
		return $type;
	}
	
	add_filter( 'kastell_mkdf_title_type_global_option', 'kastell_mkdf_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'kastell_mkdf_title_type_meta_boxes', 'kastell_mkdf_set_title_standard_with_breadcrumbs_type_for_options' );
}