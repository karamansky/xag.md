<?php

if ( ! function_exists( 'kastell_mkdf_footer_options_map' ) ) {
	function kastell_mkdf_footer_options_map() {
		
		kastell_mkdf_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'kastell' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = kastell_mkdf_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'kastell' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'kastell' ),
				'parent'        => $footer_panel,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'kastell' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = kastell_mkdf_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_top_skin',
                'default_value' => '',
                'label'         => esc_html__('Footer Top Skin', 'kastell'),
                'description'   => esc_html__('Choose a footer top style to make footer top widgets in that predefined style', 'kastell'),
                'options'       => array(
                    ''         => esc_html__('Default', 'kastell'),
                    'dark-skin'     => esc_html__('Dark', 'kastell'),
                    'light-skin'    => esc_html__('Light', 'kastell'),
                ),
                'parent'        => $show_footer_top_container,
            )
        );
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'kastell' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'kastell' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'kastell' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'kastell' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'kastell' ),
					'left'   => esc_html__( 'Left', 'kastell' ),
					'center' => esc_html__( 'Center', 'kastell' ),
					'right'  => esc_html__( 'Right', 'kastell' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'Set background color for top footer area', 'kastell' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'kastell' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = kastell_mkdf_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'footer_bottom_skin',
                'default_value' => '',
                'label'         => esc_html__('Footer Bottom Skin', 'kastell'),
                'description'   => esc_html__('Choose a footer bottom style to make footer bottom widgets in that predefined style', 'kastell'),
                'options'       => array(
                    ''         => esc_html__('Default', 'kastell'),
                    'dark-skin'     => esc_html__('Dark', 'kastell'),
                    'light-skin'    => esc_html__('Light', 'kastell'),
                ),
                'parent'        => $show_footer_bottom_container,
            )
        );
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'kastell' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'kastell' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'kastell' ),
				'parent'      => $show_footer_bottom_container
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'image',
                'name'          => 'footer_background_image',
                'default_value' => '',
                'label'         => esc_html__( 'Footer Background Image', 'kastell' ),
                'parent'        => $footer_panel,
            )
        );

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'footer_transparency',
                'default_value' => 'no',
                'label'         => esc_html__( 'Transparent Footer?', 'kastell' ),
                'description'   => esc_html__( 'Enabling this option will make footer background transparent', 'kastell' ),
                'parent'        => $footer_panel,
            )
        );
	}
	
	add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_footer_options_map', 11 );
}