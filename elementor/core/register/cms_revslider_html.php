<?php
// Register RevSlider HTML
etc_add_custom_widget(
    array(
		'name'       => 'cms_revslider_html',
		'title'      => esc_html__( 'CMS RevSlider	', 'fastway' ),
		'icon'       => 'eicon-sync',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
		'scripts'    => array(
            'themepunch-tools',
            'jquery-themepunch-revolution',
            'revolution-plugin',
            'rev-script-1',
            'rev-script-2',
            'rev-script-3'
        ),
        'params' => array(
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
							'options'     => [
								'1' => ['label' => esc_html__('Home 01','fastway')],
								'2' => ['label' => esc_html__('Home 02','fastway')],
								'3' => ['label' => esc_html__('Home 03','fastway')]
                            ]  
                        ),
                    ),
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);