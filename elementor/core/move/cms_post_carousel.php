<?php
// Post term options
$post_term_options = etc_get_grid_term_options('post');

// Register Post Carousel Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_post_carousel',
        'title' => esc_html__( 'Post Carousel', 'fastway' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'jquery-slick',
            'cms-post-carousel-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__( 'Layout', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'prefix_class' => 'cms-post-carousel-layout',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__( 'Templates', 'fastway' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_post_carousel/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'thumbnail',
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',
                        ),
                        array(
                            'name' => 'source',
                            'label' => esc_html__( 'Select Categories', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options' => $post_term_options,
                        ),
                        array(
                            'name' => 'orderby',
                            'label' => esc_html__( 'Order By', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date' => esc_html__( 'Date', 'fastway' ),
                                'ID' => esc_html__( 'ID', 'fastway' ),
                                'author' => esc_html__( 'Author', 'fastway' ),
                                'title' => esc_html__( 'Title', 'fastway' ),
                                'rand' => esc_html__( 'Random', 'fastway' ),
                            ],
                        ),
                        array(
                            'name' => 'order',
                            'label' => esc_html__( 'Sort Order', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__( 'Descending', 'fastway' ),
                                'asc' => esc_html__( 'Ascending', 'fastway' ),
                            ],
                        ),
                        array(
                            'name' => 'limit',
                            'label' => esc_html__( 'Total items', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                    ),
                ),
                array(
                    'name' => 'display_section',
                    'label' => esc_html__( 'Display Options', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'show_thumbnail',
                            'label' => esc_html__( 'Show Thumbnail', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_title',
                            'label' => esc_html__( 'Show Title', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default'       => 'h3',
                            'options'       => [
                                'h1'    => 'H1',
                                'h2'    => 'H2',
                                'h3'    => 'H3',
                                'h4'    => 'H4',
                                'h5'    => 'H5',
                                'h6'    => 'H6',
                            ],
                            'condition' => [
                                'show_title' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__( 'Show Excerpt', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__( 'Number of Words', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 25,
                            'condition' => [
                                'show_excerpt' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__( 'Show Action Button', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__( 'Button Text', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Read more', 'fastway'),
                            'condition' => [
                                'show_button' => 'true'
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'show_meta',
                            'label' => esc_html__( 'Show Meta', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_post_date',
                            'label' => esc_html__( 'Show Post Date', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                        array(
                            'name' => 'show_categories',
                            'label' => esc_html__( 'Show Categories', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__( 'Show Author', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => [
                                'show_meta' => 'true'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_carousel_settings',
                    'label' => esc_html__('Carousel', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
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
                            'default' => 'true',
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
                array(
                    'name' => 'title_style',
                    'label' => esc_html__('Title', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_title'  => 'true',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors'     => [
                                '{{WRAPPER}} .entry-title'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'title_color_hover',
                            'label' => esc_html__('Hover Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors'     => [
                                '{{WRAPPER}} .entry-title a:hover'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'title_typo',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .entry-title',
                        ),
                        array(
                            'name' => 'table_title_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic' , 'gradient' ],
                            'selector' => '{{WRAPPER}} .entry-title',
                        ),
                        array(
                            'name' => 'title_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'excerpt_style',
                    'label' => esc_html__('Excerpt', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'show_excerpt'  => 'true',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'excerpt_color',
                            'label' => esc_html__('Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors'     => [
                                '{{WRAPPER}} .entry-content'  => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'description_typo',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .entry-content',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'table_excerpt_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'selector'          => '{{WRAPPER}} .entry-content',
                        ),
                        array(
                            'name' => 'excerpt_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units'        => ['px', 'em', '%'],
                            'selectors'         => [
                                '{{WRAPPER}} .entry-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'excerpt_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units'        => ['px', 'em', '%'],
                            'selectors'         => [
                                '{{WRAPPER}} .entry-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'button_style',
                    'label' => esc_html__( 'Button', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_typo',
                            'label' => esc_html__( 'Typography', 'fastway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button',
                        ),
                        array(
                            'name' => 'tabs_button_style',
                            'control_type' => 'tab',
                            'tabs' => [
                                array(
                                    'name' => 'tab_button_normal',
                                    'label' => esc_html__( 'Normal', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'button_text_color',
                                            'label' => esc_html__( 'Text Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'default' => '',
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_background_color',
                                            'label' => esc_html__( 'Background Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button' => 'background-color: {{VALUE}};',
                                            ],
                                        ),
                                    ),
                                ),
                                array(
                                    'name' => 'tab_button_hover',
                                    'label' => esc_html__( 'Hover', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'button_hover_color',
                                            'label' => esc_html__( 'Text Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus, {{WRAPPER}} .entry-readmore button:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_background_hover_color',
                                            'label' => esc_html__( 'Background Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus' => 'background-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_hover_border_color',
                                            'label' => esc_html__( 'Border Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'condition' => [
                                                'border_border!' => '',
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus' => 'border-color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                        ),
                                    ),
                                ),
                            ]
                        ),
                        array(
                            'name' => 'border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'button_border_radius',
                            'label' => esc_html__( 'Border Radius', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_box_shadow',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button',
                        ),
                        array(
                            'name' => 'button_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);