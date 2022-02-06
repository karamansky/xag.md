<?php

if ( ! function_exists( 'kastell_mkdf_like' ) ) {
	/**
	 * Returns KastellMkdfLike instance
	 *
	 * @return KastellMkdfLike
	 */
	function kastell_mkdf_like() {
		return KastellMkdfLike::get_instance();
	}
}

function kastell_mkdf_get_like() {
	
	echo wp_kses( kastell_mkdf_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}