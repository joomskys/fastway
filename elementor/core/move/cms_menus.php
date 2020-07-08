<?php
// Get all locations
$locations = get_nav_menu_locations();
$primary_menu = isset($locations['primary'])?$locations['primary']:'';
$menus = wp_get_nav_menus();
$options = [];
foreach ($menus as $menu){
    if($primary_menu != $menu->term_id){
        $options[$menu->term_id] = $menu->name;
    }
}
// Register Menus Widget
etc_add_custom_widget(
    array(
        'name' => 'cms_menus',
        'title' => esc_html__( 'Menus', 'fastway' ),
        'icon' => 'eicon-nav-menu',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/assets/images/elementor/1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'menus_section',
                    'label' => esc_html__( 'Menu', 'fastway' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu_id',
                            'label' => esc_html__( 'Choose Menu', 'fastway' ),
                            'type' => \Elementor\Controls_Manager::SELECT2,
                            'options' => $options,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);