<?php

class ETC_CmsAlert_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_alert';
    protected $title = 'a Alert';
    protected $icon = 'eicon-alert';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/frame\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_alert\/layout1.png"}}}]},{"name":"section_alert","label":"Alert","tab":"content","controls":[{"name":"alert_type","label":"Type","type":"select","default":"info","options":{"info":"Info","success":"Success","warning":"Warning","danger":"Danger"},"prefix_class":"cms-alert-"},{"name":"alert_title","label":"Title &amp; Description","type":"text","placeholder":"Enter your title","default":"This is an Alert","label_block":true},{"name":"alert_description","type":"textarea","placeholder":"Enter your description","default":"I am a description. Click the edit button to change this text.","show_label":false},{"name":"show_dismiss","label":"Dismiss Button","type":"select","default":"show","options":{"show":"Show","hide":"Hide"}}]},{"name":"section_type","label":"Alert","tab":"style","controls":[{"name":"background","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .cms-alert":"background-color: {{VALUE}};"}},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .cms-alert":"border-color: {{VALUE}};"}},{"name":"border_left-width","label":"Left Border Width","type":"slider","range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-alert":"border-left-width: {{SIZE}}{{UNIT}};"}}]},{"name":"section_title","label":"Title","tab":"style","controls":[{"name":"title_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .cms-alert-title":"color: {{VALUE}};"}},{"name":"alert_title","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-alert-title"}]},{"name":"section_description","label":"Description","tab":"style","controls":[{"name":"description_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .cms-alert-description":"color: {{VALUE}};"}},{"name":"alert_description","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-alert-description"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-alert-widget-js' );
}