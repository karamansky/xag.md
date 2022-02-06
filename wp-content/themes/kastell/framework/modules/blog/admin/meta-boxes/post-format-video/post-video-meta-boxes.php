<?php

if ( ! function_exists( 'kastell_mkdf_map_post_video_meta' ) ) {
	function kastell_mkdf_map_post_video_meta() {
		$video_post_format_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'kastell' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'kastell' ),
				'description'   => esc_html__( 'Choose video type', 'kastell' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'kastell' ),
					'self'            => esc_html__( 'Self Hosted', 'kastell' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_video_self_hosted_container',
						'self'            => '#mkdf_mkdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_video_embedded_container',
						'self'            => '#mkdf_mkdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_video_embedded_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_embedded_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_video_self_hosted_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_self_hosted_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'kastell' ),
				'description' => esc_html__( 'Enter Video URL', 'kastell' ),
				'parent'      => $mkdf_video_embedded_container,
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'kastell' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'kastell' ),
				'parent'      => $mkdf_video_self_hosted_container,
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'kastell' ),
				'description' => esc_html__( 'Enter video image', 'kastell' ),
				'parent'      => $mkdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_video_meta', 22 );
}