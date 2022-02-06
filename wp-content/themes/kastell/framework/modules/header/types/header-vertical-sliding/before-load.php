<?php

if ( ! function_exists( 'kastell_mkdf_set_header_vertical_sliding_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function kastell_mkdf_set_header_vertical_sliding_type_global_option( $header_types ) {
		$header_types['header-vertical-sliding'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-vertical-sliding/assets/img/header-vertical-sliding.png',
			'label' => esc_html__( 'Vertical - Sliding', 'kastell' )
		);
		
		return $header_types;
	}
	
	add_filter( 'kastell_mkdf_header_type_global_option', 'kastell_mkdf_set_header_vertical_sliding_type_global_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_header_vertical_sliding_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function kastell_mkdf_set_header_vertical_sliding_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-vertical-sliding'] = esc_html__( 'Vertical - Sliding', 'kastell' );
		
		return $header_type_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_meta_boxes', 'kastell_mkdf_set_header_vertical_sliding_type_meta_boxes_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_vertical_sliding' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_show_dep_options_for_header_vertical_sliding( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_vertical_area_container';
		$show_containers[] = '#mkdf_panel_vertical_main_menu';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_vertical_sliding', $show_containers );
		
		$show_dep_options['header-vertical-sliding'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_global_option', 'kastell_mkdf_set_show_dep_options_for_header_vertical_sliding' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_header_behaviour';
		$hide_containers[] = '#mkdf_menu_area_container';
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_panel_fullscreen_menu';
		$hide_containers[] = '#mkdf_panel_main_menu';
		$hide_containers[] = '#mkdf_panel_sticky_header';
		$hide_containers[] = '#mkdf_panel_fixed_header';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_vertical_sliding', $hide_containers );
		
		$hide_dep_options['header-vertical-sliding'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_global_option', 'kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_vertical_sliding_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_show_dep_options_for_header_vertical_sliding_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_vertical_area_container';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_vertical_sliding_meta_boxes', $show_containers );
		
		$show_dep_options['header-vertical-sliding'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_meta_boxes', 'kastell_mkdf_set_show_dep_options_for_header_vertical_sliding_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_menu_area_container';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_vertical_sliding_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-vertical-sliding'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_for_header_vertical_sliding_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function kastell_mkdf_set_hide_dep_options_header_vertical_sliding( $hide_dep_options ) {
		$hide_dep_options[] = 'header-vertical-sliding';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'kastell_mkdf_header_logo_area_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_menu_area_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_main_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_top_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	
	// header global panel meta boxes
	add_filter( 'kastell_mkdf_header_logo_area_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_menu_area_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_top_header_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	
	// header behavior panel options
	add_filter( 'kastell_mkdf_header_behavior_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_fixed_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_sticky_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	
	// header behavior panel meta boxes
	add_filter( 'kastell_mkdf_header_behavior_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	
	// header types panel options
	add_filter( 'kastell_mkdf_full_screen_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_centered_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_standard_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	
	// header types panel meta boxes
	add_filter( 'kastell_mkdf_header_centered_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
	add_filter( 'kastell_mkdf_header_standard_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical_sliding' );
}