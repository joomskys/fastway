<?php

// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'fastway')] = 0;
    }


    etc_add_custom_widget(
        array(
            'name' => 'cms_ctf7',
            'title' => esc_html__('Contact Form 7', 'fastway'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
            'scripts' => array(),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'source_section',
                        'label' => esc_html__('Source Settings', 'fastway'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'ctf7_id',
                                'label' => esc_html__('Select Form', 'fastway'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                ),
            ),
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}