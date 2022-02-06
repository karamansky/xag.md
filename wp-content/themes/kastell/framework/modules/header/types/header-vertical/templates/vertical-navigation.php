<?php do_action('kastell_mkdf_before_top_navigation'); ?>
<div class="mkdf-vertical-menu-outer">
	<nav class="mkdf-vertical-menu mkdf-vertical-dropdown-on-click">
		<?php
			wp_nav_menu(array(
				'theme_location'  => 'vertical-navigation',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'fallback_cb'     => 'top_navigation_fallback',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'walker'          => new KastellMkdfTopNavigationWalker()
			));
		?>
	</nav>
</div>
<?php do_action('kastell_mkdf_after_top_navigation'); ?>