<?php

class KastellMkdfButtonWidget extends KastellMkdfWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__( 'Mikado Button Widget', 'kastell' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'kastell' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'kastell' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'kastell' ),
					'outline' => esc_html__( 'Outline', 'kastell' ),
					'simple'  => esc_html__( 'Simple', 'kastell' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'kastell' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'kastell' ),
					'medium' => esc_html__( 'Medium', 'kastell' ),
					'large'  => esc_html__( 'Large', 'kastell' ),
					'huge'   => esc_html__( 'Huge', 'kastell' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kastell' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'kastell' ),
				'default' => esc_html__( 'Button Text', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'kastell' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'kastell' ),
				'options' => kastell_mkdf_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'kastell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'kastell' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'kastell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'kastell' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'kastell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'kastell' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kastell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'kastell' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'kastell' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'kastell' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kastell' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}