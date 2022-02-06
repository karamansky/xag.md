<?php

if ( ! function_exists( 'kastell_mkdf_map_post_audio_meta' ) ) {
	function kastell_mkdf_map_post_audio_meta() {
		$audio_post_format_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'kastell' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'kastell' ),
				'description'   => esc_html__( 'Choose audio type', 'kastell' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'kastell' ),
					'self'            => esc_html__( 'Self Hosted', 'kastell' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_audio_self_hosted_container',
						'self'            => '#mkdf_mkdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_audio_embedded_container',
						'self'            => '#mkdf_mkdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_audio_embedded_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_embedded_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_audio_self_hosted_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_self_hosted_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'kastell' ),
				'description' => esc_html__( 'Enter audio URL', 'kastell' ),
				'parent'      => $mkdf_audio_embedded_container,
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'kastell' ),
				'description' => esc_html__( 'Enter audio link', 'kastell' ),
				'parent'      => $mkdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_audio_meta', 23 );
}