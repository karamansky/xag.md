<?php

if ( ! function_exists( 'kastell_mkdf_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function kastell_mkdf_register_social_icon_widget( $widgets ) {
		$widgets[] = 'KastellMkdfSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_social_icon_widget' );
}