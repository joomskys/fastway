<?php
// Post term options
$post_term_options = etc_get_grid_term_options('post');
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
// Register Post Carousel Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_image_carousel',
        'title' => esc_html__( 'CMS Images Carousel', 'fastway' ),
        'icon' => 'eicon-slider-push',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'jquery-slick',
            'cms-slick-slider',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__( 'Layout', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'prefix_class' => 'cms-image-carousel',
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__( 'Templates', 'fastway' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_carousel/layout/layout1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Galleries', 'fastway' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'galleries',
                            'type'         => \Elementor\Controls_Manager::GALLERY,
                            'control_type' => 'responsive',
                            'default'      => [],
                            'dynamic'      => [
                                'active' => true,
                            ],
                        ),
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'large',
                        ),
                    ),
                ),
                array(
                    'name'     => 'section_carousel_settings',
                    'label'    => esc_html__('Carousel', 'fastway'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'slide_mode',
                            'label' => esc_html__('Slide mode', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'true' => esc_html__('Fade', 'fastway'),
                                'false' => esc_html__('Slide', 'fastway'),
                            ],
                            'default' => 'slide',
                        ),
                        array(
                            'name'         => 'slides_to_show',
                            'label'        => esc_html__('Slides to Show', 'fastway'),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options'      => [
                                    '' => esc_html__( 'Default', 'fastway' ),
                                ] + $slides_to_show,
                            'default'      => '',
                            'condition'    => [
                                'slide_mode' => 'false',
                            ],
                        ),
                        array(
                            'name'         => 'slides_to_scroll',
                            'label'        => esc_html__('Slides to Scroll', 'fastway'),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'control_type' => 'responsive',
                            'options'      => [
                                    '' => esc_html__( 'Default', 'fastway' ),
                                ] + $slides_to_show,
                            'default'      => '',
                            'condition'    => [
                                'slides_to_show!' => '1',
                            ],
                        ),
                        array(
                            'name'         => 'slides_gutter',
                            'label'        => esc_html__('Gutter', 'fastway'),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default'      => 30,
                            'condition'    => [
                                'slides_to_show!' => '1',
                            ],
                            'selectors' => [
                                //'{{WRAPPER}} .cms-slick-carousel .slick-list .slick-slide' => 'padding: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'dots',
                            'label' => esc_html__('Show Dots', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Speed', 'fastway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'fastway'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'dir',
                            'label' => esc_html__('Direction', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ltr' => esc_html__('Left', 'fastway'),
                                'rtl' => esc_html__('Right', 'fastway'),
                            ],
                            'default' => 'ltr',
                        )
                    )
                ) 
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);