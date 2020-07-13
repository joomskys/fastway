<?php

class ETC_CmsIconBox_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_icon_box';
    protected $title = 'CMS Icon Box';
    protected $icon = 'eicon-icon-box';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout3.png"},"4":{"label":"Layout 4","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout4.png"}}}]},{"name":"icon_section","label":"Icon Box","tab":"content","controls":[{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"title_text","label":"Title &amp; Description","type":"text","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","placeholder":"Enter your description","rows":10,"show_label":false}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}