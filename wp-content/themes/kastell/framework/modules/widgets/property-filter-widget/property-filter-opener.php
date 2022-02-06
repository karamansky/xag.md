<?php

class KastellMkdfPropertyFilter extends KastellMkdfWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_property_filter_opener',
			esc_html__( 'Mikado Property Filter Opener', 'kastell' ),
			array( 'description' => esc_html__( 'Display an icon that opens the property filter. In order of for the widget to work, you need to 
			enable the fullscreen filter in property options', 'kastell' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'filter_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'kastell' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kastell' )
			)
		);
	}
	
	public function widget( $args, $instance ) {

            $filter_image = MIKADO_ASSETS_ROOT."/img/filter_icon.png";
            $filter_image_light = MIKADO_ASSETS_ROOT."/img/filter_icon_light.png";

            $search_type_class = 'mkdf-property-filter-opener';
            $styles = array();

            if ( ! empty( $instance['filter_icon_margin'] ) ) {
                $styles[] = 'margin: ' . $instance['filter_icon_margin'] . ';';
            }
		?>
		
		<a  <?php kastell_mkdf_class_attribute( $search_type_class ); ?> <?php kastell_mkdf_inline_style( $styles ); ?> href="javascript:void(0)">
            <span class="mkdf-property-filter-opener-wrapper">
                <img class="mkdf-filter-image-dark" src="<?php echo esc_url($filter_image); ?> " alt="<?php esc_attr_e('filter-image ', 'kastell');?>"/>
                <img class="mkdf-filter-image-light" src="<?php echo esc_url($filter_image_light); ?> " alt="<?php esc_attr_e('filter-image-light ', 'kastell');?>"/>
            </span>
		</a>
	<?php }
}