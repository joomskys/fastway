<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_icon_box',
        'title' => esc_html__( 'Icon Box', 'fastway' ),
        'icon' => 'eicon-icon-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(

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
                            //'prefix_class' => 'cms-icon-box-layout',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout3.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__( 'Icon Box', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__( 'Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-star',
                                'library' => 'fa-solid',
                            ],
                        ),
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__( 'Title & Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'This is the heading', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'description_text',
                            'label' => esc_html__( 'Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__( 'Link', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'title_size',
                            'label' => esc_html__( 'Title HTML Tag', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__( 'Icon Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'icon!' => '',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'icon_colors',
                            'control_type' => 'tab',
                            'tabs' => array(
                                array(
                                    'name' => 'icon_colors_normal',
                                    'label' => esc_html__( 'Normal', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'icon_color',
                                            'label' => esc_html__( 'Icon Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .cms-icon-box-wrapper .elementor-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                    ),
                                ),
                                array(
                                    'name' => 'icon_colors_hover',
                                    'label' => esc_html__( 'Hover', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'hover_icon_color',
                                            'label' => esc_html__( 'Hover Icon Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .cms-icon-box-wrapper:hover .elementor-icon' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__( 'Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 15,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-icon-box-layout1 .cms-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .cms-icon-box-layout2 .cms-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .cms-icon-box-layout3 .cms-icon-box-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                                //'(mobile){{WRAPPER}} .cms-icon-box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__( 'Size', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 6,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .elementor-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_padding',
                            'label' => esc_html__( 'Padding', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'em' ],
                            'range' => [
                                'em' => [
                                    'min' => 0,
                                    'max' => 5,
                                ],
                            ],
                            'default' => [
                                'size' => 0,
                                'unit' => 'em',
                            ],
                            'condition' => [
                                'view!' => 'default',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .elementor-icon' => 'padding: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'rotate',
                            'label' => esc_html__( 'Rotate', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'deg' ],
                            'range' => [
                                'deg' => [
                                    'min' => 0,
                                    'max' => 360,
                                ]
                            ],
                            'default' => [
                                'size' => 0,
                                'unit' => 'deg',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .elementor-icon i' => 'transform: rotate({{SIZE}}{{UNIT}});',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__( 'Content', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'fastway' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'fastway' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'fastway' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'fastway' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-icon-box-wrapper' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_vertical_alignment',
                            'label' => esc_html__( 'Vertical Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'top' => esc_html__( 'Top', 'fastway' ),
                                'middle' => esc_html__( 'Middle', 'fastway' ),
                                'bottom' => esc_html__( 'Bottom', 'fastway' ),
                            ],
                            'prefix_class' => 'elementor-vertical-align-',
                            'default' => 'top',
                        ),
                        array(
                            'name' => 'heading_title',
                            'label' => esc_html__( 'Title', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'title_bottom_space',
                            'label' => esc_html__( 'Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-icon-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-icon-box-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .cms-icon-box-title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-icon-box-title',
                        ),
                        array(
                            'name' => 'heading_description',
                            'label' => esc_html__( 'Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ccc',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-icon-box-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-icon-box-description',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);