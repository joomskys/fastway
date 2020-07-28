<?php
// Remove support Mega Menu
if(!function_exists('fastway_enable_megamenu')){
	add_filter( 'cms_enable_megamenu', 'fastway_enable_megamenu' );
	function fastway_enable_megamenu() {
		return false;
	}
}
if(!function_exists('fastway_enable_onepage')){
	add_filter( 'cms_enable_onepage', 'fastway_enable_onepage' );
	function fastway_enable_onepage() {
		return false;
	}
}