<?php

class ETC_CmsRevsliderHtml_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_revslider_html';
    protected $title = 'CMS RevSlider	';
    protected $icon = 'eicon-sync';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Home 01"},"2":{"label":"Home 02"},"3":{"label":"Home 03"}}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'themepunch-tools','jquery-themepunch-revolution','revolution-plugin','rev-script-1','rev-script-2','rev-script-3' );
}