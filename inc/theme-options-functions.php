<?php
/**
 * Header Top
*/
if(!function_exists('fastway_header_top_opts')){
	function fastway_header_top_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'    => false,
			'subsection' => false
		]);
		$opts = [
			'title'      => esc_html__('Header Top', 'fastway'),
		    'icon'       => 'el el-website',
		    'subsection' => $args['subsection'],
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
		            'id'      => 'phone_icon',
		            'type'    => 'text',
		            'title'   => esc_html__('Phone Icon', 'fastway'),
		            'default' => '',
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
		            'id'      => 'email_icon',
		            'type'    => 'text',
		            'title'   => esc_html__('Email Icon', 'fastway'),
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
		            'id'      => 'time_icon',
		            'type'    => 'text',
		            'title'   => esc_html__('Time Icon', 'fastway'),
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
		$opt_default = [
			'-1' => get_template_directory_uri() . '/assets/images/header-layout/h-df.jpg',
			'0'    => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
		];
		$opt_list = [
			'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
            '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
            '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
		];
		
		if($args['default']){
			$opt_lists = $opt_default +  $opt_list;
		} else {
			$opt_lists = $opt_list;
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
		            'options'  => $opt_lists,
		            'default'  => $args['default_value']
		        )
		    )
		);
		return $opts;
	}
}
/**
 * Header OnTop (Transparent)
**/
if(!function_exists('fastway_header_ontop_opts')){
	function fastway_header_ontop_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header OnTop (Transparent)', 'fastway'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'header_ontop',
		            'title'    => esc_html__('OnTop Header', 'fastway'),
		            'subtitle' => esc_html__('Header will be overlay on next content when applicable.', 'fastway'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        )
		    )
		);
	}
}
/**
 * Header Sticky
**/
if(!function_exists('fastway_header_sticky_opts')){
	function fastway_header_sticky_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '0';
		}
		return array(
		    'title'      => esc_html__('Header Sticky', 'fastway'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
		            'id'       => 'sticky_on',
		            'title'    => esc_html__('Sticky Header', 'fastway'),
		            'subtitle' => esc_html__('Header will be sticked when applicable.', 'fastway'),
		            'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
		        )
		    )
		);
	}
}
/**
 * Header Navigation 
**/
if(!function_exists('fastway_navigation_opts')){
	function fastway_navigation_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1'
		]);
		$opts = array(
		    'title'      => esc_html__('Navigation', 'fastway'),
		    'icon'       => 'el el-lines',
		    'subsection' => true,
		    'fields'     => array(
		        array(
					'id'          => 'font_menu',
					'type'        => 'typography',
					'title'       => esc_html__('Custom Google Font', 'fastway'),
					'google'      => true,
					'font-backup' => true,
					'all_styles'  => true,
					'font-style'  => false,
					'font-weight' => true,
					'text-align'  => false,
					'font-size'   => false,
					'line-height' => false,
					'color'       => false,
					'output'      => array('.primary-menu > li > a, body .primary-menu .sub-menu li a'),
					'units'       => 'px',
		        ),
		        array(
		            'id'       => 'menu_font_size',
		            'type'     => 'text',
		            'title'    => esc_html__('Font Size', 'fastway'),
		            'validate' => 'numeric',
		            'desc'     => 'Enter number',
		            'msg'      => 'Please enter number',
		            'default'  => ''
		        ),
		        array(
		            'id'       => 'menu_text_transform',
		            'type'     => 'select',
		            'title'    => esc_html__('Text Transform', 'fastway'),
		            'options'  => array(
						''           => esc_html__('Uppercase', 'fastway'),
						'capitalize' => esc_html__('Capitalize', 'fastway'),
						'lowercase'  => esc_html__('Lowercase', 'fastway'),
						'initial'    => esc_html__('Initial', 'fastway'),
						'inherit'    => esc_html__('Inherit', 'fastway'),
						'none'       => esc_html__('None', 'fastway'),
		            ),
		            'default'  => ''
		        ),
		        array(
					'title'  => esc_html__('Main Menu', 'fastway'),
					'type'   => 'section',
					'id'     => 'main_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'main_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'fastway'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Ontop Menu', 'fastway'),
					'type'   => 'section',
					'id'     => 'ontop_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'ontop_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'fastway'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        ),
		        array(
					'title'  => esc_html__('Sticky Menu', 'fastway'),
					'type'   => 'section',
					'id'     => 'sticky_menu',
					'indent' => true
		        ),
		        array(
		            'id'      => 'sticky_menu_color',
		            'type'    => 'link_color',
		            'title'   => esc_html__('Color', 'fastway'),
		            'default' => array(
		                'regular' => '',
		                'hover'   => '',
		                'active'   => '',
		            ),
		        )
		    )
		);
		return $opts;
	}
}
/**
 * Header Attribute
*/
if(!function_exists('fastway_header_atts_opts')){
	function fastway_header_atts_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => true
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '0';
		}
		// Return
		return array(
		    'title'      => esc_html__('Header Attribute', 'fastway'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		        array(
                    'title'    => esc_html__('Show Search', 'fastway'),
                    'subtitle' => esc_html__('Show/Hide search icon', 'fastway'),
                    'id'       => 'search_on',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                array(
                    'title'    => esc_html__('Show Cart', 'fastway'),
                    'subtitle' => esc_html__('Show/Hide cart icon', 'fastway'),
                    'id'       => 'cart_on',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                array(
					'title'  => esc_html__('Button Navigation', 'fastway'),
					'type'   => 'section',
					'id'     => 'button_navigation',
					'indent' => true
		        ),
		        array(
		            'id'       => 'h_btn_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Show/Hide Button', 'fastway'),
		            'options'  => $options,
                    'default'  => $default_value,
		        ),
		        array(
					'id'           => 'h_btn_text',
					'type'         => 'text',
					'title'        => esc_html__('Button Text', 'fastway'),
					'default'      => '',
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'h_btn_link_type',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Link Type', 'fastway'),
		            'options'  => array(
		                'page'  => esc_html__('Page', 'fastway'),
		                'custom'  => esc_html__('Custom', 'fastway')
		            ),
					'default'      => 'page',
					'required'     => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'    => 'h_btn_link',
		            'type'  => 'select',
		            'title' => esc_html__( 'Page Link', 'fastway' ), 
		            'data'  => 'page',
		            'args'  => array(
		                'post_type'      => 'page',
		                'posts_per_page' => -1,
		                'orderby'        => 'title',
		                'order'          => 'ASC',
		            ),
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
		        ),
		        array(
		            'id' => 'h_btn_link_custom',
		            'type' => 'text',
		            'title' => esc_html__('Custom Link', 'fastway'),
		            'default' => '',
		            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
		        ),
		        array(
		            'id'       => 'h_btn_target',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Button Target', 'fastway'),
		            'options'  => array(
		                '_self'  => esc_html__('Self', 'fastway'),
		                '_blank'  => esc_html__('Blank', 'fastway')
		            ),
		            'default'  => '_self',
		            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => '1' ),
		        )
		    )
		);
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
/**
 * Page Title
***/
if(!function_exists('fastway_page_title_opts')){
	function fastway_page_title_opts($args = []){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
		} else {
			$options = [
				'1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
		}
		// layout
		$layout_default = [
			'-1' => get_template_directory_uri() . '/assets/images/opt-default.jpg',
		];
		$layout_list = [
			'1' => get_template_directory_uri() . '/assets/images/ptitle-layout/p1.png',
		];
		
		if($args['default']){
			$layout_opts = $layout_default +  $layout_list;
		} else {
			$layout_opts = $layout_list;
		}
		// Show/Hide
		if($args['default']){
			$sh_options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Show','fastway'),
                '0'  => esc_html__('Hide','fastway'),
			];
		} else {
			$sh_options = [
				'1'  => esc_html__('Show','fastway'),
                '0'  => esc_html__('Hide','fastway'),
			];
		}
		return array(
		    'title'  => esc_html__('Page Title', 'fastway'),
		    'icon'   => 'el-icon-map-marker',
		    'fields' => array(

		        array(
		            'id'           => 'pagetitle',
		            'type'         => 'button_set',
		            'title'        => esc_html__( 'Page Title', 'fastway' ),
		            'subtitle'     => esc_html__('Show/Hide page title?', 'fastway'),
		            'options'      => $sh_options,
		            'default'      => $args['default_value'],
		        ),

		        array(
		            'id'       => 'ptitle_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'fastway'),
		            'subtitle' => esc_html__('Select a layout for page title.', 'fastway'),
		            'options'  => $layout_opts,
		            'default'  => $args['default_value'],
		            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),

		        array(
					'id'                    => 'ptitle_bg',
					'type'                  => 'background',
					'background-repeat'     => false,
					'background-size'       => false,
					'background-attachment' => false,
					'background-position'   => false,
					'title'                 => esc_html__('Background', 'fastway'),
					'subtitle'              => esc_html__('Page title background.', 'fastway'),
					'output'                => array('body #pagetitle'),
					'required'              => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
					'force_output'          => true
		        ),
		        array(
					'id'           => 'ptitle_overlay_color',
					'type'         => 'color_rgba',
					'title'        => esc_html__('Overlay Color', 'fastway'),
					'output'       => array('background-color' => 'body #pagetitle.bg-overlay:before'),
					'required'     => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
					'force_output' => true
		        ),
		        array(
					'id'          => 'ptitle_color',
					'type'        => 'color',
					'title'       => esc_html__('Title Color', 'fastway'),
					'subtitle'    => esc_html__('Page title color.', 'fastway'),
					'required'    => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		        array(
		            'id'       => 'ptitle_breadcrumb_on',
		            'type'     => 'button_set',
		            'title'    => esc_html__('Breadcrumb', 'fastway'),
		            'options'  => $sh_options,
		            'default'  => $args['default_value'],
		            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => '1' ),
		        ),
		    )
		);
	}
}
/**
 * Footer Options
**/
if(!function_exists('fastway_footer_opts')){
	function fastway_footer_opts($args=[]){
		$args = wp_parse_args($args, [
			'default'       => false,
			'default_value' => '1',
			'subsection'    => false
		]);
		if($args['default']){
			$options = [
				'-1' => esc_html__('Default','fastway'),
                '1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '-1';
		} else {
			$options = [
				'1'  => esc_html__('Yes','fastway'),
                '0'  => esc_html__('No','fastway'),
			];
			$default_value = '0';
		}
		// layout
		$layout_default = [
			'-1' => get_template_directory_uri() . '/assets/images/header-layout/h-df.jpg',
		];
		$layout_list = [
			'1' => get_template_directory_uri() . '/assets/images/footer-layout/f1.jpg',
		];
		
		if($args['default']){
			$layout_opts = $layout_default +  $layout_list;
		} else {
			$layout_opts = $layout_default;
		}
		// Colors Mode
		if($args['default']){
			$color_options = [
				'-1' => esc_html__('Default','fastway'),
                'light'  => esc_html__('Light','fastway'),
                'dark'  => esc_html__('Dark','fastway'),
			];
			$default_color_value = '-1';
		} else {
			$color_options = [
				'light'  => esc_html__('Light','fastway'),
                'dark'  => esc_html__('Dark','fastway'),
			];
			$default_color_value = 'dark';
		}
		// Return
		return array(
		    'title'      => esc_html__('Footer', 'fastway'),
		    'icon'       => 'el-icon-website',
		    'subsection' => $args['subsection'],
		    'fields'     => array(
		    	array(
		            'id'       => 'footer_layout',
		            'type'     => 'image_select',
		            'title'    => esc_html__('Layout', 'fastway'),
		            'subtitle' => esc_html__('Select a layout for upper footer area.', 'fastway'),
		            'options'  => $layout_opts,
		            'default'  => $args['default']
		        ),
		        array(
                    'title'    => esc_html__('Footer Fixed', 'fastway'),
                    'subtitle' => esc_html__('Make footer fixed at bottom?', 'fastway'),
                    'id'       => 'footer_fixed',
                    'type'     => 'button_set',
                    'options'  => $options,
                    'default'  => $default_value,
                ),
                array(
                    'title'    => esc_html__('Footer Color', 'fastway'),
                    'subtitle' => esc_html__('Choose footer color mode', 'fastway'),
                    'id'       => 'footer_mode',
                    'type'     => 'button_set',
                    'options'  => $color_options,
                    'default'  => $default_color_value,
                ),
            )
		);
	}
}