<?php

if ( ! function_exists( 'kastell_mkdf_logo_options_map' ) ) {
	function kastell_mkdf_logo_options_map() {
		
		$panel_logo = kastell_mkdf_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Branding', 'kastell' )
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'kastell' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'kastell' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkdf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_logo_container = kastell_mkdf_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'kastell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'kastell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'kastell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'kastell' ),
				'parent'        => $hide_logo_container
			)
		);
		
		kastell_mkdf_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'kastell' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'kastell_mkdf_logo_options_map', 'kastell_mkdf_logo_options_map' );
}