<?php

// Register Progress Bar Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_progressbar',
        'title' => esc_html__( 'Progress Bar', 'fastway' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'cms-progressbar-widget-js',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_progressbar/layout1.png'
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
                            'name' => 'progressbar_list',
                            'label' => esc_html__( 'Progress Bar Lists', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                                    'default' => esc_html__( 'My Skill', 'fastway' ),
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'progress_type',
                                    'label' => esc_html__( 'Type', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => [
                                        '' => esc_html__( 'Default', 'fastway' ),
                                        'info' => esc_html__( 'Info', 'fastway' ),
                                        'success' => esc_html__( 'Success', 'fastway' ),
                                        'warning' => esc_html__( 'Warning', 'fastway' ),
                                        'danger' => esc_html__( 'Danger', 'fastway' ),
                                    ],
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'display_percentage',
                                    'label' => esc_html__( 'Display Percentage', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'show',
                                    'options' => [
                                        'show' => esc_html__( 'Show', 'fastway' ),
                                        'hide' => esc_html__( 'Hide', 'fastway' ),
                                    ],
                                ),
                                array(
                                    'name' => 'inner_text',
                                    'label' => esc_html__( 'Inner Text', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__( 'e.g. Web Designer', 'fastway' ),
                                    'default' => esc_html__( 'Web Designer', 'fastway' ),
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_progress_style',
                    'label' => esc_html__( 'Progress Bar', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .elementor-progress-wrapper .elementor-progress-bar' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Background Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .elementor-progress-wrapper' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_inline_color',
                            'label' => esc_html__( 'Inner Text Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .elementor-progress-bar' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'item_spacing',
                            'label' => esc_html__( 'Item Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'max' => 50,
                                ],
                            ],
                            'default' => [
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-progress-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Title Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Text Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .elementor-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .elementor-title',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);