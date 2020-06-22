<?php

class ETC_CmsToggle_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_toggle';
    protected $title = 'Toggle';
    protected $icon = 'eicon-toggle';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/frame\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_toggle\/layout1.png"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"active_section","label":"Active section","type":"number","separator":"after"},{"name":"cms_toggle","label":"Toggle Items","type":"repeater","default":[{"ac_title":"Toggle #1","ac_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."},{"ac_title":"Toggle #2","ac_content":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo."}],"controls":[{"name":"ac_title","label":"Title","type":"text"},{"name":"ac_content","label":"Content","type":"textarea","rows":10}],"title_field":"{{{ ac_title }}}","separator":"after"},{"name":"main_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-caret-right","library":"fa-solid"}},{"name":"icon_active","label":"Active Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-caret-up","library":"fa-solid"},"condition":{"main_icon!":""},"separator":"after"},{"name":"title_html_tag","label":"Title HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div"},"default":"div"}]},{"name":"section_title_style","label":"Toggle","tab":"style","controls":[{"name":"border_width","label":"Border Width","type":"slider","range":{"px":{"min":0,"max":10}},"selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-item":"border-width: {{SIZE}}{{UNIT}};"}},{"name":"border_color","label":"Border Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-item":"border-color: {{VALUE}};"}},{"name":"toggle_space","label":"Space Between","type":"slider","control_type":"responsive","range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-item:not(:last-child)":"margin-bottom: {{SIZE}}{{UNIT}};"}}]},{"name":"section_toggle_style_title","label":"Title","tab":"style","controls":[{"name":"title_background","label":"Background","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title":"background-color: {{VALUE}};"}},{"name":"title_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title":"color: {{VALUE}};"}},{"name":"tab_active_color","label":"Active Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title.active":"color: {{VALUE}};"}},{"name":"title_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-toggle .cms-toggle-title"},{"name":"title_padding","label":"Padding","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"section_toggle_style_icon","label":"Icon","tab":"style","controls":[{"name":"icon_align","label":"Alignment","type":"choose","options":{"left":{"title":"Start","icon":"eicon-h-align-left"},"right":{"title":"End","icon":"eicon-h-align-right"}},"default":"left","toggle":false,"label_block":false,"condition":{"main_icon!":""}},{"name":"icon_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon i:before":"color: {{VALUE}};"},"condition":{"main_icon!":""}},{"name":"icon_active_color","label":"Active Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title.active .cms-toggle-title-icon i:before":"color: {{VALUE}};"},"condition":{"main_icon!":""}},{"name":"icon_space","label":"Spacing","type":"slider","range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon.left":"margin-right: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-toggle .cms-toggle-title .cms-toggle-title-icon.right":"margin-left: {{SIZE}}{{UNIT}};"},"condition":{"main_icon!":""}}]},{"name":"section_toggle_style_content","label":"Content","tab":"style","controls":[{"name":"content_background_color","label":"Background","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-content":"background-color: {{VALUE}};"}},{"name":"content_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-content":"color: {{VALUE}};"}},{"name":"content_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-toggle .cms-toggle-content"},{"name":"content_padding","label":"Padding","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .cms-toggle .cms-toggle-content":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-toggle-widget-js' );
}