<?php
// Register Shake Image Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_shake_img',
        'title'      => esc_html__( 'CMS Shake Image', 'fastway' ),
        'icon'       => 'eicon-button',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_service/layout/layout1.png'
                                ]
                            ],
                        ),
                    ),
                )
        	)
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);
