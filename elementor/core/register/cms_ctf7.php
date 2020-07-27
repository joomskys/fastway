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
            'name'       => 'cms_ctf7',
            'title'      => esc_html__('CMS Contact Form 7', 'fastway'),
            'icon'       => 'eicon-form-horizontal',
            'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
            'scripts'    => array(),
            'params'     => array(
                'sections' => array(
                    array(
                        'name'     => 'source_section',
                        'label'    => esc_html__('Source Settings', 'fastway'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Form Title', 'fastway' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter Form title', 'fastway' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'    => 'ctf7_id',
                                'label'   => esc_html__('Select Form', 'fastway'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                        ),
                    ),
                    array(
                        'name'     => 'layout_section',
                        'label'    => esc_html__( 'Layout', 'fastway' ),
                        'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                        'controls' => array(
                            array(
                                'name'    => 'layout',
                                'label'   => esc_html__( 'Templates', 'fastway' ),
                                'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                                'default' => '1',
                                'options' => [
                                    '1' => [
                                        'label' => esc_html__( 'Layout 1', 'fastway' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout1.png'
                                    ],
                                    '2' => [
                                        'label' => esc_html__( 'Layout 2', 'fastway' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout2.png'
                                    ],
                                    '3' => [
                                        'label' => esc_html__( 'Layout 3', 'fastway' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout/layout3.png'
                                    ]
                                ],
                            ),
                        ),
                    ),
                ),
            ),
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}