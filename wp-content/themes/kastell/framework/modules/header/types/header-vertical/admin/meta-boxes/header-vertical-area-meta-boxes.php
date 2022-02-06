<?php

if ( ! function_exists( 'kastell_mkdf_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function kastell_mkdf_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'kastell_mkdf_header_vertical_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'kastell_mkdf_header_vertical_area_meta_options_map' ) ) {
	function kastell_mkdf_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = kastell_mkdf_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		kastell_mkdf_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'kastell' )
			)
		);
		
		$kastell_custom_sidebars = kastell_mkdf_get_custom_sidebars();
		if ( count( $kastell_custom_sidebars ) > 0 ) {
			kastell_mkdf_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'kastell' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'kastell' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $kastell_custom_sidebars
				)
			);
		}
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'kastell' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'kastell' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'kastell' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'kastell' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'kastell' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'kastell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kastell_mkdf_get_yes_no_select_array()
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'kastell' ),
				'description'   => esc_html__( 'Set border on vertical area', 'kastell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_vertical_header_border_container',
						'no'  => '#mkdf_vertical_header_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_vertical_header_border_container'
					)
				)
			)
		);
		
		$vertical_header_border_container = kastell_mkdf_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'hidden_property' => 'mkdf_vertical_header_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'kastell' ),
				'description' => esc_html__( 'Choose color of border', 'kastell' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'kastell' ),
				'description'   => esc_html__( 'Set content in vertical center', 'kastell' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => kastell_mkdf_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'kastell_mkdf_additional_header_area_meta_boxes_map', 'kastell_mkdf_header_vertical_area_meta_options_map', 10, 1 );
}