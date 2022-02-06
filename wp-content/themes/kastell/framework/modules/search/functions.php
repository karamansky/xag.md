<?php

if ( ! function_exists( 'kastell_mkdf_include_search_types_before_load' ) ) {
    /**
     * Load's all header types before load files by going through all folders that are placed directly in header types folder.
     * Functions from this files before-load are used to set all hooks and variables before global options map are init
     */
    function kastell_mkdf_include_search_types_before_load() {
        foreach ( glob( MIKADO_FRAMEWORK_SEARCH_ROOT_DIR . '/types/*/before-load.php' ) as $module_load ) {
            include_once $module_load;
        }
    }

    add_action( 'kastell_mkdf_options_map', 'kastell_mkdf_include_search_types_before_load', 1 ); // 1 is set to just be before header option map init
}

if ( ! function_exists( 'kastell_mkdf_load_search' ) ) {
	function kastell_mkdf_load_search() {
		$search_type_meta = kastell_mkdf_options()->getOptionValue( 'search_type' );
		$search_type      = ! empty( $search_type_meta ) ? $search_type_meta : 'fullscreen';
		
		if ( kastell_mkdf_active_widget( false, false, 'mkdf_search_opener' ) ) {
			include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'kastell_mkdf_load_search' );
}

if ( ! function_exists( 'kastell_mkdf_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function kastell_mkdf_get_holder_params_search() {
		$params_list = array();
		
		$layout = kastell_mkdf_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'mkdf-container';
			$params_list['inner']  = 'mkdf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'mkdf-full-width';
			$params_list['inner']  = 'mkdf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'kastell_mkdf_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'kastell_mkdf_get_search_page' ) ) {
	function kastell_mkdf_get_search_page() {
		$sidebar_layout = kastell_mkdf_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		kastell_mkdf_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'kastell_mkdf_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function kastell_mkdf_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'kastell_mkdf_search_page_path', 'templates/page' );
		$type   = apply_filters( 'kastell_mkdf_search_page_layout', 'default' );
		$module = apply_filters( 'kastell_mkdf_search_page_module', 'search' );
		$plugin = apply_filters( 'kastell_mkdf_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => kastell_mkdf_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'kastell_mkdf_search_page_params', $params );
		
		kastell_mkdf_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}