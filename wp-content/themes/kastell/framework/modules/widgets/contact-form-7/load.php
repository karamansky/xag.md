<?php

if ( kastell_mkdf_contact_form_7_installed() ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_cf7_widget' );
}

if ( ! function_exists( 'kastell_mkdf_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function kastell_mkdf_register_cf7_widget( $widgets ) {
		$widgets[] = 'KastellMkdfContactForm7Widget';
		
		return $widgets;
	}
}