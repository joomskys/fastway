<?php

$files = scandir(get_template_directory() . '/elementor/core/register');

foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}

if(!function_exists('fastway_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'fastway_register_custom_icon_library');
    function fastway_register_custom_icon_library($tabs){
        $custom_tabs = [
            'fastway' => [
                'name' => 'fastway',
                'label' => esc_html__( 'Elementorframe', 'fastway' ),
                'url' => get_template_directory_uri() . '/assets/icomoon/style.css',
                'enqueue' => [  ],
                'prefix' => 'icon-',
                'displayPrefix' => 'fastway',
                'labelIcon' => 'fab fa-font-awesome-alt',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/icomoon/icons.js',
                'native' => true,
            ],
        ];

        $tabs = array_merge($custom_tabs, $tabs);

        return $tabs;
    }
}