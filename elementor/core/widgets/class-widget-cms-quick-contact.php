<?php

class ETC_CmsQuickContact_Widget extends Elementor_Theme_Core_Widget_Base{
    protected $name = 'cms_quick_contact';
    protected $title = 'CMS Quick Contact';
    protected $icon = 'eicon-email';
    protected $categories = array( 'elementor-theme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"http:\/\/localhost\/fastway\/wp-content\/themes\/fastway\/elementor\/templates\/widgets\/cms_quick_contact\/layout\/layout1.png"}}}]},{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"heading_text","label":"Heading","type":"text","default":"NEED ANY HELP!","placeholder":"Enter your title","label_block":true},{"name":"description_text","label":"Description","type":"textarea","default":"Find answers to frequently asked questions about Bizipress, contacts and general customer account information","placeholder":"Enter your description","rows":10,"show_label":false},{"name":"contact_list","label":"Contact Lists","type":"repeater","controls":[{"name":"contact_list_title","label":"Title","type":"text","placeholder":"Enter your text","default":"Enter your text","label_block":true},{"name":"contact_list_icon","label":"Icon","type":"icons","fa4compatibility":"icon","default":[]}],"default":[{"contact_list_title":"yourmail@yourdomain.com","contact_list_icon":{"value":"fa fa-envelope","library":"fa-solid"}},{"contact_list_title":"(654) 321-7654","contact_list_icon":{"value":"fa fa-phone","library":"fa-solid"}}],"title_field":"{{{ contact_list_title }}}"},{"name":"btn_text","label":"Button Text","type":"text","default":"Contact Us","placeholder":"Contact Us"},{"name":"btn_link","label":"Button Link","type":"url","placeholder":"https:\/\/your-link.com","default":{"url":"#"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}