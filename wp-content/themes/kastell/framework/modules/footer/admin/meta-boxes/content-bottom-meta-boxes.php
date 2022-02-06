<?php

if ( ! function_exists( 'kastell_mkdf_map_content_bottom_meta' ) ) {
	function kastell_mkdf_map_content_bottom_meta() {
		
		$content_bottom_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'kastell' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'kastell' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'kastell' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#mkdf_mkdf_show_content_bottom_meta_container',
						'no' => '#mkdf_mkdf_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#mkdf_mkdf_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'mkdf_show_content_bottom_meta_container',
				'hidden_property' => 'mkdf_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'kastell' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'kastell' ),
				'options'       => kastell_mkdf_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'kastell' ),
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'mkdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'kastell' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_content_bottom_meta', 71 );
}