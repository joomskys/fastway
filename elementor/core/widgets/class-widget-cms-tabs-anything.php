<?php

class ETC_CmsTabsAnything_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_tabs_anything';
    protected $title = 'CMS Tabs Anything';
    protected $icon = 'eicon-tabs';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_tabs_anything\/layout1.png"}}}]},{"name":"section_tabs","label":"Tabs","tab":"content","controls":[{"name":"active_tab","label":"Active Tab","type":"number","default":1,"separator":"after"},{"name":"tabs","label":"Tabs Items","type":"repeater","controls":[{"name":"tab_title","label":"Title &amp; Description","type":"text","default":"Tab Title","placeholder":"Tab Title","label_block":true},{"name":"content_type","label":"Content Type","type":"select","default":"template","options":{"template":"Template","text_editor":"Text Editor"}},{"name":"tab_content_template","label":"Template","type":"select","default":"","options":{"":"Select Template","1060":"Why Choose Us - With progressbar","1051":"About Us - Video","973":"CMS Pricing Table","963":"Testinomial - Layout 1","945":"Why Choose Us","930":"Team - Layout1","805":"Single Service","720":"CMS Clients","697":"Footer Page","549":"Team Details","510":"Best team layout 1","38":"Default Kit"},"condition":{"content_type":"template"}},{"name":"tab_content","label":"Content","type":"wysiwyg","default":"Tab Content","placeholder":"Tab Content","show_label":false,"condition":{"content_type":"text_editor"}}],"default":[{"tab_title":"Tab #1","tab_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"tab_title":"Tab #2","tab_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."}],"title_field":"{{{ tab_title }}}"},{"name":"type","label":"Type","type":"select","default":"horizontal","options":{"horizontal":"Horizontal","vertical":"Vertical"},"prefix_class":"cms-tabs-view-","separator":"before"}]},{"name":"section_tabs_style","label":"Tabs","tab":"style","controls":[{"name":"navigation_width","label":"Navigation Width","type":"slider","default":{"unit":"%"},"range":{"%":{"min":10,"max":50}},"selectors":{"{{WRAPPER}} .cms-tabs-title":"width: {{SIZE}}{{UNIT}}"},"condition":{"type":"vertical"}},{"name":"border_width","label":"Border Width","type":"slider","default":{"size":1},"range":{"px":{"min":0,"max":10}},"selectors":{"{{WRAPPER}} .cms-tabs-title, {{WRAPPER}} .cms-tab-content, {{WRAPPER}}.cms-tabs-view-vertical .cms-tab-title":"border-width: {{SIZE}}{{UNIT}};"}},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .cms-tabs-title, {{WRAPPER}} .cms-tab-content, {{WRAPPER}}.cms-tabs-view-vertical .cms-tab-title":"border-color: {{VALUE}};"}},{"name":"background_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .cms-tab-title.active":"background-color: {{VALUE}};","{{WRAPPER}} .cms-tab-content":"background-color: {{VALUE}};"}}]},{"name":"section_title_style","label":"Title","tab":"style","controls":[{"name":"tab_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .cms-tab-title":"color: {{VALUE}};"}},{"name":"tab_active_color","label":"Active Color","type":"color","selectors":{"{{WRAPPER}} .cms-tab-title.active":"color: {{VALUE}};"}},{"name":"tab_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-tab-title"}]},{"name":"section_content_style","label":"Content","tab":"style","controls":[{"name":"content_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .cms-tab-content":"color: {{VALUE}};"}},{"name":"content_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-tab-content"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-tabs-widget-js','jquery-slick','cms-teams-list-widget-js' );
}