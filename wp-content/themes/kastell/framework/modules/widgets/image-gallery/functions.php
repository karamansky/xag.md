<?php

if ( ! function_exists( 'kastell_mkdf_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function kastell_mkdf_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'KastellMkdfImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_image_gallery_widget' );
}