<?php

if ( ! function_exists( 'kastell_mkdf_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function kastell_mkdf_register_blog_list_widget( $widgets ) {
		$widgets[] = 'KastellMkdfBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_blog_list_widget' );
}