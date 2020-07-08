<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_icons',
        'title' => esc_html__( 'Icons', 'fastway' ),
        'icon' => 'eicon-icon-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts' => array(

        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'icon_section',
                    'label' => esc_html__( 'Icon Box', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__( 'Icon', 'fastway' ),
                            'type' => Elementor_Theme_Core::ICONS_CONTROL,
                        ),
                        array(
                            'name' => 'emoji',
                            'label' => esc_html__( 'Emoji', 'fastway' ),
                            'type' => Elementor_Theme_Core::EMOJI_CONTROL,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);