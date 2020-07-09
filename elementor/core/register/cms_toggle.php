<?php
// Register Toggle Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_toggle',
        'title' => esc_html__( 'Toggle', 'fastway' ),
        'icon' => 'eicon-toggle',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'cms-toggle-widget-js'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_toggle/layout1.png'
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
                            'name' => 'active_section',
                            'label' => esc_html__( 'Active section', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'cms_toggle',
                            'label' => esc_html__( 'Toggle Items', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'ac_title' => esc_html__( 'Toggle #1', 'fastway' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                                [
                                    'ac_title' => esc_html__( 'Toggle #2', 'fastway' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'ac_title',
                                    'label' => esc_html__( 'Title', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'ac_content',
                                    'label' => esc_html__( 'Content', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ ac_title }}}',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'main_icon',
                            'label' => esc_html__( 'Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-caret-right',
                                'library' => 'fa-solid',
                            ],
                        ),
                        array(
                            'name' => 'icon_active',
                            'label' => esc_html__( 'Active Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-caret-up',
                                'library' => 'fa-solid',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'title_html_tag',
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
                            ],
                            'default' => 'div',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title_style',
                    'label' => esc_html__( 'Toggle', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-item' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-item' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'toggle_space',
                            'label' => esc_html__( 'Space Between', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_toggle_style_title',
                    'label' => esc_html__( 'Title', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_background',
                            'label' => esc_html__( 'Background', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'tab_active_color',
                            'label' => esc_html__( 'Active Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title.active' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-toggle .cms-toggle-title',
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__( 'Padding', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_toggle_style_icon',
                    'label' => esc_html__( 'Icon', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__( 'Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Start', 'fastway' ),
                                    'icon' => 'eicon-h-align-left',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'End', 'fastway' ),
                                    'icon' => 'eicon-h-align-right',
                                ],
                            ],
                            'default' => is_rtl() ? 'right' : 'left',
                            'toggle' => false,
                            'label_block' => false,
                            'condition' => [
                                'main_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon i:before' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_active_color',
                            'label' => esc_html__( 'Active Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title.active .cms-toggle-title-icon i:before' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__( 'Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon.left' => 'margin-right: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon.right' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_toggle_style_content',
                    'label' => esc_html__( 'Content', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_background_color',
                            'label' => esc_html__( 'Background', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-content' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-toggle .cms-toggle-content',
                        ),
                        array(
                            'name' => 'content_padding',
                            'label' => esc_html__( 'Padding', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-toggle .cms-toggle-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);