<?php

if ( ! function_exists( 'kastell_mkdf_map_post_quote_meta' ) ) {
	function kastell_mkdf_map_post_quote_meta() {
		$quote_post_format_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'kastell' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'kastell' ),
				'description' => esc_html__( 'Enter Quote text', 'kastell' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'kastell' ),
				'description' => esc_html__( 'Enter Quote author', 'kastell' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_quote_meta', 25 );
}