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
                fastway_elementor_slick_slider_settings(),
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
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);