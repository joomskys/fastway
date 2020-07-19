<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Contact Form 7 Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_clients_list',
        'title' => esc_html__('Clients List', 'fastway'),
        'icon' => 'eicon-person',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(
            'jquery-slick',
            'cms-clients-list-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__( 'Layout', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__( 'Templates', 'fastway' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_clients_list/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_clients',
                    'label' => esc_html__('Clients', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'clients',
                            'label' => esc_html__('Select Form', 'fastway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'client_name' => esc_html__( 'Client Name', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                                [
                                    'client_name' => esc_html__( 'Client Name', 'fastway' ),
                                    'client_link' => esc_html__( 'http://client-link.com', 'fastway' ),
                                    'client_image' => esc_html__( 'Client Image', 'fastway' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'client_name',
                                    'label' => esc_html__('Client Name', 'fastway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default' => esc_html__( 'Client Name', 'fastway' )
                                ),
                                array(
                                    'name' => 'client_link',
                                    'label' => esc_html__('Client URL', 'fastway'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                    'placeholder' => esc_html__('http://client-link.com', 'fastway'),
                                ),
                                array(
                                    'name' => 'client_image',
                                    'label' => esc_html__('Client Logo/Image', 'fastway'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ client_name }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_styling',
                    'label' => esc_html__('Clients', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'heading_client_image',
                            'label' => esc_html__('Client Images', 'fastway'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'client_border_color',
                            'label' => esc_html__('Client Border Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'client_hover_bg_color',
                            'label' => esc_html__('Client Hover Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client .pt-image-overlay' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'thumbnail_hover_opacity',
                            'label' => esc_html__('Thumbnail Hover Opacity', 'fastway') . ' (%)',
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 0.7,
                            ],
                            'range' => [
                                'px' => [
                                    'max' => 1,
                                    'min' => 0.10,
                                    'step' => 0.01,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client:hover .pt-image-overlay' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'client_padding',
                            'label' => esc_html__('Client Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_client_name',
                            'label' => esc_html__('Client Name', 'fastway'),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'client_name_color',
                            'label' => esc_html__('Client Name Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client .pt-client-name a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'client_name_hover_color',
                            'label' => esc_html__('Client Name Hover Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pt-clients .pt-client .pt-client-name a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'client_name_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pt-clients .pt-client .pt-client-name a',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel Settings', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'slides_to_show',
                            'label' => esc_html__('Slides to Show', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                    '' => esc_html__( 'Default', 'fastway' ),
                                ] + $slides_to_show,
                        ),
                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to Scroll', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options' => [
                                    '' => esc_html__( 'Default', 'fastway' ),
                                ] + $slides_to_show,
                            'condition' => [
                                'slides_to_show!' => '1',
                            ],
                        ),
                        array(
                            'name' => 'slides_gutter',
                            'label' => esc_html__('Gutter', 'fastway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default' => 10,
                            'condition' => [
                                'slides_to_show!' => '1',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-slick-carousel .slick-list .slick-slide' => 'padding: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'fastway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'fastway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'dir',
                            'label' => esc_html__('Direction', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ltr' => esc_html__('Left', 'fastway'),
                                'rtl' => esc_html__('Right', 'fastway'),
                            ],
                            'default' => 'ltr',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);