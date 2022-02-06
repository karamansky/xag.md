<?php

if ( ! function_exists( 'kastell_mkdf_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function kastell_mkdf_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'kastell' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'kastell' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'kastell_mkdf_additional_title_area_meta_boxes', 'kastell_mkdf_breadcrumbs_title_type_options_meta_boxes' );
}