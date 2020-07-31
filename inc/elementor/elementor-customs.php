<?php
// Add custom field to section
if(!function_exists('fastway_custom_section_params')){
    add_filter('etc-custom-section/custom-params', 'fastway_custom_section_params');
    function fastway_custom_section_params(){
        return array(
            'sections' => array(
                array(
                    'name'     => 'cms_custom_layout',
                    'label'    => esc_html__( 'Custom Settings', 'fastway' ),
                    //'tab'      => Elementor_Theme_Core::ETC_TAB_NAME,
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        // this field hasn't config prefix_class
                        // its value will be handled at fastway_custom_section_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
                            'name'    => 'column_hori_align',
                            'label'   => esc_html__( 'Horizontal Align', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                ''        => esc_html__( 'Default', 'fastway' ),
                                'start'   => esc_html__( 'Start', 'fastway' ),
                                'center'  => esc_html__( 'Center', 'fastway' ),
                                'end'     => esc_html__( 'End', 'fastway' ),
                                'around'  => esc_html__( 'Space Around', 'fastway' ),
                                'between' => esc_html__( 'Space Between', 'fastway' ),
                            ),
                            'prefix_class' => 'cms-justify-content-',
                            'default'      => '',
                        ),
                        // this field has config prefix_class
                        // it mean that the class will be added directly to wrapper
                        // screen shot - http://prntscr.com/tjcnjg
                        array(
                            'name'    => 'add_shake_image',
                            'label'   => esc_html__( 'Add Shake Image', 'fastway' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'prefix_class' => 'cms-had-shake-img',
                            'default'      => 'false',
                        )
                    ),
                ),
            ),
        );
    }
}

// handle custom class will be added to section
if(!function_exists('fastway_custom_section_classes')){
    //add_filter('etc-custom-section-classes', 'fastway_custom_section_classes', 10, 2);
    function fastway_custom_section_classes($classes, $settings){
        if(isset($settings['column_hori_align']) && !empty($settings['column_hori_align'])){
            $classes[] = 'cms-justify-content-' . $settings['column_hori_align'];
        }
        return $classes;
    }
}

// Add custom field to column
if(!function_exists('fastway_custom_column_params')){
    //add_filter('etc-custom-column/custom-params', 'fastway_custom_column_params');
    function fastway_custom_column_params(){
        return array(
            'sections' => array(
                array(
                    'name' => 'custom_section',
                    'label' => esc_html__( 'Custom Settings', 'fastway' ),
                    'tab' => Elementor_Theme_Core::ETC_TAB_NAME,
                    'controls' => array(
                        // this field hasn't config prefix_class
                        // its value will be handled at fastway_custom_column_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
                            'name' => 'custom_style',
                            'label' => esc_html__( 'Style Settings', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                '' => esc_html__( 'Default', 'fastway' ),
                                '1' => esc_html__( 'Style 1', 'fastway' ),
                                '2' => esc_html__( 'Style 2', 'fastway' ),
                                '3' => esc_html__( 'Style 3', 'fastway' ),
                            ),
                            'default' => '',
                        ),
                        // this field has config prefix_class
                        // it mean that the class will be added directly to wrapper
                        // screen shot - http://prntscr.com/tjcnjg
                        array(
                            'name' => 'custom_position',
                            'label' => esc_html__( 'Position Settings', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                '' => esc_html__( 'Default', 'fastway' ),
                                '1' => esc_html__( 'Postion 1', 'fastway' ),
                                '2' => esc_html__( 'Postion 2', 'fastway' ),
                                '3' => esc_html__( 'Postion 3', 'fastway' ),
                            ),
                            'prefix_class' => 'fastway-',
                            'default' => '',
                        ),
                    ),
                ),
            ),
        );
    }
}

// handle custom class will be added to column
if(!function_exists('fastway_custom_column_classes')){
    //add_filter('etc-custom-column-classes', 'fastway_custom_column_classes', 10, 2);
    function fastway_custom_column_classes($classes, $settings){
        if(isset($settings['custom_style']) && !empty($settings['custom_style'])){
            $classes[] = 'style-' . $settings['custom_style'];
        }
        return $classes;
    }
}

// add html to before row
if(!function_exists('fastway_before_elementor_row_shake_image')){
    add_action('fastway_before_elementor_row','fastway_before_elementor_row_shake_image');
    function fastway_before_elementor_row_shake_image($settings){
        if($settings['add_shake_image'] === 'false') return;
    ?>
    <div class="pos-bl">
        <div class="cms-shake-image-wrap">
            <div class="cms-shake-image shake_image">
                <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/truck-2.png');?>" alt="fastway" >
                    <span class="tyre-position"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/rotate-tyer.png');?>" alt="fastway" class="spin-tyres"></span>
                <img class="blink-image" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/truck/light-blink.png');?>" alt="fastway">
            </div>
        </div>
    </div>
    <?php
    }
}