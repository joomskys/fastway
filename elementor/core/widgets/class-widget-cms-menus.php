<?php

class ETC_CmsMenus_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_menus';
    protected $title = 'Menus';
    protected $icon = 'eicon-nav-menu';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/assets\/images\/elementor\/1.jpg"}}}]},{"name":"menus_section","label":"Menu","tab":"content","controls":[{"name":"menu_id","label":"Choose Menu","type":"select2","options":{"12":"Useful links"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}