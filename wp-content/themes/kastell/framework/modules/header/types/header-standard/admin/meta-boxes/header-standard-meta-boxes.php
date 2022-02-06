<?php

if ( ! function_exists( 'kastell_mkdf_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function kastell_mkdf_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'kastell_mkdf_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kastell_mkdf_header_standard_meta_map' ) ) {
	function kastell_mkdf_header_standard_meta_map( $parent ) {
		$hide_dep_options = kastell_mkdf_get_hide_dep_for_header_standard_meta_boxes();
		
		kastell_mkdf_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'kastell' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'kastell' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'kastell' ),
					'left'   => esc_html__( 'Left', 'kastell' ),
					'right'  => esc_html__( 'Right', 'kastell' ),
					'center' => esc_html__( 'Center', 'kastell' )
				),
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'kastell_mkdf_additional_header_area_meta_boxes_map', 'kastell_mkdf_header_standard_meta_map' );
}