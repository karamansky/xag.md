<?php

if ( ! function_exists( 'kastell_mkdf_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function kastell_mkdf_sticky_header_styles() {
		$background_color        = kastell_mkdf_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = kastell_mkdf_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = kastell_mkdf_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = kastell_mkdf_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo kastell_mkdf_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'background-color' => kastell_mkdf_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo kastell_mkdf_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = kastell_mkdf_filter_px( $header_height ) . 'px';
			
			echo kastell_mkdf_dynamic_css( '.mkdf-page-header .mkdf-sticky-header', array( 'height' => $height ) );
			echo kastell_mkdf_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		// sticky menu style
		
		$menu_item_styles = kastell_mkdf_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li > a'
		);
		
		echo kastell_mkdf_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = kastell_mkdf_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li:hover > a',
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li.mkdf-active-item > a'
		);
		
		echo kastell_mkdf_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_sticky_header_styles' );
}