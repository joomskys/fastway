<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CMS_Post_Metabox $metabox
 */

add_action( 'cms_post_metabox_register', 'fastway_service_options_register' );

function fastway_service_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'cms-service' ) ) {
		$metabox->set_args( 'cms-service', array(
			'opt_name'            => 'cms_service_option',
			'display_name'        => esc_html__( 'Service Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}
	/**
	 * Config cms-service meta options
	 *
	 */
	// Service title
	$metabox->add_section( 'cms-service', fastway_page_title_opts(['default' => true,'default_value' => '-1']));
}