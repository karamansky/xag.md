<?php

if ( ! function_exists( 'kastell_mkdf_search_opener_icon_size' ) ) {
	function kastell_mkdf_search_opener_icon_size() {
		$icon_size = kastell_mkdf_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo kastell_mkdf_dynamic_css( '.mkdf-search-opener', array(
				'font-size' => kastell_mkdf_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_search_opener_icon_size' );
}

if ( ! function_exists( 'kastell_mkdf_search_opener_icon_colors' ) ) {
	function kastell_mkdf_search_opener_icon_colors() {
		$icon_color       = kastell_mkdf_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = kastell_mkdf_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo kastell_mkdf_dynamic_css( '.mkdf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo kastell_mkdf_dynamic_css( '.mkdf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_search_opener_icon_colors' );
}

if ( ! function_exists( 'kastell_mkdf_search_opener_text_styles' ) ) {
	function kastell_mkdf_search_opener_text_styles() {
		$item_styles = kastell_mkdf_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = kastell_mkdf_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo kastell_mkdf_dynamic_css( '.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_search_opener_text_styles' );
}