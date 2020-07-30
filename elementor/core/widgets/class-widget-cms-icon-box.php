<?php

class ETC_CmsIconBox_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_icon_box';
    protected $title = 'CMS Icon Box';
    protected $icon = 'eicon-icon-box';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout1.png"},"2":{"label":"Layout 2","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout2.png"},"3":{"label":"Layout 3","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout3.png"},"4":{"label":"Layout 4","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout4.png"},"5":{"label":"Layout 5","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout5.png"},"6":{"label":"Layout 6","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout6.png"},"7":{"label":"Layout 7","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout7.png"},"8":{"label":"Layout 8","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout8.png"},"9":{"label":"Layout 9","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout9.png"},"10":{"label":"Layout 10","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout10.png"},"11":{"label":"Layout 11","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout11.png"},"12":{"label":"Layout 12","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout12.png"},"13":{"label":"Layout 13","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_icon_box\/layout\/layout13.png"}}}]},{"name":"icon_section","label":"Icon Box","tab":"content","controls":[{"name":"selected_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":{"value":"fas fa-star","library":"fa-solid"}},{"name":"title_text","label":"Title","type":"text","default":"This is the heading","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"add_icon_link","label":"Add icon Link","type":"switcher","default":"true"},{"name":"btn_text","label":"Button Text","type":"text","default":"Overlay","placeholder":"Read More","condition":{"add_icon_link":"true"}},{"name":"btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"btn_text!":"","add_icon_link":"true"}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About","blog":"Blog","blog-grid":"Blog Grid","blog-grid-sidebar":"Blog Grid Sidebar","blog-list":"Blog List","cart":"Cart","checkout":"Checkout","contact-us":"Contact Us","contact-us-2":"Contact Us 2","elements":"Elements","footer-dark-2":"Footer Dark","footer-dark":"Footer Dark","footer-fixed":"Footer Fixed","footer-light":"Footer Light","faqs":"Frequently Asked Questions","gallery":"Gallery","gallery-02":"Gallery 02","home":"Home","home-2":"Home 2","home-3":"Home 3","my-account":"My account","newsletter":"Newsletter","our-team":"Our Team","services":"Services","shop":"Shop","shop-products":"Shop - Products","wishlist":"Wishlist"},"condition":{"btn_text!":"","add_icon_link":"true","btn_link_type":"page"}},{"name":"btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"btn_text!":"","add_icon_link":"true","btn_link_type":"custom"}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"btn_text!":"","add_icon_link":"true"}},{"name":"btn_type","label":"Mode","type":"select","default":"btn-overlay","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"btn_text!":"","add_icon_link":"true"}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"btn_text!":"","add_icon_link":"true"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}