<?php

if(!function_exists('kastell_mkdf_design_styles')) {
    /**
     * Generates general custom styles
     */
    function kastell_mkdf_design_styles() {
	    $font_family = kastell_mkdf_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && kastell_mkdf_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo kastell_mkdf_dynamic_css( $font_family_selector, array( 'font-family' => kastell_mkdf_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = kastell_mkdf_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                '.mkdf-comment-holder .mkdf-comment-text .comment-edit-link',
                '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link',
                '.mkdf-comment-holder .mkdf-comment-text .replay',
                '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
                '.mkdf-img-slider .owl-nav .owl-next:hover',
                '.mkdf-img-slider .owl-nav .owl-prev:hover',
                '.mkdf-owl-slider .owl-nav .owl-next:hover',
                '.mkdf-owl-slider .owl-nav .owl-prev:hover',
                '.mkdf-pagination-slider .owl-nav .owl-next:hover',
                '.mkdf-pagination-slider .owl-nav .owl-prev:hover',
                '.mkdf-pi-feature-slider .owl-nav .owl-next:hover',
                '.mkdf-pi-feature-slider .owl-nav .owl-prev:hover',
                '.mkdf-pl-fullscreen-slider .owl-nav .owl-next:hover',
                '.mkdf-pl-fullscreen-slider .owl-nav .owl-prev:hover',
                '.mkdf-testimonials .owl-nav .owl-next:hover',
                '.mkdf-testimonials .owl-nav .owl-prev:hover',
                '.mkdf-fullscreen-sidebar .widget a:hover',
                '.mkdf-fullscreen-sidebar .widget ul li a:hover',
                '.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
                '.mkdf-side-menu .widget a:hover',
                '.mkdf-side-menu .widget ul li a:hover',
                '.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
                '.mkdf-side-menu .widget.widget_search .input-holder button:hover',
                '.mkdf-side-menu .widget.widget_tag_cloud a:hover',
                '.wpb_widgetised_column .widget a:hover',
                'aside.mkdf-sidebar .widget a:hover',
                '.wpb_widgetised_column .widget ul li a:hover',
                'aside.mkdf-sidebar .widget ul li a:hover',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
                'aside.mkdf-sidebar .widget #wp-calendar tfoot a:hover',
                '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
                'aside.mkdf-sidebar .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
                'aside.mkdf-sidebar .widget.widget_tag_cloud a:hover',
                '.wpb_widgetised_column .widget.mkdf-blog-list-widget .mkdf-post-title a:hover',
                'aside.mkdf-sidebar .widget.mkdf-blog-list-widget .mkdf-post-title a:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu>li.menu-item-has-children>a:hover',
                'aside.mkdf-sidebar .widget.widget_nav_menu ul.menu>li.menu-item-has-children>a:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu li a:hover',
                'aside.mkdf-sidebar .widget.widget_nav_menu ul.menu li a:hover',
                '.widget a:hover',
                '.widget ul li a:hover',
                '.widget #wp-calendar tfoot a:hover',
                '.widget.widget_search .input-holder button:hover',
                '.widget.widget_tag_cloud a:hover',
                '.mkdf-property-filter-holder a.mkdf-property-filter-close',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text a',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text span',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a:hover',
                '.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-twitter-icon i',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-blog-holder article .mkdf-post-info-top>div a:hover',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
                '.mkdf-blog-pagination ul li a.mkdf-pag-active',
                '.mkdf-blog-holder.mkdf-blog-masonry article.format-quote .mkdf-post-content .mkdf-post-text .mkdf-post-text-main .mkdf-quote-author',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-quote .mkdf-post-text .mkdf-quote-author',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
                '.mkdf-single-links-pages .mkdf-single-links-pages-inner>a:hover',
                '.mkdf-single-links-pages .mkdf-single-links-pages-inner>span',
                '.mkdf-blog-holder.mkdf-blog-single article.format-quote .mkdf-post-text .mkdf-quote-author',
                '.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
                '.mkdf-blog-list-holder.mkdf-bl-simple .mkdf-bli-content .mkdf-post-info-date a:hover',
                '.mkdf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
                '.mkdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
                '.mkdf-header-vertical-sliding .mkdf-vertical-menu-holder-widget-area .widget a:hover',
                '.mkdf-header-vertical .mkdf-vertical-area-widget-holder .widget a:hover',
                '.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
                '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>a',
                '.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>h6',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li a:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul li h6:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>a',
                '.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>h6',
                '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
                '.mkdf-fullscreen-search-holder .mkdf-fullscreen-search-close',
                '.mkdf-side-menu-button-opener.opened',
                '.mkdf-side-menu-button-opener:hover',
                '.mkdf-property-info-holder .mkdf-property-info-item .mkdf-pi-feature-slider .mkdf-pi-feature-item .mkdf-pifi-content .mkdf-pifi-title',
                '.mkdf-pl-filter-holder ul li.mkdf-pl-current span',
                '.mkdf-pl-filter-holder ul li:hover span',
                '.mkdf-pl-standard-pagination ul li.mkdf-pl-pag-active a',
                '.mkdf-property-list-holder.mkdf-pl-gallery-info-overlay article .mkdf-pli-text .mkdf-pli-category-holder a',
                '.mkdf-property-list-holder.mkdf-pl-gallery-overlay-center article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-property-list-holder.mkdf-pl-gallery-overlay-inverted article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-property-list-holder.mkdf-pl-gallery-overlay article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-centered-slider .mkdf-slider-item .mkdf-video-icon-play',
                '.mkdf-countdown.mkdf-light-skin .countdown-row .countdown-section .countdown-amount',
                '.mkdf-countdown .countdown-row .countdown-section .countdown-amount',
                '.mkdf-counter-holder .mkdf-counter',
                '.mkdf-project-info-item .mkdf-pi-inner .mkdf-pi-title',
                '.mkdf-section-title-holder .mkdf-st-subtitle',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener .social_share',
                '.mkdf-team.main-info-below-image .mkdf-team-social-wrapp .mkdf-icon-shortcode span:hover',
                '.mkdf-video-button-holder .mkdf-video-icon-play',
                '.mkdf-twitter-list-holder .mkdf-twitter-icon',
                '.mkdf-twitter-list-holder .mkdf-tweet-text a:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-profile a:hover'
            );

            $woo_color_selector = array();
            if(kastell_mkdf_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-pagination .page-numbers li a.current',
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span.current',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .woocommerce-product-rating .star-rating',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.mkdf-ips.mkdf-ips-light .mkdf-ips-item-content.active .mkdf-ips-item-link'
	        );

            $background_color_selector = array(
                '.mkdf-st-loader .pulse',
                '.mkdf-st-loader .double_pulse .double-bounce1',
                '.mkdf-st-loader .double_pulse .double-bounce2',
                '.mkdf-st-loader .cube',
                '.mkdf-st-loader .rotating_cubes .cube1',
                '.mkdf-st-loader .rotating_cubes .cube2',
                '.mkdf-st-loader .stripes>div',
                '.mkdf-st-loader .wave>div',
                '.mkdf-st-loader .two_rotating_circles .dot1',
                '.mkdf-st-loader .two_rotating_circles .dot2',
                '.mkdf-st-loader .five_rotating_circles .container1>div',
                '.mkdf-st-loader .five_rotating_circles .container2>div',
                '.mkdf-st-loader .five_rotating_circles .container3>div',
                '.mkdf-st-loader .atom .ball-1:before',
                '.mkdf-st-loader .atom .ball-2:before',
                '.mkdf-st-loader .atom .ball-3:before',
                '.mkdf-st-loader .atom .ball-4:before',
                '.mkdf-st-loader .clock .ball:before',
                '.mkdf-st-loader .mitosis .ball',
                '.mkdf-st-loader .lines .line1',
                '.mkdf-st-loader .lines .line2',
                '.mkdf-st-loader .lines .line3',
                '.mkdf-st-loader .lines .line4',
                '.mkdf-st-loader .fussion .ball',
                '.mkdf-st-loader .fussion .ball-1',
                '.mkdf-st-loader .fussion .ball-2',
                '.mkdf-st-loader .fussion .ball-3',
                '.mkdf-st-loader .fussion .ball-4',
                '.mkdf-st-loader .wave_circles .ball',
                '.mkdf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '.mkdf-submit-wrapper',
                '.mkdf-img-slider .owl-dots .owl-dot.active span',
                '.mkdf-img-slider .owl-dots .owl-dot:hover span',
                '.mkdf-owl-slider .owl-dots .owl-dot.active span',
                '.mkdf-owl-slider .owl-dots .owl-dot:hover span',
                '.mkdf-pagination-slider .owl-dots .owl-dot.active span',
                '.mkdf-pagination-slider .owl-dots .owl-dot:hover span',
                '.mkdf-pi-feature-slider .owl-dots .owl-dot.active span',
                '.mkdf-pi-feature-slider .owl-dots .owl-dot:hover span',
                '.mkdf-pl-fullscreen-slider .owl-dots .owl-dot.active span',
                '.mkdf-pl-fullscreen-slider .owl-dots .owl-dot:hover span',
                '.mkdf-testimonials .owl-dots .owl-dot.active span',
                '.mkdf-testimonials .owl-dots .owl-dot:hover span',
                '#mkdf-back-to-top>span',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu>li.menu-item-has-children>ul.sub-menu>li>a:before',
                'aside.mkdf-sidebar .widget.widget_nav_menu ul.menu>li.menu-item-has-children>ul.sub-menu>li>a:before',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mkdf-blog-holder.mkdf-blog-masonry article.format-quote .mkdf-post-content .mkdf-post-text .mkdf-post-text-main .mkdf-quote-author:before',
                '.mkdf-blog-holder.mkdf-blog-standard article.format-quote .mkdf-post-text .mkdf-quote-author:before',
                '.mkdf-blog-holder.mkdf-blog-single article.format-quote .mkdf-post-text .mkdf-quote-author:before',
                '.mkdf-drop-down .second .inner ul li a .item_outer:before',
                '.mkdf-header-vertical-sliding nav.mkdf-fullscreen-menu ul li a:before',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
                '.mkdf-btn.mkdf-btn-solid',
                '.mkdf-icon-shortcode.mkdf-circle',
                '.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle',
                '.mkdf-icon-shortcode.mkdf-square',
                '.mkdf-process-holder .mkdf-process-circle',
                '.mkdf-process-holder .mkdf-process-line',
                '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
                '.mkdf-project-info-item.mkdf-pii-separator-enabled .mkdf-pi-title:after',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a'
            );

            $woo_background_color_selector = array();
            if(kastell_mkdf_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .mkdf-content a.added_to_cart',
                    '.woocommerce-page .mkdf-content a.button',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    '.woocommerce-page .mkdf-content input[type=submit]',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    'div.woocommerce input[type=submit]',
                    '.woocommerce .mkdf-onsale',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
                '.mkdf-st-loader .pulse_circles .ball',
                '#mkdf-back-to-top>span',
                '.mkdf-btn.mkdf-btn-outline',
            );

            echo kastell_mkdf_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo kastell_mkdf_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo kastell_mkdf_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo kastell_mkdf_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = kastell_mkdf_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.mkdf-content'
		    );
		    echo kastell_mkdf_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = kastell_mkdf_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo kastell_mkdf_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo kastell_mkdf_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( kastell_mkdf_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . kastell_mkdf_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo kastell_mkdf_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('kastell_mkdf_style_dynamic', 'kastell_mkdf_design_styles');
}

if ( ! function_exists( 'kastell_mkdf_content_styles' ) ) {
	function kastell_mkdf_content_styles() {
		$content_style = array();
		
		$padding_top = kastell_mkdf_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = kastell_mkdf_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo kastell_mkdf_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = kastell_mkdf_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = kastell_mkdf_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo kastell_mkdf_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_content_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h1_styles' ) ) {
	function kastell_mkdf_h1_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h1_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h2_styles' ) ) {
	function kastell_mkdf_h2_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h2_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h3_styles' ) ) {
	function kastell_mkdf_h3_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h3_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h4_styles' ) ) {
	function kastell_mkdf_h4_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h4_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h5_styles' ) ) {
	function kastell_mkdf_h5_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h5_styles' );
}

if ( ! function_exists( 'kastell_mkdf_h6_styles' ) ) {
	function kastell_mkdf_h6_styles() {
		$margin_top    = kastell_mkdf_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = kastell_mkdf_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = kastell_mkdf_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = kastell_mkdf_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = kastell_mkdf_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_h6_styles' );
}

if ( ! function_exists( 'kastell_mkdf_text_styles' ) ) {
	function kastell_mkdf_text_styles() {
		$item_styles = kastell_mkdf_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo kastell_mkdf_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_text_styles' );
}

if ( ! function_exists( 'kastell_mkdf_link_styles' ) ) {
	function kastell_mkdf_link_styles() {
		$link_styles      = array();
		$link_color       = kastell_mkdf_options()->getOptionValue( 'link_color' );
		$link_font_style  = kastell_mkdf_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = kastell_mkdf_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = kastell_mkdf_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo kastell_mkdf_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_link_styles' );
}

if ( ! function_exists( 'kastell_mkdf_link_hover_styles' ) ) {
	function kastell_mkdf_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = kastell_mkdf_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = kastell_mkdf_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo kastell_mkdf_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo kastell_mkdf_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'kastell_mkdf_style_dynamic', 'kastell_mkdf_link_hover_styles' );
}

if ( ! function_exists( 'kastell_mkdf_smooth_page_transition_styles' ) ) {
	function kastell_mkdf_smooth_page_transition_styles( $style ) {
		$id            = kastell_mkdf_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = kastell_mkdf_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = kastell_mkdf_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= kastell_mkdf_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'kastell_mkdf_add_page_custom_style', 'kastell_mkdf_smooth_page_transition_styles' );
}