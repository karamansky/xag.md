<?php

if ( ! function_exists( 'kastell_mkdf_disable_behaviors_for_header_vertical_sliding' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function kastell_mkdf_disable_behaviors_for_header_vertical_sliding( $allow_behavior ) {
		return false;
	}
	
	if ( kastell_mkdf_check_is_header_type_enabled( 'header-vertical-sliding', kastell_mkdf_get_page_id() ) ) {
		add_filter( 'kastell_mkdf_allow_sticky_header_behavior', 'kastell_mkdf_disable_behaviors_for_header_vertical_sliding' );
		add_filter( 'kastell_mkdf_allow_content_boxed_layout', 'kastell_mkdf_disable_behaviors_for_header_vertical_sliding' );
	}
}