<?php
// Register Button Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_button',
        'title'      => esc_html__( 'CMS Button', 'fastway' ),
        'icon'       => 'eicon-button',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params'     => array(
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_button/layout/layout1.png'
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
                            'name'        => 'color',
                            'label'       => esc_html__( 'Color', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'default'     => 'accent',
                            'options'     => [
                                'default'   => esc_html__('Default','fastway'),
                                'accent'    => esc_html__('Accent','fastway'),
                                'primary'   => esc_html__('Primary','fastway'),
                                'secondary' => esc_html__('Secondary','fastway'),
                                'white'     => esc_html__('White','fastway')
                            ]  
                        ),
                        array(
                            'name'        => 'type',
                            'label'       => esc_html__( 'Mode', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'default'     => 'fill',
                            'options'     => [
                                'fill'    => esc_html__('Fill','fastway'),
                                'outline'   => esc_html__('Outline','fastway'),
                            ]  
                        ),
                        array(
                            'name'        => 'size',
                            'label'       => esc_html__( 'Size', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'default'     => '',
                            'options'     => [
                                'xs' => esc_html__('Extra Small','fastway'),  
                                'sm' => esc_html__('Small','fastway'),  
                                ''   => esc_html__('Default','fastway'),
                                'md' => esc_html__('Medium','fastway'),
                                'lg' => esc_html__('Large','fastway'),
                                'xl' => esc_html__('Extra Large','fastway')
                            ]  
                        ),
                        array(
                            'name'        => 'text',
                            'label'       => esc_html__( 'Text', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Click here', 'fastway'),
                            'placeholder' => esc_html__('Click here', 'fastway'),
                        ),
                        array(
                            'name'        => 'link',
                            'label'       => esc_html__( 'Link', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                            'default'     => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'text!' => ''
                            ]
                        ),
                        array(
                            'name'    => 'align',
                            'label'   => esc_html__( 'Alignment', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__( 'Left', 'fastway' ),
                                    'icon'  => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'fastway' ),
                                    'icon'  => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'fastway' ),
                                    'icon'  => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'fastway' ),
                                    'icon'  => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                        ),
                        array(
                            'name'             => 'btn_icon',
                            'label'            => esc_html__( 'Icon', 'fastway' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'label_block'      => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name'    => 'icon_align',
                            'label'   => esc_html__( 'Icon Position', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left'  => esc_html__( 'Before', 'fastway' ),
                                'right' => esc_html__( 'After', 'fastway' ),
                            ],
                            'condition' => [
                                'btn_icon!' => '',
                            ],
                        ),
                        array(
                            'name'  => 'icon_indent',
                            'label' => esc_html__( 'Icon Spacing', 'fastway' ),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
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
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);