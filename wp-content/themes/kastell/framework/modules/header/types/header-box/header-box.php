<?php
namespace KastellMkdf\Modules\Header\Types;

use KastellMkdf\Modules\Header\Lib\HeaderType;

/**
 * Class that represents Header 'In The Box' layout and option
 *
 * Class HeaderBox
 */
class HeaderBox extends HeaderType {
	protected $heightOfTransparency;
	protected $heightOfCompleteTransparency;
	protected $headerHeight;
	protected $mobileHeaderHeight;
	
	/**
	 * Sets slug property which is the same as value of option in DB
	 */
	public function __construct() {
		$this->slug = 'header-box';
		
		if ( ! is_admin() ) {
			$this->menuAreaHeight     = kastell_mkdf_set_default_menu_height_for_header_types();
			$this->mobileHeaderHeight = kastell_mkdf_set_default_mobile_menu_height_for_header_types();
			
			add_action( 'wp', array( $this, 'setHeaderHeightProps' ) );
			
			add_filter( 'kastell_mkdf_js_global_variables', array( $this, 'getGlobalJSVariables' ) );
			add_filter( 'kastell_mkdf_per_page_js_vars', array( $this, 'getPerPageJSVariables' ) );
		}
	}
	
	/**
	 * Loads template file for this header type
	 *
	 * @param array $parameters associative array of variables that needs to passed to template
	 */
	public function loadTemplate( $parameters = array() ) {
		$id = kastell_mkdf_get_page_id();
		
		$parameters['menu_area_in_grid'] = kastell_mkdf_get_meta_field_intersect( 'menu_area_in_grid', $id ) == 'yes' ? true : false;
		
		$parameters = apply_filters( 'kastell_mkdf_header_box_parameters', $parameters );
		
		kastell_mkdf_get_module_template_part( 'templates/' . $this->slug, $this->moduleName . '/types/' . $this->slug, '', $parameters );
	}
	
	/**
	 * Sets header height properties after WP object is set up
	 */
	public function setHeaderHeightProps() {
		$this->heightOfTransparency         = $this->calculateHeightOfTransparency();
		$this->heightOfCompleteTransparency = $this->calculateHeightOfCompleteTransparency();
		$this->headerHeight                 = $this->calculateHeaderHeight();
		$this->mobileHeaderHeight           = $this->calculateMobileHeaderHeight();
	}
	
	/**
	 * Returns total height of transparent parts of header
	 *
	 * @return int
	 */
	public function calculateHeightOfTransparency() {
		$id                  = kastell_mkdf_get_page_id();
		$transparencyHeight  = $this->menuAreaHeight;
		$sliderExists        = get_post_meta( $id, 'mkdf_page_slider_meta', true ) !== '';
		$contentBehindHeader = get_post_meta( $id, 'mkdf_page_content_behind_header_meta', true ) === 'yes';
		
		if ( ( ( $sliderExists || $contentBehindHeader || is_404() ) && kastell_mkdf_is_top_bar_enabled() )
		     || kastell_mkdf_is_top_bar_enabled() && kastell_mkdf_is_top_bar_transparent()
		) {
			$transparencyHeight = $this->menuAreaHeight + kastell_mkdf_get_top_bar_height();
		}
		
		return $transparencyHeight;
	}
	
	/**
	 * Returns height of completely transparent header parts
	 *
	 * @return int
	 */
	public function calculateHeightOfCompleteTransparency() {
		$transparencyHeight = $this->menuAreaHeight;

        if( kastell_mkdf_is_top_bar_enabled() ) {
            $transparencyHeight = $this->menuAreaHeight + kastell_mkdf_get_top_bar_height();
        }
		
		return $transparencyHeight;
	}
	
	/**
	 * Returns total height of header
	 *
	 * @return int|string
	 */
	public function calculateHeaderHeight() {
		$headerHeight = $this->menuAreaHeight;
		if ( kastell_mkdf_is_top_bar_enabled() ) {
			$headerHeight += kastell_mkdf_get_top_bar_height();
		}
		return $headerHeight;
	}
	
	/**
	 * Returns total height of mobile header
	 *
	 * @return int|string
	 */
	public function calculateMobileHeaderHeight() {
		$mobileHeaderHeight = $this->mobileHeaderHeight;
		
		return $mobileHeaderHeight;
	}
	
	/**
	 * Returns global js variables of header
	 *
	 * @param $globalVariables
	 *
	 * @return int|string
	 */
	public function getGlobalJSVariables( $globalVariables ) {
		$globalVariables['mkdfLogoAreaHeight']     = 0;
		$globalVariables['mkdfMenuAreaHeight']     = $this->headerHeight;
		$globalVariables['mkdfMobileHeaderHeight'] = $this->mobileHeaderHeight;
		
		return $globalVariables;
	}
	
	/**
	 * Returns per page js variables of header
	 *
	 * @param $perPageVars
	 *
	 * @return int|string
	 */
	public function getPerPageJSVariables( $perPageVars ) {
		//calculate transparency height only if header has no sticky behaviour
		$header_behavior = kastell_mkdf_get_meta_field_intersect( 'header_behaviour' );
		if ( ! in_array( $header_behavior, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$perPageVars['mkdfHeaderTransparencyHeight'] = $this->headerHeight - ( kastell_mkdf_get_top_bar_height() + $this->heightOfCompleteTransparency );
		} else {
			$perPageVars['mkdfHeaderTransparencyHeight'] = 0;
		}
        $perPageVars['mkdfHeaderVerticalWidth'] = 0;
		
		return $perPageVars;
	}
}