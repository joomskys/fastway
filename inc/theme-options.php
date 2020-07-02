<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'fastway' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'fastway' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = fastway_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Elementor_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'fastway'),
    'page_title'           => esc_html__('Theme Options', 'fastway'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Elementor_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'fastway'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'fastway'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'fastway'),
            'default'  => false
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'fastway'),
            'default'  => false
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'fastway'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
        array(
            'id'       => 'test123321',
            'type'     => 'cms_iconpicker',
            'title'    => esc_html__('Test 12312312321', 'fastway'),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, fastway_header_opts());

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Attribute', 'fastway'),
    'icon'       => 'el-icon-website',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'fastway'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'fastway'),
            'default'  => false
        ),
        array(
            'id'       => 'search_on',
            'type'     => 'switch',
            'title'    => esc_html__('Search Icon', 'fastway'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_on',
            'type'     => 'switch',
            'title'    => esc_html__('Cart Icon', 'fastway'),
            'default'  => false
        ),
    )
));
/**
 * Header Top
*/
Redux::setSection($opt_name, fastway_header_top_opts());
/**
 * Logo 
**/
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'fastway'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'fastway'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'fastway'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_mobile',
            'type'     => 'media',
            'title'    => esc_html__('Logo Tablet & Mobile', 'fastway'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height', 'fastway'),
            'subtitle' => esc_html__('Set maximum height for your logo, just in case the logo is too large.', 'fastway'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height Tablet & Mobile', 'fastway'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'fastway'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => true,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu > li > a, body .primary-menu .sub-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'fastway'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'fastway'),
            'options'  => array(
                '' => esc_html__('Uppercase', 'fastway'),
                'capitalize'  => esc_html__('Capitalize', 'fastway'),
                'lowercase'  => esc_html__('Lowercase', 'fastway'),
                'initial'  => esc_html__('Initial', 'fastway'),
                'inherit'  => esc_html__('Inherit', 'fastway'),
                'none'  => esc_html__('None', 'fastway'),
            ),
            'default'  => ''
        ),
        array(
            'title' => esc_html__('Main Menu', 'fastway'),
            'type'  => 'section',
            'id' => 'main_menu',
            'indent' => true
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Color', 'fastway'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Sticky Menu', 'fastway'),
            'type'  => 'section',
            'id' => 'sticky_menu',
            'indent' => true
        ),
        array(
            'id'      => 'sticky_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Color', 'fastway'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'title' => esc_html__('Button Navigation', 'fastway'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true
        ),
        array(
            'id'       => 'h_btn_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Show/Hide Button', 'fastway'),
            'options'  => array(
                'show'  => esc_html__('Show', 'fastway'),
                'hide'  => esc_html__('Hide', 'fastway')
            ),
            'default'  => 'hide',
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'fastway'),
            'default' => '',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'fastway'),
            'options'  => array(
                'page'  => esc_html__('Page', 'fastway'),
                'custom'  => esc_html__('Custom', 'fastway')
            ),
            'default'  => 'page',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'fastway' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'fastway'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'fastway'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'fastway'),
                '_blank'  => esc_html__('Blank', 'fastway')
            ),
            'default'  => '_self',
            'required' => array( 0 => 'h_btn_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Link', 'fastway'),
    'icon'   => 'el el-share',
    'subsection' => true,
    'fields' => array(
        fastway_social_list_opts()
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'fastway'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(

        array(
            'id'           => 'pagetitle',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Page Title', 'fastway' ),
            'options'      => array(
                'show'  => esc_html__( 'Show', 'fastway' ),
                'hide'  => esc_html__( 'Hide', 'fastway' ),
            ),
            'default'      => 'show',
        ),

        array(
            'id'       => 'ptitle_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'fastway'),
            'subtitle' => esc_html__('Select a layout for page title.', 'fastway'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/ptitle-layout/p1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/ptitle-layout/p2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/ptitle-layout/p3.jpg',
                '4' => get_template_directory_uri() . '/assets/images/ptitle-layout/p4.jpg',
            ),
            'default'  => '1',
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'fastway'),
            'subtitle' => esc_html__('Page title background.', 'fastway'),
            'output'   => array('body #pagetitle'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'pagetitle_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'fastway'),
            'output' => array('background-color' => 'body #pagetitle.bg-overlay:before'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'fastway'),
            'subtitle' => esc_html__('Page title color.', 'fastway'),
            'output'   => array('body #pagetitle h1.page-title'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'fastway'),
            'options'  => array(
                'show'  => esc_html__('Show', 'fastway'),
                'hidden'  => esc_html__('Hidden', 'fastway'),
            ),
            'default'  => 'show',
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'fastway'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'       => 'content_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color', 'fastway'),
            'subtitle' => esc_html__('Content background color.', 'fastway'),
            'output' => array('background-color' => 'body')
        ),
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'fastway'),
            'desc'           => esc_html__('Default: Top-90px, Bottom-90px', 'fastway'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'fastway'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'fastway'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Archive', 'fastway'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'fastway'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'fastway'),
            'options'  => array(
                'left'  => esc_html__('Left', 'fastway'),
                'right' => esc_html__('Right', 'fastway'),
                'none'  => esc_html__('Disabled', 'fastway')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'fastway'),
            'subtitle' => esc_html__('Show author name on each post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'fastway'),
            'subtitle' => esc_html__('Show date posted on each post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'fastway'),
            'subtitle' => esc_html__('Show category names on each post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'fastway'),
            'subtitle' => esc_html__('Show comments count on each post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'fastway'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'post_bg_color',
            'type'        => 'color',
            'title'       => esc_html__('Content Background Color', 'fastway'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'single_post_layout', 1 => 'equals', 2 => 'real-estate' ),
            'force_output' => true
        ),
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'fastway'),
            'subtitle' => esc_html__('Select a sidebar position', 'fastway'),
            'options'  => array(
                'left'  => esc_html__('Left', 'fastway'),
                'right' => esc_html__('Right', 'fastway'),
                'none'  => esc_html__('Disabled', 'fastway')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'fastway'),
            'subtitle' => esc_html__('Show author name on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_author_info_on',
            'title'    => esc_html__('Author Info', 'fastway'),
            'subtitle' => esc_html__('Show author info name on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'fastway'),
            'subtitle' => esc_html__('Show date on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'fastway'),
            'subtitle' => esc_html__('Show category names on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'fastway'),
            'subtitle' => esc_html__('Show tag names on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'fastway'),
            'subtitle' => esc_html__('Show comments count on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'fastway'),
            'subtitle' => esc_html__('Show social share on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'fastway'),
            'subtitle' => esc_html__('Show comments form on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'fastway'),
            'subtitle' => esc_html__('Show feature image on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_related_on',
            'title'    => esc_html__('Related Post', 'fastway'),
            'subtitle' => esc_html__('Show related on single post.', 'fastway'),
            'type'     => 'switch',
            'default'  => false
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'fastway'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'fastway'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'fastway'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'fastway'),
                    'right' => esc_html__('Right', 'fastway'),
                    'none'  => esc_html__('Disabled', 'fastway')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'fastway'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'fastway'),
                'default' => 8,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'fastway'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'fastway'),
            'subtitle' => esc_html__('Select a layout for upper footer area.', 'fastway'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/footer-layout/f1.jpg',
            ),
            'default'  => '1'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Top', 'fastway'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Columns', 'fastway'),
            'options'  => array(
                '2'  => esc_html__('2 Column', 'fastway'),
                '3'  => esc_html__('3 Column', 'fastway'),
                '4'  => esc_html__('4 Column', 'fastway'),
            ),
            'default'  => '4',
        ),
        array(
            'id'    => 'footer_top_color',
            'type'  => 'color',
            'title' => esc_html__('Text Color', 'fastway'),
            'output'   => array('.top-footer')
        ),
        array(
            'id'      => 'footer_top_link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Links Color', 'fastway'),
            'regular' => true,
            'hover'   => true,
            'active'  => true,
            'visited' => true,
            'output'  => array('.top-footer a'),
        ),
        array(
            'title' => esc_html__('Widget Title', 'fastway'),
            'type'  => 'section',
            'id' => 'footer_wg_title',
            'indent' => true,
        ),
        array(
            'id'    => 'footer_top_heading_color',
            'type'  => 'color',
            'title' => esc_html__('Title Color', 'fastway'),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Middle', 'fastway'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_middle_logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo', 'fastway'),
            'default' => '',
        ),
        array(
            'id'       => 'footer_middle_logo_ov',
            'type'     => 'media',
            'title'    => esc_html__('Logo Overlay', 'fastway'),
            'default' => '',
        ),
        array(
            'id'=>'footer_middle_about',
            'type' => 'textarea',
            'title' => esc_html__('About', 'fastway'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            )
        ),
        array(
            'id' => 'f_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'fastway'),
            'default' => '',
        ),
        array(
            'id'       => 'f_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'fastway'),
            'options'  => array(
                'page'  => esc_html__('Page', 'fastway'),
                'custom'  => esc_html__('Custom', 'fastway')
            ),
            'default'  => 'page',
        ),
        array(
            'id'    => 'f_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'fastway' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'f_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'f_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'fastway'),
            'default' => '',
            'required' => array( 0 => 'f_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'f_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'fastway'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'fastway'),
                '_blank'  => esc_html__('Blank', 'fastway')
            ),
            'default'  => '_self',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Bottom', 'fastway'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'fastway'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            )
        ),
        array(
            'title' => esc_html__('Social', 'fastway'),
            'type'  => 'section',
            'id' => 'footer_social',
            'indent' => true,
        ),
        fastway_social_list_opts(['param_name' => 'f_social_list'])
    )
));


/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'fastway'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'accent_color',
            'type'        => 'color',
            'title'       => esc_html__('Accent Color', 'fastway'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'fastway'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'fastway'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'fastway'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        )
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::getOption($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'fastway'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'fastway'),
            'options'  => array(
                'Rubik'  => esc_html__('Default', 'fastway'),
                'Google-Font'  => esc_html__('Google Font', 'fastway'),
            ),
            'default'  => 'Rubik',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'fastway'),
            'options'  => array(
                'Rubik'  => esc_html__('Default', 'fastway'),
                'Google-Font'  => esc_html__('Google Font', 'fastway'),
            ),
            'default'  => 'Rubik',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'sub_heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Sub Heading Default Font', 'fastway'),
            'options'  => array(
                'Shadows-Into-Light'  => esc_html__('Default', 'fastway'),
                'Google-Font'  => esc_html__('Google Font', 'fastway'),
            ),
            'default'  => 'Shadows-Into-Light',
        ),
        array(
            'id'          => 'font_sub_heading',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'fastway'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'fastway'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'output'      => array('body .ft-sub'),
            'units'       => 'px',
            'required' => array( 0 => 'sub_heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'fastway'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'fastway'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'fastway'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'fastway'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'fastway'),
            'validate' => 'no_html'
        )
    )
));

