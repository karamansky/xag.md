<?php

if ( ! function_exists( 'kastell_mkdf_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function kastell_mkdf_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'KastellMkdfWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_woocommerce_dropdown_cart_widget' );
}