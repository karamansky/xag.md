<?php

if ( ! function_exists( 'kastell_mkdf_disable_wpml_css' ) ) {
	function kastell_mkdf_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'kastell_mkdf_disable_wpml_css' );
}