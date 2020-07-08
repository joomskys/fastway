<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_call_to_action',
        'title' => esc_html__('Call To Action', 'fastway' ),
        'icon' => 'eicon-call-to-action',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'fastway' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_call_to_action/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__('Custom Heading', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'subheading_text',
                            'label' => esc_html__('Sub Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('This is the sub heading', 'fastway' ),
                            'placeholder' => esc_html__('Enter your sub title', 'fastway' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'heading_text',
                            'label' => esc_html__('Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => esc_html__('This is the heading', 'fastway' ),
                            'placeholder' => esc_html__('Enter your title', 'fastway' ),
                            'rows' => 3,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'fastway'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default'       => esc_html__('Learn More' , 'fastway'),
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'button_url_type',
                            'label' => esc_html__('Link Type', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options'       => [
                                'url'   => esc_html__('URL', 'fastway'),
                                'link'  => esc_html__('Existing Page', 'fastway'),
                            ],
                            'default'       => 'url',
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Link', 'fastway'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition'     => [
                                'button_url_type'     => 'url',
                            ],
                            'label_block'   => true,
                        ),
                        array(
                            'name' => 'button_link_existing_content',
                            'label' => esc_html__('Existing Page', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'options'       => etc_get_all_page(),
                            'condition'     => [
                                'button_url_type'     => 'link',
                            ],
                            'multiple'      => false,
                            'label_block'   => true,
                        ),

                    ),
                ),
                array(
                    'name' => 'section_style_subheading',
                    'label' => esc_html__('Sub Heading Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'subheading_color',
                            'label' => esc_html__('Sub Heading Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .custom-subheading' => 'color: {{VALUE}};',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'subheading_bottom_space',
                            'label' => esc_html__('Bottom Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-heading .custom-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'subheading_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .custom-subheading',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_heading',
                    'label' => esc_html__('Heading Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__('Heading Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .custom-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .custom-heading',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'button_style_tabs',
                            'control_type' => 'tab',
                            'tabs' => array(
                                array(
                                    'name' => 'button_style_normal',
                                    'label' => esc_html__('Normal', 'fastway'),
                                    'controls' => array(
                                        array(
                                            'name' => 'button_color',
                                            'label' => esc_html__('Text Color', 'fastway'),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .cta-button' => 'color: {{VALUE}};'
                                            ]
                                        ),
                                        array(
                                            'name' => 'button_background',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types'             => [ 'classic' , 'gradient' ],
                                            'selector' => '{{WRAPPER}} .cta-button',
                                        ),

                                    )
                                ),
                                array(
                                    'name' => 'button_style_hover',
                                    'label' => esc_html__('Hover', 'fastway'),
                                    'controls' => array(
                                        array(
                                            'name' => 'button_color_hover',
                                            'label' => esc_html__('Text Color', 'fastway'),
                                            'type' => \Elementor\Controls_Manager::COLOR,
                                            'selectors' => [
                                                '{{WRAPPER}} .cta-button:hover' => 'color: {{VALUE}};'
                                            ]
                                        ),
                                        array(
                                            'name' => 'button_background_hover',
                                            'type' => \Elementor\Group_Control_Background::get_type(),
                                            'control_type' => 'group',
                                            'types'             => [ 'classic' , 'gradient' ],
                                            'selector' => '{{WRAPPER}} .cta-button:hover',
                                        ),
                                        array(
                                            'name' => 'hover_animation',
                                            'label' => esc_html__( 'Hover Animation', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                                        ),
                                    )
                                ),
                            )
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);