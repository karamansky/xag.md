<?php

class KastellMkdfSeparatorWidget extends KastellMkdfWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_separator_widget',
			esc_html__( 'Mikado Separator Widget', 'kastell' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'kastell' ) )
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
					'normal'     => esc_html__( 'Normal', 'kastell' ),
					'full-width' => esc_html__( 'Full Width', 'kastell' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'kastell' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'kastell' ),
					'left'   => esc_html__( 'Left', 'kastell' ),
					'right'  => esc_html__( 'Right', 'kastell' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'kastell' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'kastell' ),
					'dashed' => esc_html__( 'Dashed', 'kastell' ),
					'dotted' => esc_html__( 'Dotted', 'kastell' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'kastell' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'kastell' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget mkdf-separator-widget">';
			echo do_shortcode( "[mkdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}