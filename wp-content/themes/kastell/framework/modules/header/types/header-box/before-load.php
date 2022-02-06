<?php

if ( ! function_exists( 'kastell_mkdf_set_header_box_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function kastell_mkdf_set_header_box_type_global_option( $header_type_options ) {
		$header_type_options['header-box'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-box/assets/img/header-box.png',
			'label' => esc_html__( 'In The Box', 'kastell' )
		);
		
		return $header_type_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_global_option', 'kastell_mkdf_set_header_box_type_global_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_header_box_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function kastell_mkdf_set_header_box_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-box'] = esc_html__( 'In The Box', 'kastell' );
		
		return $header_type_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_meta_boxes', 'kastell_mkdf_set_header_box_type_meta_boxes_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_box' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_show_dep_options_for_header_box( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_behaviour';
		$show_containers[] = '#mkdf_menu_area_container';
		$show_containers[] = '#mkdf_panel_main_menu';
		$show_containers[] = '#mkdf_panel_sticky_header';
		$show_containers[] = '#mkdf_panel_fixed_header';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_box', $show_containers );
		
		$show_dep_options['header-box'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_global_option', 'kastell_mkdf_set_show_dep_options_for_header_box' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_box' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_box( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_panel_fullscreen_menu';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_box', $hide_containers );
		
		$hide_dep_options['header-box'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_global_option', 'kastell_mkdf_set_hide_dep_options_for_header_box' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_box_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_show_dep_options_for_header_box_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_menu_area_container';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_box_meta_boxes', $show_containers );
		
		$show_dep_options['header-box'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_meta_boxes', 'kastell_mkdf_set_show_dep_options_for_header_box_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_box_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_box_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_box_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-box'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_for_header_box_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_header_box' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function kastell_mkdf_set_hide_dep_options_header_box( $hide_dep_options ) {
		$hide_dep_options[] = 'header-box';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'kastell_mkdf_header_logo_area_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	
	// header global panel meta boxes
	add_filter( 'kastell_mkdf_header_logo_area_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_box' );
	
	// header types panel options
	add_filter( 'kastell_mkdf_full_screen_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_centered_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_standard_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_vertical_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_vertical_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_box' );
	
	// header types panel meta boxes
	add_filter( 'kastell_mkdf_header_centered_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_standard_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_box' );
	add_filter( 'kastell_mkdf_header_vertical_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_box' );
}

if ( ! function_exists( 'kastell_mkdf_enabled_top_bar_for_header_box' ) ) {
	/**
	 * This function is used to enabled top header area when this header type is enabled
	 */
	function kastell_mkdf_enabled_top_bar_for_header_box( $top_bar_enabled ) {
		if ( kastell_mkdf_get_meta_field_intersect( 'header_type', kastell_mkdf_get_page_id() ) === 'header-box' ) {
			$top_bar_enabled = true;
		}

		return $top_bar_enabled;
	}

	add_filter( 'kastell_mkdf_enabled_top_bar', 'kastell_mkdf_enabled_top_bar_for_header_box' );
}


