<?php
// Register Progress Bar Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_progressbar',
        'title'      => esc_html__( 'CMS Progress Bar', 'fastway' ),
        'icon'       => 'eicon-skill-bar',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'cms-progressbar-widget-js',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_progressbar/layout/layout1.png'
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
                            'name'     => 'progressbar_list',
                            'label'    => esc_html__( 'Progress Bar Lists', 'fastway' ),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__( 'Title', 'fastway' ),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                                    'default'     => esc_html__( 'My Skill', 'fastway' ),
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'inner_text',
                                    'label'       => esc_html__( 'Inner Text', 'fastway' ),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'placeholder' => esc_html__( 'e.g. Web Designer', 'fastway' ),
                                    'default'     => esc_html__( 'Web Designer', 'fastway' ),
                                    'label_block' => true,
                                    'condition'   => [
                                        'layout' => ['2'],
                                    ],
                                ),
                                array(
                                    'name'    => 'progress_type',
                                    'label'   => esc_html__( 'Type', 'fastway' ),
                                    'type'    => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => [
                                        ''        => esc_html__( 'Default', 'fastway' ),
                                        'info'    => esc_html__( 'Info', 'fastway' ),
                                        'success' => esc_html__( 'Success', 'fastway' ),
                                        'warning' => esc_html__( 'Warning', 'fastway' ),
                                        'danger'  => esc_html__( 'Danger', 'fastway' ),
                                    ],
                                ),
                                array(
                                    'name'    => 'percent',
                                    'label'   => esc_html__( 'Percentage', 'fastway' ),
                                    'type'    => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                                array(
                                    'name'    => 'display_percentage',
                                    'label'   => esc_html__( 'Display Percentage', 'fastway' ),
                                    'type'    => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'show',
                                    'options' => [
                                        'show' => esc_html__( 'Show', 'fastway' ),
                                        'hide' => esc_html__( 'Hide', 'fastway' ),
                                    ],
                                ),
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);