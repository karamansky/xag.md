<?php

if ( class_exists( 'KastellMkdfWidget' ) ) {
	class KastellMkdfWoocommerceDropdownCart extends KastellMkdfWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_woocommerce_dropdown_cart',
				esc_html__( 'Mikado Woocommerce Dropdown Cart', 'kastell' ),
				array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'kastell' ), )
			);

			$this->setParams();
		}

		protected function setParams() {

			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'woocommerce_dropdown_cart_margin',
					'title'       => esc_html__( 'Icon Margin', 'kastell' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'kastell' )
				)
			);
		}

		public function widget( $args, $instance ) {
			extract( $args );

			global $woocommerce;

			$icon_styles = array();

			if ( $instance['woocommerce_dropdown_cart_margin'] !== '' ) {
				$icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
			}

			$cart_image       = MIKADO_ASSETS_ROOT . "/img/cart_icon.png";
			$cart_image_light = MIKADO_ASSETS_ROOT . "/img/cart_icon_light.png";

			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			?>
            <div class="mkdf-shopping-cart-holder" <?php kastell_mkdf_inline_style( $icon_styles ) ?>>
                <div class="mkdf-shopping-cart-inner">
                    <a itemprop="url" class="mkdf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                    <span class="mkdf-cart-image">
                        <img class="mkdf-cart-image-dark" src="<?php echo esc_url( $cart_image ); ?> "
                             alt="<?php esc_attr_e( 'cart-image ', 'kastell' ); ?>"/>
                        <img class="mkdf-cart-image-light" src="<?php echo esc_url( $cart_image_light ); ?> "
                             alt="<?php esc_attr_e( 'cart-image ', 'kastell' ); ?>"/>
                        <span class="mkdf-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'kastell' ), WC()->cart->cart_contents_count ); ?></span>
                    </span>
                    </a>
                    <div class="mkdf-shopping-cart-dropdown">
                        <ul>
							<?php if ( ! $cart_is_empty ) : ?>
								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product = $cart_item['data'];
									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}
									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
									?>
                                    <li>
                                        <div class="mkdf-item-image-holder">
                                            <a itemprop="url"
                                               href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
												<?php echo wp_kses( $_product->get_image(), array(
													'img' => array(
														'src'    => true,
														'width'  => true,
														'height' => true,
														'class'  => true,
														'alt'    => true,
														'title'  => true,
														'id'     => true
													)
												) ); ?>
                                            </a>
                                        </div>
                                        <div class="mkdf-item-info-holder">
                                            <h5 itemprop="name" class="mkdf-product-title">
                                            </h5>
                                            <span class="mkdf-quantity"><?php esc_html_e( 'Quantity: ', 'kastell' );
												echo esc_html( $cart_item['quantity'] ); ?></span>
											<?php echo apply_filters( 'kastell_mkdf_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
											<?php echo apply_filters( 'kastell_mkdf_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'kastell' ) ), $cart_item_key ); ?>
                                        </div>
                                    </li>
								<?php endforeach; ?>
                                <li class="mkdf-cart-bottom">
                                    <div class="mkdf-subtotal-holder clearfix">
                                        <span class="mkdf-total"><?php esc_html_e( 'Order Total:', 'kastell' ); ?></span>
                                        <span class="mkdf-total-amount"><a itemprop="url"
                                                                           href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'kastell_mkdf_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a>

										<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
												'class' => true,
												'id'    => true
											)
										) ); ?>
									</span>
                                    </div>
                                    <div class="mkdf-btn-holder clearfix">
                                        <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                                           class="mkdf-view-cart"
                                           data-title="<?php esc_attr_e( 'VIEW BAG & CHECKOUT', 'kastell' ); ?>"><span><?php esc_html_e( 'VIEW BAG & CHECKOUT', 'kastell' ); ?></span></a>
                                    </div>
                                </li>
							<?php else : ?>
                                <li class="mkdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'kastell' ); ?></li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
			<?php
		}
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'kastell_mkdf_woocommerce_header_add_to_cart_fragment' );

	function kastell_mkdf_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		$cart_image       = MIKADO_ASSETS_ROOT . "/img/cart_icon.png";
		$cart_image_light = MIKADO_ASSETS_ROOT . "/img/cart_icon_light.png";

		ob_start();

		$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
		?>
        <div class="mkdf-shopping-cart-inner">
            <a itemprop="url" class="mkdf-header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
            <span class="mkdf-cart-image">
                <img class="mkdf-cart-image-dark" src="<?php echo esc_url( $cart_image ); ?> "
                     alt="<?php esc_attr_e( 'cart-image ', 'kastell' ); ?>"/>
                <img class="mkdf-cart-image-light" src="<?php echo esc_url( $cart_image_light ); ?> "
                     alt="<?php esc_attr_e( 'cart-image ', 'kastell' ); ?>"/>
                <span class="mkdf-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'kastell' ), WC()->cart->cart_contents_count ); ?></span>
            </span>
            </a>
            <div class="mkdf-shopping-cart-dropdown">
                <ul>
					<?php if ( ! $cart_is_empty ) : ?>
						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
							$_product = $cart_item['data'];
							// Only display if allowed
							if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
								continue;
							}
							// Get price
							$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
							?>
                            <li>
                                <div class="mkdf-item-image-holder">
                                    <a itemprop="url"
                                       href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
										<?php echo wp_kses( $_product->get_image(), array(
											'img' => array(
												'src'    => true,
												'width'  => true,
												'height' => true,
												'class'  => true,
												'alt'    => true,
												'title'  => true,
												'id'     => true
											)
										) ); ?>
                                    </a>
                                </div>
                                <div class="mkdf-item-info-holder">
                                    <h5 itemprop="name" class="mkdf-product-title">
                                        <a itemprop="url"
                                           href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'kastell_mkdf_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a>
                                    </h5>
                                    <span class="mkdf-quantity"><?php esc_html_e( 'Quantity: ', 'kastell' );
										echo esc_html( $cart_item['quantity'] ); ?></span>
									<?php echo apply_filters( 'kastell_mkdf_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
									<?php echo apply_filters( 'kastell_mkdf_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'kastell' ) ), $cart_item_key ); ?>
                                </div>
                            </li>
						<?php endforeach; ?>
                        <li class="mkdf-cart-bottom">
                            <div class="mkdf-subtotal-holder clearfix">
                                <span class="mkdf-total"><?php esc_html_e( 'Order Total:', 'kastell' ); ?></span>
                                <span class="mkdf-total-amount">
								<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
										'class' => true,
										'id'    => true
									)
								) ); ?>
							</span>
                            </div>
                            <div class="mkdf-btn-holder clearfix">
                                <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
                                   class="mkdf-view-cart"
                                   data-title="<?php esc_attr_e( 'VIEW BAG & CHECKOUT', 'kastell' ); ?>"><span><?php esc_html_e( 'VIEW BAG & CHECKOUT', 'kastell' ); ?></span></a>
                            </div>
                        </li>
					<?php else : ?>
                        <li class="mkdf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'kastell' ); ?></li>
					<?php endif; ?>
                </ul>
            </div>
        </div>

		<?php
		$fragments['div.mkdf-shopping-cart-inner'] = ob_get_clean();

		return $fragments;
	}
}

?>