<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_icon_box',
        'title' => esc_html__( 'CMS Icon Box', 'fastway' ),
        'icon' => 'eicon-icon-box',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout4.png'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout5.png'
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout6.png'
                                ],
                                '7' => [
                                    'label' => esc_html__( 'Layout 7', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout7.png'
                                ],
                                '8' => [
                                    'label' => esc_html__( 'Layout 8', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout8.png'
                                ],
                                '9' => [
                                    'label' => esc_html__( 'Layout 9', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout9.png'
                                ],
                                '10' => [
                                    'label' => esc_html__( 'Layout 10', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout10.png'
                                ],
                                '11' => [
                                    'label' => esc_html__( 'Layout 11', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout11.png'
                                ],
                                '12' => [
                                    'label' => esc_html__( 'Layout 12', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout12.png'
                                ],
                                '13' => [
                                    'label' => esc_html__( 'Layout 13', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout/layout13.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__( 'Icon Box', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'fastway' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value' => 'fas fa-star',
                                    'library' => 'fa-solid',
                                ],
                            ),
                            array(
                                'name'        => 'title_text',
                                'label'       => esc_html__( 'Title', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => esc_html__( 'This is the heading', 'fastway' ),
                                'placeholder' => esc_html__( 'Enter your title', 'fastway' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'description_text',
                                'label'       => esc_html__( 'Description', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                                'rows'        => 10,
                                'show_label'  => false,
                            ),
                            array(
                                'name'    => 'add_icon_link',
                                'label'   => esc_html__('Add icon Link','fastway'),
                                'type'    => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'true',
                            )
                        ),
                        fastway_elementor_button_settings([
                            'condition' => [
                                'add_icon_link'    => 'true'                            
                            ],
                            'btn_text'         => 'Overlay',
                            'btn_type_default' => 'btn-overlay'
                        ])
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);