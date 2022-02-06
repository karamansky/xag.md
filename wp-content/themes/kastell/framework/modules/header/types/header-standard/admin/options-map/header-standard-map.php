<?php

if ( ! function_exists( 'kastell_mkdf_get_hide_dep_for_header_standard_options' ) ) {
	function kastell_mkdf_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'kastell_mkdf_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kastell_mkdf_header_standard_map' ) ) {
	function kastell_mkdf_header_standard_map( $parent ) {
		$hide_dep_options = kastell_mkdf_get_hide_dep_for_header_standard_options();
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'kastell' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'kastell' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'kastell' ),
					'left'   => esc_html__( 'Left', 'kastell' ),
					'center' => esc_html__( 'Center', 'kastell' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'kastell_mkdf_additional_header_menu_area_options_map', 'kastell_mkdf_header_standard_map' );
}