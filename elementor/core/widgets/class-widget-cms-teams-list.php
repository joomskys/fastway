<?php

class ETC_CmsTeamsList_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_teams_list';
    protected $title = 'CMS Teams List';
    protected $icon = 'fa fa-users';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_teams_list\/layout\/layout1.png"}}},{"name":"team_image_size","type":"image-size","default":"full"}]},{"name":"section_teams","label":"Teams","tab":"content","controls":[{"name":"teams","label":"Select Form","type":"repeater","default":[{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"},{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"},{"team_name":"Member Name","team_job":"Member Job Title","team_desc":"Member Description","team_link":"http:\/\/team-link.com"}],"controls":[{"name":"team_name","label":"Member Name","type":"text","label_block":true,"default":"Team Name"},{"name":"team_job","label":"Member Job Title","type":"text","label_block":true,"default":"Member Job Title"},{"name":"team_desc","label":"Member Description","type":"textarea","label_block":true,"default":"Member Description"},{"name":"team_link","label":"Member URL","type":"url","label_block":true,"placeholder":"http:\/\/team-link.com"},{"name":"team_social","label":"Member Social","type":"heading","separator":"before"},{"name":"team_link_facebook","label":"Facebook","type":"text"},{"name":"team_link_twitter","label":"Twitter","type":"text"},{"name":"team_link_linkedin","label":"Linkedin","type":"text"},{"name":"team_link_instagram","label":"Instagram","type":"text"},{"name":"team_link_skype","label":"Skype","type":"text"},{"name":"team_social_new_window","label":"Open in new window","type":"switcher"},{"name":"team_social_nofollow","label":"Add nofollow","type":"switcher","separator":"after"},{"name":"team_image","label":"Team Logo\/Image","type":"media","label_block":true}],"title_field":"{{{ team_name }}}"}]},{"name":"section_slick_slider_settings","label":"Carousel Settings","tab":"settings","controls":[{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","default":"","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","control_type":"responsive","default":30,"condition":{"slides_to_show!":"1"}},{"name":"arrows","label":"Show Arrows","type":"switcher"},{"name":"arrows_pos","label":"Arrows Position","type":"select","default":"in-vertical","options":{"in-vertical":"Inside Vertical","out-vertical":"Outside Vertical"},"condition":{"arrows":"true"},"prefix_class":"cms-slick-nav-","separator":"before"},{"name":"dots","label":"Show Dots","type":"switcher","default":"true"},{"name":"dots_pos","label":"Dots Position","type":"select","default":"out","options":{"in":"Inside","out":"Outside"},"condition":{"dots":"true"},"prefix_class":"cms-slick-dots-","separator":"before"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher"},{"name":"autoplay","label":"Autoplay","type":"switcher"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher"},{"name":"speed","label":"Animation Speed","type":"number","default":500}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-slick-slider' );
}