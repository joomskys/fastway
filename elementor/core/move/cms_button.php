<?php
// Register Button Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_button',
        'title' => esc_html__( 'Button', 'fastway' ),
        'icon' => 'eicon-button',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_button/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_button/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_button/layout3.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__( 'Text', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click here', 'fastway'),
                            'placeholder' => esc_html__('Click here', 'fastway'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__( 'Link', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left'    => [
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
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                        ),
                        array(
                            'name' => 'size',
                            'label' => esc_html__( 'Size', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => \Elementor\Widget_Button::get_button_sizes(),
                            'default' => 'sm',
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__( 'Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__( 'Icon Position', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__( 'Before', 'fastway' ),
                                'right' => esc_html__( 'After', 'fastway' ),
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_indent',
                            'label' => esc_html__( 'Icon Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 5,
                                    'max' => 50,
                                ],
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-button .cms-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .cms-button .cms-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__( 'Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'typography',
                            'label' => esc_html__( 'Typography', 'fastway' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} a.cms-button, {{WRAPPER}} .cms-button',
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
                                                '{{WRAPPER}} a.cms-button, {{WRAPPER}} .cms-button' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'background_color',
                                            'label' => esc_html__( 'Background Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} a.cms-button, {{WRAPPER}} .cms-button' => 'background-color: {{VALUE}};',
                                            ],
                                        ),
                                    ),
                                ),
                                array(
                                    'name' => 'tab_button_hover',
                                    'label' => esc_html__( 'Hover', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'hover_color',
                                            'label' => esc_html__( 'Text Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} a.cms-button:hover, 
                                                 {{WRAPPER}} .cms-button:hover, 
                                                 {{WRAPPER}} a.cms-button:focus, 
                                                 {{WRAPPER}} .cms-button:focus' => 'color: {{VALUE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'button_background_hover_color',
                                            'label' => esc_html__( 'Background Color', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} a.cms-button:hover, {{WRAPPER}} .cms-button:hover, {{WRAPPER}} a.cms-button:focus, {{WRAPPER}} .cms-button:focus' => 'background-color: {{VALUE}};',
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
                                                '{{WRAPPER}} a.cms-button:hover, {{WRAPPER}} .cms-button:hover, {{WRAPPER}} a.cms-button:focus, {{WRAPPER}} .cms-button:focus' => 'border-color: {{VALUE}};',
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
                            'selector' => '{{WRAPPER}} .cms-button',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__( 'Border Radius', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} a.cms-button, {{WRAPPER}} .cms-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'button_box_shadow',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-button',
                        ),
                        array(
                            'name' => 'text_padding',
                            'label' => esc_html__( 'Padding', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} a.cms-button, {{WRAPPER}} .cms-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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