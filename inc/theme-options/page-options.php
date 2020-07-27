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

add_action( 'cms_post_metabox_register', 'fastway_page_options_register' );

function fastway_page_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => fastway_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'fastway' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'fastway' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'fastway' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'fastway' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'fastway' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/* Extra Post Type */

	if ( ! $metabox->isset_args( 'menu' ) ) {
		$metabox->set_args( 'menu', array(
			'opt_name'            => 'menu_option',
			'display_name'        => esc_html__( 'Menu Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'event' ) ) {
		$metabox->set_args( 'event', array(
			'opt_name'            => 'event_option',
			'display_name'        => esc_html__( 'Event Settings', 'fastway' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'Content Settings', 'fastway' ),
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'             => 'post_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-post #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'fastway' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'fastway' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'fastway' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'fastway' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'fastway' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'fastway'),
	                'right' => esc_html__('Right', 'fastway'),
	                'none'  => esc_html__('Disabled', 'fastway')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );
	// Post title
	$metabox->add_section( 'post', fastway_page_title_opts(['default' => true,'default_value' => '-1']));

	/**
	 * Config page meta options
	 *
	 */
	// Header Top
	$metabox->add_section('page', fastway_header_top_opts());
	// Main Header
	$metabox->add_section( 'page',  fastway_header_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Ontop Header
	$metabox->add_section( 'page', fastway_header_ontop_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Sticky Header
	$metabox->add_section( 'page', fastway_header_sticky_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	// Navigation
	$metabox->add_section('page', fastway_navigation_opts());
	// Attribute:  search, cart, ...
	$metabox->add_section('page', fastway_header_atts_opts(['default' => true]));
	// Page title
	$metabox->add_section( 'page', fastway_page_title_opts(['default' => true, 'default_value' => '-1']));
	// Sidebar
	$metabox->add_section('page', fastway_sidebar_opts(['default' => true, 'subsection' => false]));
	// Footer 
	$metabox->add_section('page', fastway_footer_opts(['default' => true, 'default_value'=>'-1', 'subsection' => false]));

	// Products
	$metabox->add_section( 'product',  fastway_header_opts([
			'default'       => true,
			'default_value' => '-1'
		])
	);
	$metabox->add_section( 'product', fastway_page_title_opts([
			'default' => true, 
			'default_value' => '-1'
		])
	);

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'fastway' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'fastway' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'fastway' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'fastway' ),
				'desc'  => esc_html__( 'Upload video file', 'fastway' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'fastway' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'fastway' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'fastway' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'fastway' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'fastway' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'fastway' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'fastway' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'fastway' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'fastway' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'fastway' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'fastway' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'fastway' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'fastway' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'fastway' )
			)
		)
	) );

	/**
	 * Config menu meta options
	 *
	 */
	$metabox->add_section( 'menu', array(
		'title'  => esc_html__( 'General', 'fastway' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'       => 'menu_price',
				'type'     => 'text',
				'title'    => esc_html__( 'Price', 'fastway' ),
				'validate' => 'no_html'
			),
			array(
				'id'       => 'menu_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Except', 'fastway' ),
				'validate' => 'no_html'
			),
			array(
				'id'       => 'menu_tag',
				'type'     => 'text',
				'title'    => esc_html__( 'Tag', 'fastway' ),
				'validate' => 'no_html'
			),
		)
	) );

	/**
	 * Config event meta options
	 *
	 */
	$metabox->add_section( 'event', array(
		'title'  => esc_html__( 'General', 'fastway' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'       => 'event_date',
				'type'     => 'text',
				'title'    => esc_html__( 'Date', 'fastway' ),
				'validate' => 'no_html'
			),
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'background-color'     => false,
	            'background-repeat'     => false,
	            'background-size'     => false,
	            'background-attachment'     => false,
	            'background-position'     => false,
	            'title'    => esc_html__('Background', 'fastway'),
	            'subtitle' => esc_html__('Page title background image.', 'fastway'),
	        ),
		)
	) );

}

function fastway_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( fastway_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}