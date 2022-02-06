<?php

if ( ! function_exists( 'kastell_mkdf_map_post_gallery_meta' ) ) {
	
	function kastell_mkdf_map_post_gallery_meta() {
		$gallery_post_format_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'kastell' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		kastell_mkdf_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'kastell' ),
				'description' => esc_html__( 'Choose your gallery images', 'kastell' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_gallery_meta', 21 );
}
