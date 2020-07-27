<?php
if(!function_exists('fastway_cpt_gallery')){
	//add_filter( 'cms_extra_post_types', 'fastway_cpt_gallery' );
	function fastway_cpt_gallery( $postypes ) {
		$gallery_slug = fastway_get_opt( 'gallery_slug', 'cms-gallery' );
		$postypes['gallery'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'Gallery', 'fastway' ),
			'items_name' => esc_html__( 'Gallery', 'fastway' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-format-gallery',
				'supports'           => array(
					'title',
					'thumbnail',
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'             => array(
	                'slug'  => $gallery_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('fastway_add_tax_gallery')){
	//add_filter( 'cms_extra_taxonomies', 'fastway_add_tax_gallery' );
	function fastway_add_tax_gallery( $taxonomies ) {
		$taxonomies['gallery-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-gallery' ),
			'taxonomy'   => esc_html__( 'Gallery Category', 'fastway' ),
			'taxonomies' => esc_html__( 'Gallery Categories', 'fastway' ),
			'args'       => array(),
			'labels'     => array()
		);

		return $taxonomies;
	}
}