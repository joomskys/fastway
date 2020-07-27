<?php
if(!function_exists('fastway_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'fastway_register_custom_icon_library');
    function fastway_register_custom_icon_library($tabs){
        $custom_tabs = [
            'flat_icon' => [
                'name'          => 'flaticon',
                'label'         => esc_html__( 'Flaticon', 'fastway' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/flaticon/font-flaticon.css',
                'enqueue'       => [],
                'prefix'        => '',
                'displayPrefix' => 'flaticon',
                'labelIcon'     => 'fab fa-font-awesome-alt',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.js',
                'native'        => true,
            ],
            'icomoon_icon' => [
                'name'          => 'iconmoon',
                'label'         => esc_html__( 'IcoMoon', 'fastway' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/icomoon/css/font-icomoon.css',
                'enqueue'       => [],
                'prefix'        => 'iconmoon ',
                'displayPrefix' => 'iconmoonxxxx ',
                'labelIcon'     => 'iconmoon iconmoon-buildings',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/icomoon/icomoon.js',
                'native'        => true,
            ]
        ];

        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

if(!function_exists('fastway_elementor_layout_mode_settings')){
    function fastway_elementor_layout_mode_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_layout_mode_settings',
            'label'    => esc_html__('Layout Mode Settings', 'fastway'),
            'tab'      => $args['tab'],
            'controls' => array(
                array(
                    'name'    => 'layout_mode',
                    'label'   => esc_html__('Layout Mode', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'grid',
                    'options' => [
                        'grid'     => esc_html__('Grid', 'fastway'),
                        'masonry'  => esc_html__('Masonry', 'fastway'),
                        'carousel' => esc_html__('Carousel', 'fastway'),
                    ]
                ),
                // Slick Slider Settings
                array(
                    'name'    => 'slide_mode',
                    'label'   => esc_html__('Slide mode', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'true' => esc_html__('Fade', 'fastway'),
                        'false' => esc_html__('Slide', 'fastway'),
                    ],
                    'default'   => 'false',
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'         => 'slides_to_show',
                    'label'        => esc_html__('Slides to Show', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'fastway' ),
                        ] + $slides_to_show,
                    'condition' => [
                        'layout_mode' => 'carousel',
                        'slide_mode!' => 'true'
                    ]
                ),
                array(
                    'name'         => 'slides_to_scroll',
                    'label'        => esc_html__('Slides to Scroll', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'fastway' ),
                        ] + $slides_to_show,
                    'condition' => [
                        'slides_to_show!' => '1',
                        'slide_mode!'     => 'true',
                        'layout_mode'     => 'carousel'
                    ],
                ),
                array(
                    'name'         => 'slides_gutter',
                    'label'        => esc_html__('Gutter', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::NUMBER,
                    //'control_type' => 'responsive',
                    'default'      => 30,
                    'condition'    => [
                        'slides_to_show!' => '1',
                        'slide_mode!'     => 'true',
                        'layout_mode'     => 'carousel'
                    ]
                ),
                array(
                    'name'         => 'arrows',
                    'label'        => esc_html__('Show Arrows', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]

                ),
                array(
                    'name'         => 'arrows_pos',
                    'label'        => esc_html__('Arrows Position', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'in-vertical',
                    'options'      => [
                        'in-vertical'    => esc_html__('Inside Vertical','fastway'),
                        'out-vertical'    => esc_html__('Outside Vertical','fastway')
                    ],
                    'condition' => [
                        'arrows'      => 'true',
                        'layout_mode' => 'carousel'
                    ],
                    'prefix_class' => 'cms-slick-nav-',
                    'separator'    => 'before',
                ),
                array(
                    'name'         => 'dots',
                    'label'        => esc_html__('Show Dots', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                    'default'      => 'true',
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'         => 'dots_pos',
                    'label'        => esc_html__('Dots Position', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'out',
                    'options'      => [
                        'in'  => esc_html__('Inside','fastway'),
                        'out' => esc_html__('Outside','fastway')
                    ],
                    'condition' => [
                        'dots'   => 'true',
                        'layout_mode' => 'carousel'
                    ],
                    'prefix_class' => 'cms-slick-dots-',
                    'separator'    => 'before',
                ),
                array(
                    'name'  => 'pause_on_hover',
                    'label' => esc_html__('Pause on Hover', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'  => 'autoplay',
                    'label' => esc_html__('Autoplay', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'      => 'autoplay_speed',
                    'label'     => esc_html__('Autoplay Speed', 'fastway'),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'default'   => 5000,
                    'condition' => [
                        'autoplay'    => 'true',
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'  => 'infinite',
                    'label' => esc_html__('Infinite Loop', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
                array(
                    'name'    => 'speed',
                    'label'   => esc_html__('Animation Speed', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 500,
                    'condition' => [
                        'layout_mode' => 'carousel'
                    ]
                ),
            ),
        );
    }
}
if(!function_exists('fastway_elementor_layout_mode_settings_render_attrs')){
    function fastway_elementor_layout_mode_settings_render_attrs($widget, $settings, $args = []){
        $args = wp_parse_args($args,[
            'post_type' => 'post',
            'class'     => ''
        ]);
        $html_id   = etc_get_element_id($settings);
        extract(etc_get_posts_of_grid($args['post_type'], [
            'source'   => $widget->get_setting('source', ''),
            'orderby'  => $widget->get_setting('orderby', 'date'),
            'order'    => $widget->get_setting('order', 'desc'),
            'limit'    => $widget->get_setting('limit', 6),
            'post_ids' => $widget->get_setting('post_ids', ''),
        ]));

        $widget->add_render_attribute( 'wrapper', [
            'id'              => $html_id,
            'class'           => '', //$args['class'],
            'data-mode'       => $settings['layout_mode'],
            'data-layout'     => $settings['layout_type'],
            'data-start-page' => $paged,
            'data-max-pages'  => $max,
            'data-total'      => $total,
            'data-perpage'    => $widget->get_setting('limit', 6),
            'data-next-link'  => $next_link
        ]);
        etc_print_html($widget->get_render_attribute_string( 'wrapper' ));
    }
}

if(!function_exists('fastway_elementor_slick_slider_settings')){
    function fastway_elementor_slick_slider_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
            'condition' => []
        ]);
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_slick_slider_settings',
            'label'    => esc_html__('Carousel Settings', 'fastway'),
            'tab'      => $args['tab'],
            'controls' => array(
                array(
                    'name' => 'slide_mode',
                    'label' => esc_html__('Slide mode', 'fastway'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'true' => esc_html__('Fade', 'fastway'),
                        'false' => esc_html__('Slide', 'fastway'),
                    ],
                    'default' => 'false',
                ),
                array(
                    'name'         => 'slides_to_show',
                    'label'        => esc_html__('Slides to Show', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'fastway' ),
                        ] + $slides_to_show,
                ),
                array(
                    'name'         => 'slides_to_scroll',
                    'label'        => esc_html__('Slides to Scroll', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => '',
                    'options'      => [
                            '' => esc_html__('Default', 'fastway' ),
                        ] + $slides_to_show,
                    'condition' => [
                        'slides_to_show!' => '1',
                    ],
                ),
                array(
                    'name'         => 'slides_gutter',
                    'label'        => esc_html__('Gutter', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::NUMBER,
                    //'control_type' => 'responsive',
                    'default'      => 30,
                    'condition'    => [
                        'slides_to_show!' => '1',
                    ]
                ),
                array(
                    'name'         => 'arrows',
                    'label'        => esc_html__('Show Arrows', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                ),
                array(
                    'name'         => 'arrows_pos',
                    'label'        => esc_html__('Arrows Position', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'in-vertical',
                    'options'      => [
                        'in-vertical'    => esc_html__('Inside Vertical','fastway'),
                        'out-vertical'    => esc_html__('Outside Vertical','fastway')
                    ],
                    'condition' => [
                        'arrows'   => 'true'
                    ],
                    'prefix_class' => 'cms-slick-nav-',
                    'separator'    => 'before',
                ),
                array(
                    'name'         => 'dots',
                    'label'        => esc_html__('Show Dots', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'control_type' => 'responsive',
                    'default'      => 'true'
                ),
                array(
                    'name'         => 'dots_pos',
                    'label'        => esc_html__('Dots Position', 'fastway'),
                    'type'         => \Elementor\Controls_Manager::SELECT,
                    'control_type' => 'responsive',
                    'default'      => 'out',
                    'options'      => [
                        'in'  => esc_html__('Inside','fastway'),
                        'out' => esc_html__('Outside','fastway')
                    ],
                    'condition' => [
                        'dots'   => 'true'
                    ],
                    'prefix_class' => 'cms-slick-dots-',
                    'separator'    => 'before',
                ),
                array(
                    'name'  => 'pause_on_hover',
                    'label' => esc_html__('Pause on Hover', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'  => 'autoplay',
                    'label' => esc_html__('Autoplay', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'      => 'autoplay_speed',
                    'label'     => esc_html__('Autoplay Speed', 'fastway'),
                    'type'      => \Elementor\Controls_Manager::NUMBER,
                    'default'   => 5000,
                    'condition' => [
                        'autoplay' => 'true'
                    ]
                ),
                array(
                    'name'  => 'infinite',
                    'label' => esc_html__('Infinite Loop', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'    => 'speed',
                    'label'   => esc_html__('Animation Speed', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::NUMBER,
                    'default' => 500,
                ),
            ),
            'condition' => $args['condition']
        );
    }
}

if(!function_exists('fastway_slick_slider_settings')){
    function fastway_slick_slider_settings($widget, $class=''){
        $layout_mode = $widget->get_setting('layout_mode', 'carousel');
        if($layout_mode != 'carousel') return;

        $slide_mode              = $widget->get_setting('slide_mode', 'false');
        $slides_to_show          = $widget->get_setting('slides_to_show', '3');
        $slides_to_show_tablet   = $widget->get_setting('slides_to_show_tablet', '2');
        $slides_to_show_mobile   = $widget->get_setting('slides_to_show_mobile', '1');
        $slides_to_scroll        = $widget->get_setting('slides_to_scroll', '3');
        $slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', '2');
        $slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', '1');

        if($slide_mode == 'true'){
            $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = '1';
        } else {
            $slidesToShow = !empty($slides_to_show)?$slides_to_show:3;
            $isSingleSlide = 1 === $slidesToShow;
            $defaultLGDevicesSlidesCount = $isSingleSlide ? 1 : 3;
            $slidesToShowTablet = !empty($slides_to_show_tablet)?$slides_to_show_tablet:$defaultLGDevicesSlidesCount;
            $slidesToShowMobile = !empty($slides_to_show_mobile)?$slides_to_show_mobile:1;
            if($isSingleSlide){
                $slidesToScroll = 1;
            }
            else{
                $slidesToScroll = !empty($slides_to_scroll)?$slides_to_scroll:$defaultLGDevicesSlidesCount;
            }
            $slidesToScrollTablet = !empty($slides_to_scroll_tablet)?$slides_to_scroll_tablet:$defaultLGDevicesSlidesCount;
            $slidesToScrollMobile = !empty($slides_to_scroll_mobile)?$slides_to_scroll_mobile:1;
        }

        $slides_gutter  = (int) $widget->get_setting('slides_gutter', '30')/2;
        $arrows         = $widget->get_setting('arrows');
        $arrows_tablet   = $widget->get_setting('arrows_tablet');
        $arrows_mobile  = $widget->get_setting('arrows_mobile');
        $arrows_pos     = $widget->get_setting('arrows_pos','in-vertical');
        $dots           = $widget->get_setting('dots');
        $dots_tablet     = $widget->get_setting('dots_table');
        $dots_mobile    = $widget->get_setting('dots_mobile');
        $dots_pos       = $widget->get_setting('dots_pos','out');
        $pause_on_hover = $widget->get_setting('pause_on_hover');
        $autoplay       = $widget->get_setting('autoplay');
        $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
        $infinite       = $widget->get_setting('infinite');
        $speed          = $widget->get_setting('speed', '500');

        $dir = $widget->get_setting('dir', 'ltr');

        $widget->add_render_attribute( 'cms-slider-settings', [
            'class'                     => trim('cms-slick-slider '.$class),
            'data-fade'                 => $slide_mode,
            'data-arrows'               => $arrows,
            'data-arrowstable'          => $arrows_tablet,
            'data-arrowsmobile'         => $arrows_mobile,
            'data-dots'                 => $dots,
            'data-dotstablet'           => $dots_tablet,
            'data-dotsmobile'           => $dots_mobile,
            'data-pauseOnHover'         => $pause_on_hover,
            'data-autoplay'             => $autoplay,
            'data-autoplaySpeed'        => $autoplay_speed,
            'data-infinite'             => $infinite,
            'data-speed'                => $speed,
            'data-slidestoshow'         => $slidesToShow,
            'data-slidestoshowtablet'   => $slidesToShowTablet,
            'data-slidestoshowmobile'   => $slidesToShowMobile,
            'data-slidestoscroll'       => $slidesToScroll,
            'data-slidestoscrolltablet' => $slidesToScrollTablet,
            'data-slidestoscrollmobile' => $slidesToScrollMobile,
            'data-gutter'               => $slides_gutter,
            'data-dir'                  => $dir,
            'style'                     => 'margin-left:-'.$slides_gutter.'px; margin-right:-'.$slides_gutter.'px',    
        ] );

        etc_print_html($widget->get_render_attribute_string( 'cms-slider-settings' ));
    }
}

// Grid settings
if(!function_exists('fastway_grid_column_settings')){
    function fastway_grid_column_settings(){
        return array(
            array(
                'name'    => 'col_sm',
                'label'   => esc_html__( 'Columns SM Devices', 'fastway' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_md',
                'label'   => esc_html__( 'Columns MD Devices', 'fastway' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_lg',
                'label'   => esc_html__( 'Columns LG Devices', 'fastway' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            ),
            array(
                'name'    => 'col_xl',
                'label'   => esc_html__( 'Columns XL Devices', 'fastway' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'  => '1',
                    '2'  => '2',
                    '3'  => '3',
                    '4'  => '4',
                    '6'  => '6',
                    '12' => '12',
                ],
            )
        );
    }
}

if(!function_exists('fastway_elementor_button_settings')){
    function fastway_elementor_button_settings($args = []){
        $args = wp_parse_args($args, [
            'options'   => [],
            'condition' => [],
            'btn_text'  => ''
        ]);
        $default = [
            array(
                'name'        => 'btn_text',
                'label'       => esc_html__( 'Button Text', 'fastway' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => $args['btn_text'],
                'placeholder' => esc_html__('Read More', 'fastway'),
                'condition'   => $args['condition'],
            ),
            array(
                'name'        => 'btn_link',
                'label'       => esc_html__( 'Link', 'fastway' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'fastway' ),
                'default'     => [
                    'url' => '#',
                ],
                'condition' => array_merge(['btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => 'btn_color',
                'label'       => esc_html__( 'Color', 'fastway' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => 'accent',
                'options'     => [
                    'default'   => esc_html__('Default','fastway'),
                    'accent'    => esc_html__('Accent','fastway'),
                    'primary'   => esc_html__('Primary','fastway'),
                    'secondary' => esc_html__('Secondary','fastway'),
                    'white'     => esc_html__('White','fastway')
                ],
                'condition' => array_merge(['btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => 'btn_type',
                'label'       => esc_html__( 'Mode', 'fastway' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => 'btn btn-fill',
                'options'     => [
                    'btn btn-fill'    => esc_html__('Fill','fastway'),
                    'btn btn-outline' => esc_html__('Outline','fastway'),
                    'btn-text'        => esc_html__('Just Text','fastway'),
                ],
                'condition' => array_merge(['btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => 'btn_size',
                'label'       => esc_html__( 'Size', 'fastway' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '',
                'options'     => [
                    'xs' => esc_html__('Extra Small','fastway'),  
                    'sm' => esc_html__('Small','fastway'),  
                    ''   => esc_html__('Default','fastway'),
                    'md' => esc_html__('Medium','fastway'),
                    'lg' => esc_html__('Large','fastway'),
                    'xl' => esc_html__('Extra Large','fastway')
                ],
                'condition' => array_merge(['btn_text!' => ''], $args['condition']), 
            )
        ];
        return wp_parse_args($args['options'], $default);
    }
}
if(!function_exists('fastway_elementor_button_render')){
    function fastway_elementor_button_render($widget, $settings, $args = []){
        $args = wp_parse_args($args, [
            'wrap'  => true,
            'class' => ''
        ]);
        if ( ! empty( $settings['btn_link']['url'] ) ) {
            $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );
            $widget->add_render_attribute( 'button', 'class', 'btn' );

            if ( $settings['btn_link']['is_external'] ) {
                $widget->add_render_attribute( 'button', 'target', '_blank' );
            }

            if ( $settings['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
            }
        }
        $widget->add_render_attribute( 'button', 'role', 'button' );

        if ( ! empty( $settings['btn_color'] ) ) {
            $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['btn_color'] );
        }
        if ( ! empty( $settings['btn_type'] ) ) {
            $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['btn_type'] );
        }
        if ( ! empty( $settings['btn_size'] ) ) {
            $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['btn_size'] );
        }
        $is_new = \Elementor\Icons_Manager::is_migration_allowed();

        $settings['icon_align'] = isset($settings['icon_align']) ? $settings['icon_align'] : 'left';
        if($args['wrap'] == true):
    ?>
        <div class="cms-btn-wraps <?php echo esc_attr($args['class']);?>">
    <?php endif; ?>
            <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <?php
                $widget->add_render_attribute( [
                    'content-wrapper' => [
                        'class' => 'cms-btn-content',
                    ],
                    'icon-align' => [
                        'class' => [
                            'cms-btn-icon',
                            'cms-align-icon-' . $settings['icon_align'],
                        ],
                    ],
                    'text' => [
                        'class' => 'cms-btn-text',
                    ],
                ] );
                $widget->add_inline_editing_attributes( 'text', 'none' );
                ?>
                <span <?php etc_print_html($widget->get_render_attribute_string( 'content-wrapper' )); ?>>
                    <?php if($settings['icon_align'] === 'left' && !empty($settings['btn_icon']['value'])) : ?>
                        <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; ?>
                    <span <?php etc_print_html($widget->get_render_attribute_string( 'text' )); ?>><?php echo esc_html($settings['btn_text']); ?></span>
                    <?php if($settings['icon_align'] === 'right' && !empty($settings['btn_icon']['value'])) : ?>
                        <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; ?>
                </span>
            </a>
        <?php  if($args['wrap'] == true): ?>
        </div>
    <?php
        endif;
    }
}
// Scan element (need add to bottom of this file)
$files = scandir(get_template_directory() . '/elementor/core/register');
foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}