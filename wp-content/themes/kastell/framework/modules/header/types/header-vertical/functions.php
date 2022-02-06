<?php

if ( ! function_exists( 'kastell_mkdf_register_header_vertical_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function kastell_mkdf_register_header_vertical_type( $header_types ) {
		$header_type = array(
			'header-vertical' => 'KastellMkdf\Modules\Header\Types\HeaderVertical'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'kastell_mkdf_init_register_header_vertical_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function kastell_mkdf_init_register_header_vertical_type() {
		add_filter( 'kastell_mkdf_register_header_type_class', 'kastell_mkdf_register_header_vertical_type' );
	}
	
	add_action( 'kastell_mkdf_before_header_function_init', 'kastell_mkdf_init_register_header_vertical_type' );
}

if ( ! function_exists( 'kastell_mkdf_include_header_vertical_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function kastell_mkdf_include_header_vertical_menu( $menus ) {
		$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'kastell' );
		
		return $menus;
	}
	
	if ( kastell_mkdf_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_filter( 'kastell_mkdf_register_headers_menu', 'kastell_mkdf_include_header_vertical_menu' );
	}
}

if ( ! function_exists( 'kastell_mkdf_register_header_vertical_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function kastell_mkdf_register_header_vertical_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-vertical-area',
				'name'          => esc_html__( 'Header Vertical Widget Area', 'kastell' ),
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'kastell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-vertical-area-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( kastell_mkdf_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_action( 'widgets_init', 'kastell_mkdf_register_header_vertical_widget_areas' );
	}
}

if ( ! function_exists( 'kastell_mkdf_get_header_vertical_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function kastell_mkdf_get_header_vertical_widget_areas() {
		$page_id                            = kastell_mkdf_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'mkdf_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'mkdf-vertical-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'mkdf-vertical-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'kastell_mkdf_get_header_vertical_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function kastell_mkdf_get_header_vertical_main_menu() {
		kastell_mkdf_get_module_template_part( 'templates/vertical-navigation', 'header/types/header-vertical' );
	}
}

if ( ! function_exists( 'kastell_mkdf_vertical_header_holder_class' ) ) {
	/**
	 * Return holder class
	 */
	function kastell_mkdf_vertical_header_holder_class() {
		$center_content = kastell_mkdf_get_meta_field_intersect( 'vertical_header_center_content', kastell_mkdf_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'mkdf-vertical-alignment-center' : 'mkdf-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'kastell_mkdf_header_vertical_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function kastell_mkdf_header_vertical_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.mkdf-header-vertical .mkdf-vertical-area-background' );
		
		$vertical_header_background_color  = get_post_meta( $page_id, 'mkdf_vertical_header_background_color_meta', true );
		$disable_vertical_background_image = get_post_meta( $page_id, 'mkdf_disable_vertical_header_background_image_meta', true );
		$vertical_background_image         = get_post_meta( $page_id, 'mkdf_vertical_header_background_image_meta', true );
		$vertical_shadow                   = get_post_meta( $page_id, 'mkdf_vertical_header_shadow_meta', true );
		$vertical_border                   = get_post_meta( $page_id, 'mkdf_vertical_header_border_meta', true );
		
		if ( ! empty( $vertical_header_background_color ) ) {
			$header_area_style['background-color'] = $vertical_header_background_color;
		}
		
		if ( $disable_vertical_background_image == 'yes' ) {
			$header_area_style['background-image'] = 'none';
		} elseif ( $vertical_background_image !== '' ) {
			$header_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
		}
		
		if ( $vertical_shadow == 'yes' ) {
			$header_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ( $vertical_border == 'yes' ) {
			$header_border_color = get_post_meta( $page_id, 'mkdf_vertical_header_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$header_area_style['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'kastell_mkdf_add_header_page_custom_style', 'kastell_mkdf_header_vertical_per_page_custom_styles', 10, 3 );
}