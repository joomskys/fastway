<?php
//hide default wishlist button on product archive page
add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );

//hide default wishlist button on product single page
/*add_filter( 'woosw_button_position_single', function() {
    return '0';
} );*/

// add wishlist to product archive page 
if(!function_exists('fastway_woosw_loop_product')){
	add_action('fastway_shop_loop_overlay_content_midde', 'fastway_woosw_loop_product', 9);
	function fastway_woosw_loop_product(){
		echo do_shortcode('[woosw type="link"]');
	}
}