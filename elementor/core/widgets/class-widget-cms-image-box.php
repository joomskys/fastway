<?php

class ETC_CmsImageBox_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_image_box';
    protected $title = 'Image Box';
    protected $icon = 'eicon-image-box';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/frame\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_image_box\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/frame\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_image_box\/layout2.png"}}}]},{"name":"image_section","label":"Image Box","tab":"content","controls":[{"name":"image","label":"Choose Image","type":"media"},{"name":"thumbnail","label":"Choose Image","type":"image-size","control_type":"group","default":"full"},{"name":"title_text","label":"Title &amp; Description","type":"text","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com"},{"name":"title_size","label":"Title HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div","span":"span","p":"p"},"default":"h3"},{"name":"view","label":"View","type":"hidden","default":"traditional"}]},{"name":"section_style_image","label":"Image","tab":"style","controls":[{"name":"icon_space","label":"Spacing","type":"slider","control_type":"responsive","size_units":["px"],"default":{"size":15},"range":{"px":{"min":15,"max":100}},"selectors":{"{{WRAPPER}} .cms-image-box-layout1 .cms-image-box-img":"margin-bottom: {{SIZE}}{{UNIT}};","{{WRAPPER}} .cms-image-box-layout2 .cms-image-box-img":"margin-right: {{SIZE}}{{UNIT}};"}},{"name":"image_size","label":"Width(%)","type":"slider","control_type":"responsive","size_units":["%"],"range":{"%":{"min":5,"max":100}},"default":{"size":30,"unit":"%"},"tablet_default":{"unit":"%"},"mobile_default":{"unit":"%"},"selectors":{"{{WRAPPER}} .cms-image-box-img":"width: {{SIZE}}{{UNIT}};"}},{"name":"hover_animation","label":"Hover Animation","type":"hover_animation"},{"name":"image_effects","control_type":"tab","tabs":[{"name":"normal","label":"Normal","controls":[{"name":"image_opacity","label":"Opacity","type":"slider","range":{"px":{"max":1,"min":0.10000000000000001,"step":0.01}},"selectors":{"{{WRAPPER}} .cms-image-box-img img":"opacity: {{SIZE}};"}},{"name":"background_hover_transition","label":"Transition Duration","type":"slider","default":{"size":0.29999999999999999},"range":{"px":{"max":3,"step":0.10000000000000001}},"selectors":{"{{WRAPPER}} .cms-image-box-img img":"transition-duration: {{SIZE}}"}}]},{"name":"hover","label":"Hover","controls":[{"name":"image_opacity_hover","label":"Opacity","type":"slider","range":{"px":{"max":1,"min":0.10000000000000001,"step":0.01}},"selectors":{"{{WRAPPER}}:hover .cms-image-box-img img":"opacity: {{SIZE}};"}}]}]}]},{"name":"section_style_content","label":"Content","tab":"style","controls":[{"name":"text_align","label":"Alignment","type":"choose","control_type":"responsive","options":{"left":{"title":"Left","icon":"fa fa-align-left"},"center":{"title":"Center","icon":"fa fa-align-center"},"right":{"title":"Right","icon":"fa fa-align-right"},"justify":{"title":"Justified","icon":"fa fa-align-justify"}},"selectors":{"{{WRAPPER}} .cms-icon-box-wrapper":"text-align: {{VALUE}};"}},{"name":"heading_title","label":"Title","type":"heading","separator":"before"},{"name":"title_bottom_space","label":"Bottom Spacing","type":"slider","size_units":["px"],"range":{"px":{"min":0,"max":100}},"selectors":{"{{WRAPPER}} .cms-image-box-title":"margin-bottom: {{SIZE}}{{UNIT}};"}},{"name":"title_color","label":"Color","type":"color","size_units":["px","%"],"selectors":{"{{WRAPPER}} .cms-image-box-title":"color: {{VALUE}};","{{WRAPPER}} .cms-image-box-title a":"color: {{VALUE}};"}},{"name":"title_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-image-box-description"},{"name":"heading_description","label":"Description","type":"heading","separator":"before"},{"name":"description_color","label":"Color","type":"color","size_units":["px","%"],"selectors":{"{{WRAPPER}}  .cms-image-box-description":"color: {{VALUE}};"}},{"name":"description_typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .cms-image-box-description"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}