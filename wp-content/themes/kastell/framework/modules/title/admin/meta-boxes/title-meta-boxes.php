<?php

if ( ! function_exists( 'kastell_mkdf_get_title_types_meta_boxes' ) ) {
	function kastell_mkdf_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'kastell_mkdf_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'kastell' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'kastell_mkdf_map_title_meta' ) ) {
	function kastell_mkdf_map_title_meta() {
		$title_type_meta_boxes = kastell_mkdf_get_title_types_meta_boxes();
		
		$title_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'kastell' ),
				'name'  => 'title_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kastell' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'kastell' ),
				'parent'        => $title_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#mkdf_mkdf_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#mkdf_mkdf_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#mkdf_mkdf_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'hidden_property' => 'mkdf_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'kastell' ),
						'description'   => esc_html__( 'Choose title type', 'kastell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'kastell' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'kastell' ),
						'options'       => kastell_mkdf_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'kastell' ),
						'description' => esc_html__( 'Set a height for Title Area', 'kastell' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'kastell' ),
						'description' => esc_html__( 'Choose a background color for title area', 'kastell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'kastell' ),
						'description' => esc_html__( 'Choose an Image for title area', 'kastell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'kastell' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'kastell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'kastell' ),
							'hide'                => esc_html__( 'Hide Image', 'kastell' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'kastell' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'kastell' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'kastell' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'kastell' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'kastell' )
						)
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'kastell' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'kastell' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'kastell' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'kastell' ),
							'window_top'    => esc_html__( 'From Window Top', 'kastell' )
						)
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'kastell' ),
						'options'       => kastell_mkdf_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'kastell' ),
						'description' => esc_html__( 'Choose a color for title text', 'kastell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'kastell' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'kastell' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'kastell' ),
						'options'       => kastell_mkdf_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'kastell' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'kastell' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'kastell_mkdf_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_title_meta', 60 );
}