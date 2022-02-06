<?php

if ( ! function_exists( 'kastell_mkdf_map_sidebar_meta' ) ) {
	function kastell_mkdf_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'kastell' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'kastell' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'kastell' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => kastell_mkdf_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = kastell_mkdf_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			kastell_mkdf_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'kastell' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'kastell' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_sidebar_meta', 31 );
}