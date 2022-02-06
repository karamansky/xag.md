<?php

if ( ! function_exists( 'kastell_mkdf_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function kastell_mkdf_register_search_opener_widget( $widgets ) {
		$widgets[] = 'KastellMkdfSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_search_opener_widget' );
}