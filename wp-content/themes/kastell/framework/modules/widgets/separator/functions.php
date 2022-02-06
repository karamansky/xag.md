<?php

if ( ! function_exists( 'kastell_mkdf_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function kastell_mkdf_register_separator_widget( $widgets ) {
		$widgets[] = 'KastellMkdfSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_separator_widget' );
}