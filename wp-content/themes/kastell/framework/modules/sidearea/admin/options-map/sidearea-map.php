<?php

if ( ! function_exists( 'kastell_mkdf_sidearea_options_map' ) ) {
	function kastell_mkdf_sidearea_options_map() {
		
		kastell_mkdf_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'kastell' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = kastell_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'kastell' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = kastell_mkdf_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'kastell' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'kastell' )
			)
		);
		
		$side_area_icon_style_row1 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'kastell' )
			)
		);
		
		$side_area_icon_style_row2 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'kastell' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'kastell' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'kastell' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'kastell' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'kastell' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'kastell' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'kastell' ),
					'left'   => esc_html__( 'Left', 'kastell' ),
					'center' => esc_html__( 'Center', 'kastell' ),
					'right'  => esc_html__( 'Right', 'kastell' )
				)
			)
		);
	}
	
	add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_sidearea_options_map', 4 );
}