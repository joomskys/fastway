<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

class CSS_Generator {
	/**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	/**
	 * Constructor
	 */
	function __construct() {
		$this->opt_name = fastway_get_opt_name();

		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = fastway_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
		add_filter( 'cms_scssc_lib', function(){ return 'new';} );
		add_filter( 'cms_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
	}

	/**
	 * init hook - 10
	 */
	function init() {
		if ( ! class_exists( '\Leafo\ScssPhp\Compiler' ) )
        {
            return;
        }

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->generate_file();
		} );
	}

	function generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
			$this->generate_file();
		}
	}

	/**
	 * Generate options and css files
	 */
	function generate_file() {
		if(!class_exists('\Leafo\ScssPhp\Compiler')) return;

		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		//$this->scssc = new scssc();
		$this->scssc = new \Leafo\ScssPhp\Compiler();
		$this->scssc->setImportPaths( $scss_dir );

		$_options = $scss_dir . 'variables.scss';

		$this->redux->filesystem->execute( 'put_contents', $_options, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
		) );
		$css_file = $css_dir . 'theme.css';

		/**
         * build source map
         * this used for load scss file when dev_mode is on
         * @source: https://github.com/leafo/scssphp/wiki/Source-Maps
        */
        $this->scssc->setSourceMap(\Leafo\ScssPhp\Compiler::SOURCE_MAP_FILE);
        if(is_child_theme()){
            $this->scssc->setSourceMapOptions(array(
                'sourceMapWriteTo'  => $child_css_file . ".map",
                'sourceMapURL'      => "child-theme.css.map",
                'sourceMapFilename' => $child_css_file,
                'sourceMapBasepath' => $child_scss_dir,
                'sourceRoot'        => $child_scss_dir,
            ));
        } else {
            $this->scssc->setSourceMapOptions(array(
                'sourceMapWriteTo'  => $css_file . ".map",
                'sourceMapURL'      => "theme.css.map",
                'sourceMapFilename' => $css_file,
                'sourceMapBasepath' => $scss_dir,
                'sourceRoot'        => $scss_dir,
            ));
        }
        // end build source map

		//$this->scssc->setFormatter( 'scss_formatter' );
		$this->scssc->setFormatter('Leafo\ScssPhp\Formatter\Crunched');

		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
		) );
	}

	/**
	 * Output options to _variables.scss
	 *
	 * @access protected
	 * @return string
	 */
	protected function options_output() {
		ob_start();

		 //Colors
        $primary_color          = 'var(--primary-color)';
        $accent_color           = 'var(--accent-color)';
        $darkent_accent_accent  = 'var(--darkent-accent-color)';
        $lightent_accent_accent = 'var(--lightent-accent-color)';
        $secondary_color        = 'var(--secondary-color)';
        $thirdary_color         = 'var(--thirdary-color)';
        $fourth_color           = 'var(--fourth-color)';
        printf('$primary_color:%s;',$primary_color);
        printf('$primary_color_o:%s;',fastway_configs('primary_color'));
        printf('$accent_color:%s;',$accent_color);
        printf('$darkent_accent_accent:%s;',$darkent_accent_accent);
        printf('$lightent_accent_accent:%s;',$lightent_accent_accent);
        printf('$secondary_color:%s;',$secondary_color);
        printf('$secondary_color_o:%s;',fastway_configs('secondary_color'));
        printf('$thirdary_color:%s;',$thirdary_color);
        printf('$fourth_color:%s;',$fourth_color);
        printf('$invalid_color:%s;',fastway_configs('invalid_color'));
        printf('$color_red:%s;',fastway_configs('color_red'));
        printf('$color_green:%s;',fastway_configs('color_green'));
        printf('$color_gray:%s;',fastway_configs('color_gray'));
        printf('$color_gray_light:%s;',fastway_configs('color_gray_light'));
        printf('$white:%s;',fastway_configs('white'));

        // Typography
        printf('$h1_size:%s;',fastway_configs('h1_size'));
        printf('$h2_size:%s;',fastway_configs('h2_size'));
        printf('$h3_size:%s;',fastway_configs('h3_size'));
        printf('$h4_size:%s;',fastway_configs('h4_size'));
        printf('$h5_size:%s;',fastway_configs('h5_size'));
        printf('$h6_size:%s;',fastway_configs('h6_size'));

		$link_color = fastway_get_opt( 'link_color', '#333' );
		if ( ! empty( $link_color['regular'] ) && isset( $link_color['regular'] ) ) {
			printf( '$link_color: %s;', esc_attr( $link_color['regular'] ) );
		} else {
			echo '$link_color: #333;';
		}

		$link_color_hover = fastway_get_opt( 'link_color', 'var(-accent-color)' );
		if ( ! empty( $link_color['hover'] ) && isset( $link_color['hover'] ) ) {
			printf( '$link_color_hover: %s;', esc_attr( $link_color['hover'] ) );
		} else {
			echo '$link_color_hover: var(--accent-color);';
		}

		$link_color_active = fastway_get_opt( 'link_color', 'var(--accent-color)' );
		if ( ! empty( $link_color['active'] ) && isset( $link_color['active'] ) ) {
			printf( '$link_color_active: %s;', esc_attr( $link_color['active'] ) );
		} else {
			echo '$link_color_active: var(--accent-color);';
		}

		/* Font */
		printf('$BodyFont:%s;', fastway_configs('body_font'));
		printf('$body_default_font:%s;', fastway_configs('body_font'));
		printf('$heading_default_font:%s;', fastway_configs('heading_font'));
		printf('$sub_heading_default_font:%s;', fastway_configs('heading_font'));

		return ob_get_clean();
	}

	/**
	 * Hooked wp_enqueue_scripts - 20
	 * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
	 */
	function enqueue() {
		$css = $this->inline_css();
		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'fastway-theme', $this->dev_mode ? $css : fastway_css_minifier( $css ) );
		}
	}

	/**
	 * Generate inline css based on theme options
	 */
	protected function inline_css() {
		ob_start();
		/* Logo */
		$logo_maxh = fastway_get_opt( 'logo_maxh' );

		if ( ! empty( $logo_maxh['height'] ) && $logo_maxh['height'] != 'px' ) {
			printf( '#site-header-wrap .site-branding a img { max-height: %s; }', esc_attr( $logo_maxh['height'] ) );
		} ?>
        @media screen and (max-width: 991px) {
		<?php
		$logo_maxh_sm = fastway_get_opt( 'logo_maxh_sm' );
		if ( ! empty( $logo_maxh_sm['height'] ) && $logo_maxh_sm['height'] != 'px' ) {
			printf( '#site-header-wrap .site-branding a img { max-height: %s; }', esc_attr( $logo_maxh_sm['height'] ) );
		} ?>
        }
		<?php /* Menu */
		$menu_text_transform = fastway_get_opt( 'menu_text_transform' );
		if ( ! empty( $menu_text_transform ) ) {
			printf( '.primary-menu > li > a { text-transform: %s !important; }', esc_attr( $menu_text_transform ) );
		}
		$menu_font_size = fastway_get_opt( 'menu_font_size' );
		if ( ! empty( $menu_font_size ) ) {
			printf( '.primary-menu > li > a { font-size: %s' . 'px !important; }', esc_attr( $menu_font_size ) );
		}
		$main_menu_color = fastway_get_opt( 'main_menu_color' );
		if ( ! empty( $main_menu_color['regular'] ) ) {
			//printf( '.primary-menu > li > a { color: %s !important; }', esc_attr( $main_menu_color['regular'] ) );
		}
		if ( ! empty( $main_menu_color['hover'] ) ) {
			//printf( '.primary-menu > li > a:hover { color: %s !important; }', esc_attr( $main_menu_color['hover'] ) );
		}
		if ( ! empty( $main_menu_color['active'] ) ) {
			//printf( '.primary-menu > li.current_page_item > a, .primary-menu > li.current-menu-item > a, .primary-menu > li.current_page_ancestor > a, .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $main_menu_color['active'] ) );
		}
		$sticky_menu_color = fastway_get_opt( 'sticky_menu_color' );
		if ( ! empty( $sticky_menu_color['regular'] ) ) {
			//printf( '#site-header.h-fixed .primary-menu > li > a { color: %s !important; }', esc_attr( $sticky_menu_color['regular'] ) );
		}
		if ( ! empty( $sticky_menu_color['hover'] ) ) {
			//printf( '#site-header.h-fixed .primary-menu > li > a:hover { color: %s !important; }', esc_attr( $sticky_menu_color['hover'] ) );
		}
		if ( ! empty( $sticky_menu_color['active'] ) ) {
			//printf( '#site-header.h-fixed .primary-menu > li.current_page_item > a, #site-header.h-fixed .primary-menu > li.current-menu-item > a, #site-header.h-fixed .primary-menu > li.current_page_ancestor > a, #site-header.h-fixed .primary-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $sticky_menu_color['active'] ) );
		}

		/* Page Title */
		$ptitle_bg = fastway_get_page_opt( 'ptitle_bg' );
		if ( ! empty( $ptitle_bg['background-image'] ) ) {
			echo 'body #pagetitle.page-title {
                background-image: url(' . esc_attr( $ptitle_bg['background-image'] ) . ');
            }';
		}

		/* Content */
		$content_bg_color = fastway_get_page_opt( 'content_bg_color' );
		if ( ! empty( $content_bg_color['color'] ) ) {
			echo '#pagetitle svg path {
                fill: ' . esc_attr( $content_bg_color['color'] ) . ';
            }';
		}

		/* Footer */
		$footer_bg_color_top      = fastway_get_opt( 'footer_bg_color_top' );
		$footer_top_heading_color = fastway_get_opt( 'footer_top_heading_color' );
		$footer_top_heading_fs    = fastway_get_opt( 'footer_top_heading_fs' );
		$footer_top_heading_tt    = fastway_get_opt( 'footer_top_heading_tt' );
		if ( ! empty( $footer_bg_color_top ) ) {
			echo '.site-footer:before {
                background-color: ' . esc_attr( $footer_bg_color_top['rgba'] ) . ' !important;
            }';
		}
		if ( ! empty( $footer_top_heading_color ) ) {
			echo '.top-footer .footer-widget-title {
                color: ' . esc_attr( $footer_top_heading_color ) . ' !important;
            }';
		}
		if ( ! empty( $footer_top_heading_fs ) ) {
			echo '.top-footer .footer-widget-title {
                font-size: ' . esc_attr( $footer_top_heading_fs ) . 'px !important;
            }';
		}
		if ( ! empty( $footer_top_heading_tt ) ) {
			echo '.top-footer .footer-widget-title {
                text-transform: ' . esc_attr( $footer_top_heading_tt ) . ' !important;
            }';
		}
		/* Custom Css */
		$custom_css = fastway_get_opt( 'site_css' );
		if ( ! empty( $custom_css ) ) {
			echo esc_attr( $custom_css );
		}

		return ob_get_clean();
	}
}

new CSS_Generator();