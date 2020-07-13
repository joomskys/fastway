<?php
// Register Toggle Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_toggle',
        'title' => esc_html__( 'CMS Toggle', 'fastway' ),
        'icon' => 'eicon-toggle',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(
            'cms-toggle-widget-js'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_toggle/layout/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_toggle/layout/layout2.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'active_section',
                            'label' => esc_html__( 'Active section', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'cms_toggle',
                            'label' => esc_html__( 'Toggle Items', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'ac_title' => esc_html__( 'Toggle #1', 'fastway' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                                [
                                    'ac_title' => esc_html__( 'Toggle #2', 'fastway' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'ac_title',
                                    'label' => esc_html__( 'Title', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'ac_title_icon',
                                    'label' => esc_html__( 'Title Icon', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => '',
                                        'library' => '',
                                    ],
                                ),
                                array(
                                    'name' => 'ac_content',
                                    'label' => esc_html__( 'Content', 'fastway' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                            ),
                            'title_field' => '{{{ ac_title }}}',
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'main_icon',
                            'label' => esc_html__( 'Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-plus',
                                'library' => 'fa-solid',
                            ],
                        ),
                        array(
                            'name' => 'icon_active',
                            'label' => esc_html__( 'Active Icon', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default' => [
                                'value' => 'fas fa-minus',
                                'library' => 'fa-solid',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                            'separator' => 'after',
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);