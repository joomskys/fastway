<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_heading',
        'title' => esc_html__( 'CMS Heading', 'fastway' ),
        'icon' => 'eicon-t-letter',
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
                                '2' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout2.png'
                                ],
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fastway' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout/layout1.png'
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
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'description_text',
                            'label' => esc_html__( 'Description', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'fastway' ),
                            'placeholder' => esc_html__( 'Enter your description', 'fastway' ),
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => '1',
                            ],
                        )
                    ),
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);