<?php

if ( ! function_exists( 'kastell_mkdf_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function kastell_mkdf_woocommerce_options_map() {
		
		kastell_mkdf_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'kastell' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'kastell' ),
				'default_value' => 'mkdf-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for product listing', 'kastell' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'kastell' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'kastell' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'kastell' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'kastell' ),
				'default_value' => 'normal',
				'options'       => kastell_mkdf_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'kastell' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'kastell' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'kastell' ),
				'default_value' => 'h4',
				'options'       => kastell_mkdf_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'text',
                'name'          => 'mkdf_products_list_excerpt_length',
                'label'         => esc_html__( 'Products Excerpt Length', 'kastell' ),
                'default_value' => '80',
                'parent'        => $panel_product_list,
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'kastell' ),
				'parent'        => $panel_single_product,
				'options'       => kastell_mkdf_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'kastell' ),
				'options'       => kastell_mkdf_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'kastell' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'kastell' ),
					'3' => esc_html__( 'Three', 'kastell' ),
					'2' => esc_html__( 'Two', 'kastell' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'kastell' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'kastell' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'kastell' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'kastell' ),
				'parent'        => $panel_single_product,
				'options'       => kastell_mkdf_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'kastell' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'kastell' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'kastell' )
				),
				'parent'        => $panel_single_product
			)
		);

        kastell_mkdf_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'mkdf_woo_related_products_columns',
                'label'         => esc_html__( 'Related Products Columns', 'kastell' ),
                'default_value' => 'mkdf-woocommerce-columns-4',
                'description'   => esc_html__( 'Choose number of columns for related products on single product page', 'kastell' ),
                'options'       => array(
                    'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'kastell' ),
                    'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'kastell' )
                ),
                'parent'        => $panel_single_product,
            )
        );
	}
	
	add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_woocommerce_options_map', 21 );
}