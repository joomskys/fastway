<?php
/**
 * Header Top
*/
if(!function_exists('fastway_header_top_opts')){
	function fastway_header_top_opts($args=[]){
		$args = wp_parse_args($args, [
			'default' => false
		]);
		$opts = [
			'title'      => esc_html__('Header Top', 'fastway'),
		    'icon'       => 'el el-website',
		    'subsection' => true,
		    'fields'     => array(
		        array(
					'id'           => 'header_top_short_text',
					'type'         => 'textarea',
					'title'        => esc_html__('Short Text', 'fastway'),
					'validate'     => 'html_custom',
					'default'      => '',
					'allowed_html' => array(
		                'a' => array(
		                    'href' => array(),
		                    'title' => array(),
		                    'class' => array(),
		                ),
		                'br' => array(),
		                'em' => array(),
		                'b' => array(),
		                'strong' => array(),
		                'span' => array(),
		                'label' => array(),
		                'p' => array(),
		                'div' => array(
		                    'class' => array()
		                ),
		                'h1' => array(
		                    'class' => array()
		                ),
		                'h2' => array(
		                    'class' => array()
		                ),
		                'h3' => array(
		                    'class' => array()
		                ),
		                'h4' => array(
		                    'class' => array()
		                ),
		                'h5' => array(
		                    'class' => array()
		                ),
		                'h6' => array(
		                    'class' => array()
		                ),
		                'ul' => array(
		                    'class' => array()
		                ),
		                'li' => array(),
		            )
		        ),
		        array(
		            'title' => esc_html__('Quick Contact', 'fastway'),
		            'type'  => 'section',
		            'id' => 'header_contact',
		            'indent' => true,
		        ),
		        array(
		            'id'      => 'phone_label',
		            'type'    => 'text',
		            'title'   => esc_html__('Phone Label', 'fastway'),
		            'default' => '',
		        ),
		        array(
		            'id'      => 'phone_number',
		            'type'    => 'text',
		            'title'   => esc_html__('Phone Number', 'fastway'),
		            'default' => '',
		        ),
		        array(
		            'id'      => 'email_label',
		            'type'    => 'text',
		            'title'   => esc_html__('Email Label', 'fastway'),
		            'default' => '',
		        ),
		        array(
		            'id'      => 'email_address',
		            'type'    => 'text',
		            'title'   => esc_html__('Email Address', 'fastway'),
		            'default' => '',
		        ),
		        array(
		            'id'      => 'time_label',
		            'type'    => 'text',
		            'title'   => esc_html__('Time Label', 'fastway'),
		            'default' => '',
		        ),
		        array(
		            'id'      => 'time',
		            'type'    => 'text',
		            'title'   => esc_html__('Time', 'fastway'),
		            'default' => '',
		        ),
		        array(
					'title'  => esc_html__('Social List', 'fastway'),
					'type'   => 'section',
					'id'     => 'header_top_social',
					'indent' => true,
		        ),
		        fastway_social_list_opts(['param_name' => 't_social_list'])
		    )
		];
		return $opts;
	}
}

/**
 * Header 
**/
if(!function_exists('fastway_header_opts')){
	function fastway_header_opts($args=[]){
		$args = wp_parse_args($args,[
			'default'       => false,
			'default_value' => '1'
		]);
		$opt_list = [
			'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
            '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
            '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
		];
		if($args['default']){
			$opt_list = array_merge(
				[
					'-1'  => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
				],
				$opt_list
			);
		}

		$opts = array(
		    'title'  => esc_html__('Header', 'fastway'),
		    'icon'   => 'el-icon-website',
		    'fields' => array(
		        array(
		            'id'       => 'header_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'fastway'),
		            'subtitle' => esc_html__('Select a layout for header.', 'fastway'),
		            'options'  => $opt_list,
		            'default'  => $args['default_value']
		        )
		    )
		);
		return $opts;
	}
}
/**
 * Social list
**/
if(!function_exists('fastway_social_list_opts')){
	function fastway_social_list_opts($args=[]){
		$args = wp_parse_args($args,[
			'param_name' => 'social_list'
		]);
		$opts = array(
            'id'      => $args['param_name'],
            'type'    => 'sorter',
//            'title'   => 'Social',
            'desc'    => 'Choose which social networks are displayed and edit where they link to.',
            'options' => array(
                'enabled'  => array(
                    'facebook'      => 'Facebook',
                    'twitter'       => 'Twitter',
                    'linkedin'      => 'Linkedin',
                    'instagram'     => 'Instagram',
                ),
                'disabled' => array(
                	'google-plus'   => 'Google',
                    'tripadvisor'   => 'Tripadvisor',
                    'youtube'       => 'Youtube',
                    'vimeo'         => 'Vimeo',
                    'tumblr'        => 'Tumblr',
                    'pinterest'     => 'Pinterest',
                    'yelp'          => 'Yelp',
                    'skype'         => 'Skype',
                )
            ),
        );
        return $opts;
	}
}