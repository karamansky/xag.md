<?php do_action('kastell_mkdf_before_page_header'); ?>

<aside class="mkdf-vertical-menu-area mkdf-with-scroll <?php echo esc_attr($holder_class); ?>">
	<div class="mkdf-vertical-menu-area-inner">
		<div class="mkdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			kastell_mkdf_get_logo();
		} ?>
		<?php kastell_mkdf_get_header_vertical_main_menu(); ?>
		<div class="mkdf-vertical-area-widget-holder">
			<?php kastell_mkdf_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('kastell_mkdf_after_page_header'); ?>