<?php
etc_add_custom_widget(
    array(
        'name'       => 'cms_clients_list',
        'title'      => esc_html__('CMS Clients List', 'fastway'),
        'icon'       => 'eicon-person',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-slick-slider',
        ),
        'params' => array(
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_clients_list/layout/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'section_clients',
                    'label'    => esc_html__('Clients', 'fastway'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'clients',
                            'label'   => esc_html__('Select Form', 'fastway'),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'client_name' => esc_html__( 'Client Name #1', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #2', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #3', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #4', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #5', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #6', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #7', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name #8', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'client_name',
                                    'label'       => esc_html__('Client Name', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => esc_html__( 'Client Name #1', 'fastway' )
                                ),
                                array(
                                    'name'        => 'client_link',
                                    'label'       => esc_html__('Client URL', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                    'placeholder' => esc_html__('http://client-link.com', 'fastway'),
                                ),
                                array(
                                    'name'        => 'client_image',
                                    'label'       => esc_html__('Client Logo/Image', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ client_name }}}',
                        ),
                    ),
                ),
                fastway_elementor_slick_slider_settings()
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);