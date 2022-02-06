<?php

if ( ! function_exists( 'kastell_mkdf_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function kastell_mkdf_register_custom_font_widget( $widgets ) {
		$widgets[] = 'KastellMkdfCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_custom_font_widget' );
}