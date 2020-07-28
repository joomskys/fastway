<?php
// remove support post type portfolio
if(!function_exists('fastway_remove_post_type_portfolio')){
	add_filter('cms_extra_post_types','fastway_remove_post_type_portfolio');
	function fastway_remove_post_type_portfolio($post_types){
		unset($post_types['portfolio']);
		return $post_types;
	}
}