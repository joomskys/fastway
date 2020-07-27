<?php
// Post term options
$post_term_options = etc_get_grid_term_options('cms-service');

// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_service',
        'title'      => esc_html__( 'CMS Services', 'fastway' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'cms-post-grid-widget-js',
            'jquery-slick',
            'cms-slick-slider',
        ],
        'params' => array(
            'sections' => array(
                fastway_elementor_layout_mode_settings(),
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Item Layout', 'fastway' ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service/layout/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service/layout/layout3.png'
                                ]
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source', 'fastway' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'source',
                            'label'    => esc_html__( 'Select Categories', 'fastway' ),
                            'type'     => \Elementor\Controls_Manager::SELECT2,
                            'multiple' => true,
                            'options'  => $post_term_options,
                        ),
                        array(
                            'name'    => 'orderby',
                            'label'   => esc_html__( 'Order By', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'date',
                            'options' => [
                                'date'   => esc_html__( 'Date', 'fastway' ),
                                'ID'     => esc_html__( 'ID', 'fastway' ),
                                'author' => esc_html__( 'Author', 'fastway' ),
                                'title'  => esc_html__( 'Title', 'fastway' ),
                                'rand'   => esc_html__( 'Random', 'fastway' ),
                            ],
                        ),
                        array(
                            'name'    => 'order',
                            'label'   => esc_html__( 'Sort Order', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'desc',
                            'options' => [
                                'desc' => esc_html__( 'Descending', 'fastway' ),
                                'asc'  => esc_html__( 'Ascending', 'fastway' ),
                            ],
                        ),
                        array(
                            'name'    => 'limit',
                            'label'   => esc_html__( 'Total items', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                    ),
                ),
                array(
                    'name'     => 'grid_section',
                    'label'    => esc_html__( 'Grid', 'fastway' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'         => 'thumbnail',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                            ),
                            array(
                                'name'    => 'layout_type',
                                'label'   => esc_html__( 'Layout Type', 'fastway' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'basic'   => esc_html__( 'Basic', 'fastway' ),
                                    'masonry' => esc_html__( 'Masonry', 'fastway' ),
                                ],
                                'default' => 'basic',
                            ),
                            array(
                                'name'    => 'masonry_layout_mode',
                                'label'   => esc_html__( 'Layout Mode', 'fastway' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'masonry' => esc_html__( 'Masonry', 'fastway' ),
                                    'fitRows' => esc_html__( 'Fit Row', 'fastway' ),
                                ],
                                'default'   => 'masonry',
                                'condition' => [
                                    'layout_type' => 'masonry',
                                ],
                            ),
                            array(
                                'name'    => 'filter',
                                'label'   => esc_html__( 'Filter on Masonry', 'fastway' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'true'  => esc_html__( 'Enable', 'fastway' ),
                                    'false' => esc_html__( 'Disable', 'fastway' ),
                                ],
                                'condition' => [
                                    'layout_type' => 'masonry',
                                ],
                            ),
                            array(
                                'name'    => 'pagination_type',
                                'label'   => esc_html__( 'Pagination Type', 'fastway' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'false',
                                'options' => [
                                    'pagination' => esc_html__( 'Pagination', 'fastway' ),
                                    'loadmore'   => esc_html__( 'Loadmore', 'fastway' ),
                                    'false'      => esc_html__( 'Disable', 'fastway' ),
                                ],
                                'condition' => [
                                    'layout_type' => 'masonry',
                                ],
                            ),
                            array(
                                'name'      => 'filter_default_title',
                                'label'     => esc_html__( 'Default Title', 'fastway' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'default'   => esc_html__( 'All', 'fastway' ),
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name'    => 'filter_alignment',
                                'label'   => esc_html__( 'Alignment', 'fastway' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'center',
                                'options' => [
                                    'center' => esc_html__( 'Center', 'fastway' ),
                                    'left' => esc_html__( 'Left', 'fastway' ),
                                    'right' => esc_html__( 'Right', 'fastway' ),
                                ],
                                'condition' => [
                                    'filter' => 'true',
                                ],
                            ),
                            array(
                                'name'         => 'gap',
                                'label'        => esc_html__( 'Item Gap', 'fastway' ),
                                'type'         => \Elementor\Controls_Manager::NUMBER,
                                'control_type' => 'responsive',
                                'default'      => 30,
                                'selectors'    => [],
                            )
                        ),
                        fastway_grid_column_settings()
                    ),
                ),
                array(
                    'name'     => 'show_all_btn',
                    'label'    => esc_html__( 'View All Button', 'fastway' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => fastway_elementor_button_settings([]),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);