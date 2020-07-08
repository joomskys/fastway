<?php

// Register Alert Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_alert',
        'title' => esc_html__( 'a Alert', 'fastway' ),
        'icon' => 'eicon-alert',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'cms-alert-widget-js'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_alert/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_alert',
                    'label' => esc_html__( 'Alert', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'alert_type',
                            'label' => esc_html__( 'Type', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'info',
                            'options' => [
                                'info' => esc_html__( 'Info', 'fastway' ),
                                'success' => esc_html__( 'Success', 'fastway' ),
                                'warning' => esc_html__( 'Warning', 'fastway' ),
                                'danger' => esc_html__( 'Danger', 'fastway' ),
                            ],
                            'prefix_class' => 'cms-alert-',
                        ),
                        array(
                            'name' => 'alert_title',
                            'label' => esc_html__( 'Title & Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                            'default' => esc_html__( 'This is an Alert', 'fastway' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'alert_description',
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                            'default' => esc_html__( 'I am a description. Click the edit button to change this text.', 'fastway' ),
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'show_dismiss',
                            'label' => esc_html__( 'Dismiss Button', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'show',
                            'options' => [
                                'show' => esc_html__( 'Show', 'fastway' ),
                                'hide' => esc_html__( 'Hide', 'fastway' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_type',
                    'label' => esc_html__( 'Alert', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'background',
                            'label' => esc_html__( 'Background Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-alert' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-alert' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_left-width',
                            'label' => esc_html__( 'Left Border Width', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-alert' => 'border-left-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Title', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Text Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-alert-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'alert_title',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-alert-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_description',
                    'label' => esc_html__( 'Description', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__( 'Text Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-alert-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'alert_description',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-alert-description',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);