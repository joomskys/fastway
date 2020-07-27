<?php

class ETC_CmsCtf7_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_ctf7';
    protected $title = 'CMS Contact Form 7';
    protected $icon = 'eicon-form-horizontal';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"heading_text","label":"Form Title","type":"text","default":"","placeholder":"Enter Form title","label_block":true},{"name":"ctf7_id","label":"Select Form","type":"select","options":{"982":"FastWay - Home 01","793":"FastWay 03","575":"FastWay 02","561":"FastWay 01","560":"Contact form 1"}}]},{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_ctf7\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_ctf7\/layout\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_ctf7\/layout\/layout3.png"}}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}