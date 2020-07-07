<?php

class ETC_CmsPostGrid_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_post_grid';
    protected $title = 'Post Grid';
    protected $icon = 'eicon-posts-grid';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_post_grid\/layout\/layout1.png"}}}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"source","label":"Select Categories","type":"select2","multiple":true,"options":{"air-cargo|category":"Air Cargo","uncategorized|category":"Uncategorized","projects|post_tag":"projects","services|post_tag":"services","transport|post_tag":"transport","post-format-gallery|post_format":"Gallery","post-format-video|post_format":"Video"}},{"name":"orderby","label":"Order By","type":"select","default":"date","options":{"date":"Date","ID":"ID","author":"Author","title":"Title","rand":"Random"}},{"name":"order","label":"Sort Order","type":"select","default":"desc","options":{"desc":"Descending","asc":"Ascending"}},{"name":"limit","label":"Total items","type":"number","default":"6"}]},{"name":"grid_section","label":"Grid","tab":"content","controls":[{"name":"thumbnail","type":"image-size","control_type":"group","default":"full"},{"name":"layout_type","label":"Layout Type","type":"select","options":{"basic":"Basic","masonry":"Masonry"},"default":"basic"},{"name":"layout_mode","label":"Layout Mode","type":"select","options":{"masonry":"Masonry","fitRows":"Fit Row"},"default":"masonry","condition":{"layout_type":"masonry"}},{"name":"filter","label":"Filter on Masonry","type":"select","default":"false","options":{"true":"Enable","false":"Disable"},"condition":{"layout_type":"masonry"}},{"name":"pagination_type","label":"Pagination Type","type":"select","default":"false","options":{"pagination":"Pagination","loadmore":"Loadmore","false":"Disable"},"condition":{"layout_type":"masonry"}},{"name":"filter_default_title","label":"Default Title","type":"text","default":"All","condition":{"filter":"true"}},{"name":"filter_alignment","label":"Alignment","type":"select","default":"center","options":{"center":"Center","left":"Left","right":"Right"},"condition":{"filter":"true"}},{"name":"gap","label":"Item Gap","type":"number","control_type":"responsive","default":30,"selectors":[]},{"name":"col_xs","label":"Columns XS Devices","type":"select","default":"1","options":{"1":"1","2":"2","3":"3","4":"4","6":"6","12":"12"}},{"name":"col_sm","label":"Columns SM Devices","type":"select","default":"2","options":{"1":"1","2":"2","3":"3","4":"4","6":"6","12":"12"}},{"name":"col_md","label":"Columns MD Devices","type":"select","default":"3","options":{"1":"1","2":"2","3":"3","4":"4","6":"6","12":"12"}},{"name":"col_lg","label":"Columns LG Devices","type":"select","default":"4","options":{"1":"1","2":"2","3":"3","4":"4","6":"6","12":"12"}},{"name":"col_xl","label":"Columns XL Devices","type":"select","default":"4","options":{"1":"1","2":"2","3":"3","4":"4","6":"6","12":"12"}}]},{"name":"display_section","label":"Display Options","tab":"content","controls":[{"name":"show_thumbnail","label":"Show Thumbnail","type":"switcher","default":"true","separator":"after"},{"name":"show_title","label":"Show Title","type":"switcher","default":"true"},{"name":"title_tag","label":"HTML Tag","type":"select","default":"h3","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6"},"condition":{"show_title":"true"},"separator":"after"},{"name":"show_excerpt","label":"Show Excerpt","type":"switcher","default":"true"},{"name":"num_words","label":"Number of Words","type":"number","default":25,"condition":{"show_excerpt":"true"},"separator":"after"},{"name":"show_button","label":"Show Action Button","type":"switcher","default":"true"},{"name":"button_text","label":"Button Text","type":"text","default":"Read more","condition":{"show_button":"true"},"separator":"after"},{"name":"show_meta","label":"Show Meta","type":"switcher","default":"true"},{"name":"show_post_date","label":"Show Post Date","type":"switcher","default":"true","condition":{"show_meta":"true"}},{"name":"show_categories","label":"Show Categories","type":"switcher","default":"true","condition":{"show_meta":"true"}},{"name":"show_author","label":"Show Author","type":"switcher","default":"true","condition":{"show_meta":"true"}},{"name":"show_cmt","label":"Show Comment","type":"switcher","default":"true","condition":{"show_meta":"true"}}]},{"name":"title_style","label":"Title","tab":"style","condition":{"show_title":"true"},"controls":[{"name":"title_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .entry-title":"color: {{VALUE}};"}},{"name":"title_color_hover","label":"Hover Color","type":"color","selectors":{"{{WRAPPER}} .entry-title a:hover":"color: {{VALUE}};"}},{"name":"title_typo","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-title"},{"name":"table_title_background","type":"background","control_type":"group","types":["classic","gradient"],"selector":"{{WRAPPER}} .entry-title"},{"name":"title_margin","label":"Margin","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-title":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"title_padding","label":"Padding","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-title":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"excerpt_style","label":"Excerpt","tab":"style","condition":{"show_excerpt":"true"},"controls":[{"name":"excerpt_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .entry-content":"color: {{VALUE}};"}},{"name":"description_typo","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-content","separator":"after"},{"name":"table_excerpt_background","type":"background","control_type":"group","types":["classic","gradient"],"selector":"{{WRAPPER}} .entry-content"},{"name":"excerpt_margin","label":"Margin","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-content":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"excerpt_padding","label":"Padding","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-content":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"button_style","label":"Button","tab":"style","controls":[{"name":"button_typo","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button"},{"name":"tabs_button_style","control_type":"tab","tabs":[{"name":"tab_button_normal","label":"Normal","controls":[{"name":"button_text_color","label":"Text Color","type":"color","default":"","selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button":"color: {{VALUE}};"}},{"name":"button_background_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button":"background-color: {{VALUE}};"}}]},{"name":"tab_button_hover","label":"Hover","controls":[{"name":"button_hover_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus, {{WRAPPER}} .entry-readmore button:focus":"color: {{VALUE}};"}},{"name":"button_background_hover_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus":"background-color: {{VALUE}};"}},{"name":"button_hover_border_color","label":"Border Color","type":"color","condition":{"border_border!":""},"selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus":"border-color: {{VALUE}};"}},{"name":"hover_animation","label":"Hover Animation","type":"hover_animation"}]}]},{"name":"border","type":"border","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button","separator":"before"},{"name":"button_border_radius","label":"Border Radius","type":"dimensions","size_units":["px","%"],"selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"button_box_shadow","type":"box-shadow","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button"},{"name":"button_padding","label":"Padding","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"separator":"before"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'imagesloaded','isotope','cms-post-grid-widget-js' );
}