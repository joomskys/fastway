<?php
// Register Dual Heading Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_dual_heading',
        'title' => esc_html__('Dual heading', 'fastway'),
        'icon' => 'fa fa-header',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_dual_heading/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'cms_header_general_settings',
                    'label' => esc_html__('Dual Heading', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'cms_header_first_header_text',
                            'label' => esc_html__( 'First Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default'       => esc_html__('CMS', 'fastway'),
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'cms_header_second_header_text',
                            'label' => esc_html__( 'Second Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default'       => esc_html__('Super Heroes', 'fastway'),
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'cms_header_first_header_tag',
                            'label' => esc_html__( 'HTML Tag', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default'       => 'h2',
                            'options'       => [
                                'h1'    => 'H1',
                                'h2'    => 'H2',
                                'h3'    => 'H3',
                                'h4'    => 'H4',
                                'h5'    => 'H5',
                                'h6'    => 'H6',
                                'p'     => 'p',
                                'span'  => 'span',
                            ],
                            'label_block'   =>  true,
                        ),
                        array(
                            'name' => 'cms_header_position',
                            'label' => esc_html__( 'Display', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'       => [
                                'inline'=> esc_html__('Inline', 'fastway'),
                                'block' => esc_html__('Block', 'fastway'),
                            ],
                            'default'       => 'inline',
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-container span, {{WRAPPER}} .cms-header-second-container' => 'display: {{VALUE}};',
                            ],
                            'label_block'   => true
                        ),
                        array(
                            'name' => 'cms_header_link_switcher',
                            'label' => esc_html__( 'Link', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'description'   => esc_html__('Enable or disable link','fastway'),
                        ),
                        array(
                            'name' => 'cms_heading_link_selection',
                            'label' => esc_html__( 'Link Type', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'       => [
                                'url'   => esc_html__('URL', 'fastway'),
                                'link'  => esc_html__('Existing Page', 'fastway'),
                            ],
                            'default'       => 'url',
                            'label_block'   => true,
                            'condition'     => [
                                'cms_header_link_switcher'     => 'true',
                            ]
                        ),
                        array(
                            'name' => 'cms_heading_link',
                            'label' => esc_html__( 'Link', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default'       => [
                                'url'   => '#',
                            ],
                            'placeholder'   => 'https://cmssuperheroes.com/',
                            'label_block'   => true,
                            'separator'     => 'after',
                            'condition'     => [
                                'cms_header_link_switcher'     => 'true',
                                'cms_heading_link_selection'   => 'url'
                            ]
                        ),
                        array(
                            'name' => 'cms_heading_existing_link',
                            'label' => esc_html__( 'Existing Page', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'options'       => etc_get_all_page(),
                            'condition'     => [
                                'cms_header_link_switcher'         => 'true',
                                'cms_heading_link_selection'       => 'link',
                            ],
                            'multiple'      => false,
                            'separator'     => 'after',
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'cms_header_text_align',
                            'label' => esc_html__( 'Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options'       => [
                                'left'      => [
                                    'title'=> esc_html__( 'Left', 'fastway' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center'    => [
                                    'title'=> esc_html__( 'Center', 'fastway' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right'     => [
                                    'title'=> esc_html__( 'Right', 'fastway' ),
                                    'icon' => 'fa fa-align-right'
                                ]
                            ],
                            'default'       => 'center',
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-container' => 'text-align: {{VALUE}};'
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'cms_header_first_style',
                    'label' => esc_html__('First Heading', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'first_header_typography',
                            'label' => esc_html__('Bar color', 'fastway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .cms-header-first-span'
                        ),
                        array(
                            'name' => 'cms_header_first_animated',
                            'label' => esc_html__('Animated Background', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'cms_header_first_back_clip',
                            'label' => esc_html__('Background Style', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default'       => 'color',
                            'description'   => esc_html__('Choose ‘Normal’ style to put a background behind the text. Choose ‘Clipped’ style so the background will be clipped on the text.','fastway'),
                            'options'       => [
                                'color'         => esc_html__('Normal Background', 'fastway'),
                                'clipped'       => esc_html__('Clipped Background', 'fastway'),
                            ],
                            'label_block'   =>  true
                        ),
                        array(
                            'name' => 'cms_header_first_color',
                            'label' => esc_html__('Text Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_first_back_clip' => 'color'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-span'   => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'condition'         => [
                                'cms_header_first_back_clip'  => 'color'
                            ],
                            'selector'          => '{{WRAPPER}} .cms-header-first-span'
                        ),
                        array(
                            'name' => 'cms_header_first_stroke',
                            'label' => esc_html__('Stroke', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'condition'         => [
                                'cms_header_first_back_clip'  => 'clipped'
                            ],
                        ),
                        array(
                            'name' => 'cms_header_first_stroke_text_color',
                            'label' => esc_html__('Stroke Text Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_first_back_clip'   => 'clipped',
                                'cms_header_first_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-clip.stroke .cms-header-first-span'   => '-webkit-text-stroke-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_stroke_color',
                            'label' => esc_html__('Stroke Fill Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_first_back_clip'   => 'clipped',
                                'cms_header_first_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-clip.stroke .cms-header-first-span'   => '-webkit-text-fill-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_stroke_width',
                            'label' => esc_html__('Stroke Fill Width', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'condition'     => [
                                'cms_header_first_back_clip'   => 'clipped',
                                'cms_header_first_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-clip.stroke .cms-header-first-span'   => '-webkit-text-stroke-width: {{SIZE}}px;'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_clipped_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'condition'         => [
                                'cms_header_first_back_clip'  => 'clipped',
                                'cms_header_first_stroke!'      => 'true'
                            ],
                            'selector'          => '{{WRAPPER}} .cms-header-first-span'
                        ),
                        array(
                            'name' => 'first_header_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'          => '{{WRAPPER}} .cms-header-first-span',
                            'separator'         => 'before'
                        ),
                        array(
                            'name' => 'cms_header_first_border_radius',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units'    => ['px', '%', 'em'],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-span' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_text_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .cms-header-first-span'
                        ),
                        array(
                            'name' => 'cms_header_first_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => [ 'px', 'em', '%' ],
                            'separator'     => 'before',
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_first_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => [ 'px', 'em', '%' ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-first-span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'cms_header_second_style',
                    'label' => esc_html__('Second Heading', 'fastway'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'second_header_typography',
                            'label' => esc_html__('Bar color', 'fastway'),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .cms-header-second-span'
                        ),
                        array(
                            'name' => 'cms_header_second_animated',
                            'label' => esc_html__('Animated Background', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'cms_header_second_back_clip',
                            'label' => esc_html__('Background Style', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default'       => 'color',
                            'description'   => esc_html__('Choose ‘Normal’ style to put a background behind the text. Choose ‘Clipped’ style so the background will be clipped on the text.','fastway'),
                            'options'       => [
                                'color'         => esc_html__('Normal Background', 'fastway'),
                                'clipped'       => esc_html__('Clipped Background', 'fastway'),
                            ],
                            'label_block'   =>  true
                        ),
                        array(
                            'name' => 'cms_header_second_color',
                            'label' => esc_html__('Text Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_second_back_clip' => 'color'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-span'   => 'color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'condition'         => [
                                'cms_header_second_back_clip'  => 'color'
                            ],
                            'selector'          => '{{WRAPPER}} .cms-header-second-span'
                        ),
                        array(
                            'name' => 'cms_header_second_stroke',
                            'label' => esc_html__('Stroke', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'condition'         => [
                                'cms_header_second_back_clip'  => 'clipped'
                            ],
                        ),
                        array(
                            'name' => 'cms_header_second_stroke_text_color',
                            'label' => esc_html__('Stroke Text Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_second_back_clip'   => 'clipped',
                                'cms_header_second_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-clip.stroke .cms-header-second-span'   => '-webkit-text-stroke-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_stroke_color',
                            'label' => esc_html__('Stroke Fill Color', 'fastway'),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition'     => [
                                'cms_header_second_back_clip'   => 'clipped',
                                'cms_header_second_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-clip.stroke .cms-header-second-span'   => '-webkit-text-fill-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_stroke_width',
                            'label' => esc_html__('Stroke Fill Width', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'condition'     => [
                                'cms_header_second_back_clip'   => 'clipped',
                                'cms_header_second_stroke'      => 'true'
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-clip.stroke .cms-header-second-span'   => '-webkit-text-stroke-width: {{SIZE}}px;'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_clipped_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'condition'         => [
                                'cms_header_second_back_clip'  => 'clipped',
                                'cms_header_second_stroke!'      => 'true'
                            ],
                            'selector'          => '{{WRAPPER}} .cms-header-second-span'
                        ),
                        array(
                            'name' => 'second_header_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'          => '{{WRAPPER}} .cms-header-second-span',
                            'separator'         => 'before'
                        ),
                        array(
                            'name' => 'cms_header_second_border_radius',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units'    => ['px', '%', 'em'],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-span' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_text_shadow',
                            'type' => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .cms-header-second-span'
                        ),
                        array(
                            'name' => 'cms_header_second_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => [ 'px', 'em', '%' ],
                            'separator'     => 'before',
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
                            ]
                        ),
                        array(
                            'name' => 'cms_header_second_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => [ 'px', 'em', '%' ],
                            'selectors'     => [
                                '{{WRAPPER}} .cms-header-second-span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}'
                            ]
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);