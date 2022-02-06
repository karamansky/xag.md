<?php
$product = kastell_mkdf_return_woocommerce_global_variable();

if ($product->is_on_sale()) { ?>
	<span class="mkdf-<?php echo esc_attr($class_name); ?>-onsale"><?php esc_html_e('SALE', 'kastell'); ?></span>
<?php } ?>

<?php if (!$product->is_in_stock()) { ?>
	<span class="mkdf-<?php echo esc_attr($class_name); ?>-out-of-stock"><?php esc_html_e('SOLD', 'kastell'); ?></span>
<?php }

$product_image_size = 'shop_catalog';
if($image_size === 'full') {
	$product_image_size = 'full';
} else if ($image_size === 'square') {
	$product_image_size = 'kastell_mkdf_square';
} else if ($image_size === 'landscape') {
	$product_image_size = 'kastell_mkdf_landscape';
} else if ($image_size === 'portrait') {
	$product_image_size = 'kastell_mkdf_portrait';
} else if ($image_size === 'medium') {
	$product_image_size = 'medium';
} else if ($image_size === 'large') {
	$product_image_size = 'large';
} else if ($image_size === 'shop_thumbnail') {
	$product_image_size = 'shop_thumbnail';
}

if(has_post_thumbnail()) {
	the_post_thumbnail(apply_filters( 'kastell_mkdf_product_list_image_size', $product_image_size));
}