<?php

if ( ! function_exists( 'kastell_mkdf_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function kastell_mkdf_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'KastellMkdfRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'kastell_mkdf_register_widgets', 'kastell_mkdf_register_recent_posts_widget' );
}