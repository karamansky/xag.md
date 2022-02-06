<?php

if ( ! function_exists( 'kastell_mkdf_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function kastell_mkdf_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'kastell' );
		
		return $templates;
	}
	
	add_filter( 'kastell_mkdf_register_blog_templates', 'kastell_mkdf_register_blog_standard_template_file' );
}

if ( ! function_exists( 'kastell_mkdf_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function kastell_mkdf_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'kastell' );
		
		return $options;
	}
	
	add_filter( 'kastell_mkdf_blog_list_type_global_option', 'kastell_mkdf_set_blog_standard_type_global_option' );
}