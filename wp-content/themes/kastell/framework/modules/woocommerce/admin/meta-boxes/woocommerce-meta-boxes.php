<?php

if(!function_exists('kastell_mkdf_map_woocommerce_meta')) {
    function kastell_mkdf_map_woocommerce_meta() {
        $woocommerce_meta_box = kastell_mkdf_create_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'kastell'),
                'name' => 'woo_product_meta'
            )
        );

        kastell_mkdf_create_meta_box_field(array(
            'name'        => 'mkdf_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'kastell'),
            'description' => esc_html__('Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'kastell'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'mkdf-woo-image-normal-width' => esc_html__('Default', 'kastell'),
                'mkdf-woo-image-large-width'  => esc_html__('Large Width', 'kastell')
            )
        ));

        kastell_mkdf_create_meta_box_field(
            array(
                'name'          => 'mkdf_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'kastell'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'kastell'),
                'parent'        => $woocommerce_meta_box,
                'options'       => kastell_mkdf_get_yes_no_select_array()
            )
        );

        kastell_mkdf_create_meta_box_field(array(
            'name'        => 'mkdf_single_product_new_meta',
            'type'        => 'select',
            'label'       => esc_html__('Enable New Product Mark', 'kastell'),
            'description' => esc_html__('Enabling this option will show new product mark on your product lists and product single', 'kastell'),
            'parent'      => $woocommerce_meta_box,
            'options'     => kastell_mkdf_get_yes_no_select_array(false)
        ));
    }
	
    add_action('kastell_mkdf_meta_boxes_map', 'kastell_mkdf_map_woocommerce_meta', 99);
}