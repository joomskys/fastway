<?php

class ETC_CmsVideoPlayer_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_video_player';
    protected $title = 'CMS Video Player';
    protected $icon = 'eicon-play';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"icon_section","label":"Video Player","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style3":"Style 3"},"default":"style1"},{"name":"image","label":"Choose Image","type":"media","condition":{"style":["style1","style2"]}},{"name":"image_s2","label":"Choose Image 2","type":"media","condition":{"style":"style2"}},{"name":"img_type","label":"Image Type","type":"select","options":{"img":"Image","bg":"Background Image"},"default":"img","condition":{"style":"style1"}},{"name":"img_height","label":"Image Height","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":3000}},"selectors":{"{{WRAPPER}} .cms-video-player .cms-video-bg-image":"height: {{SIZE}}{{UNIT}};"},"condition":{"img_type":"bg"}},{"name":"video_link","label":"Link","type":"text"},{"name":"video_label","label":"Label","type":"text","label_block":true,"condition":{"style":"style3"}},{"name":"video_sub_title","label":"Sub Title","type":"text","label_block":true,"condition":{"style":"style3"}},{"name":"video_btn_text","label":"Button Text","type":"text","default":"Contact Us","placeholder":"Contact Us","condition":{"style":["style3"]}},{"name":"video_btn_link","label":"Button Link","type":"url","placeholder":"https:\/\/your-link.com","label_block":true,"condition":{"style":"style3"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}