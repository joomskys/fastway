<?php

class ETC_CmsHeading_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_heading';
    protected $title = 'CMS Heading';
    protected $icon = 'eicon-t-letter';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"2":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_heading\/layout\/layout2.png"},"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_heading\/layout\/layout1.png"}}}]},{"name":"title_section","label":"Custom Heading","tab":"content","controls":[{"name":"heading_text","label":"Heading","type":"text","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"subheading_text","label":"Sub Heading","type":"text","default":"This is the sub heading","placeholder":"Enter your sub title","label_block":true,"condition":{"layout":"1"}},{"name":"description_text","label":"Description","type":"textarea","default":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","placeholder":"Enter your description","rows":10,"show_label":false,"condition":{"layout":"1"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}