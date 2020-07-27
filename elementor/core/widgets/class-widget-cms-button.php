<?php

class ETC_CmsButton_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_button';
    protected $title = 'CMS Button';
    protected $icon = 'eicon-button';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_button\/layout\/layout1.png"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"}},{"name":"type","label":"Mode","type":"select","default":"fill","options":{"fill":"Fill","outline":"Outline"}},{"name":"size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"}},{"name":"text","label":"Text","type":"text","default":"Click here","placeholder":"Click here"},{"name":"link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"text!":""}},{"name":"align","label":"Alignment","type":"choose","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"prefix_class":"elementor-align-","default":""},{"name":"btn_icon","label":"Icon","type":"icons","label_block":true,"fa4compatibility":"icon"},{"name":"icon_align","label":"Icon Position","type":"select","default":"left","options":{"left":"Before","right":"After"},"condition":{"btn_icon!":""}},{"name":"icon_indent","label":"Icon Spacing","type":"slider","range":{"px":{"min":5,"max":50}},"condition":{"btn_icon!":""},"selectors":{"{{WRAPPER}} .cms-button .cms-align-icon-right":"margin-left: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-button .cms-align-icon-left":"margin-right: {{SIZE}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}