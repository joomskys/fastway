<?php
// Register Quick Contact Widget
etc_add_custom_widget(
    array(
		'name'       => 'cms_quick_contact',
		'title'      => esc_html__( 'CMS Quick Contact', 'fastway' ),
		'icon'       => 'eicon-email',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
		'scripts'    => array(),
		'params'     => array(
            'sections' => array(
                array(
					'name'     => 'layout_section',
					'label'    => esc_html__( 'Layout', 'fastway' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
                        array(
							'name'    => 'layout',
							'label'   => esc_html__( 'Templates', 'fastway' ),
							'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
							'default' => '1',
							'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_quick_contact/layout/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
					'name'     => 'source_section',
					'label'    => esc_html__( 'Source Settings', 'fastway' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array(
						array(
							'name'        => 'heading_text',
							'label'       => esc_html__( 'Heading', 'fastway' ),
							'type'        => \Elementor\Controls_Manager::TEXT,
							'default'     => 'NEED ANY HELP!',
							'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
							'label_block' => true,
                        ),
                        array(
							'name'        => 'description_text',
							'label'       => esc_html__( 'Description', 'fastway' ),
							'type'        => \Elementor\Controls_Manager::TEXTAREA,
							'default'     => 'Find answers to frequently asked questions about Bizipress, contacts and general customer account information',
							'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
							'rows'        => 10,
							'show_label'  => false,
                        ),
                        array(
							'name'     => 'contact_list',
							'label'    => esc_html__( 'Contact Lists', 'fastway' ),
							'type'     => \Elementor\Controls_Manager::REPEATER,
							'controls' => array(
                                array(
									'name'        => 'contact_list_title',
									'label'       => esc_html__( 'Title', 'fastway' ),
									'type'        => \Elementor\Controls_Manager::TEXT,
									'placeholder' => esc_html__( 'Enter your text', 'fastway' ),
									'default'     => esc_html__( 'Enter your text', 'fastway' ),
									'label_block' => true,
                                ),
                                array(
									'name'             => 'contact_list_icon',
									'label'            => esc_html__( 'Icon', 'fastway' ),
									'type'             => \Elementor\Controls_Manager::ICONS,
									'fa4compatibility' => 'icon',
									'default'          => [],
		                        ),
                            ),
                            'default' => [
                                [
									'contact_list_title' => 'yourmail@yourdomain.com',
									'contact_list_icon'  => [
										'value'   => 'fa fa-envelope',
										'library' => 'fa-solid',
									]
                                ],
                                [
                                    'contact_list_title' => '(654) 321-7654',
                                    'contact_list_icon'  => [
										'value'   => 'fa fa-phone',
										'library' => 'fa-solid',
									]
                                ]
                            ],
                            'title_field' => '{{{ contact_list_title }}}',
                        ),
                        array(
                            'name'        => 'btn_text',
                            'label'       => esc_html__( 'Button Text', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Contact Us', 'fastway'),
                            'placeholder' => esc_html__('Contact Us', 'fastway'),
                        ),
                        array(
                            'name'        => 'btn_link',
                            'label'       => esc_html__( 'Button Link', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                            'default'     => [
                                'url' => '#',
                            ],
                        ),
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);