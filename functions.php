<?php
/**
 * Functions and definitions
 *
 * @package FastWay
 */

if(!function_exists('fastway_configs')){
    function fastway_configs($value){
        $configs = [
            //accent color
            'accent_color'          => '#ff5e14',
            'darkent_accent_color'  => '#020d26',
            'lightent_accent_color' => '#020d26',
            // others colors
            'primary_color'         => '#1a1a1a',
            'secondary_color'       => '#010e2a',
            'thirdary_color'        => '#484848',
            'fourth_color'          => '#a1a1a1',
            //others colors
            'invalid_color'         => 'red',
            'color_red'             => 'red',
            'color_green'           => 'green',
            'color_gray'            => '#f5f6f6',
            'color_gray_light'      => '#eeeeee',
            'white'                 => 'white',
            // Typo
            'google_fonts'          => 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i',
            'body_bg'               => '#fff',
            'body_font'             => '\'Poppins\', sans-serif',
            'body_font_size'        => '14px',
            'body_font_size_large'  => '18px',
            'body_font_size_medium' => '16px',
            'body_font_size_small'  => '13px',
            'body_font_size_xsmall' => '12px',
            'body_font_size_xxsmall'=> '11px',
            'body_font_color'       => 'var(--secondary-color)',
            'body_line_height'      => '1.42857143',
            'content_width'         => 1170,
            'h1_size'               => '45px',
            'h2_size'               => '35px',
            'h3_size'               => '24px',
            'h4_size'               => '18px',
            'h5_size'               => '16px',
            'h6_size'               => '14px',
            'heading_font'          => '\'Roboto\', sans-serif',
            'heading_color'         => 'var(--primary-color)',
            'heading_color_hover'   => 'var(--accent-color)',
            'heading_font_weight'   => 600,
            'meta_font'             => '\'Poppins\', sans-serif',    
            'meta_color'            => 'var(--secondary-color)',    
            'meta_color_hover'      => 'var(--accent-color)',
            'text-grey'            => '#b0b0b0',
            // Boder
            'main_border'           => '1px solid #DDDDDD', 
            'main_border2'          => '2px solid #DDDDDD', 
            'main_border_color'     => '#DDDDDD', 
            // Thumbnail Size
            'large_size_w'                   => 750,
            'large_size_h'                   => 450,
            'medium_size_w'                  => 380,
            'medium_size_h'                  => 272,
            'medium_large_size_w'            => 410,
            'medium_large_size_h'            => 293,
            'thumbnail_size_w'               => 100,
            'thumbnail_size_h'               => 80,
            'post_thumbnail_size_w'          => 1170,
            'post_thumbnail_size_h'          => 500,
            'fastway_default_post_thumbnail' => false,
            'fastway_thumbnail_is_bg'        => false,
            // Header 
            'logo_width'       => '192',
            'logo_height'      => '38',
            'logo_units'       => 'px',
            'main_menu_height' => '100px',
            'header_sidewidth' => '320px',
            // Menu Color
            'main_menu_color_regular' => 'var(--primary-color)',
            'main_menu_color_hover' => 'var(--accent-color)',
            'main_menu_color_active' => 'var(--accent-color)',
            // Menu Ontop Color
            'ontop_link_color_regular' => '#fff',
            'ontop_link_color_hover' => 'var(--accent-color)',
            'ontop_link_color_active' => 'var(--accent-color)',
            // Menu Sticky Color
            'sticky_link_color_regular' => '#fff',
            'sticky_link_color_hover' => 'var(--accent-color)',
            'sticky_link_color_active' => 'var(--accent-color)',
            // Dropdown
            'dropdown_bg'      => '#ffffff',
            'dropdown_regular' => '#000000',
            'dropdown_hover'   => 'var(--accent-color)',
            'dropdown_active'  => 'var(--accent-color)',
            // Page title
            'ptitle_color'    => '#ffffff',
            'ptitle_bg_color' => 'var(--accent-color)',
            'ptitle_bg_img'   => '../images/ptitle-layout/bg.jpg',
            'ptitle_overlay_color'   => 'rgba(0,0,0,0.7)',
            // Comments 
            'cmt_avatar_size'  => 90,
            'cmt_border'       => '1px solid #DDDDDD',
            // WooCommerce,
            'fastway_product_single_image_w' => '455',
            'fastway_product_single_image_h' => '605',

            'fastway_product_loop_image_w' => '205',
            'fastway_product_loop_image_h' => '162',

            'fastway_product_gallery_thumbnail_w' => '115',
            'fastway_product_gallery_thumbnail_h' => '140',

            'fastway_product_gallery_thumbnail_v_w' => '115',
            'fastway_product_gallery_thumbnail_v_h' => '140',

            'fastway_product_gallery_thumbnail_h_w' => '115',
            'fastway_product_gallery_thumbnail_h_h' => '140',

            'fastway_product_gallery_thumbnail_space' => '14',

            // API 
            'google_api_key' => apply_filters('fastway-google-api-key', false)

        ];
        return $configs[$value];
    }
}

