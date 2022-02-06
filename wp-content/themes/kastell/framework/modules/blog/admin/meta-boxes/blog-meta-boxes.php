<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'kastell_mkdf_map_blog_meta' ) ) {
	function kastell_mkdf_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = kastell_mkdf_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'kastell' ),
				'name'  => 'blog_meta'
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'kastell' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'kastell' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'kastell' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'kastell' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'kastell' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'kastell' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'kastell' ),
					'in-grid'    => esc_html__( 'In Grid', 'kastell' ),
					'full-width' => esc_html__( 'Full Width', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'kastell' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'kastell' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'kastell' ),
					'two'   => esc_html__( '2 Columns', 'kastell' ),
					'three' => esc_html__( '3 Columns', 'kastell' ),
					'four'  => esc_html__( '4 Columns', 'kastell' ),
					'five'  => esc_html__( '5 Columns', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'kastell' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'kastell' ),
				'options'     => kastell_mkdf_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'kastell' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'kastell' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'kastell' ),
					'fixed'    => esc_html__( 'Fixed', 'kastell' ),
					'original' => esc_html__( 'Original', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'kastell' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'kastell' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'kastell' ),
					'standard'        => esc_html__( 'Standard', 'kastell' ),
					'load-more'       => esc_html__( 'Load More', 'kastell' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'kastell' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'kastell' )
				)
			)
		);
		
		kastell_mkdf_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'kastell' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'kastell' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_blog_meta', 30 );
}