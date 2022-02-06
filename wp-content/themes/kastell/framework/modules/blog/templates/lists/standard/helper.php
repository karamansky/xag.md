<?php

if ( ! function_exists( 'kastell_mkdf_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function kastell_mkdf_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'mkdf-container';
		$params_list['inner']  = 'mkdf-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'kastell_mkdf_blog_holder_params', 'kastell_mkdf_get_blog_holder_params' );
}

if ( ! function_exists( 'kastell_mkdf_get_blog_holder_classes' ) ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function kastell_mkdf_get_blog_holder_classes( $classes ) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'mkdf-grid-normal-gutter';
		
		return implode( ' ', $sidebar_classes );
	}
	
	add_filter( 'kastell_mkdf_blog_holder_classes', 'kastell_mkdf_get_blog_holder_classes' );
}

if ( ! function_exists( 'kastell_mkdf_blog_part_params' ) ) {
	function kastell_mkdf_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h3';
		$part_params['link_tag']  = 'h4';
		$part_params['quote_tag'] = 'h4';
		$part_params['share_type'] = 'dropdown';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'kastell_mkdf_blog_part_params', 'kastell_mkdf_blog_part_params' );
}