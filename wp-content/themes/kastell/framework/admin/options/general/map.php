<?php

if ( ! function_exists( 'kastell_mkdf_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function kastell_mkdf_general_options_map() {
		
		kastell_mkdf_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'kastell' ),
				'icon'  => 'fa fa-institution'
			)
		);

		do_action('kastell_mkdf_logo_options_map');
		
		$panel_design_style = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Appearance', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'kastell' ),
				'parent'        => $panel_design_style
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'kastell' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'kastell' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'kastell' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'kastell' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'kastell' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'kastell' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'kastell' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'kastell' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'kastell' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'kastell' ),
					'100i' => esc_html__( '100 Thin Italic', 'kastell' ),
					'200'  => esc_html__( '200 Extra-Light', 'kastell' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'kastell' ),
					'300'  => esc_html__( '300 Light', 'kastell' ),
					'300i' => esc_html__( '300 Light Italic', 'kastell' ),
					'400'  => esc_html__( '400 Regular', 'kastell' ),
					'400i' => esc_html__( '400 Regular Italic', 'kastell' ),
					'500'  => esc_html__( '500 Medium', 'kastell' ),
					'500i' => esc_html__( '500 Medium Italic', 'kastell' ),
					'600'  => esc_html__( '600 Semi-Bold', 'kastell' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'kastell' ),
					'700'  => esc_html__( '700 Bold', 'kastell' ),
					'700i' => esc_html__( '700 Bold Italic', 'kastell' ),
					'800'  => esc_html__( '800 Extra-Bold', 'kastell' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'kastell' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'kastell' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'kastell' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'kastell' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'kastell' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'kastell' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'kastell' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'kastell' ),
					'greek'        => esc_html__( 'Greek', 'kastell' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'kastell' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'kastell' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'kastell' ),
				'parent'      => $panel_design_style
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'kastell' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'kastell' ),
				'parent'      => $panel_design_style
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'name'        => 'page_background_image',
                'type'        => 'image',
                'label'       => esc_html__( 'Background Image', 'kastell' ),
                'description' => esc_html__( 'Choose an image to be displayed in background', 'kastell' ),
                'parent'      => $panel_design_style
            )
        );
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'kastell' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'kastell' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'kastell' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_boxed_container"
				)
			)
		);
		
			$boxed_container = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'kastell' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'kastell' ),
						'parent'      => $boxed_container
					)
				);
				
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'kastell' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'kastell' ),
						'parent'      => $boxed_container
					)
				);
				
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'kastell' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'kastell' ),
						'parent'      => $boxed_container
					)
				);
				
				kastell_mkdf_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'kastell' ),
						'description'   => esc_html__( 'Choose background image attachment', 'kastell' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'kastell' ),
							'fixed'  => esc_html__( 'Fixed', 'kastell' ),
							'scroll' => esc_html__( 'Scroll', 'kastell' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'kastell' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_paspartu_container"
				)
			)
		);
		
			$paspartu_container = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'kastell' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'kastell' ),
						'parent'      => $paspartu_container
					)
				);
				
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'kastell' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'kastell' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				kastell_mkdf_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'kastell' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'kastell' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				kastell_mkdf_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'kastell' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'kastell' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'kastell' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'mkdf-grid-1100' => esc_html__( '1100px - default', 'kastell' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'kastell' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'kastell' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'kastell' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'kastell' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'kastell' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Behavior', 'kastell' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'kastell' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'kastell' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				kastell_mkdf_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'kastell' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'kastell' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#mkdf_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = kastell_mkdf_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					kastell_mkdf_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'kastell' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = kastell_mkdf_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'kastell' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'kastell' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = kastell_mkdf_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					kastell_mkdf_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'kastell' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'kastell' ),
								'pulse'                 => esc_html__( 'Pulse', 'kastell' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'kastell' ),
								'cube'                  => esc_html__( 'Cube', 'kastell' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'kastell' ),
								'stripes'               => esc_html__( 'Stripes', 'kastell' ),
								'wave'                  => esc_html__( 'Wave', 'kastell' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'kastell' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'kastell' ),
								'atom'                  => esc_html__( 'Atom', 'kastell' ),
								'clock'                 => esc_html__( 'Clock', 'kastell' ),
								'mitosis'               => esc_html__( 'Mitosis', 'kastell' ),
								'lines'                 => esc_html__( 'Lines', 'kastell' ),
								'fussion'               => esc_html__( 'Fussion', 'kastell' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'kastell' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'kastell' )
							)
						)
					);
					
					kastell_mkdf_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'kastell' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					kastell_mkdf_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'kastell' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'kastell' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'kastell' ),
				'parent'        => $panel_settings
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'kastell' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'kastell' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'kastell' ),
				'parent'      => $panel_custom_code
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'kastell' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'kastell' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'kastell' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'kastell' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_general_options_map', 1 );
}

if ( ! function_exists( 'kastell_mkdf_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function kastell_mkdf_page_general_style( $style ) {
		$current_style = '';
		$page_id       = kastell_mkdf_get_page_id();
		$class_prefix  = kastell_mkdf_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = kastell_mkdf_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = kastell_mkdf_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = kastell_mkdf_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = kastell_mkdf_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_color = kastell_mkdf_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = kastell_mkdf_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( kastell_mkdf_string_ends_with( $paspartu_width, '%' ) || kastell_mkdf_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.mkdf-paspartu-enabled .mkdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$paspartu_responsive_width = kastell_mkdf_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( kastell_mkdf_string_ends_with( $paspartu_responsive_width, '%' ) || kastell_mkdf_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . kastell_mkdf_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}

		$page_background_image = kastell_mkdf_get_meta_field_intersect('page_background_image');
		if($page_background_image != ''){
		    $page_background_selectors['background-color'] = 'transparent';
		    $page_background_selectors['background-image'] = 'url(' . $page_background_image . ')';
		    $page_background_selectors['background-size'] = 'cover';
            $current_style .= kastell_mkdf_dynamic_css('.mkdf-wrapper .mkdf-content', $page_background_selectors);
        }
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_page_general_style' );
}