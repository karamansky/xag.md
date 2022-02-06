<?php

if ( ! function_exists( 'kastell_mkdf_map_footer_meta' ) ) {
	function kastell_mkdf_map_footer_meta() {
		
		$footer_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'kastell' ),
				'name'  => 'footer_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'kastell' ),
				'parent'        => $footer_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'kastell' ),
				'parent'        => $footer_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array()
			)
		);

        kastell_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_footer_top_background_color_meta',
                'type'        => 'color',
                'label'       => esc_html__( 'Background Color', 'kastell' ),
                'description' => esc_html__( 'Set background color for top footer area', 'kastell' ),
                'parent'      => $footer_meta_box
            )
        );


        kastell_mkdf_create_meta_box_field(
            array(
                'type'          => 'select',
                'name'          => 'mkdf_footer_top_skin_meta',
                'default_value' => '',
                'label'         => esc_html__('Footer Top Skin', 'kastell'),
                'description'   => esc_html__('Choose a footer top style to make footer top widgets in that predefined style', 'kastell'),
                'options'       => array(
                    ''         => esc_html__('Default', 'kastell'),
                    'light-skin'    => esc_html__('Light', 'kastell'),
                    'dark-skin'     => esc_html__('Dark', 'kastell')
                ),
                'parent'        => $footer_meta_box,
            )
        );
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'kastell' ),
				'parent'        => $footer_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array()
			)
		);

        kastell_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_footer_bottom_background_color_meta',
                'type'        => 'color',
                'label'       => esc_html__( 'Background Color', 'kastell' ),
                'description' => esc_html__( 'Set background color for bottom footer area', 'kastell' ),
                'parent'      => $footer_meta_box
            )
        );

        kastell_mkdf_create_meta_box_field(
            array(
                'type'          => 'select',
                'name'          => 'mkdf_footer_bottom_skin_meta',
                'default_value' => '',
                'label'         => esc_html__('Footer Bottom Skin', 'kastell'),
                'description'   => esc_html__('Choose a footer bottom style to make footer top widgets in that predefined style', 'kastell'),
                'options'       => array(
                    ''         => esc_html__('Default', 'kastell'),
                    'light-skin'    => esc_html__('Light', 'kastell'),
                    'dark-skin'     => esc_html__('Dark', 'kastell')
                ),
                'parent'        => $footer_meta_box,
            )
        );

        kastell_mkdf_create_meta_box_field(
            array(
                'type'          => 'image',
                'name'          => 'mkdf_footer_background_image_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Footer Background Image', 'kastell' ),
                'parent'        => $footer_meta_box,
            )
        );

        kastell_mkdf_create_meta_box_field(
            array(
                'type'          => 'select',
                'name'          => 'mkdf_footer_transparency_meta',
                'default_value' => '',
                'label'         => esc_html__( 'Transparent Footer?', 'kastell' ),
                'description'   => esc_html__( 'Enabling this option will make footer background transparent', 'kastell' ),
                'options'       => array(
                    ''         => esc_html__('Default', 'kastell'),
                    'yes'    => esc_html__('Yes', 'kastell'),
                    'no'     => esc_html__('No', 'kastell')
                ),
                'parent'        => $footer_meta_box,
            )
        );
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_footer_meta', 70 );
}