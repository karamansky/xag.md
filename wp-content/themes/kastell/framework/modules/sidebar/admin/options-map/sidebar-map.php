<?php

if ( ! function_exists( 'kastell_mkdf_sidebar_options_map' ) ) {
	function kastell_mkdf_sidebar_options_map() {
		
		$sidebar_panel = kastell_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'kastell' ),
				'name'  => 'sidebar',
				'page'  => '_page_page'
			)
		);
		
		kastell_mkdf_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'kastell' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'kastell' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => kastell_mkdf_get_custom_sidebars_options()
		) );
		
		$kastell_custom_sidebars = kastell_mkdf_get_custom_sidebars();
		if ( count( $kastell_custom_sidebars ) > 0 ) {
			kastell_mkdf_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'kastell' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'kastell' ),
				'parent'      => $sidebar_panel,
				'options'     => $kastell_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'kastell_mkdf_additional_page_options_map', 'kastell_mkdf_sidebar_options_map', 2 );
}