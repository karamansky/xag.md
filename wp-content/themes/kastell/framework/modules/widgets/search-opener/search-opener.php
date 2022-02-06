<?php

class KastellMkdfSearchOpener extends KastellMkdfWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_search_opener',
			esc_html__( 'Mikado Search Opener', 'kastell' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'kastell' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'kastell' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kastell' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'kastell' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'kastell' ),
				'options'     => kastell_mkdf_get_yes_no_select_array()
			)
		);
	}
	
	public function widget( $args, $instance ) {
		global $kastell_mkdf_options;

        $search_image = MIKADO_ASSETS_ROOT."/img/search_icon.png";
        $search_image_light = MIKADO_ASSETS_ROOT."/img/search_icon_light.png";

		$search_type_class = 'mkdf-search-opener mkdf-icon-has-hover';
		$styles            = array();
		$show_search_text  = $instance['show_label'] == 'yes' || $kastell_mkdf_options['enable_search_icon_text'] == 'yes' ? true : false;
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<a <?php kastell_mkdf_inline_style( $styles ); ?> <?php kastell_mkdf_class_attribute( $search_type_class ); ?> href="javascript:void(0)">
            <span class="mkdf-search-opener-wrapper">
                <img class="mkdf-search-image-dark" src="<?php echo esc_url($search_image); ?> " alt="<?php esc_attr_e('search-image', 'kastell');?>"/>
                <img class="mkdf-search-image-light" src="<?php echo esc_url($search_image_light); ?> " alt="<?php esc_attr_e('search-image-light', 'kastell');?>"/>
	            <?php if ( $show_search_text ) { ?>
		            <span class="mkdf-search-icon-text"><?php esc_html_e( 'Search', 'kastell' ); ?></span>
	            <?php } ?>
            </span>
		</a>
	<?php }
}