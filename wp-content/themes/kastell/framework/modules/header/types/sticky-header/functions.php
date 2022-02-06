<?php

if ( ! function_exists( 'kastell_mkdf_sticky_header_global_js_var' ) ) {
	function kastell_mkdf_sticky_header_global_js_var( $global_variables ) {
		$global_variables['mkdfStickyHeaderHeight']             = kastell_mkdf_get_sticky_header_height();
		$global_variables['mkdfStickyHeaderTransparencyHeight'] = kastell_mkdf_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'kastell_mkdf_js_global_variables', 'kastell_mkdf_sticky_header_global_js_var' );
}

if ( ! function_exists( 'kastell_mkdf_sticky_header_per_page_js_var' ) ) {
	function kastell_mkdf_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['mkdfStickyScrollAmount'] = kastell_mkdf_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'kastell_mkdf_per_page_js_vars', 'kastell_mkdf_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'kastell_mkdf_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function kastell_mkdf_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'kastell' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'kastell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'kastell_mkdf_register_sticky_header_areas' );
}

if ( ! function_exists( 'kastell_mkdf_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function kastell_mkdf_get_sticky_menu( $additional_class = 'mkdf-default-nav' ) {
		kastell_mkdf_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'kastell_mkdf_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function kastell_mkdf_get_sticky_header( $slug = '', $module = '' ) {
        $page_id = kastell_mkdf_get_page_id();
		$parameters = array(
			'hide_logo'             => kastell_mkdf_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid' => kastell_mkdf_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false,
            'menu_area_position'    => kastell_mkdf_get_meta_field_intersect( 'set_menu_area_position', $page_id )

		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		kastell_mkdf_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'kastell_mkdf_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function kastell_mkdf_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'kastell_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = kastell_mkdf_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = kastell_mkdf_filter_px( kastell_mkdf_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'kastell_mkdf_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function kastell_mkdf_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'kastell_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = kastell_mkdf_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && kastell_mkdf_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = kastell_mkdf_filter_px( kastell_mkdf_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 70;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'kastell_mkdf_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function kastell_mkdf_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'kastell_mkdf_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = kastell_mkdf_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = kastell_mkdf_filter_px( kastell_mkdf_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}