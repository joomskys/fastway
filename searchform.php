<?php
/**
 * Search Form
 */
$search_field_placeholder = fastway_get_opt( 'search_field_placeholder' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_html_e('Enter your keyword', 'fastway'); } ?>" name="s" class="search-field form-control bg-gray" />
    	<button type="submit" class="search-submit text-uppercase"><?php esc_html_e('Search','fastway'); ?></button>
    </div>
</form>