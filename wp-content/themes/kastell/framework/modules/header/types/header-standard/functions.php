<?php

if ( ! function_exists( 'kastell_mkdf_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function kastell_mkdf_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'KastellMkdf\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'kastell_mkdf_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function kastell_mkdf_init_register_header_standard_type() {
		add_filter( 'kastell_mkdf_register_header_type_class', 'kastell_mkdf_register_header_standard_type' );
	}
	
	add_action( 'kastell_mkdf_before_header_function_init', 'kastell_mkdf_init_register_header_standard_type' );
}