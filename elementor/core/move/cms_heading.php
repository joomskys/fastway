<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_heading',
        'title' => esc_html__( 'Heading', 'fastway' ),
        'icon' => 'eicon-type-tool',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'title_section',
                    'label' => esc_html__( 'Custom Heading', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'heading_text',
                            'label' => esc_html__( 'Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'This is the heading', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'subheading_text',
                            'label' => esc_html__( 'Sub Heading', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'This is the sub heading', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your sub title', 'fastway' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'description_text',
                            'label' => esc_html__( 'Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                            'rows' => 10,
                            'show_label' => false,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__( 'Link', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'heading_size',
                            'label' => esc_html__( 'Heading HTML Tag', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h2',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__( 'Content Alignment', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_align',
                            'label' => esc_html__( 'Alignment', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
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
                            'selectors' => [
                                '{{WRAPPER}} .custom-heading-wrapper' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_heading',
                    'label' => esc_html__( 'Heading Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'heading_color',
                            'label' => esc_html__( 'Heading Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .custom-heading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_bottom_space',
                            'label' => esc_html__( 'Bottom Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 15,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}.custom-heading-layout1 .custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}.custom-heading-layout2 .custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}.custom-heading-layout3 .custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                //'(mobile){{WRAPPER}} .custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    'name' => 'section_style_subheading',
                    'label' => esc_html__( 'Sub Heading Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'subheading_color',
                            'label' => esc_html__( 'Sub Heading Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .custom-subheading' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'subheading_bottom_space',
                            'label' => esc_html__( 'Bottom Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 15,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}.custom-heading-layout1 .custom-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}.custom-heading-layout2 .custom-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}.custom-heading-layout3 .custom-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                //'(mobile){{WRAPPER}} .custom-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                    'name' => 'section_style_description',
                    'label' => esc_html__( 'Description Style', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'heading_description',
                            'label' => esc_html__( 'Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'description_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '#ccc',
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .custom-heading-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .custom-heading-desctiption',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);