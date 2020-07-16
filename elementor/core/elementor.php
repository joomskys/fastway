<?php
if(!function_exists('fastway_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'fastway_register_custom_icon_library');
    function fastway_register_custom_icon_library($tabs){
        $custom_tabs = [
            'flat_icon' => [
                'name'          => 'flaticon',
                'label'         => esc_html__( 'Flaticon', 'fastway' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/flaticon/font-flaticon.css',
                'enqueue'       => [  ],
                'prefix'        => '',
                'displayPrefix' => 'flaticon',
                'labelIcon'     => 'fab fa-font-awesome-alt',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.js',
                'native'        => true,
            ],
        ];

        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

if(!function_exists('fastway_elementor_slick_slider_settings')){
    function fastway_elementor_slick_slider_settings(){
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_slick_slider_settings',
            'label'    => esc_html__('Carousel Settings', 'fastway'),
            'tab'      => \Elementor\Controls_Manager::TAB_SETTINGS,
            'controls' => array(
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
                    'control_type' => 'responsive',
                    'default'      => 30,
                    'condition'    => [
                        'slides_to_show!' => '1',
                    ]
                ),
                array(
                    'name'  => 'arrows',
                    'label' => esc_html__('Show Arrows', 'fastway'),
                    'type'  => \Elementor\Controls_Manager::SWITCHER,
                ),
                array(
                    'name'    => 'arrows_pos',
                    'label'   => esc_html__('Arrows Position', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'in-vertical',
                    'options' => [
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
                    'name'    => 'dots',
                    'label'   => esc_html__('Show Dots', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'true'
                ),
                array(
                    'name'    => 'dots_pos',
                    'label'   => esc_html__('Dots Position', 'fastway'),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'out',
                    'options' => [
                        'in'    => esc_html__('Inside','fastway'),
                        'out'    => esc_html__('Outside','fastway')
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
        );
    }
}

if(!function_exists('fastway_slick_slider_settings')){
    function fastway_slick_slider_settings($widget){
        $slides_to_show          = $widget->get_setting('slides_to_show', '3');
        $slides_to_show_tablet   = $widget->get_setting('slides_to_show_tablet', '2');
        $slides_to_show_mobile   = $widget->get_setting('slides_to_show_mobile', '1');
        $slides_to_scroll        = $widget->get_setting('slides_to_scroll', '3');
        $slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', '2');
        $slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', '1');

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

        $slides_gutter  = (int) $widget->get_setting('slides_gutter', '30')/2;
        $arrows         = $widget->get_setting('arrows','false');
        $arrows_pos     = $widget->get_setting('arrows_pos','in-vertical');
        $dots           = $widget->get_setting('dots','true');
        $dots_pos       = $widget->get_setting('dots_pos','out');
        $pause_on_hover = $widget->get_setting('pause_on_hover','true');
        $autoplay       = $widget->get_setting('autoplay', 'true');
        $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
        $infinite       = $widget->get_setting('infinite','true');
        $speed          = $widget->get_setting('speed', '500');

        $dir = $widget->get_setting('dir', 'ltr');

        $widget->add_render_attribute( 'cms-slider-settings', [
            'class'                     => 'cms-slick-slider',
            'data-arrows'               => $arrows,
            'data-dots'                 => $dots,
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


// Scan element (need add to bottom of this file)
$files = scandir(get_template_directory() . '/elementor/core/register');
foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}