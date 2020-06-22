<?php

class ETC_CmsPostCarousel_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_post_carousel';
    protected $title = 'Post Carousel';
    protected $icon = 'eicon-posts-carousel';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","prefix_class":"cms-post-carousel-layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/frame\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_post_carousel\/layout1.png"}}}]},{"name":"source_section","label":"Source","tab":"content","controls":[{"name":"thumbnail","type":"image-size","control_type":"group","default":"full"},{"name":"source","label":"Select Categories","type":"select2","multiple":true,"options":{"aciform|category":"aciform","antiquarianism|category":"antiquarianism","arrangement|category":"arrangement","asmodeus|category":"asmodeus","block|category":"Block","broder|category":"broder","buying|category":"buying","cat-a|category":"Cat A","cat-b|category":"Cat B","cat-c|category":"Cat C","championship|category":"championship","chastening|category":"chastening","child-1|category":"Child 1","child-2|category":"Child 2","child-category-01|category":"Child Category 01","child-category-02|category":"Child Category 02","child-category-03|category":"Child Category 03","child-category-04|category":"Child Category 04","child-category-05|category":"Child Category 05","classic|category":"Classic","clerkship|category":"clerkship","disinclination|category":"disinclination","disinfection|category":"disinfection","dispatch|category":"dispatch","echappee|category":"echappee","edge-case-2|category":"Edge Case","enphagy|category":"enphagy","equipollent|category":"equipollent","fatuity|category":"fatuity","foo-a|category":"Foo A","foo-a-foo-parent|category":"Foo A","foo-parent|category":"Foo Parent","gaberlunzie|category":"gaberlunzie","grandchild-category|category":"Grandchild Category","illtempered|category":"illtempered","insubordination|category":"insubordination","lender|category":"lender","markup|category":"Markup","media-2|category":"Media","monosyllable|category":"monosyllable","packthread|category":"packthread","palter|category":"palter","papilionaceous|category":"papilionaceous","parent|category":"Parent","parent-category|category":"Parent Category","personable|category":"personable","post-formats|category":"Post Formats","propylaeum|category":"propylaeum","pustule|category":"pustule","quartern|category":"quartern","scholarship|category":"scholarship","selfconvicted|category":"selfconvicted","showshoe|category":"showshoe","sloyd|category":"sloyd","sub|category":"sub","sublunary|category":"sublunary","tamtam|category":"tamtam","template-2|category":"Template","uncategorized|category":"Uncategorized","unpublished|category":"Unpublished","weakhearted|category":"weakhearted","ween|category":"ween","wellhead|category":"wellhead","wellintentioned|category":"wellintentioned","whetstone|category":"whetstone","years|category":"years","8bit|post_tag":"8BIT","alignment-2|post_tag":"alignment","articles|post_tag":"Articles","aside|post_tag":"aside","audio|post_tag":"audio","captions-2|post_tag":"captions","categories|post_tag":"categories","chat|post_tag":"chat","codex|post_tag":"Codex","columns|post_tag":"Columns","comments-2|post_tag":"comments","content-2|post_tag":"content \u03c0\u03b5\u03c1\u03b9\u03b5\u03c7\u03cc\u03bc\u03b5\u03bd\u03bf","content|post_tag":"content \u03c0\u03b5\u03c1\u03b9\u03b5\u03c7\u03cc\u03bc\u03b5\u03bd\u03bf","css|post_tag":"css","dowork|post_tag":"dowork","edge-case|post_tag":"edge case","embeds-2|post_tag":"embeds","excerpt-2|post_tag":"excerpt","fail|post_tag":"Fail","featured-image|post_tag":"featured image","formatting-2|post_tag":"formatting","ftw|post_tag":"FTW","fun|post_tag":"Fun","gallery|post_tag":"gallery","html|post_tag":"html","image|post_tag":"image","jetpack-2|post_tag":"jetpack","layout|post_tag":"layout","link|post_tag":"link","lists-2|post_tag":"lists","love|post_tag":"Love","markup-2|post_tag":"markup","media|post_tag":"media","mothership|post_tag":"Mothership","mustread|post_tag":"Must Read","nailedit|post_tag":"Nailed It","pagination|post_tag":"pagination","password-2|post_tag":"password","pictures|post_tag":"Pictures","pingbacks-2|post_tag":"pingbacks","post|post_tag":"post","post-formats|post_tag":"Post Formats","quote|post_tag":"quote","read-more|post_tag":"read more","readability|post_tag":"readability","shortcode|post_tag":"shortcode","standard-2|post_tag":"standard","status|post_tag":"status","sticky-2|post_tag":"sticky","success|post_tag":"Success","swagger|post_tag":"Swagger","tags|post_tag":"Tags","template|post_tag":"template","tiled|post_tag":"tiled","title|post_tag":"title","trackbacks-2|post_tag":"trackbacks","twitter-2|post_tag":"twitter","unseen|post_tag":"Unseen","video|post_tag":"video","videopress|post_tag":"videopress","wordpress|post_tag":"WordPress","wordpress-tv|post_tag":"wordpress.tv","post-format-aside|post_format":"Aside","post-format-audio|post_format":"Audio","post-format-chat|post_format":"Chat","post-format-gallery|post_format":"Gallery","post-format-image|post_format":"Image","post-format-link|post_format":"Link","post-format-quote|post_format":"Quote","post-format-status|post_format":"Status","post-format-video|post_format":"Video"}},{"name":"orderby","label":"Order By","type":"select","default":"date","options":{"date":"Date","ID":"ID","author":"Author","title":"Title","rand":"Random"}},{"name":"order","label":"Sort Order","type":"select","default":"desc","options":{"desc":"Descending","asc":"Ascending"}},{"name":"limit","label":"Total items","type":"number","default":"6"}]},{"name":"display_section","label":"Display Options","tab":"content","controls":[{"name":"show_thumbnail","label":"Show Thumbnail","type":"switcher","default":"true","separator":"after"},{"name":"show_title","label":"Show Title","type":"switcher","default":"true"},{"name":"title_tag","label":"HTML Tag","type":"select","default":"h3","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6"},"condition":{"show_title":"true"},"separator":"after"},{"name":"show_excerpt","label":"Show Excerpt","type":"switcher","default":"true"},{"name":"num_words","label":"Number of Words","type":"number","default":25,"condition":{"show_excerpt":"true"},"separator":"after"},{"name":"show_button","label":"Show Action Button","type":"switcher","default":"true"},{"name":"button_text","label":"Button Text","type":"text","default":"Read more","condition":{"show_button":"true"},"separator":"after"},{"name":"show_meta","label":"Show Meta","type":"switcher","default":"true"},{"name":"show_post_date","label":"Show Post Date","type":"switcher","default":"true","condition":{"show_meta":"true"}},{"name":"show_categories","label":"Show Categories","type":"switcher","default":"true","condition":{"show_meta":"true"}},{"name":"show_author","label":"Show Author","type":"switcher","default":"true","condition":{"show_meta":"true"}}]},{"name":"section_carousel_settings","label":"Carousel","tab":"content","controls":[{"name":"slides_to_show","label":"Slides to Show","type":"select","control_type":"responsive","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10}},{"name":"slides_to_scroll","label":"Slides to Scroll","type":"select","control_type":"responsive","options":{"":"Default","1":1,"2":2,"3":3,"4":4,"5":5,"6":6,"7":7,"8":8,"9":9,"10":10},"condition":{"slides_to_show!":"1"}},{"name":"slides_gutter","label":"Gutter","type":"number","control_type":"responsive","default":10,"condition":{"slides_to_show!":"1"},"selectors":{"{{WRAPPER}} .cms-slick-carousel .slick-list .slick-slide":"padding: {{VALUE}}px;"}},{"name":"arrows","label":"Show Arrows","type":"switcher","default":"true"},{"name":"dots","label":"Show Dots","type":"switcher","default":"true"},{"name":"pause_on_hover","label":"Pause on Hover","type":"switcher","default":"true"},{"name":"autoplay","label":"Autoplay","type":"switcher","default":"true"},{"name":"autoplay_speed","label":"Autoplay Speed","type":"number","default":5000,"condition":{"autoplay":"true"}},{"name":"infinite","label":"Infinite Loop","type":"switcher","default":"true"},{"name":"speed","label":"Animation Speed","type":"number","default":500},{"name":"dir","label":"Direction","type":"select","options":{"ltr":"Left","rtl":"Right"},"default":"ltr"}]},{"name":"title_style","label":"Title","tab":"style","condition":{"show_title":"true"},"controls":[{"name":"title_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .entry-title":"color: {{VALUE}};"}},{"name":"title_color_hover","label":"Hover Color","type":"color","selectors":{"{{WRAPPER}} .entry-title a:hover":"color: {{VALUE}};"}},{"name":"title_typo","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-title"},{"name":"table_title_background","type":"background","control_type":"group","types":["classic","gradient"],"selector":"{{WRAPPER}} .entry-title"},{"name":"title_margin","label":"Margin","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-title":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"title_padding","label":"Padding","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-title":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"excerpt_style","label":"Excerpt","tab":"style","condition":{"show_excerpt":"true"},"controls":[{"name":"excerpt_color","label":"Color","type":"color","selectors":{"{{WRAPPER}} .entry-content":"color: {{VALUE}};"}},{"name":"description_typo","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-content","separator":"after"},{"name":"table_excerpt_background","type":"background","control_type":"group","types":["classic","gradient"],"selector":"{{WRAPPER}} .entry-content"},{"name":"excerpt_margin","label":"Margin","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-content":"margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"excerpt_padding","label":"Padding","type":"dimensions","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-content":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}}]},{"name":"button_style","label":"Button","tab":"style","controls":[{"name":"button_typo","label":"Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button"},{"name":"tabs_button_style","control_type":"tab","tabs":[{"name":"tab_button_normal","label":"Normal","controls":[{"name":"button_text_color","label":"Text Color","type":"color","default":"","selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button":"color: {{VALUE}};"}},{"name":"button_background_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button, {{WRAPPER}} .entry-readmore button":"background-color: {{VALUE}};"}}]},{"name":"tab_button_hover","label":"Hover","controls":[{"name":"button_hover_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus, {{WRAPPER}} .entry-readmore button:focus":"color: {{VALUE}};"}},{"name":"button_background_hover_color","label":"Background Color","type":"color","selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus":"background-color: {{VALUE}};"}},{"name":"button_hover_border_color","label":"Border Color","type":"color","condition":{"border_border!":""},"selectors":{"{{WRAPPER}} .entry-readmore .btn:hover, {{WRAPPER}} .entry-readmore .button:hover, {{WRAPPER}} .entry-readmore .btn:focus, {{WRAPPER}} .entry-readmore .button:focus":"border-color: {{VALUE}};"}},{"name":"hover_animation","label":"Hover Animation","type":"hover_animation"}]}]},{"name":"border","type":"border","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button","separator":"before"},{"name":"button_border_radius","label":"Border Radius","type":"dimensions","size_units":["px","%"],"selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button":"border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"}},{"name":"button_box_shadow","type":"box-shadow","control_type":"group","selector":"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button"},{"name":"button_padding","label":"Padding","type":"dimensions","control_type":"responsive","size_units":["px","em","%"],"selectors":{"{{WRAPPER}} .entry-readmore .btn, {{WRAPPER}} .entry-readmore .button":"padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};"},"separator":"before"}]}]}';
    protected $styles = array(  );
    protected $scripts = array( 'jquery-slick','cms-post-carousel-widget-js' );
}