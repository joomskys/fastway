<?php
/**
 * Build Single Product Gallery and Summary layout 
 *
*/
if(!function_exists('fastway_woocommerce_before_single_product_summary')){
	add_action('woocommerce_before_single_product_summary','fastway_woocommerce_before_single_product_summary', 0);
	function fastway_woocommerce_before_single_product_summary(){
		$classes = ['cms-wc-img-summary cms-single-product-gallery-summary-wraps row', fastway_get_opts('fastway_product_gallery_layout', fastway_configs('fastway_product_gallery_layout'))];
		$class = fastway_get_opts('fastway_product_gallery_thumb_position', fastway_configs('fastway_product_gallery_thumb_position'));
		echo '<div class="'.trim(implode(' ', $classes)).'">';
			echo '<div class="cms-single-product-gallery-wraps col-md-6 col-lg-4 thumbnail-'.esc_attr($class).'"><div class="cms-single-product-gallery-wraps-inner relative">';
				do_action('fastway_before_single_product_gallery');
				do_action('fastway_single_product_gallery');
				do_action('fastway_adter_single_product_gallery');
			
	}
}
// close gallery column  and open summary column
if(!function_exists('fastway_woocommerce_single_gallery_close')){
	add_action('woocommerce_before_single_product_summary', 'fastway_woocommerce_single_gallery_close', 999);
	function fastway_woocommerce_single_gallery_close(){
		echo '</div></div>';
			echo '<div class="cms-single-product-summary-wrap col-md-6 col-lg-8">';
	}
}

// close summary columns and close galery-sumary row
if(!function_exists('fastway_woocommerce_after_single_product_summary')){
	add_action('woocommerce_after_single_product_summary', 'fastway_woocommerce_after_single_product_summary', 0);
	function fastway_woocommerce_after_single_product_summary(){
			echo '</div>';
		echo '</div>';
	}
}
// Remove default sale flash and gallery 
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
// Get back sale flash and galley 
add_action('fastway_before_single_product_gallery', 'woocommerce_show_product_sale_flash', 1);
add_action('fastway_single_product_gallery', 'woocommerce_show_product_images', 1);

/**
 * Add Custom CSS class to Gallery
*/
add_filter('woocommerce_single_product_image_gallery_classes','fastway_woocommerce_single_product_image_gallery_classes');
function fastway_woocommerce_single_product_image_gallery_classes($class){
	$class[] = 'cms-product-gallery-'.fastway_get_opts('fastway_product_gallery_layout', fastway_configs('fastway_product_gallery_layout'));
	$class[] = 'cms-product-gallery-'.fastway_get_opts('fastway_product_gallery_thumb_position', fastway_configs('fastway_product_gallery_thumb_position'));
	unset($class[3]);
	return $class;
}

/**
 * Single Product 
 *
 * Gallery style with thumbnail carousel in bottom
 *
*/
if(!function_exists('fastway_wc_single_product_gallery_layout')){
	add_filter('woocommerce_single_product_carousel_options', 'fastway_wc_single_product_gallery_layout' );
    function fastway_wc_single_product_gallery_layout($options){
        $gallery_layout = fastway_get_opts('fastway_product_gallery_layout', fastway_configs('fastway_product_gallery_layout'));

        $options['prevText']     = '<span class="flex-prev-icon"></span>';
		$options['nextText']     = '<span class="flex-next-icon"></span>';

        switch ($gallery_layout) {
	        case 'vertical':
				$options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    
	        case 'horizontal':
	            $options['directionNav'] = true;
				$options['controlNav']   = false;
	            $options['sync'] = '.wc-gallery-sync';
	            break;
	    }
	    return $options;
    }
}

/**
 * Single Product Gallery
 *
 * Add thumbnail product gallery 
 *
*/
if(!function_exists('fastway_product_gallery_thumbnail_sync')){
	add_action('fastway_single_product_gallery', 'fastway_product_gallery_thumbnail_sync', 2);
	function fastway_product_gallery_thumbnail_sync($args=[]){
		global $product;
		$gallery_layout = fastway_get_opts('fastway_product_gallery_layout', fastway_configs('fastway_product_gallery_layout'));
		$product_gallery_thumb_position = fastway_get_opts('fastway_product_gallery_thumb_position', fastway_configs('fastway_product_gallery_thumb_position'));
        $args = wp_parse_args($args, [
            'gallery_layout' => $gallery_layout
        ]);
        $post_thumbnail_id = $product->get_image_id();
    	$attachment_ids = array_merge( (array)$post_thumbnail_id , $product->get_gallery_image_ids() );

        if('simple' === $args['gallery_layout'] || empty($attachment_ids[0])) return;
        $flex_class = '';

        $thumb_v_w = fastway_configs('fastway_product_gallery_thumbnail_v_w');
        $thumb_v_h = fastway_configs('fastway_product_gallery_thumbnail_v_h');

        $thumb_h_w = fastway_configs('fastway_product_gallery_thumbnail_h_w');
        $thumb_h_h = fastway_configs('fastway_product_gallery_thumbnail_h_h');

        

        switch ($args['gallery_layout']) {
	        case 'vertical':
				$thumbnail_size = $thumb_v_w.'x'.$thumb_v_h;
				$thumb_w        = $thumb_v_w;
				$thumb_h        = $thumb_v_h;
				$flex_class     = 'flex-vertical';
				$thumb_margin   = fastway_configs('fastway_product_gallery_thumbnail_space_vertical');
	            break;
	    
	        case 'horizontal':
	            $thumbnail_size = $thumb_h_w.'x'.$thumb_h_h;
	            $thumb_w = $thumb_h_w;
	            $thumb_h = $thumb_h_h;
	            $flex_class = 'flex-horizontal';
	            $thumb_margin   = fastway_configs('fastway_product_gallery_thumbnail_space_horizontal');
	            break;

	    }
	    $gallery_css_class = ['wc-gallery-sync', 'thumbnail-'.$gallery_layout, 'thumbnail-pos-'.$product_gallery_thumb_position];
    ?>
    	<div class="<?php echo trim(implode(' ', $gallery_css_class));?>" data-thumb-w="<?php echo esc_attr($thumb_w);?>" data-thumb-h="<?php echo esc_attr($thumb_h);?>" data-thumb-margin="<?php echo esc_attr($thumb_margin); ?>">
			<div class="wc-gallery-sync-slides flexslider <?php echo esc_attr($flex_class);?>">
	            <?php foreach ( $attachment_ids as $attachment_id ) { ?>
	                <div class="wc-gallery-sync-slide flex-control-thumb"><?php fastway_image_by_size(['id' => $attachment_id, 'size' => $thumbnail_size]);?></div>
	            <?php } ?>
	        </div>
	    </div>
    <?php
	}
}

// single product title
if ( ! function_exists( 'woocommerce_template_single_title' ) ) {
	/**
	 * Output the product title.
	 */
	function woocommerce_template_single_title() {
		the_title('<div class="product-title h3 text-uppercase m-b15">', '</div>');
	}
}
// single price 
add_filter('woocommerce_product_price_class', function(){
	return 'h2 m-tb10';
});

// move rating to after price
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 11);

// Wrap add-to-cart and some other button
add_action('woocommerce_single_product_summary', function(){ echo '<div class="cms-single-product-btns d-flex align-items-end">';}, 29);
add_action('woocommerce_single_product_summary', function(){ echo '</div>';}, 39);

// remove tab content title 
add_filter('woocommerce_product_description_heading', '__return_false');
add_filter('woocommerce_product_additional_information_heading', '__return_false');