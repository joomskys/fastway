<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

// Register Testimonial List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_testimonial',
        'title'      => esc_html__('CMS Testimonial', 'fastway'),
        'icon'       => 'eicon-testimonial',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-slick-slider',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-image/layout2.png'
                                ]
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => '4',
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'content_list',
                    'label'    => esc_html__('Testimonial', 'fastway'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'testimonial',
                            'label'    => esc_html__('Add Item', 'fastway'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__('Title', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'sub_title',
                                    'label'       => esc_html__('Sub Title', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'position',
                                    'label'       => esc_html__('Position', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'description',
                                    'label'       => esc_html__('Description', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'Name #1', 'fastway' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #1',
                                    'description' => esc_html__( '#1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg' 
                                ],
                                [
                                    'title'       => esc_html__( 'Name #2', 'fastway' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #2',
                                    'description' => esc_html__( '#2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #3', 'fastway' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #3',
                                    'description' => esc_html__( '#3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    ),
                ),
                fastway_elementor_slick_slider_settings()
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);