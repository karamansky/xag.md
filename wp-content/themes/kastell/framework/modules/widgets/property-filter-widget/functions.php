<?php


if(!function_exists('kastell_mkdf_register_property_filter_widget')) {
    /**
     * Function that register tour list widget
     */
    function kastell_mkdf_register_property_filter_widget($widgets) {
        $widgets[] = 'KastellMkdfPropertyFilter';

        return $widgets;
    }

    add_filter('kastell_mkdf_register_widgets', 'kastell_mkdf_register_property_filter_widget');
}

if ( ! function_exists( 'kastell_mkdf_get_property_filter' ) ) {


    function kastell_mkdf_get_property_filter() {
        if(kastell_mkdf_options()->getOptionValue('property_filter_enable') == 'yes') {
            kastell_mkdf_property_filter_template();
        }
    }

    add_action( 'kastell_mkdf_before_page_header', 'kastell_mkdf_get_property_filter' );
}

if ( ! function_exists( 'kastell_mkdf_property_filter_template' ) ) {
    /**
     * Loads search HTML based on search type option.
     */
    function kastell_mkdf_property_filter_template() {
        kastell_mkdf_get_module_template_part('property-filter-widget/templates/property-filter', 'widgets', '', array());
    }
}

if ( ! function_exists( 'kastell_mkdf_property_styles' ) ) {
    /**
     * Sets per page styles for header top bar
     *
     * @param $styles
     *
     * @return array
     */
    function kastell_mkdf_property_styles( $styles ) {
        $search_style = array();

        $background_image = kastell_mkdf_options()->getOptionValue('filter_background_image');
        if (!empty($background_image)) {
            $search_style['background-image'] = 'url('.$background_image.')';
            $search_style['background-position'] = 'center 0';
            $search_style['background-size'] = 'cover';
            $search_style['background-repeat'] = 'no-repeat';
        } else {
            $search_style['background-color'] = '#222';
        }

        $selector = array(
            '.mkdf-property-filter-holder'
        );

        $search_style = kastell_mkdf_dynamic_css($selector, $search_style);

        $current_style = $search_style . $styles;

        return $current_style;
    }

    add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_property_styles' );
}