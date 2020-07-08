<?php
if(!empty($settings['menu_id'])){
    $html_id = etc_get_element_id($settings);
    wp_nav_menu( array(
        'menu' => $settings['menu_id'],
        'container'  => '',
        'menu_id'    => $html_id,
        'menu_class' => 'clearfix',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    ) );
}