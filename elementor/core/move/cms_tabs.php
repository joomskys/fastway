<?php

// Register Tabs Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_tabs',
        'title' => esc_html__( 'Tabs', 'fastway' ),
        'icon' => 'eicon-tabs',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => [
          'cms-tabs-widget-js',
        ],
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_tabs/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_tabs',
                    'label' => esc_html__( 'Tabs', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active_tab',
                            'label' => esc_html__( 'Active Tab', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Tabs Items', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'tab_title',
                                    'label' => esc_html__( 'Title & Description', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__( 'Tab Title', 'fastway' ),
                                    'placeholder' => esc_html__( 'Tab Title', 'fastway' ),
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'tab_content',
                                    'label' => esc_html__( 'Content', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => esc_html__( 'Tab Content', 'fastway' ),
                                    'placeholder' => esc_html__( 'Tab Content', 'fastway' ),
                                    'show_label' => false,
                                ),
                            ),
                            'default' => [
                                [
                                    'tab_title' => esc_html__( 'Tab #1', 'fastway' ),
                                    'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                                [
                                    'tab_title' => esc_html__( 'Tab #2', 'fastway' ),
                                    'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                            ],
                            'title_field' => '{{{ tab_title }}}',
                        ),
                        array(
                            'name' => 'type',
                            'label' => esc_html__( 'Type', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'horizontal',
                            'options' => [
                                'horizontal' => esc_html__( 'Horizontal', 'fastway' ),
                                'vertical' => esc_html__( 'Vertical', 'fastway' ),
                            ],
                            'prefix_class' => 'cms-tabs-view-',
                            'separator' => 'before',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_tabs_style',
                    'label' => esc_html__( 'Tabs', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'navigation_width',
                            'label' => esc_html__( 'Navigation Width', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'default' => [
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 10,
                                    'max' => 50,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-tabs-title' => 'width: {{SIZE}}{{UNIT}}',
                            ],
                            'condition' => [
                                'type' => 'vertical',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 1,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 10,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-tabs-title, {{WRAPPER}} .cms-tab-content, {{WRAPPER}}.cms-tabs-view-vertical .cms-tab-title' => 'border-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-tabs-title, {{WRAPPER}} .cms-tab-content, {{WRAPPER}}.cms-tabs-view-vertical .cms-tab-title' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'background_color',
                            'label' => esc_html__( 'Background Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-tab-title.active' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .cms-tab-content' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title_style',
                    'label' => esc_html__( 'Title', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'tab_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-tab-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'tab_active_color',
                            'label' => esc_html__( 'Active Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-tab-title.active' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'tab_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-tab-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_style',
                    'label' => esc_html__( 'Content', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-tab-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-tab-content',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);