<?php

if(!function_exists('kastell_mkdf_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function kastell_mkdf_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'KastellMkdfStickySidebar';
		
		return $widgets;
	}
	
	add_filter('kastell_mkdf_register_widgets', 'kastell_mkdf_register_sticky_sidebar_widget');
}