<?php

class ETC_CmsProgressbar_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_progressbar';
    protected $title = 'CMS Progress Bar';
    protected $icon = 'eicon-skill-bar';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_progressbar\/layout\/layout1.png"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"progressbar_list","label":"Progress Bar Lists","type":"repeater","controls":[{"name":"title","label":"Title","type":"text","placeholder":"Enter your title","default":"My Skill","label_block":true},{"name":"inner_text","label":"Inner Text","type":"text","placeholder":"e.g. Web Designer","default":"Web Designer","label_block":true,"condition":{"layout":["2"]}},{"name":"progress_type","label":"Type","type":"select","default":"","options":{"":"Default","info":"Info","success":"Success","warning":"Warning","danger":"Danger"}},{"name":"percent","label":"Percentage","type":"slider","default":{"size":50,"unit":"%"},"label_block":true},{"name":"display_percentage","label":"Display Percentage","type":"select","default":"show","options":{"show":"Show","hide":"Hide"}}]}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'cms-progressbar-widget-js' );
}