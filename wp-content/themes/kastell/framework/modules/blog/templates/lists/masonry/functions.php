<?php

if ( ! function_exists( 'kastell_mkdf_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function kastell_mkdf_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'kastell' );
		
		return $templates;
	}
	
	add_filter( 'kastell_mkdf_register_blog_templates', 'kastell_mkdf_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'kastell_mkdf_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function kastell_mkdf_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'kastell' );
		
		return $options;
	}
	
	add_filter( 'kastell_mkdf_blog_list_type_global_option', 'kastell_mkdf_set_blog_masonry_type_global_option' );
}