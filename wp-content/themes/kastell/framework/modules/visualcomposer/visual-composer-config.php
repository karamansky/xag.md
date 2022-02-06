<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = MIKADO_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'kastell_mkdf_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function kastell_mkdf_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'kastell_mkdf_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'kastell_mkdf_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function kastell_mkdf_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'kastell' ),
				'value'      => array(
					esc_html__( 'Full Width', 'kastell' ) => 'full-width',
					esc_html__( 'In Grid', 'kastell' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Mikado Anchor ID', 'kastell' ),
				'description' => esc_html__( 'For example "home"', 'kastell' ),
				'group'       => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'        => 'dropdown',
                'param_name'  => 'anchor_button',
                'heading'     => esc_html__( 'Add Anchor Button?', 'kastell' ),
                'description' => esc_html__( 'Add the button to the bottom of the row which will link to some anchor section on the same page', 'kastell' ),
                'value'       => array_flip(kastell_mkdf_get_yes_no_select_array(false)),
                'group'       => esc_html__( 'Mikado Settings', 'kastell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'anchor_button_text',
                'heading'     => esc_html__( 'Anchor Button Text', 'kastell' ),
                'value'       => esc_html__('Scroll Down', 'kastell'),
                'dependency'  => array('element' => 'anchor_button', 'value' => 'yes'),
                'group'       => esc_html__( 'Mikado Settings', 'kastell' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'        => 'textfield',
                'param_name'  => 'anchor_button_section',
                'heading'     => esc_html__( 'Anchor Button Section', 'kastell' ),
                'dependency'  => array('element' => 'anchor_button', 'value' => 'yes'),
                'group'       => esc_html__( 'Mikado Settings', 'kastell' )
            )
        );
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'kastell' ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'kastell' ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'kastell' ),
				'value'       => array(
					esc_html__( 'Never', 'kastell' )        => '',
					esc_html__( 'Below 1280px', 'kastell' ) => '1280',
					esc_html__( 'Below 1024px', 'kastell' ) => '1024',
					esc_html__( 'Below 768px', 'kastell' )  => '768',
					esc_html__( 'Below 680px', 'kastell' )  => '680',
					esc_html__( 'Below 480px', 'kastell' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'kastell' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Mikado Parallax Background Image', 'kastell' ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Mikado Parallax Speed', 'kastell' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'kastell' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Mikado Parallax Section Height (px)', 'kastell' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'kastell' ),
				'value'      => array(
					esc_html__( 'Default', 'kastell' ) => '',
					esc_html__( 'Left', 'kastell' )    => 'left',
					esc_html__( 'Center', 'kastell' )  => 'center',
					esc_html__( 'Right', 'kastell' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'kastell' ),
				'value'      => array(
					esc_html__( 'Full Width', 'kastell' ) => 'full-width',
					esc_html__( 'In Grid', 'kastell' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'kastell' ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'kastell' ),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'kastell' ),
				'value'       => array(
					esc_html__( 'Never', 'kastell' )        => '',
					esc_html__( 'Below 1280px', 'kastell' ) => '1280',
					esc_html__( 'Below 1024px', 'kastell' ) => '1024',
					esc_html__( 'Below 768px', 'kastell' )  => '768',
					esc_html__( 'Below 680px', 'kastell' )  => '680',
					esc_html__( 'Below 480px', 'kastell' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'kastell' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'kastell' ),
				'value'      => array(
					esc_html__( 'Default', 'kastell' ) => '',
					esc_html__( 'Left', 'kastell' )    => 'left',
					esc_html__( 'Center', 'kastell' )  => 'center',
					esc_html__( 'Right', 'kastell' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'kastell' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( kastell_mkdf_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Mikado Enable Passepartout', 'kastell' ),
					'value'       => array_flip( kastell_mkdf_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Mikado Settings', 'kastell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Mikado Passepartout Size', 'kastell' ),
					'value'       => array(
						esc_html__( 'Tiny', 'kastell' )   => 'tiny',
						esc_html__( 'Small', 'kastell' )  => 'small',
						esc_html__( 'Normal', 'kastell' ) => 'normal',
						esc_html__( 'Large', 'kastell' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'kastell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Side Passepartout', 'kastell' ),
					'value'       => array_flip( kastell_mkdf_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'kastell' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Top Passepartout', 'kastell' ),
					'value'       => array_flip( kastell_mkdf_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'kastell' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'kastell_mkdf_vc_row_map' );
}