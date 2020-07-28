<?php
/* Create Demo Data */
if(!function_exists('fastway_enable_export_mode')){
	add_filter('swa_ie_export_mode', 'fastway_enable_export_mode');
	function fastway_enable_export_mode() {
	    return true;
	}
}