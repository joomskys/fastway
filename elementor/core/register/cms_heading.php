<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_heading',
        'title'      => esc_html__( 'CMS Heading', 'fastway' ),
        'icon'       => 'eicon-t-letter',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'fastway' ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout1.png',
                                    'show_label' => true
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout2.png',
                                    'show_label' => true
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout3.png',
                                    'show_label' => true
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout4.png',
                                    'show_label' => true
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout5.png',
                                    'show_label' => true
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout6.png',
                                    'show_label' => true
                                ],
                                '7' => [
                                    'label' => esc_html__( 'Layout 7', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout7.png',
                                    'show_label' => true
                                ],
                                '8' => [
                                    'label' => esc_html__( 'Layout 8', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout8.png',
                                    'show_label' => true
                                ],
                                '9' => [
                                    'label' => esc_html__( 'Layout 9', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout9.png',
                                    'show_label' => true
                                ],
                                '10' => [
                                    'label' => esc_html__( 'Layout 10', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout10.png',
                                    'show_label' => true
                                ],
                                '11' => [
                                    'label' => esc_html__( 'Layout 11', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout11.png',
                                    'show_label' => true
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'title_section',
                    'label'    => esc_html__( 'Custom Heading', 'fastway' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the heading', 'fastway' ),
                                'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'subheading_text',
                                'label'       => esc_html__( 'Sub Heading', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the sub heading', 'fastway' ),
                                'placeholder' => esc_html__( 'Enter your sub title', 'fastway' ),
                                'label_block' => true,
                                'condition'   => [
                                    'layout' => ['1','3','4','7','8','9','10','11'],
                                ],
                            ),
                            array(
                                'name'        => 'description_text',
                                'label'       => esc_html__( 'Description', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'condition'   => [
                                    'layout' => ['4','6','8','9','10','11'],
                                ],
                            ),
                            array(
                                'name'     => 'cms_lists',
                                'label'    => esc_html__( 'Feature Left', 'fastway' ),
                                'type'     => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(
                                    array(
                                        'name'        => 'list_title',
                                        'label'       => esc_html__( 'List Title', 'fastway' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => 'Your text here #1',
                                        'placeholder' => esc_html__( 'Enter your text', 'fastway' ),
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'             => 'list_icon',
                                        'label'            => esc_html__( 'Icon', 'fastway' ),
                                        'type'             => \Elementor\Controls_Manager::ICONS,
                                        'fa4compatibility' => 'icon',
                                        'default'          => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ],
                                    )
                                ),
                                'default' => [
                                    [
                                        'list_title' => 'Quality Control System',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ],
                                    [
                                        'list_title' => '100% Satisfaction Guarantee',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ],
                                    [
                                        'list_title' => 'Highly Professional Staff',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ]
                                ],
                                'title_field' => '{{{ list_title }}}',
                                'condition'   => [
                                    'layout' => ['9','11'],
                                ]
                            ),
                            array(
                                'name'     => 'cms_lists_r',
                                'label'    => esc_html__( 'Feature Right', 'fastway' ),
                                'type'     => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(
                                    array(
                                        'name'        => 'list_title',
                                        'label'       => esc_html__( 'List Title', 'fastway' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => 'Your text here #1',
                                        'placeholder' => esc_html__( 'Enter your text', 'fastway' ),
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'             => 'list_icon',
                                        'label'            => esc_html__( 'Icon', 'fastway' ),
                                        'type'             => \Elementor\Controls_Manager::ICONS,
                                        'fa4compatibility' => 'icon',
                                        'default'          => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ],
                                    )
                                ),
                                'default' => [
                                    [
                                        'list_title' => 'Unrivalled workmanship',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ],
                                    [
                                        'list_title' => 'Accurate Testing Processes',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ],
                                    [
                                        'list_title' => 'Professional and Qualified',
                                        'list_icon'  => [
                                            'value'   => 'fas fa-check-circle',
                                            'library' => 'fa-solid',
                                        ]
                                    ]
                                ],
                                'title_field' => '{{{ list_title }}}',
                                'condition'   => [
                                    'layout' => ['11'],
                                ]
                            )
                        ),
                        fastway_elementor_button_settings([
                            'condition' => [
                                'layout'    => ['4','6','9', '11']
                            ]
                        ])
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);