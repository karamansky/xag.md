<?php

/*** Post Settings ***/

if ( ! function_exists( 'kastell_mkdf_map_post_meta' ) ) {
	function kastell_mkdf_map_post_meta() {
		
		$post_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'kastell' ),
				'name'  => 'post-meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'kastell' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'kastell' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => kastell_mkdf_get_custom_sidebars_options( true )
			)
		);
		
		$kastell_custom_sidebars = kastell_mkdf_get_custom_sidebars();
		if ( count( $kastell_custom_sidebars ) > 0 ) {
			kastell_mkdf_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'kastell' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'kastell' ),
				'parent'      => $post_meta_box,
				'options'     => kastell_mkdf_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'kastell' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'kastell' ),
				'parent'      => $post_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'kastell' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'kastell' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'kastell' ),
					'large-width'        => esc_html__( 'Large Width', 'kastell' ),
					'large-height'       => esc_html__( 'Large Height', 'kastell' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'kastell' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'kastell' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'kastell' ),
					'large-width' => esc_html__( 'Large Width', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'kastell' ),
				'parent'        => $post_meta_box,
				'options'       => kastell_mkdf_get_yes_no_select_array()
			)
		);

		do_action('kastell_mkdf_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_post_meta', 20 );
}
