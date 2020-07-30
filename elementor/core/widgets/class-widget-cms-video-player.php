<?php

class ETC_CmsVideoPlayer_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_video_player';
    protected $title = 'CMS Video Player';
    protected $icon = 'eicon-play';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"icon_section","label":"Video Player","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style3":"Style 3"},"default":"style1"},{"name":"image","label":"Choose Image","type":"media","condition":{"style":["style1","style2"]}},{"name":"image_s2","label":"Choose Image 2","type":"media","condition":{"style":"style2"}},{"name":"img_type","label":"Image Type","type":"select","options":{"img":"Image","bg":"Background Image"},"default":"img","condition":{"style":"style1"}},{"name":"img_height","label":"Image Height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .cms-video-player .cms-video-bg-image":"height: {{SIZE}}{{UNIT}};"},"condition":{"img_type":"bg"}},{"name":"video_link","label":"Link","type":"text","default":"https:\/\/www.youtube.com\/watch?v=XHOmBV4js_E"},{"name":"video_label","label":"Label","type":"text","label_block":true,"condition":{"style":"style3"}},{"name":"video_sub_title","label":"Sub Title","type":"text","label_block":true,"condition":{"style":"style3"}},{"name":"video_btn_text","label":"Button Text","type":"text","default":"Contact Us","placeholder":"Read More","condition":{"style":["style3"]}},{"name":"btn_link_type","label":"Link Type","type":"select","default":"custom","options":{"custom":"Custom","page":"Internal Page"},"condition":{"video_btn_text!":"","style":["style3"]}},{"name":"btn_link_page","label":"Page Link","type":"select","default":"","options":{"about":"About","blog":"Blog","blog-grid":"Blog Grid","blog-grid-sidebar":"Blog Grid Sidebar","blog-list":"Blog List","cart":"Cart","checkout":"Checkout","contact-us":"Contact Us","contact-us-2":"Contact Us 2","elements":"Elements","footer-dark-2":"Footer Dark","footer-dark":"Footer Dark","footer-fixed":"Footer Fixed","footer-light":"Footer Light","faqs":"Frequently Asked Questions","gallery":"Gallery","gallery-02":"Gallery 02","home":"Home","home-2":"Home 2","home-3":"Home 3","my-account":"My account","newsletter":"Newsletter","our-team":"Our Team","services":"Services","shop":"Shop","shop-products":"Shop - Products","wishlist":"Wishlist"},"condition":{"video_btn_text!":"","style":["style3"],"btn_link_type":"page"}},{"name":"video_btn_link","label":"Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"},"condition":{"video_btn_text!":"","style":["style3"],"btn_link_type":"custom"}},{"name":"btn_color","label":"Color","type":"select","default":"accent","options":{"default":"Default","accent":"Accent","primary":"Primary","secondary":"Secondary","white":"White"},"condition":{"video_btn_text!":"","style":["style3"]}},{"name":"btn_type","label":"Mode","type":"select","default":"btn btn-fill","options":{"btn btn-fill":"Fill","btn btn-outline":"Outline","btn-text":"Just Text","btn-overlay":"Overlay"},"condition":{"video_btn_text!":"","style":["style3"]}},{"name":"btn_size","label":"Size","type":"select","default":"","options":{"xs":"Extra Small","sm":"Small","":"Default","md":"Medium","lg":"Large","xl":"Extra Large"},"condition":{"video_btn_text!":"","style":["style3"]}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}