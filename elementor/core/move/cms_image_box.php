<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_image_box',
        'title' => esc_html__( 'Image Box', 'fastway' ),
        'icon' => 'eicon-image-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_box/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_box/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'image_section',
                    'label' => esc_html__( 'Image Box', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Choose Image', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'thumbnail',
                            'label' => esc_html__( 'Choose Image', 'fastway' ),
                            'type' => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default' => 'full',
                        ),

                        array(
                            'name' => 'title_text',
                            'label' => esc_html__( 'Title & Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__( 'This is the heading', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
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
                            'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                        ),
                        array(
                            'name' => 'title_size',
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
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'view',
                            'label' => esc_html__( 'View', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HIDDEN,
                            'default' => 'traditional',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_image',
                    'label' => esc_html__( 'Image', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__( 'Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 15,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 15,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-image-box-layout1 .cms-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .cms-image-box-layout2 .cms-image-box-img' => 'margin-right: {{SIZE}}{{UNIT}};',
                                //'(mobile){{WRAPPER}} .cms-image-box-img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_size',
                            'label' => esc_html__( 'Width', 'fastway' ) .  '(%)',
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ '%' ],
                            'range' => [
                                '%' => [
                                    'min' => 5,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => 30,
                                'unit' => '%',
                            ],
                            'tablet_default' => [
                                'unit' => '%',
                            ],
                            'mobile_default' => [
                                'unit' => '%',
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-image-box-img' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'hover_animation',
                            'label' => esc_html__( 'Hover Animation', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
                        ),
                        array(
                            'name' => 'image_effects',
                            'control_type' => 'tab',
                            'tabs' => array(
                                array(
                                    'name' => 'normal',
                                    'label' => esc_html__( 'Normal', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'image_opacity',
                                            'label' => esc_html__( 'Opacity', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'range' => [
                                                'px' => [
                                                    'max' => 1,
                                                    'min' => 0.10,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .cms-image-box-img img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                        array(
                                            'name' => 'background_hover_transition',
                                            'label' => esc_html__( 'Transition Duration', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'default' => [
                                                'size' => 0.3,
                                            ],
                                            'range' => [
                                                'px' => [
                                                    'max' => 3,
                                                    'step' => 0.1,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}} .cms-image-box-img img' => 'transition-duration: {{SIZE}}',
                                            ],
                                        ),
                                    ),
                                ),
                                array(
                                    'name' => 'hover',
                                    'label' => esc_html__( 'Hover', 'fastway' ),
                                    'controls' => array(
                                        array(
                                            'name' => 'image_opacity_hover',
                                            'label' => esc_html__( 'Opacity', 'fastway' ),
                                            'type' => \Elementor\Controls_Manager::SLIDER,
                                            'range' => [
                                                'px' => [
                                                    'max' => 1,
                                                    'min' => 0.10,
                                                    'step' => 0.01,
                                                ],
                                            ],
                                            'selectors' => [
                                                '{{WRAPPER}}:hover .cms-image-box-img img' => 'opacity: {{SIZE}};',
                                            ],
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_content',
                    'label' => esc_html__( 'Content', 'fastway' ),
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
                                '{{WRAPPER}} .cms-icon-box-wrapper' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'heading_title',
                            'label' => esc_html__( 'Title', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'title_bottom_space',
                            'label' => esc_html__( 'Bottom Spacing', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-image-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Color', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-image-box-title' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .cms-image-box-title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-image-box-description',
                        ),
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
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}}  .cms-image-box-description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'description_typography',
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .cms-image-box-description',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);