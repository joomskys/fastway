<?php
if(!function_exists('fastway_cpt_team')){
	add_filter( 'cms_extra_post_types', 'fastway_cpt_team' );
	function fastway_cpt_team( $postypes ) {
		$postypes['cms-team'] = array(
			'status'     => true,
			'item_name'  => esc_html__( 'CMS Team', 'amarou' ),
			'items_name' => esc_html__( 'CMS Teams', 'amarou' ),
			'args'       => array(
				'menu_icon'          => 'dashicons-admin-users',
				'public'             => true,
				'publicly_queryable' => true,
				'supports'           => array(
					'title',
					'thumbnail',
					'editor',
				),
			),
			'labels'     => array()
		);
		return $postypes;
	}
}
if(!function_exists('fastway_cpt_tax_team')){
	//add_filter( 'cms_extra_taxonomies', 'fastway_cpt_tax_team' );
	function fastway_cpt_tax_team( $taxonomies ) {
		$taxonomies['cms-team-tag'] = array(
			'status'       => true,
			'post_type'    => array( 'cms-team' ),
			'taxonomy'     => esc_html__( 'Team Tag', 'fastway' ),
			'taxfastwaymy' => esc_html__( 'Team Tag', 'fastway' ),
			'taxonomies'   => esc_html__( 'Team Tags', 'fastway' ),
			'args'         => array(),
			'labels'       => array()
		);
		return $taxonomies;
	}
}