if(!defined('DEV_MODE')){
    define('DEV_MODE', true);
}

if ( ! function_exists( 'fastway_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fastway_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'fastway', get_template_directory() . '/languages' );

		// Custom Header
		add_theme_support( "custom-header" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'fastway' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
            'script',
            'style'
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fastway_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'post-formats', array(
			'gallery',
			'video',
		) );
        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
endif;
add_action( 'after_setup_theme', 'fastway_setup' );

function fastway_update(){
    /* Change default image thumbnail sizes in wordpress */
    $thumbnail_size = array(
        'large_size_w'        => fastway_configs('large_size_w'),
        'large_size_h'        => fastway_configs('large_size_h'),
        'large_crop'          => 1, 
        'medium_large_size_w' => fastway_configs('medium_large_size_w'),
        'medium_large_size_h' => fastway_configs('medium_large_size_h'),
        'medium_large_crop'   => 1, 
        'medium_size_w'       => fastway_configs('medium_size_w'),
        'medium_size_h'       => fastway_configs('medium_size_h'),
        'medium_crop'         => 1, 
        'thumbnail_size_w'    => fastway_configs('thumbnail_size_w'),
        'thumbnail_size_h'    => fastway_configs('thumbnail_size_h'),
        'thumbnail_crop'      => 1,
    );
    foreach ($thumbnail_size as $option => $value) {
        if (get_option($option, '') != $value)
            update_option($option, $value);
    }
}
add_action('after_switch_theme', 'fastway_update');

add_action( 'cms_locations', function ( $cms_locations ) {
//    $cms_locations['cms-test'] ='Test Menu';
	return $cms_locations;
} );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set up the content width value based on the theme's design and stylesheet.
if (!isset($content_width))
    $content_width = apply_filters('fastway_content_width', fastway_configs('content_width'));
function fastway_content_width()
{
    $GLOBALS['content_width'] = apply_filters('fastway_content_width', fastway_configs('content_width'));
}
add_action('after_setup_theme', 'fastway_content_width', 0);

/**
 * Register widget area.
 */
function fastway_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'fastway' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'fastway' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title text-uppercase">',
		'after_title'   => '</h4>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'fastway' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'fastway' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title text-uppercase">',
			'after_title'   => '</h4>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'fastway' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'fastway' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title text-uppercase">',
			'after_title'   => '</h4>',
		) );
	}

	$hidden_sidebar_on = fastway_get_opt( 'hidden_sidebar_on', false );
	if($hidden_sidebar_on) {
		register_sidebar( array(
			'name'          => esc_html__( 'Hidden Sidebar', 'fastway' ),
			'id'            => 'sidebar-hidden',
			'description'   => esc_html__( 'Add widgets here.', 'fastway' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="widget-title text-uppercase">',
			'after_title'   => '</h4>',
		) );
	}
	if (class_exists('ReduxFramework')) {
		$footer_top_column = fastway_get_opt( 'footer_top_column', '4' );
		if ( isset( $footer_top_column ) && $footer_top_column ) {
			for ( $i = 1; $i <= $footer_top_column; $i ++ ) {
				register_sidebar( array(
					'name'          => sprintf( esc_html__( 'Footer Top %s', 'fastway' ), $i ),
					'id'            => 'sidebar-footer-' . $i,
					'description'   => esc_html__( 'Add widgets here.', 'fastway' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="footer-widget-title">',
					'after_title'   => '</h4>',
				) );
			}
		}
	}
}

add_action( 'widgets_init', 'fastway_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fastway_scripts() {
	$theme = wp_get_theme( get_template() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0' );
    wp_enqueue_style( 'font-flaticon', get_template_directory_uri() . '/assets/css/font-flaticon.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
	wp_enqueue_style( 'fastway-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'fastway-menu', get_template_directory_uri() . '/assets/css/menu.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'fastway-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fastway-google-fonts', fastway_fonts_url() );

	/* Lib JS */
    wp_enqueue_script('jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array( 'jquery' ), '1.4.1', true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array( 'jquery' ), 'all', true );
    wp_enqueue_script( 'enscroll', get_template_directory_uri() . '/assets/js/enscroll.js', array( 'jquery' ), 'all', true );
    wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/js/match-height-min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'fastway-sidebar-fixed', get_template_directory_uri() . '/assets/js/sidebar-scroll-fixed.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    $smoothscroll = fastway_get_opt( 'smoothscroll', false );
    if ( isset( $smoothscroll ) && $smoothscroll ) {
        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), 'all', true );
    }

    /* Theme JS */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'fastway-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_register_script( 'fastway-parallax', get_template_directory_uri() . '/assets/js/cms-parallax.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_enqueue_script( 'fastway-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_localize_script( 'fastway-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

    /*
     * Elementor Widget JS
     */
    // Counter Widget
    wp_register_script( 'cms-counter-widget-js', get_template_directory_uri() . '/elementor/js/cms-counter-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Progress Bar Widget
    wp_register_script( 'cms-progressbar-widget-js', get_template_directory_uri() . '/elementor/js/cms-progressbar-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Clients List Widget
    wp_register_script( 'cms-clients-list-widget-js', get_template_directory_uri() . '/elementor/js/cms-clients-list-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Teams List Widget
    wp_register_script( 'cms-teams-list-widget-js', get_template_directory_uri() . '/elementor/js/cms-teams-list-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Pie Charts Widget
    wp_register_script( 'cms-piecharts-widget-js', get_template_directory_uri() . '/elementor/js/cms-piecharts-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // CMS Post Carousel Widget
    wp_register_script( 'cms-post-carousel-widget-js', get_template_directory_uri() . '/elementor/js/cms-post-carousel-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Google Maps Widget
    $api = fastway_get_opt('gm_api_key', 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM');
    $api_js = "https://maps.googleapis.com/maps/api/js?&key=".$api;
    wp_register_script('maps-googleapis', $api_js, [], date("Ymd"));
    wp_register_script('custom-gm-widget-js', get_template_directory_uri() . '/elementor/js/custom-gm-widget.js', ['maps-googleapis', 'jquery'], $theme->get( 'Version' ), true);
    // Progress Bar Widget
    //wp_register_script('custom-progressbar-widget-js', get_template_directory_uri() . '/assets/js/elementor/custom-progressbar-widget.js', ['progressbar-lib-js','jquery'], $theme->get( 'Version' ), true);
    
    // Post Grid Widget
    wp_register_script('cms-post-grid-widget-js', get_template_directory_uri() . '/elementor/js/cms-post-grid-widget.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-toggle-widget-js', get_template_directory_uri() . '/elementor/js/cms-toggle-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-accordion-widget-js', get_template_directory_uri() . '/elementor/js/cms-accordion-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-alert-widget-js', get_template_directory_uri() . '/elementor/js/cms-alert-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('cms-tabs-widget-js', get_template_directory_uri() . '/elementor/js/cms-tabs-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    
    wp_register_script('cms-slick-slider', get_template_directory_uri() . '/elementor/js/cms-slick-slider.js', [ 'jquery' ], $theme->get( 'Version' ), true);

    $fastway_inline_styles = fastway_inline_styles();
    wp_add_inline_style( 'fastway-theme', $fastway_inline_styles );
}

add_action( 'wp_enqueue_scripts', 'fastway_scripts' );

/* add editor styles */
function fastway_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}

add_action( 'admin_init', 'fastway_add_editor_styles' );

/* add admin styles */
function fastway_admin_style() {
	$theme = wp_get_theme( get_template() );
	wp_enqueue_style( 'fastway-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
	wp_enqueue_style( 'font-material-icon', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0' );
}

add_action( 'admin_enqueue_scripts', 'fastway_admin_style' );

/**
 * Register Google Fonts
 *
 * https://gist.github.com/kailoon/e2dc2a04a8bd5034682c
 * https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
*/
function fastway_fonts_url() {
    $font_url = add_query_arg( 
        'family', 
        urlencode(fastway_configs('google_fonts')), 
        "//fonts.googleapis.com/css"
    );
    return $font_url;
}

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

if(class_exists("Elementor_Theme_Core")){
	if(!function_exists("fastway_add_icons_to_cms_iconpicker_field")){
		add_filter("redux_cms_iconpicker_field/get_icons", "fastway_add_icons_to_cms_iconpicker_field");
		function fastway_add_icons_to_cms_iconpicker_field($icons){
			$custom_icons = [
				'Material Icons' => array(
                    array('zmdi zmdi-3d-rotation' => '3D Rotation'),
                    array('zmdi zmdi-airplane-off' => 'Airplane Off'),
                    array('zmdi zmdi-airplane' => 'Airplane'),
                ),
			];
			$icons = array_merge($custom_icons, $icons);
			return $icons;
		}
	}
}

function fastway_inline_styles() {
    ob_start();
    $preset_primary_color = $primary_color = fastway_get_opts( 'primary_color', apply_filters('fastway_primary_color', fastway_configs('primary_color')) );
    $preset_accent_color = $accent_color = fastway_get_opts( 'accent_color', apply_filters('fastway_accent_color', fastway_configs('accent_color')) );
    $darkent_accent_color  = fastway_get_opts( 'darkent_accent_color', apply_filters('fastway_darkent_accent_color', fastway_configs('darkent_accent_color')) );
    $lightent_accent_color  = fastway_get_opts( 'lightent_accent_color', apply_filters('fastway_lightent_accent_color', fastway_configs('lightent_accent_color')) );
    $preset_secondary_color = fastway_get_opts( 'secondary_color', apply_filters('fastway_secondary_color',fastway_configs('secondary_color') ));

    $thirdary_color = fastway_get_opts( 'thirdary_color', apply_filters('fastway_thirdary_color',fastway_configs('thirdary_color') ));
    $fourth_color = fastway_get_opts( 'fourth_color', apply_filters('fastway_fourth_color',fastway_configs('fourth_color') ));
    $main_menu_height = fastway_get_opts( 'main_menu_height', ['height' => fastway_configs('main_menu_height')]);
    // CSS Variable
    printf(':root{
        --primary-color:%s;
        --accent-color:%s;
        --accent-color-05:%s;
        --accent-color-03:%s;
        --darkent-accent-color:%s;
        --lightent-accent-color:%s;
        --secondary-color:%s;
        --thirdary-color: %s;
        --thirdary-color-05: %s;
        --thirdary-color-03: %s;
        --fourth-color: %s;
        --fourth-color-07: %s;
        }', 
        $preset_primary_color,
        $preset_accent_color,
        fastway_hex2rgba($preset_accent_color, 0.5),
        fastway_hex2rgba($preset_accent_color, 0.3),
        $darkent_accent_color,
        $lightent_accent_color,
        $preset_secondary_color,
        $thirdary_color,
        fastway_hex2rgba($thirdary_color, 0.5),
        fastway_hex2rgba($thirdary_color, 0.3),
        $fourth_color,
        fastway_hex2rgba($fourth_color, 0.7)
    );
    // Header Variable
    $header_bg = fastway_get_opts('header_bg',[
        'background-color'      => '#fff',
        'background-image'      => 'inherit',
        'background-size'       => 'inherit',
        'background-repeat'     => 'inherit',
        'background-attachment' => 'inherit', 
        'background-position'   => 'inherit' 
    ]);
    $header_text_color = fastway_get_opts('header_text_color',['color' => '', 'alpha' => '', 'rgba' => 'inherit']);
    $header_ontop_top_space = fastway_get_opts('header_ontop_top_space',['height' => '']);
    printf(
        ':root{
            --main-menu-height:%s;
            --header-text-color: %s;
            --header-bg-color: %s;
            --header-bg-image: %s;
            --header-bg-size: %s;
            --header-bg-repeat: %s;
            --header-bg-attachment: %s;
            --header-bg-position: %s;
            --header_ontop_top_space: %s;
        }',
        $main_menu_height['height'],
        $header_text_color['rgba'],
        $header_bg['background-color'],
        $header_bg['background-image'],
        $header_bg['background-size'],
        $header_bg['background-repeat'],
        $header_bg['background-attachment'],
        $header_bg['background-position'],
        $header_ontop_top_space['height']
    );
    /* Default Header Color */
    $header_link_color = fastway_get_opts('header_link_colors', [
        'regular' => $primary_color, 
        'hover'   => $accent_color, 
        'active'  => $accent_color
    ]);
    printf(':root{
            --header_regular: %1$s;
            --header_hover: %2$s;
            --header_active: %3$s;
        }', 
        $header_link_color['regular'],
        $header_link_color['hover'],
        $header_link_color['active']
    );
    /*Main Menu Colors */
    $main_menu_color = fastway_get_opts('main_menu_color', [
        'regular' => fastway_configs('main_menu_color_regular'), 
        'hover'   => fastway_configs('main_menu_color_hover'), 
        'active'  => fastway_configs('main_menu_color_active')
    ]);
    printf(':root{
            --main-menu-color-regular: %1$s;
            --main-menu-color-hover: %2$s;
            --main-menu-color-active: %3$s;
        }',
        $main_menu_color['regular'],
        $main_menu_color['hover'],
        $main_menu_color['active']
    );
    /* Ontop Header Color */
    $ontop_link_color = fastway_get_opts('ontop_menu_color', [
        'regular' => fastway_configs('ontop_link_color_regular'), 
        'hover'   => fastway_configs('ontop_link_color_hover'), 
        'active'  => fastway_configs('ontop_link_color_active')
    ]);
    printf(':root{
            --ontop-regular: %1$s;
            --ontop-hover: %2$s;
            --ontop-active: %3$s;
        }', 
        $ontop_link_color['regular'],
        $ontop_link_color['hover'],
        $ontop_link_color['active']
    );
    /* Sticky Header Color */
    $sticky_link_color = fastway_get_opts('sticky_menu_color',[
        'regular' => fastway_configs('sticky_link_color_regular'), 
        'hover'   => fastway_configs('sticky_link_color_hover'), 
        'active'  => fastway_configs('sticky_link_color_active')
    ]);    
    printf(':root{
            --sticky-regular: %1$s;
            --sticky-hover: %2$s;
            --sticky-active: %3$s;
        }', 
        $sticky_link_color['regular'],
        $sticky_link_color['hover'],
        $sticky_link_color['active']
    );
    /* Dropdown && Mobile */
    $dropdown_bg_opt = fastway_get_opts('dropdown_bg',['rgba' => fastway_configs('dropdown_bg')]);
    $dropdown_link_colors = fastway_get_opts('dropdown_link_colors',[
        'regular' => fastway_configs('dropdown_regular'), 
        'hover'   => fastway_configs('dropdown_hover'), 
        'active'  => fastway_configs('dropdown_active')] 
    );
    printf(':root{
            --dropdown-regular: %1$s;
            --dropdown-hover: %2$s;
            --dropdown-active: %3$s;
            --dropdown-bg: %4$s;
        }', 
        $dropdown_link_colors['regular'],
        $dropdown_link_colors['hover'],
        $dropdown_link_colors['active'],
        $dropdown_bg_opt['rgba']
    );
    /* Page title */
    $ptitle_color = fastway_get_opts('ptitle_color',fastway_configs('ptitle_color'));
    $ptitle_bg = fastway_get_opts('ptitle_bg',[
        'background-color' => fastway_configs('ptitle_bg_color'), 
        'background-image' => fastway_configs('ptitle_bg_img')
    ]);
    $ptitle_overlay = fastway_get_opts('ptitle_overlay_color',['color'=> '#000', 'alpha'=> '0.7', 'rgba' => fastway_configs('ptitle_overlay_color')]);
    printf(':root{
        --ptitle-color: %1$s;
        --ptitle-bg-color: %2$s;
        --ptitle-bg-img: url(%3$s);
        --ptitle-overlay-color: %4$s;
        }',
        $ptitle_color,
        $ptitle_bg['background-color'],
        $ptitle_bg['background-image'],
        $ptitle_overlay['rgba']
    );
    return ob_get_clean();
}

/**
 * Incudes file
 *
*/
if(!function_exists('fastway_require_folder')){
    function fastway_require_folder($foldername,$path)
    {
        $dir = $path . DIRECTORY_SEPARATOR . $foldername;
        if (!is_dir($dir)) {
            return;
        }
        $files = array_diff(scandir($dir), array('..', '.'));
        foreach ($files as $file) {
            $patch = $dir . DIRECTORY_SEPARATOR . $file;
            if (file_exists($patch) && strpos($file, ".php") !== false) {
                require_once $patch;
            }
        }
    }
}

fastway_require_folder('inc', get_template_directory());
fastway_require_folder('inc/classes', get_template_directory());
fastway_require_folder('inc/extends', get_template_directory());
fastway_require_folder('inc/theme-options', get_template_directory());

/* Load lib Font */
require_once get_template_directory() . '/inc/libs/fontawesome.php';
require_once get_template_directory() . '/inc/libs/materialdesign.php';


/**
 * Additional widgets for the theme
 */
fastway_require_folder('widgets', get_template_directory());

/**
 * Elementor
*/
fastway_require_folder('inc/elementor', get_template_directory());
