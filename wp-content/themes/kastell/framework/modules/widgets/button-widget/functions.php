<?php

if ( ! function_exists( 'kastell_mkdf_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function kastell_mkdf_register_button_widget( $widgets ) {
		$widgets[] = 'KastellMkdfButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_button_widget' );
}