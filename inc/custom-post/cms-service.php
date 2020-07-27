<?php
if(!function_exists('fastway_cpt_service')){
	add_filter( 'cms_extra_post_types', 'fastway_cpt_service' );
	function fastway_cpt_service( $postypes ) {
		$service_slug = fastway_get_opt( 'service_slug', 'cms-service' );
		$postypes['cms-service'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Service', 'fastway' ),
			'items_name' => esc_html__( 'CMS Services', 'fastway' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-share-alt',
				'supports'           => array(
					'title',
					'thumbnail',
					'editor', 
					'excerpt'
				),
				'public'             => true,
				'publicly_queryable' => true,
				'rewrite'            => array(
	                'slug'  => $service_slug
	 		 	),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}

if(!function_exists('fastway_add_tax_service')){
	add_filter( 'cms_extra_taxonomies', 'fastway_add_tax_service' );
	function fastway_add_tax_service( $taxonomies ) {
		$taxonomies['service-category'] = array(
			'status'     => true,
			'post_type'  => array( 'cms-service' ),
			'taxonomy'   => esc_html__( 'Service Category', 'fastway' ),
			'taxonomies' => esc_html__( 'Service Categories', 'fastway' ),
			'args'       => array(),
			'labels'     => array()
		);

		return $taxonomies;
	}
}