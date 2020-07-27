<?php

if(!function_exists('fastway_woocommerce_return_to_shop')){
	add_action('woocommerce_cart_actions', 'fastway_woocommerce_return_to_shop', 0);
	function fastway_woocommerce_return_to_shop(){ ?>
		<a class="btn cms-continue-shop" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Continue Shopping', 'fastway' ); ?>
		</a>
	<?php
	}
}