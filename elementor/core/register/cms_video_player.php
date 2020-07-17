<?php
// Register Video Player Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_video_player',
        'title' => esc_html__('CMS Video Player', 'fastway' ),
        'icon' => 'eicon-play',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__('Video Player', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                //'style1' => 'Style 1',
                                //'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'style' => ['style1','style2'],
                            ],
                        ),
                        array(
                            'name' => 'image_s2',
                            'label' => esc_html__('Choose Image 2', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'style' => 'style2',
                            ],
                        ),
                        array(
                            'name' => 'img_type',
                            'label' => esc_html__('Image Type', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background Image',
                            ],
                            'default' => 'img',
                            'condition' => [
                                'style' => 'style1',
                            ],
                        ),
                        array(
                            'name' => 'img_height',
                            'label' => esc_html__('Image Height', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-video-player .cms-video-bg-image' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'img_type' => 'bg',
                            ],
                        ),
                        array(
                            'name'  => 'video_link',
                            'label' => esc_html__('Link', 'fastway' ),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name'        => 'video_label',
                            'label'       => esc_html__('Label', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition'   => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name'        => 'video_sub_title',
                            'label'       => esc_html__('Sub Title', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition'   => [
                                'style' => 'style3',
                            ],
                        ),
                        array(
                            'name'        => 'video_btn_text',
                            'label'       => esc_html__( 'Button Text', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Contact Us', 'fastway'),
                            'placeholder' => esc_html__('Contact Us', 'fastway'),
                            'condition'   => [
                                'style' => ['style3'],
                            ],
                        ),
                        array(
                            'name'        => 'video_btn_link',
                            'label'       => esc_html__('Button Link', 'fastway' ),
                            'type'        => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                            'label_block' => true,
                            'condition'   => [
                                'style' => 'style3',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);