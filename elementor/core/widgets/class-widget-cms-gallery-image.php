<?php

class ETC_CmsGalleryImage_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_gallery_image';
    protected $title = 'CMS Image Gallery';
    protected $icon = 'eicon-testimonial';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_testimonial\/layout-image\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_testimonial\/layout-image\/layout2.png"}}},{"name":"style","label":"Style","type":"select","options":{"style1":"Style 1","style2":"Style 2"},"default":"style1","condition":{"layout":"4"}}]},{"name":"content_list","label":"Testimonial","tab":"content","controls":[{"name":"testimonial","label":"Add Item","type":"repeater","controls":[{"name":"title","label":"Title","type":"text","label_block":true},{"name":"sub_title","label":"Sub Title","type":"text","label_block":true},{"name":"position","label":"Position","type":"text","label_block":true},{"name":"description","label":"Description","type":"textarea","label_block":true},{"name":"image","label":"Image","type":"media","label_block":true}],"default":[{"title":"Name #1","sub_title":"","position":"Manager #1","description":"#1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/images\/assets\/placeholder\/no-image.jpg"},{"title":"Name #2","sub_title":"","position":"Manager #2","description":"#2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/images\/assets\/placeholder\/no-image.jpg"},{"title":"Name #3","sub_title":"","position":"Manager #3","description":"#3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/images\/assets\/placeholder\/no-image.jpg"}],"title_field":"{{{ title }}}"}]},{"name":"section_slick_slider_settings","label":"Carousel Settings","tab":"settings","controls":[{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","control_type":"responsive","default":30,"condition":{"slides_to_show!":"1"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"arrows_pos","label":"Arrows Position","type":"select","default":"in-vertical","options":{"in-vertical":"Inside Vertical","out-vertical":"Outside Vertical"},"condition":{"arrows":"true"},"prefix_class":"cms-slick-nav-","separator":"before"},{"name":"dots","label":"Show Dots","type":"switcher","default":"true"},{"name":"dots_pos","label":"Dots Position","type":"select","default":"out","options":{"in":"Inside","out":"Outside"},"condition":{"dots":"true"},"prefix_class":"cms-slick-dots-","separator":"before"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-slick-slider' );
}