<?php
// add inner wrap div to order review columns
if(!function_exists('fastway_woocommerce_checkout_order_review_inner_open')){
	add_action('woocommerce_checkout_order_review','fastway_woocommerce_checkout_order_review_inner_open', 0);
	function fastway_woocommerce_checkout_order_review_inner_open(){
		echo '<div class="cms-woocommerce-checkout-review-order-inner p-30 bg-accent">';
	}
}
if(!function_exists('fastway_woocommerce_checkout_order_review_inner_close')){
	add_action('woocommerce_checkout_order_review','fastway_woocommerce_checkout_order_review_inner_close', 999);
	function fastway_woocommerce_checkout_order_review_inner_close(){
		echo '</div>';
	}
}
// add heading to order review columns
if(!function_exists('fastway_woocommerce_checkout_order_review')){
	add_action('woocommerce_checkout_order_review','fastway_woocommerce_checkout_order_review', 1);
	function fastway_woocommerce_checkout_order_review(){ ?>
		<div id="cms-order-review-heading" class="h2 text-white text-uppercase"><?php esc_html_e( 'Your order', 'fastway' ); ?></div>
	<?php }
}