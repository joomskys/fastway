<?php
/**
 * removing default submit tag
 */
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/**
 * adding action with function which handles our button markup
 */
add_action('wpcf7_init', 'fastway_cf7_submit_button');
/**
 * adding out submit button tag
 */
if (!function_exists('fastway_cf7_submit_button')) {
	function fastway_cf7_submit_button() {
		wpcf7_add_form_tag('submit', 'fastway_cf7_submit_button_handler');
	}
}
/**
 * out button markup inside handler
 */
if (!function_exists('fastway_cf7_submit_button_handler')) {
	function fastway_cf7_submit_button_handler($tag) {
		$tag              = new WPCF7_FormTag($tag);
		$class            = wpcf7_form_controls_class($tag->type);
		$atts             = array();
		$atts['class']    = $tag->get_class_option($class);
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value            = isset($tag->values[0]) ? $tag->values[0] : '';
		if (empty($value)) {
			$value = esc_html__('Send', 'fastway');
		}
		$atts['type'] = 'submit';
		$atts = wpcf7_format_atts($atts);
		$html = sprintf('<button %1$s>%2$s</span></button>', $atts, $value);
		return $html;
	}
}