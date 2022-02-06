<?php

if ( ! function_exists( 'kastell_mkdf_set_header_vertical_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function kastell_mkdf_set_header_vertical_type_global_option( $header_types ) {
		$header_types['header-vertical'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-vertical/assets/img/header-vertical.png',
			'label' => esc_html__( 'Vertical', 'kastell' )
		);
		
		return $header_types;
	}
	
	add_filter( 'kastell_mkdf_header_type_global_option', 'kastell_mkdf_set_header_vertical_type_global_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_header_vertical_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function kastell_mkdf_set_header_vertical_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-vertical'] = esc_html__( 'Vertical', 'kastell' );
		
		return $header_type_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_meta_boxes', 'kastell_mkdf_set_header_vertical_type_meta_boxes_option' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_vertical' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_show_dep_options_for_header_vertical( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_vertical_area_container';
		$show_containers[] = '#mkdf_panel_vertical_main_menu';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_vertical', $show_containers );
		
		$show_dep_options['header-vertical'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_global_option', 'kastell_mkdf_set_show_dep_options_for_header_vertical' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_vertical' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_vertical( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_header_behaviour';
		$hide_containers[] = '#mkdf_menu_area_container';
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_panel_fullscreen_menu';
		$hide_containers[] = '#mkdf_panel_main_menu';
		$hide_containers[] = '#mkdf_panel_sticky_header';
		$hide_containers[] = '#mkdf_panel_fixed_header';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_vertical', $hide_containers );
		
		$hide_dep_options['header-vertical'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_global_option', 'kastell_mkdf_set_hide_dep_options_for_header_vertical' );
}

if ( ! function_exists( 'kastell_mkdf_set_show_dep_options_for_header_vertical_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_show_dep_options_for_header_vertical_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_vertical_area_container';
		
		$show_containers = apply_filters( 'kastell_mkdf_show_dep_options_for_header_vertical_meta_boxes', $show_containers );
		
		$show_dep_options['header-vertical'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_show_meta_boxes', 'kastell_mkdf_set_show_dep_options_for_header_vertical_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_for_header_vertical_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function kastell_mkdf_set_hide_dep_options_for_header_vertical_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_menu_area_container';
		
		$hide_containers = apply_filters( 'kastell_mkdf_hide_dep_options_for_header_vertical_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-vertical'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'kastell_mkdf_header_type_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_for_header_vertical_meta_boxes' );
}

if ( ! function_exists( 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' ) ) {
	/**
	 * This function is used to disable this header type specific containers/panels for admin options when another header type is selected.
	 */
	function kastell_mkdf_set_vertical_hide_dep_options_for_header_types( $hide_containers_dep_options ) {
		$hide_containers_dep_options[] = '#mkdf_header_vertical_area_container';
		$hide_containers_dep_options[] = '#mkdf_panel_vertical_main_menu';
		
		return $hide_containers_dep_options;
	}
	
	// hide header vertical container for global options
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_box', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_centered', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_divided', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_minimal', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_standard', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_standard_extended', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_tabbed', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_top_menu', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	
	// hide header vertical container for meta boxes
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_box_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_centered_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_divided_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_minimal_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_standard_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_standard_extended_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_tabbed_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
	add_filter( 'kastell_mkdf_hide_dep_options_for_header_top_menu_meta_boxes', 'kastell_mkdf_set_vertical_hide_dep_options_for_header_types' );
}

if ( ! function_exists( 'kastell_mkdf_set_hide_dep_options_header_vertical' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function kastell_mkdf_set_hide_dep_options_header_vertical( $hide_dep_options ) {
		$hide_dep_options[] = 'header-vertical';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'kastell_mkdf_header_logo_area_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_menu_area_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_main_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_top_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	
	// header global panel meta boxes
	add_filter( 'kastell_mkdf_header_logo_area_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_menu_area_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_top_header_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	
	// header behavior panel options
	add_filter( 'kastell_mkdf_header_behavior_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_fixed_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_sticky_header_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	
	// header behavior panel meta boxes
	add_filter( 'kastell_mkdf_header_behavior_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	
	// header types panel options
	add_filter( 'kastell_mkdf_full_screen_menu_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_centered_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_standard_hide_global_option', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	
	// header types panel meta boxes
	add_filter( 'kastell_mkdf_header_centered_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
	add_filter( 'kastell_mkdf_header_standard_hide_meta_boxes', 'kastell_mkdf_set_hide_dep_options_header_vertical' );
}