<?php

if ( ! function_exists( 'kastell_mkdf_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function kastell_mkdf_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'KastellMkdfSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_sidearea_opener_widget' );
}