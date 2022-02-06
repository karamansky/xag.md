<?php

if ( ! function_exists( 'kastell_mkdf_map_general_meta' ) ) {
	function kastell_mkdf_map_general_meta() {
		
		$general_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => apply_filters( 'kastell_mkdf_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'kastell' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'kastell' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'kastell' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'kastell' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = kastell_mkdf_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'kastell' ),
				'description' => esc_html__( 'Define styles for Content area', 'kastell' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = kastell_mkdf_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'kastell' ),
						'parent' => $mkdf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'kastell' ),
						'parent'  => $mkdf_content_padding_row,
						'options' => kastell_mkdf_get_yes_no_select_array( false )
					)
				);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'kastell' ),
				'description' => esc_html__( 'Choose background color for page content', 'kastell' ),
				'parent'      => $general_meta_box
			)
		);

        kastell_mkdf_create_meta_box_field(
            array(
                'name'        => 'mkdf_page_background_image_meta',
                'type'        => 'image',
                'label'       => esc_html__( 'Background Image', 'kastell' ),
                'description' => esc_html__( 'Choose an image to be displayed in background', 'kastell' ),
                'parent'      => $general_meta_box
            )
        );
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'kastell' ),
				'parent'  => $general_meta_box,
				'options' => kastell_mkdf_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_boxed_container_meta',
						'no'  => '#mkdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'mkdf_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'kastell' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'kastell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'kastell' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'kastell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'kastell' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'kastell' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'kastell' ),
						'description'   => esc_html__( 'Choose background image attachment', 'kastell' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'kastell' ),
							'fixed'  => esc_html__( 'Fixed', 'kastell' ),
							'scroll' => esc_html__( 'Scroll', 'kastell' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'kastell' ),
				'parent'        => $general_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#mkdf_mkdf_paspartu_container_meta',
						'no'  => '#mkdf_mkdf_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_mkdf_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'hidden_property' => 'mkdf_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'kastell' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'kastell' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'kastell' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'kastell' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'kastell' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'kastell' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				kastell_mkdf_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'kastell' ),
						'options'       => kastell_mkdf_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'kastell' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'kastell' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'kastell' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'kastell' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'kastell' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'kastell' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'kastell' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'kastell' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'kastell' ),
				'parent'        => $general_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_page_transitions_container_meta',
						'no'  => '#mkdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = kastell_mkdf_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'mkdf_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				kastell_mkdf_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'kastell' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'kastell' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => kastell_mkdf_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#mkdf_page_transition_preloader_container_meta',
								'no'  => '#mkdf_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#mkdf_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = kastell_mkdf_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'mkdf_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					kastell_mkdf_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'kastell' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = kastell_mkdf_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'kastell' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'kastell' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = kastell_mkdf_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					kastell_mkdf_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'kastell' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'kastell' ),
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
					
					kastell_mkdf_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'kastell' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					kastell_mkdf_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'kastell' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'kastell' ),
							'options'     => kastell_mkdf_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'kastell' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'kastell' ),
				'parent'      => $general_meta_box,
				'options'     => kastell_mkdf_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_general_meta', 10 );
}