/* Google Maps /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Google Maps', 'fastway'),
    'icon'   => 'el el-map-marker',
    'fields' => array(
        array(
            'id'       => 'gm_api_key',
            'type'     => 'text',
            'title'    => esc_html__('API Key', 'fastway'),
            'default' => 'AIzaSyC08_qdlXXCWiFNVj02d-L2BDK5qr6ZnfM',
            'desc' => esc_html__('Register a Google Maps Api key then put it in here.', 'fastway')
        ),
    ),
));

/* Google Maps /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Links', 'fastway'),
    'icon'   => 'el el-share',
    'fields' => array(
        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_linkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_google-plus_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'fastway'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'fastway'),
            'default' => '#',
        ),
    ),
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'fastway'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'content_404_page',
            'type'     => 'textarea',
            'title'    => esc_html__('Content', 'fastway'),
            'default' => '',
        ),
        array(
            'id'       => 'btn_text_404_page',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'fastway'),
            'default' => '',
            'desc' => esc_html__('Default: Take me go back home', 'fastway')
        ),
        array(
            'id'       => 'bg_404_page',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'fastway'),
            'output'   => array('body.error404 .error-404'),
            'background-color' => false
        ),
    ),
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'fastway'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'fastway'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'fastway'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'fastway'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'fastway'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'fastway'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'fastway')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'fastway'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'fastway'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));