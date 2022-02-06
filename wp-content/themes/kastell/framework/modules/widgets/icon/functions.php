<?php

if ( ! function_exists( 'kastell_mkdf_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function kastell_mkdf_register_icon_widget( $widgets ) {
		$widgets[] = 'KastellMkdfIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_icon_widget' );
}