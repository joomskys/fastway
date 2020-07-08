<?php

// Register Pie Charts Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_piecharts',
        'title' => esc_html__('Pie Charts', 'fastway'),
        'icon' => 'fa fa-pie-chart',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts' => array(
            'easy-pie-chart-lib-js',
            'cms-piecharts-widget-js',
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
                                    'image' => get_template_directory_uri() . '/assets/images/elementor/1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/assets/images/elementor/2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_piecharts',
                    'label' => esc_html__('Piecharts', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'per_line',
                            'label' => esc_html__( 'Piecharts per row', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'min' => 1,
                            'max' => 5,
                            'step' => 1,
                            'default' => 4,
                        ),
                        array(
                            'name' => 'piecharts',
                            'label' => esc_html__('PieCharts', 'fastway'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'stats_title',
                                    'label' => esc_html__('Stats Title', 'fastway'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default' => esc_html__( 'Stats Title', 'fastway' )
                                ),
                                array(
                                    'name' => 'percentage_value',
                                    'label' => esc_html__('Percentage Value', 'fastway'),
                                    'type' => \Elementor\Controls_Manager::NUMBER,
                                    'min' => 1,
                                    'max' => 100,
                                    'step' => 1,
                                    'default' => 30,
                                ),
                            ),
                            'default' => [
                                [
                                    'stats_title' => esc_html__('Web Design', 'fastway'),
                                    'percentage_value' => 87,
                                ],
                                [
                                    'stats_title' => esc_html__('SEO Services', 'fastway'),
                                    'percentage_value' => 76,
                                ],
                                [
                                    'stats_title' => esc_html__('WordPress Development', 'fastway'),
                                    'percentage_value' => 90,
                                ],
                                [
                                    'stats_title' => esc_html__('Brand Marketing', 'fastway'),
                                    'percentage_value' => 40,
                                ],
                            ],
                            'title_field' => '{{{ stats_title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_styling',
                    'label' => esc_html__('Piechart Styling', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__('Bar color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#666666',
                        ),
                        array(
                            'name' => 'track_color',
                            'label' => esc_html__('Track color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#dddddd',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_stats_title',
                    'label' => esc_html__('Stats Title', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'stats_title_color',
                            'label' => esc_html__('Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-piecharts .piechart .label' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'stats_title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-piecharts .piechart .label',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_stats_percentage',
                    'label' => esc_html__('Stats Percentage', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'stats_percentage_color',
                            'label' => esc_html__('Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-piecharts .piechart .percentage span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'stats_percentage_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-piecharts .piechart .percentage span',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_stats_percentage_symbol',
                    'label' => esc_html__('Stats Percentage Symbol', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'stats_percentage_symbol_color',
                            'label' => esc_html__('Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-piecharts .piechart .percentage span sup' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'stats_percentage_symbol_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-piecharts .piechart .percentage span sup',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);