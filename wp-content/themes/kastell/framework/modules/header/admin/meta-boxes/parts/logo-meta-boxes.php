<?php

if ( ! function_exists( 'kastell_mkdf_logo_meta_box_map' ) ) {
	function kastell_mkdf_logo_meta_box_map() {
		
		$logo_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'kastell' ),
				'name'  => 'logo_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'kastell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kastell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'kastell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kastell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'kastell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kastell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'kastell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kastell' ),
				'parent'      => $logo_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'kastell' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'kastell' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_logo_meta_box_map', 47 );
}