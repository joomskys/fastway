<?php
// Layout Section
$pricing_table_layout_section = array(
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
                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout1.png'
                ],
            ],
        ),
    ),
);

// Pricing Table Icon Section
$pricing_table_icon_section = array(
    'name' => 'pricing_table_icon_section',
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'label' => esc_html__('Icon', 'fastway'),
    'condition' => [
        'pricing_table_icon_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_icon_selection',
            'label' => esc_html__('Select an Icon', 'fastway'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'fa4compatibility' => 'icon',
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
        ),
    ),
);

// Pricing Table Title Section
$pricing_table_title_section = array(
    'name' => 'pricing_table_title_section',
    'label' => esc_html__('Title', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_title_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_title_text',
            'label' => esc_html__('Text', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => esc_html__('Pricing Table', 'fastway'),
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_title_size',
            'label' => esc_html__('HTML Tag', 'fastway'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default'       => 'h3',
            'options'       => [
                'h1'    => 'H1',
                'h2'    => 'H2',
                'h3'    => 'H3',
                'h4'    => 'H4',
                'h5'    => 'H5',
                'h6'    => 'H6',
            ],
            'label_block'   => true,
        ),
    ),
);

// Pricing Table Pricing Section
$pricing_table_price_section = array(
    'name' => 'pricing_table_price_section',
    'label' => esc_html__('Price', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_price_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_slashed_price_value',
            'label' => esc_html__('Slashed Price', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_price_currency',
            'label' => esc_html__('Currency', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => '$',
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_price_value',
            'label' => esc_html__('Price', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => '25',
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_price_separator',
            'label' => esc_html__('Divider', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => '/',
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_price_duration',
            'label' => esc_html__('Duration', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => 'm',
            'label_block'   => true,
        ),
    ),
);

// Pricing Table Icon List Section
$pricing_table_list_section = array(
    'name' => 'pricing_table_list_section',
    'label' => esc_html__('Icon List', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_list_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'fancy_text_list_items',
            'label' => esc_html__('Features', 'fastway'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'default'       => [
                [
                    'pricing_list_item_icon'    => 'fa fa-check',
                    'pricing_list_item_text' => esc_html__( 'List Item #1', 'fastway' ),
                ],
                [
                    'pricing_list_item_icon'    => 'fa fa-check',
                    'pricing_list_item_text' => esc_html__( 'List Item #2', 'fastway' ),
                ],
                [
                    'pricing_list_item_icon'    => 'fa fa-check',
                    'pricing_list_item_text' => esc_html__( 'List Item #3', 'fastway' ),
                ],
            ],
            'controls' => array(
                array(
                    'name' => 'pricing_list_item_text',
                    'label' => esc_html__('Text', 'fastway'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ),
                array(
                    'name' => 'pricing_list_item_icon',
                    'label' => esc_html__('Icon', 'fastway'),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                ),
                array(
                    'name' => 'pricing_table_list_align',
                    'label' => esc_html__('Alignment', 'fastway'),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'control_type' => 'responsive',
                    'options'           => [
                        'left'    => [
                            'title' => esc_html__( 'Left', 'fastway' ),
                            'icon'  => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'fastway' ),
                            'icon'  => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'fastway' ),
                            'icon'  => 'fa fa-align-right',
                        ],
                    ],
                    'selectors'         => [
                        '{{WRAPPER}} .pricing-list' => 'text-align: {{VALUE}}',
                    ],
                    'default' => 'center',
                ),
            ),
            'title_field'   => '<i class="{{ pricing_list_item_icon }}" aria-hidden="true"></i> {{{ pricing_list_item_text }}}',
        ),
    ),
);

// Pricing Table Description Section
$pricing_table_description_section = array(
    'name' => 'pricing_table_description_section',
    'label' => esc_html__('Description', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_description_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_description_text',
            'label' => esc_html__('Description', 'fastway'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
        ),
    ),
);

// Pricing Table Button Section
$pricing_table_button_section = array(
    'name' => 'pricing_table_button_section',
    'label' => esc_html__('Button', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_button_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_button_text',
            'label' => esc_html__('Text', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => esc_html__('Get Started' , 'fastway'),
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_button_url_type',
            'label' => esc_html__('Link Type', 'fastway'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options'       => [
                'url'   => esc_html__('URL', 'fastway'),
                'link'  => esc_html__('Existing Page', 'fastway'),
            ],
            'default'       => 'url',
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_button_link',
            'label' => esc_html__('Link', 'fastway'),
            'type' => \Elementor\Controls_Manager::URL,
            'condition'     => [
                'pricing_table_button_url_type'     => 'url',
            ],
            'label_block'   => true,
        ),
        array(
            'name' => 'pricing_table_button_link_existing_content',
            'label' => esc_html__('Existing Page', 'fastway'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options'       => etc_get_all_page(),
            'condition'     => [
                'pricing_table_button_url_type'     => 'link',
            ],
            'multiple'      => false,
            'label_block'   => true,
        ),
    ),
);

// Pricing Table Badge Section
$pricing_table_bagde_section = array(
    'name' => 'pricing_table_badge_section',
    'label' => esc_html__('Badge', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'condition' => [
        'pricing_table_badge_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_table_badge_text',
            'label' => esc_html__('Text', 'fastway'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default'       => esc_html__('Popular' , 'fastway'),
            'label_block'   => true,
        ),
    ),
);

// Pricing Table Settings Section
$pricing_table_title = array(
    'name' => 'pricing_table_title',
    'label' => esc_html__('Display Options', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
    'controls' => array(
        array(
            'name' => 'pricing_table_icon_switcher',
            'label' => esc_html__('Icon', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'pricing_table_title_switcher',
            'label' => esc_html__('Title', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'pricing_table_price_switcher',
            'label' => esc_html__('Price', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'pricing_table_list_switcher',
            'label' => esc_html__('Features', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'pricing_table_description_switcher',
            'label' => esc_html__('Description', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'pricing_table_button_switcher',
            'label' => esc_html__('Button', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
        array(
            'name' => 'pricing_table_badge_switcher',
            'label' => esc_html__('Badge', 'fastway'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
        ),
    ),
);

// Icon Style Settings
$pricing_icon_style_settings = array(
    'name' => 'pricing_icon_style_settings',
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'label' => esc_html__('Icon', 'fastway'),
    'condition' => [
        'pricing_table_icon_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_icon_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container i'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'pricing_icon_size',
            'label' => esc_html__('Size', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'default'       => [
                'size'  => 25,
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container' => 'font-size: {{SIZE}}px',
            ]
        ),
        array(
            'name' => 'pricing_icon_back_color',
            'label' => esc_html__('Background Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container i'  => 'background-color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'pricing_icon_inner_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units'    => ['px','em'],
            'default'       => [
                'size'  => 10,
                'unit'  => 'px'
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container i' => 'padding: {{SIZE}}{{UNIT}};',
            ]
        ),
        array(
            'name' => 'pricing_icon_inner_border',
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-icon-container i',
        ),
        array(
            'name' => 'pricing_icon_inner_radius',
            'label' => esc_html__('Border Radius', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units'    => ['px', '%' , 'em'],
            'default'       => [
                'size'  => 100,
                'unit'  => 'px'
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container i' => 'border-radius: {{SIZE}}{{UNIT}};',
            ],
            'separator'     => 'after'
        ),
        array(
            'name' => 'pricing_icon_container_heading',
            'label' => esc_html__('Container', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_table_icon_background',
            'type' => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types'             => [ 'classic' , 'gradient' ],
            'selector'          => '{{WRAPPER}} .pricing-icon-container',
        ),
        array(
            'name' => 'pricing_icon_border',
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-icon-container',
        ),
        array(
            'name' => 'pricing_icon_border_radius',
            'label' => esc_html__('Border Radius', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units'    => ['px', '%' ,'em'],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container' => 'border-radius: {{SIZE}}{{UNIT}};'
            ]
        ),
        array(
            'name' => 'pricing_icon_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'default'       => [
                'top'   => 50,
                'right' => 0,
                'bottom'=> 20,
                'left'  => 0,
                'unit'  => 'px',
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ),
        array(
            'name' => 'pricing_icon_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'default'       => [
                'top'   => 0,
                'right' => 0,
                'bottom'=> 0,
                'left'  => 0,
                'unit'  => 'px',
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-icon-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ),
    ),
);

// Title Style Settings
$pricing_title_style_settings = array(
    'name' => 'pricing_title_style_settings',
    'label' => esc_html__('Title', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_title_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_title_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-table-title'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'title_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-table-title',
        ),
        array(
            'name' => 'pricing_table_title_background',
            'type' => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types' => [ 'classic' , 'gradient' ],
            'selector' => '{{WRAPPER}} .pricing-table-title',
        ),
        array(
            'name' => 'pricing_title_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'default'       => [
                'top'   => 0,
                'right' => 0,
                'bottom'=> 0,
                'left'  => 0,
                'unit'  => 'px',
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-table-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ),
        array(
            'name' => 'pricing_title_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'default'       => [
                'top'   => 0,
                'right' => 0,
                'bottom'=> 20,
                'left'  => 0,
                'unit'  => 'px',
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-table-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ]
        ),
    ),
);

// Price Style Settings
$pricing_price_style_settings = array(
    'name' => 'pricing_price_style_settings',
    'label' => esc_html__('Price', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_price_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_slashed_price_heading',
            'label' => esc_html__('Slashed Price', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_slashed_price_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-slashed-price-value'  => 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'slashed_price_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-slashed-price-value',
        ),
        array(
            'name' => 'pricing_slashed_price_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing--slashed-price-value' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator'     => 'after'
        ),
        array(
            'name' => 'pricing_currency_heading',
            'label' => esc_html__('Currency', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_currency_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-price-currency'  => 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'currency_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-price-currency',
        ),
        array(
            'name' => 'pricing_currency_align',
            'label' => esc_html__('Vertical Align', 'fastway'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options'       => [
                'top'      => [
                    'title'=> esc_html__( 'Top', 'fastway' ),
                    'icon' => 'fa fa-long-arrow-up',
                ],
                'unset'    => [
                    'title'=> esc_html__( 'Unset', 'fastway' ),
                    'icon' => 'fa fa-align-justify',
                ],
                'bottom'     => [
                    'title'=> esc_html__( 'Bottom', 'fastway' ),
                    'icon' => 'fa fa-long-arrow-down',
                ],
            ],
            'default'       => 'unset',
            'selectors'     => [
                '{{WRAPPER}} .pricing-price-currency' => 'vertical-align: {{VALUE}};',
            ],
            'label_block'   => false
        ),
        array(
            'name' => 'pricing_currency_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
            'separator'     => 'after'
        ),
        array(
            'name' => 'pricing_price_heading',
            'label' => esc_html__('Price', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_price_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-price-value'  => 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'price_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-price-value',
        ),
        array(
            'name' => 'pricing_price_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-value' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator'     => 'after',
        ),
        array(
            'name' => 'pricing_sep_heading',
            'label' => esc_html__('Divider', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_sep_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-price-separator'  => 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'separator_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-price-separator',
        ),
        array(
            'name' => 'pricing_sep_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-separator' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator'     => 'after',
        ),
        array(
            'name' => 'pricing_dur_heading',
            'label' => esc_html__('Duration', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_dur_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-price-duration'  => 'color: {{VALUE}};'
            ],
        ),
        array(
            'name' => 'duration_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-price-duration',
        ),
        array(
            'name' => 'pricing_dur_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-duration' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
            'separator'     => 'after',
        ),
        array(
            'name' => 'pricing_price_container_heading',
            'label' => esc_html__('Container', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_table_price_background',
            'type' => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types'             => [ 'classic' , 'gradient' ],
            'selector'          => '{{WRAPPER}} .pricing-price-container',
        ),
        array(
            'name' => 'pricing_price_container_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'default'           => [
                'top'       => 16,
                'right'     => 0,
                'bottom'    => 16,
                'left'      => 0,
                'unit'      => 'px',
            ],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'pricing_price_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-price-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator'     => 'after',
        ),
    ),
);

// Icon List Style Settings
$pricing_list_style_settings = array(
    'name' => 'pricing_list_style_settings',
    'label' => esc_html__('Features', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_list_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_features_text_heading',
            'label' => esc_html__('Text', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_list_text_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-list .pricing-list-span'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'list_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-list .pricing-list-span',
            'separator' => 'after',
        ),
        array(
            'name' => 'pricing_features_icon_heading',
            'label' => esc_html__('Icon', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_list_icon_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-list i'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'pricing_list_icon_size',
            'label' => esc_html__('Size', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors'     => [
                '{{WRAPPER}} .pricing-list i' => 'font-size: {{SIZE}}px',
            ]
        ),
        array(
            'name' => 'pricing_list_icon_spacing',
            'label' => esc_html__('Spacing', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors'     => [
                '{{WRAPPER}} .pricing-list i' => 'margin-right: {{SIZE}}px',
            ],
        ),
        array(
            'name' => 'pricing_list_item_margin',
            'label' => esc_html__('Vertical Spacing', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors'     => [
                '{{WRAPPER}} .pricing-list li' => 'margin-bottom: {{SIZE}}px;'
            ],
            'separator'     => 'after'
        ),
        array(
            'name' => 'pricing_features_container_heading',
            'label' => esc_html__('Container', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_list_background',
            'type' => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types'             => [ 'classic' , 'gradient' ],
            'selector'          => '{{WRAPPER}} .pricing-list-container',
        ),
        array(
            'name' => 'pricing_list_border',
            'type' => \Elementor\Group_Control_Border::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-list-container',
        ),
        array(
            'name' => 'pricing_list_border_radius',
            'label' => esc_html__('Border Radius', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units'    => ['px', 'em' , '%'],
            'selectors'     => [
                '{{WRAPPER}} .pricing-list-container' => 'border-radius: {{SIZE}}{{UNIT}};'
            ],
        ),
        array(
            'name' => 'pricing_list_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'default'           => [
                'top'       => 30,
                'right'     => 0,
                'bottom'    => 30,
                'left'      => 0,
                'unit'      => 'px',
            ],
            'selectors'     => [
                '{{WRAPPER}} .pricing-list-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
        ),
        array(
            'name' => 'pricing_list_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'control_type' => 'responsive',
            'size_units'    => ['px', 'em', '%'],
            'selectors'     => [
                '{{WRAPPER}} .pricing-list-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
            ],
            'separator'     => 'after',
        ),
    ),
);

// Description Style Settings
$pricing_description_style_settings = array(
    'name' => 'pricing_description_style_settings',
    'label' => esc_html__('Description', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_description_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_desc_text_heading',
            'label' => esc_html__('Text', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_desc_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-description-container'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'description_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-description-container',
            'separator' => 'after',
        ),
        array(
            'name' => 'pricing_desc_container_heading',
            'label' => esc_html__('Container', 'fastway'),
            'type' => \Elementor\Controls_Manager::HEADING,
        ),
        array(
            'name' => 'pricing_table_desc_background',
            'type' => \Elementor\Group_Control_Background::get_type(),
            'control_type' => 'group',
            'types'             => [ 'classic' , 'gradient' ],
            'selector'          => '{{WRAPPER}} .pricing-description-container',
        ),
        array(
            'name' => 'pricing_desc_margin',
            'label' => esc_html__('Margin', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units'        => ['px', 'em', '%'],
            'default'           => [
                'top'       => 16,
                'right'     => 0,
                'bottom'    => 16,
                'left'      => 0,
                'unit'      => 'px',
            ],
            'selectors'         => [
                '{{WRAPPER}} .pricing-description-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'pricing_desc_padding',
            'label' => esc_html__('Padding', 'fastway'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units'        => ['px', 'em', '%'],
            'selectors'         => [
                '{{WRAPPER}} .pricing-description-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator'     => 'after',
        ),
    ),
);

// Button Style Settings
$pricing_button_style_settings = array(
    'name' => 'pricing_button_style_settings',
    'label' => esc_html__('Button', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_button_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_button_color',
            'label' => esc_html__('Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pricing-price-button' => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'pricing_button_hover_color',
            'label' => esc_html__('Hover Text Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pricing-price-button:hover' => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'button_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pricing-price-button',
        ),
        array(
            'name' => 'pricing_table_button_style_tabs',
            'control_type' => 'tab',
            'tabs' => array(
                array(
                    'name' => 'pricing_table_button_style_normal',
                    'label' => esc_html__('Normal', 'fastway'),
                    'controls' => array(
                        array(
                            'name' => 'pricing_table_button_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'selector' => '{{WRAPPER}} .pricing-price-button',
                        ),
                        array(
                            'name' => 'pricing_table_button_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pricing-price-button',
                        ),
                        array(
                            'name' => 'pricing_table_box_button_radius',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'selectors' => [
                                '{{WRAPPER}} .pricing-price-button' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_table_button_box_shadow',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pricing-price-button',
                        ),
                        array(
                            'name' => 'pricing_button_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_button_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'default'           => [
                                'top'       => 20,
                                'right'     => 0,
                                'bottom'    => 20,
                                'left'      => 0,
                                'unit'      => 'px',
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    )
                ),
                array(
                    'name' => 'pricing_table_button_style_hover',
                    'label' => esc_html__('Hover', 'fastway'),
                    'controls' => array(
                        array(
                            'name' => 'pricing_table_button_background_hover',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic' , 'gradient' ],
                            'selector' => '{{WRAPPER}} .pricing-price-button:hover',
                        ),
                        array(
                            'name' => 'pricing_table_button_border_hover',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .pricing-price-button:hover',
                        ),
                        array(
                            'name' => 'pricing_table_button_border_radius_hover',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button:hover' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_table_button_shadow_hover',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .pricing-price-button:hover',
                        ),
                        array(
                            'name' => 'pricing_button_margin_hover',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_button_padding_hover',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'default'           => [
                                'top'       => 20,
                                'right'     => 0,
                                'bottom'    => 20,
                                'left'      => 0,
                                'unit'      => 'px',
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    )
                ),
            )
        ),
    ),
);

// Badge Style Settings
$pricing_table_badge_style = array(
    'name' => 'pricing_table_badge_style',
    'label' => esc_html__('Badge', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'pricing_table_badge_switcher'  => 'true',
    ],
    'controls' => array(
        array(
            'name' => 'pricing_badge_text_color',
            'label' => esc_html__('Text Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .pricing-badge-container .corner span'  => 'color: {{VALUE}};'
            ]
        ),
        array(
            'name' => 'badge_text_typo',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'      => '{{WRAPPER}} .pricing-badge-container .corner span',
        ),
        array(
            'name' => 'pricing_table_badge_right_top',
            'label' => esc_html__('Vertical Distance', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range'     => [
                'px'=> [
                    'min'   => 1,
                    'max'   => 200,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .pricing-badge-container .corner span' => 'top: {{SIZE}}px;'
            ],
        ),
        array(
            'name' => 'pricing_table_badge_right_right',
            'label' => esc_html__('Horizontal Distance', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range'     => [
                'px'=> [
                    'min'   => 1,
                    'max'   => 170,
                ]
            ],
            'selectors' => [
                '{{WRAPPER}} .badge-right .corner span' => 'right: {{SIZE}}px;'
            ],
            'condition' => [
                'pricing_table_badge_position'  => 'right'
            ]
        ),
        array(
            'name' => 'pricing_table_badge_right_left',
            'label' => esc_html__('Horizontal Distance', 'fastway'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .badge-left .corner span' => 'left: {{SIZE}}px;'
            ],
            'condition' => [
                'pricing_table_badge_position'  => 'left'
            ]
        ),
        array(
            'name' => 'pricing_badge_left_color',
            'label' => esc_html__('Background Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .badge-left .corner'  => 'border-top-color: {{VALUE}};'
            ],
            'condition'     => [
                'pricing_table_badge_position'    => 'left'
            ]
        ),
        array(
            'name' => 'pricing_badge_right_color',
            'label' => esc_html__('Background Color', 'fastway'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors'     => [
                '{{WRAPPER}} .badge-right .corner'  => 'border-right-color: {{VALUE}};'
            ],
            'condition'     => [
                'pricing_table_badge_position'    => 'right'
            ]
        ),
    ),
);

// Box Style Settings
$pricing_box_style_settings = array(
    'name' => 'pricing_box_style_settings',
    'label' => esc_html__('Box Settings', 'fastway'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'pricing_table_box_style_tabs',
            'control_type' => 'tab',
            'tabs' => array(
                array(
                    'name' => 'pricing_table_box_style_normal',
                    'label' => esc_html__('Normal', 'fastway'),
                    'controls' => array(
                        array(
                            'name' => 'pricing_table_box_background',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'             => [ 'classic' , 'gradient' ],
                            'selector'          => '{{WRAPPER}} .pricing-table-container',
                        ),
                        array(
                            'name' => 'pricing_table_box_border',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .pricing-table-container',
                        ),
                        array(
                            'name' => 'pricing_table_box_border_radius',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units'    => ['px', '%' ,'em'],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-table-container' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_table_box_shadow',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pricing-table-container',
                        ),
                        array(
                            'name' => 'pricing_box_margin',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-table-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_box_padding',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'default'       => [
                                'top'   => 40,
                                'right' => 0,
                                'bottom'=> 0,
                                'left'  => 0,
                                'unit'  => 'px',
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-table-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    )
                ),
                array(
                    'name' => 'pricing_table_box_style_hover',
                    'label' => esc_html__('Hover', 'fastway'),
                    'controls' => array(
                        array(
                            'name' => 'pricing_table_box_background_hover',
                            'type' => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'classic' , 'gradient' ],
                            'selector'          => '{{WRAPPER}} .pricing-table-container:hover',
                        ),
                        array(
                            'name' => 'pricing_table_box_border_hover',
                            'type' => \Elementor\Group_Control_Border::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .pricing-table-container:hover',
                        ),
                        array(
                            'name' => 'pricing_table_box_border_radius_hover',
                            'label' => esc_html__('Border Radius', 'fastway'),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-price-button:hover' => 'border-radius: {{SIZE}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_table_box_shadow_hover',
                            'type' => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'      => '{{WRAPPER}} .pricing-table-container:hover',
                        ),
                        array(
                            'name' => 'pricing_box_margin_hover',
                            'label' => esc_html__('Margin', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-table-container:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                        array(
                            'name' => 'pricing_box_padding_hover',
                            'label' => esc_html__('Padding', 'fastway'),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'control_type' => 'responsive',
                            'size_units'    => ['px', 'em', '%'],
                            'default'       => [
                                'top'   => 40,
                                'right' => 0,
                                'bottom'=> 0,
                                'left'  => 0,
                                'unit'  => 'px',
                            ],
                            'selectors'     => [
                                '{{WRAPPER}} .pricing-table-container:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                            ]
                        ),
                    )
                ),
            )
        ),
    ),
);

etc_add_custom_widget(
    array(
        'name' => 'cms_pricing_table',
        'title' => esc_html__('Pricing Table', 'fastway'),
        'icon' => 'eicon-price-table',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'params' => array(
            'sections' => array(
                $pricing_table_layout_section,
                $pricing_table_icon_section,
                $pricing_table_title_section,
                $pricing_table_price_section,
                $pricing_table_list_section,
                $pricing_table_description_section,
                $pricing_table_button_section,
                $pricing_table_bagde_section,
                $pricing_table_title,
                $pricing_icon_style_settings,
                $pricing_title_style_settings,
                $pricing_price_style_settings,
                $pricing_list_style_settings,
                $pricing_description_style_settings,
                $pricing_button_style_settings,
                $pricing_table_badge_style,
                $pricing_box_style_settings,
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);