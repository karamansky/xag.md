<?php

if ( ! function_exists( 'kastell_mkdf_mobile_header_options_map' ) ) {
	function kastell_mkdf_mobile_header_options_map() {

        $panel_mobile_header = kastell_mkdf_add_admin_panel(
            array(
                'title' => esc_html__( 'Mobile Header', 'kastell' ),
                'name'  => 'panel_mobile_header',
                'page'  => '_header_page'
            )
        );
		
		$mobile_header_group = kastell_mkdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'kastell' )
			)
		);
		
		$mobile_header_row1 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'kastell' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'kastell' ),
				'parent' => $mobile_header_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'kastell' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = kastell_mkdf_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'kastell' )
			)
		);
		
		$mobile_menu_row1 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'kastell' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'kastell' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'kastell' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'kastell' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'kastell' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'kastell' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'kastell' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'kastell' )
			)
		);
		
		$first_level_group = kastell_mkdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'kastell' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'kastell' )
			)
		);
		
		$first_level_row1 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'kastell' ),
				'parent' => $first_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'kastell' ),
				'parent' => $first_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'kastell' ),
				'parent' => $first_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'kastell' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'kastell' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'kastell' ),
				'parent'  => $first_level_row2,
				'options' => kastell_mkdf_get_text_transform_array()
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'kastell' ),
				'parent'  => $first_level_row2,
				'options' => kastell_mkdf_get_font_style_array()
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'kastell' ),
				'parent'  => $first_level_row2,
				'options' => kastell_mkdf_get_font_weight_array()
			)
		);
		
		$first_level_row3 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'kastell' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = kastell_mkdf_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'kastell' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'kastell' )
			)
		);
		
		$second_level_row1 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'kastell' ),
				'parent' => $second_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'kastell' ),
				'parent' => $second_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'kastell' ),
				'parent' => $second_level_row1
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'kastell' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'kastell' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'kastell' ),
				'parent'  => $second_level_row2,
				'options' => kastell_mkdf_get_text_transform_array()
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'kastell' ),
				'parent'  => $second_level_row2,
				'options' => kastell_mkdf_get_font_style_array()
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'kastell' ),
				'parent'  => $second_level_row2,
				'options' => kastell_mkdf_get_font_weight_array()
			)
		);
		
		$second_level_row3 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'kastell' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'kastell' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'kastell' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'kastell' ),
				'parent' => $panel_mobile_header
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'kastell' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'kastell_mkdf_mobile_header_map', 'kastell_mkdf_mobile_header_options_map', 5 );
}