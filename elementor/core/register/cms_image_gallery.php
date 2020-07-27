<?php
// Register Gallery Image Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_image_gallery',
        'title'      => esc_html__('CMS Image Gallery', 'fastway'),
        'icon'       => 'eicon-gallery-grid',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'imagesloaded',
            'isotope',
            'cms-masonry',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'img_list',
                    'label'    => esc_html__('Images Galleries', 'fastway'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'galleries',
                            'label'    => esc_html__('Add Item', 'fastway'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__('Title', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'filter_tag',
                                    'label'       => esc_html__('Filter Tag', 'fastway'),
                                    'description' => esc_html__('Enter tag for filter, multi tag separate by comma (,)','fastway'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image', 'fastway'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'Name #1', 'fastway' ),
                                    'filter_tag'  => 'cargo',	
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg' 
                                ],
                                [
                                    'title'       => esc_html__( 'Name #2', 'fastway' ),
                                    'filter_tag'  => 'logistic',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #3', 'fastway' ),
                                    'filter_tag'  => 'storage',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #4', 'fastway' ),
                                    'filter_tag'  => 'trucking',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #5', 'fastway' ),
                                    'filter_tag'  => 'warehousing',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #6', 'fastway' ),
                                    'filter_tag'  => 'cargo',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #7', 'fastway' ),
                                    'filter_tag'  => 'logistic',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #8', 'fastway' ),
                                    'filter_tag'  => 'storage',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #9', 'fastway' ),
                                    'filter_tag'  => 'trucking',
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    ),
                ),
				array(
					'name'     => 'layout_section',
					'label'    => esc_html__( 'Image Settings', 'fastway' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array_merge(
						array(
	                        array(
								'name'         => 'thumbnail',
								'type'         => \Elementor\Group_Control_Image_Size::get_type(),
								'control_type' => 'group',
								'default'      => 'full',
	                        ),
	                    ),
	                    fastway_grid_column_settings(),
	                    array(
	                        array(
								'name'    => 'open_lightbox',
								'label'   => __( 'Lightbox', 'fastway' ),
								'type'    => \Elementor\Controls_Manager::SELECT,
								'default' => 'yes',
								'options' => [
									'yes'     => __( 'Yes', 'fastway' ),
									'no'      => __( 'No', 'fastway' ),
								]
	                        ),
	                        array(
								'name'    => 'gallery_link',
								'label'   => __( 'Link', 'fastway' ),
								'type'    => \Elementor\Controls_Manager::SELECT,
								'default' => 'file',
								'options' => [
									'file'       => __( 'Media File', 'fastway' ),
									'attachment' => __( 'Attachment Page', 'fastway' ),
								],
	                        )
	                    )
                    )
				)
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);