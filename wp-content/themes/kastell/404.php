<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * kastell_mkdf_header_meta hook
	 *
	 * @see kastell_mkdf_header_meta() - hooked with 10
	 * @see kastell_mkdf_user_scalable_meta - hooked with 10
	 * @see mkdf_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'kastell_mkdf_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * kastell_mkdf_after_body_tag hook
	 *
	 * @see kastell_mkdf_get_side_area() - hooked with 10
	 * @see kastell_mkdf_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'kastell_mkdf_after_body_tag' ); ?>
	
	<div class="mkdf-wrapper mkdf-404-page">
		<div class="mkdf-wrapper-inner">
            <?php
            /**
             * kastell_mkdf_after_wrapper_inner hook
             *
             * @see kastell_mkdf_get_header() - hooked with 10
             * @see kastell_mkdf_get_mobile_header() - hooked with 20
             * @see kastell_mkdf_back_to_top_button() - hooked with 30
             * @see kastell_mkdf_get_header_minimal_full_screen_menu() - hooked with 40
             * @see kastell_mkdf_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'kastell_mkdf_after_wrapper_inner' );

            do_action('kastell_mkdf_before_main_content'); ?>
			
			<div class="mkdf-content" <?php kastell_mkdf_content_elem_style_attr(); ?>>
				<div class="mkdf-content-inner">
					<div class="mkdf-page-not-found">
						<?php
						$mkdf_title_image_404 = kastell_mkdf_options()->getOptionValue( '404_page_title_image' );
						$mkdf_title_404       = kastell_mkdf_options()->getOptionValue( '404_title' );
						$mkdf_subtitle_404    = kastell_mkdf_options()->getOptionValue( '404_subtitle' );
						$mkdf_text_404        = kastell_mkdf_options()->getOptionValue( '404_text' );
						$mkdf_button_label    = kastell_mkdf_options()->getOptionValue( '404_back_to_home' );
						$mkdf_button_style    = kastell_mkdf_options()->getOptionValue( '404_button_style' );
						
						if ( ! empty( $mkdf_title_image_404 ) ) { ?>
							<div class="mkdf-404-title-image">
								<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'kastell' ); ?>" />
							</div>
						<?php } ?>
						
						<h1 class="mkdf-404-title">
							<?php if ( ! empty( $mkdf_title_404 ) ) {
								echo esc_html( $mkdf_title_404 );
							} else {
								esc_html_e( '404', 'kastell' );
							} ?>
						</h1>
						
						<h3 class="mkdf-404-subtitle">
							<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
								echo esc_html( $mkdf_subtitle_404 );
							} else {
								esc_html_e( 'Page not found', 'kastell' );
							} ?>
						</h3>
						
						<p class="mkdf-404-text">
							<?php if ( ! empty( $mkdf_text_404 ) ) {
								echo esc_html( $mkdf_text_404 );
							} else {
								esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'kastell' );
							} ?>
						</p>
						
						<?php
						$mkdf_params           = array();
						$mkdf_params['text']   = ! empty( $mkdf_button_label ) ? $mkdf_button_label : esc_html__( 'Back to home', 'kastell' );
						$mkdf_params['link']   = esc_url( home_url( '/' ) );
						$mkdf_params['target'] = '_self';
						$mkdf_params['size']   = 'large';
						$mkdf_params['fe_icon']   = 'arrow_carrot-2right';
						$mkdf_params['icon_pack']   = 'font_elegant';


						if ( $mkdf_button_style == 'light-style' ) {
							$mkdf_params['custom_class'] = 'mkdf-btn-light-style';
						}
						
						echo kastell_mkdf_execute_shortcode( 'mkdf_button', $mkdf_params ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php get_footer(); ?>
</body>
</html>