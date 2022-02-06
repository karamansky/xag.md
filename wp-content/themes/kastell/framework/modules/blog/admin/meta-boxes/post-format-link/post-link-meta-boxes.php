<?php

if ( ! function_exists( 'kastell_mkdf_map_post_link_meta' ) ) {
	function kastell_mkdf_map_post_link_meta() {
		$link_post_format_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'kastell' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'kastell' ),
				'description' => esc_html__( 'Enter link', 'kastell' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_link_meta', 24 );
}