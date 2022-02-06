<?php

if ( ! function_exists( 'kastell_mkdf_get_search_types_options' ) ) {
    function kastell_mkdf_get_search_types_options() {
        $search_type_options = apply_filters( 'kastell_mkdf_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'kastell_mkdf_search_options_map' ) ) {
	function kastell_mkdf_search_options_map() {
		
		kastell_mkdf_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'kastell' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = kastell_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'kastell' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		kastell_mkdf_add_admin_field( array(
			'name'          => 'search_page_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Layout', 'kastell' ),
			'default_value' => 'in-grid',
			'description'   => esc_html__( 'Set layout. Default is in grid.', 'kastell' ),
			'parent'        => $search_page_panel,
			'options'       => array(
				'in-grid'    => esc_html__( 'In Grid', 'kastell' ),
				'full-width' => esc_html__( 'Full Width', 'kastell' )
			)
		) );
		
		kastell_mkdf_add_admin_field( array(
			'name'          => 'search_page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'kastell' ),
			'description'   => esc_html__( "Choose a sidebar layout for search page", 'kastell' ),
			'default_value' => 'no-sidebar',
			'options'       => kastell_mkdf_get_custom_sidebars_options(),
			'parent'        => $search_page_panel
		) );
		
		$kastell_custom_sidebars = kastell_mkdf_get_custom_sidebars();
		if ( count( $kastell_custom_sidebars ) > 0 ) {
			kastell_mkdf_add_admin_field( array(
				'name'        => 'search_custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'kastell' ),
				'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'kastell' ),
				'parent'      => $search_page_panel,
				'options'     => $kastell_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
		
		$search_panel = kastell_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'kastell' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'parent'      => $search_panel,
                'name'        => 'search_background_image',
                'type'        => 'image',
                'label'       => esc_html__('Background Image', 'kastell'),
                'description' => esc_html__('Choose an Image for Full Screen Search', 'kastell')
            )
        );
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'kastell' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'kastell' ),
				'options'       => kastell_mkdf_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'kastell' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'kastell' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                )
            )
        );
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'kastell' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'kastell' ),
			)
		);
		
		kastell_mkdf_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'kastell' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'kastell' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'hidden_property' => 'enable_search_icon_text',
				'hidden_value'    => 'no'
			)
		);
		
		$enable_search_icon_text_group = kastell_mkdf_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'kastell' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'kastell' )
			)
		);
		
		$enable_search_icon_text_row = kastell_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'kastell' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'kastell' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'kastell' ),
				'default_value' => '',
				'options'       => kastell_mkdf_get_text_transform_array()
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'default_value' => '-1',
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'kastell' ),
				'default_value' => '',
				'options'       => kastell_mkdf_get_font_style_array(),
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'kastell' ),
				'default_value' => '',
				'options'       => kastell_mkdf_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = kastell_mkdf_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'kastell' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_search_options_map', 5 );
}