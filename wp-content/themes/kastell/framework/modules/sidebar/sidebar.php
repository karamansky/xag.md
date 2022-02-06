<?php

if ( ! function_exists( 'kastell_mkdf_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function kastell_mkdf_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'kastell' ),
				'description'   => esc_html__( 'Default Sidebar', 'kastell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'kastell_mkdf_register_sidebars', 1 );
}

if ( ! function_exists( 'kastell_mkdf_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates KastellMkdfSidebar object
	 */
	function kastell_mkdf_add_support_custom_sidebar() {
		add_theme_support( 'KastellMkdfSidebar' );
		
		if ( get_theme_support( 'KastellMkdfSidebar' ) ) {
			new KastellMkdfSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'kastell_mkdf_add_support_custom_sidebar' );
}