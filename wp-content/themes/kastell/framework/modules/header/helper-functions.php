<?php

if ( ! function_exists( 'kastell_mkdf_header_skin_class' ) ) {
	/**
	 * Function that adds header style class to body tag
	 */
	function kastell_mkdf_header_skin_class( $classes ) {
		$header_style     = kastell_mkdf_get_meta_field_intersect( 'header_style', kastell_mkdf_get_page_id() );
		$header_style_404 = kastell_mkdf_options()->getOptionValue( '404_header_style' );
		
		if ( is_404() && ! empty( $header_style_404 ) ) {
			$classes[] = 'mkdf-' . $header_style_404;
		} else if ( ! empty( $header_style ) ) {
			$classes[] = 'mkdf-' . $header_style;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kastell_mkdf_header_skin_class' );
}

if ( ! function_exists( 'kastell_mkdf_sticky_header_behaviour_class' ) ) {
	/**
	 * Function that adds header behavior class to body tag
	 */
	function kastell_mkdf_sticky_header_behaviour_class( $classes ) {
		$header_behavior = kastell_mkdf_get_meta_field_intersect( 'header_behaviour', kastell_mkdf_get_page_id() );
		
		if ( ! empty( $header_behavior ) ) {
			$classes[] = 'mkdf-' . $header_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kastell_mkdf_sticky_header_behaviour_class' );
}

if ( ! function_exists( 'kastell_mkdf_menu_dropdown_appearance' ) ) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function kastell_mkdf_menu_dropdown_appearance( $classes ) {
		$dropdown_menu_appearance = kastell_mkdf_options()->getOptionValue( 'menu_dropdown_appearance' );
		
		if ( $dropdown_menu_appearance !== 'default' ) {
			$classes[] = 'mkdf-' . $dropdown_menu_appearance;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kastell_mkdf_menu_dropdown_appearance' );
}

if ( ! function_exists( 'kastell_mkdf_header_class' ) ) {
	/**
	 * Function that adds class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header class
	 */
	function kastell_mkdf_header_class( $classes ) {
		$id = kastell_mkdf_get_page_id();
		
		$header_type = kastell_mkdf_get_meta_field_intersect( 'header_type', $id );
		
		$classes[] = 'mkdf-' . $header_type;
		
		$disable_menu_area_shadow = kastell_mkdf_get_meta_field_intersect( 'menu_area_shadow', $id ) == 'no';
		if ( $disable_menu_area_shadow ) {
			$classes[] = 'mkdf-menu-area-shadow-disable';
		}
		
		$disable_menu_area_grid_shadow = kastell_mkdf_get_meta_field_intersect( 'menu_area_in_grid_shadow', $id ) == 'no';
		if ( $disable_menu_area_grid_shadow ) {
			$classes[] = 'mkdf-menu-area-in-grid-shadow-disable';
		}
		
		$disable_menu_area_border = kastell_mkdf_get_meta_field_intersect( 'menu_area_border', $id ) == 'no';
		if ( $disable_menu_area_border ) {
			$classes[] = 'mkdf-menu-area-border-disable';
		}
		
		$disable_menu_area_grid_border = kastell_mkdf_get_meta_field_intersect( 'menu_area_in_grid_border', $id ) == 'no';
		if ( $disable_menu_area_grid_border ) {
			$classes[] = 'mkdf-menu-area-in-grid-border-disable';
		}
		
		if ( kastell_mkdf_get_meta_field_intersect( 'menu_area_in_grid', $id ) == 'yes' &&
		     kastell_mkdf_get_meta_field_intersect( 'menu_area_grid_background_color', $id ) !== '' &&
		     kastell_mkdf_get_meta_field_intersect( 'menu_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'mkdf-header-menu-area-in-grid-padding';
		}
		
		$disable_logo_area_border = kastell_mkdf_get_meta_field_intersect( 'logo_area_border', $id ) == 'no';
		if ( $disable_logo_area_border ) {
			$classes[] = 'mkdf-logo-area-border-disable';
		}
		
		$disable_logo_area_grid_border = kastell_mkdf_get_meta_field_intersect( 'logo_area_in_grid_border', $id ) == 'no';
		if ( $disable_logo_area_grid_border ) {
			$classes[] = 'mkdf-logo-area-in-grid-border-disable';
		}
		
		if ( kastell_mkdf_get_meta_field_intersect( 'logo_area_in_grid', $id ) == 'yes' &&
		     kastell_mkdf_get_meta_field_intersect( 'logo_area_grid_background_color', $id ) !== '' &&
		     kastell_mkdf_get_meta_field_intersect( 'logo_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'mkdf-header-logo-area-in-grid-padding';
		}
		
		$disable_shadow_vertical = kastell_mkdf_get_meta_field_intersect( 'vertical_header_shadow', $id ) == 'no';
		if ( $disable_shadow_vertical ) {
			$classes[] = 'mkdf-header-vertical-shadow-disable';
		}
		
		$disable_border_vertical = kastell_mkdf_get_meta_field_intersect( 'vertical_header_border', $id ) == 'no';
		if ( $disable_border_vertical ) {
			$classes[] = 'mkdf-header-vertical-border-disable';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'kastell_mkdf_header_class' );
}

if ( ! function_exists( 'kastell_mkdf_header_area_style' ) ) {
	/**
	 * Function that return styles for header area
	 */
	function kastell_mkdf_header_area_style( $style ) {
		$page_id      = kastell_mkdf_get_page_id();
		$class_prefix = kastell_mkdf_get_unique_page_class( $page_id, true );
		
		$current_style = '';
		
		$menu_area_style              = array();
		$menu_area_grid_style         = array();
		$menu_area_enable_border      = get_post_meta( $page_id, 'mkdf_menu_area_border_meta', true ) == 'yes';
		$menu_area_enable_grid_border = get_post_meta( $page_id, 'mkdf_menu_area_in_grid_border_meta', true ) == 'yes';
		$menu_area_enable_shadow      = get_post_meta( $page_id, 'mkdf_menu_area_shadow_meta', true ) == 'yes';
		$menu_area_enable_grid_shadow = get_post_meta( $page_id, 'mkdf_menu_area_in_grid_shadow_meta', true ) == 'yes';
		
		$menu_area_selector      = array( $class_prefix . ' .mkdf-page-header .mkdf-menu-area' );
		$menu_area_grid_selector = array( $class_prefix . ' .mkdf-page-header .mkdf-menu-area .mkdf-grid .mkdf-vertical-align-containers' );
		
		/* menu area style - start */
		
		$menu_area_background_color        = get_post_meta( $page_id, 'mkdf_menu_area_background_color_meta', true );
		$menu_area_background_transparency = get_post_meta( $page_id, 'mkdf_menu_area_background_transparency_meta', true );
		
		if ( $menu_area_background_transparency === '' ) {
			$menu_area_background_transparency = 1;
		}
		
		$menu_area_background_color_rgba = kastell_mkdf_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		
		if ( $menu_area_background_color_rgba !== null ) {
			$menu_area_style['background-color'] = $menu_area_background_color_rgba;
		}
		
		if ( $menu_area_enable_shadow ) {
			$menu_area_style['box-shadow'] = '0px 5px 12.09px 0.91px rgba(144, 144, 154, 0.07)';
		}
		
		if ( $menu_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'mkdf_menu_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* menu area style - end */
		
		/* menu area in grid style - start */
		
		if ( $menu_area_enable_grid_shadow ) {
			$menu_area_grid_style['box-shadow'] = '0px 5px 12.09px 0.91px rgba(144, 144, 154, 0.07)';
		}
		
		if ( $menu_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'mkdf_menu_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$menu_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$menu_area_grid_background_color        = get_post_meta( $page_id, 'mkdf_menu_area_grid_background_color_meta', true );
		$menu_area_grid_background_transparency = get_post_meta( $page_id, 'mkdf_menu_area_grid_background_transparency_meta', true );
		
		if ( $menu_area_grid_background_transparency === '' ) {
			$menu_area_grid_background_transparency = 1;
		}
		
		$menu_area_grid_background_color_rgba = kastell_mkdf_rgba_color( $menu_area_grid_background_color, $menu_area_grid_background_transparency );
		
		if ( $menu_area_grid_background_color_rgba !== null ) {
			$menu_area_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}
		
		$current_style .= kastell_mkdf_dynamic_css( $menu_area_selector, $menu_area_style );
		$current_style .= kastell_mkdf_dynamic_css( $menu_area_grid_selector, $menu_area_grid_style );
		
		/* menu area in grid style - end */
		
		/* main menu dropdown area style - start */
		
		$dropdown_top_position = get_post_meta( $page_id, 'mkdf_dropdown_top_position_meta', true );
		
		$dropdown_styles = array();
		if ( $dropdown_top_position !== '' ) {
			$dropdown_styles['top'] = kastell_mkdf_filter_suffix( $dropdown_top_position, '%' ) . '%';
		}
		
		$dropdown_selector = array( $class_prefix . ' .mkdf-page-header .mkdf-drop-down .second' );
		
		$current_style .= kastell_mkdf_dynamic_css( $dropdown_selector, $dropdown_styles );
		
		/* main menu dropdown area style - end */
		
		/* logo area style - start */
		
		$logo_area_style              = array();
		$logo_area_grid_style         = array();
		$logo_area_enable_border      = get_post_meta( $page_id, 'mkdf_logo_area_border_meta', true ) == 'yes';
		$logo_area_enable_grid_border = get_post_meta( $page_id, 'mkdf_logo_area_in_grid_border_meta', true ) == 'yes';
		
		$logo_area_selector      = array( $class_prefix . ' .mkdf-page-header .mkdf-logo-area' );
		$logo_area_grid_selector = array( $class_prefix . ' .mkdf-page-header .mkdf-logo-area .mkdf-grid .mkdf-vertical-align-containers' );
		
		$logo_area_background_color        = get_post_meta( $page_id, 'mkdf_logo_area_background_color_meta', true );
		$logo_area_background_transparency = get_post_meta( $page_id, 'mkdf_logo_area_background_transparency_meta', true );
		
		if ( $logo_area_background_transparency === '' ) {
			$logo_area_background_transparency = 1;
		}
		
		$logo_area_background_color_rgba = kastell_mkdf_rgba_color( $logo_area_background_color, $logo_area_background_transparency );
		
		if ( $logo_area_background_color_rgba !== null ) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}
		
		if ( $logo_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'mkdf_logo_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$logo_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* logo area style - end */
		
		/* logo area in grid style - start */
		
		if ( $logo_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'mkdf_logo_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$logo_area_grid_background_color        = get_post_meta( $page_id, 'mkdf_logo_area_grid_background_color_meta', true );
		$logo_area_grid_background_transparency = get_post_meta( $page_id, 'mkdf_logo_area_grid_background_transparency_meta', true );
		
		if ( $logo_area_grid_background_transparency === '' ) {
			$logo_area_grid_background_transparency = 1;
		}
		
		$logo_area_grid_background_color_rgba = kastell_mkdf_rgba_color( $logo_area_grid_background_color, $logo_area_grid_background_transparency );
		
		if ( $logo_area_grid_background_color_rgba !== null ) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}
		
		/* logo area in grid style - end */
		
		if ( ! empty( $logo_area_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $logo_area_selector, $logo_area_style );
		}
		
		if ( ! empty( $logo_area_grid_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $logo_area_grid_selector, $logo_area_grid_style );
		}
		
		$current_style = apply_filters( 'kastell_mkdf_add_header_page_custom_style', $current_style, $class_prefix, $page_id ) . $style;
		
		return $current_style;
	}
	
	add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_header_area_style' );
}