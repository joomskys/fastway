<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = fastway_get_opt( 'sticky_on', false );
$search_on = fastway_get_opt( 'search_on', false );
$cart_on = fastway_get_opt( 'cart_on', false );
$hidden_sidebar_on = fastway_get_opt( 'hidden_sidebar_on', false );

$h_btn_on = fastway_get_opt( 'h_btn_on', 'hide' );
$h_btn_text = fastway_get_opt( 'h_btn_text' );
$h_btn_link_type = fastway_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link = fastway_get_opt( 'h_btn_link' );
$h_btn_link_custom = fastway_get_opt( 'h_btn_link_custom' );
$h_btn_target = fastway_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}

$header_layout = fastway_get_opts('header_layout','1');
switch ($header_layout) {
    case '5':
        $cart_style = '2';
        break;
    
    default:
        $cart_style = '1';
        break;
}

//header-transparent
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="header-layout1 <?php if($sticky_on == 1) { echo 'is-sticky'; } ?>">
        <div id="site-header" class="site-header-main">
            <div class="container">
                <div class="row row-flex">
                    <div class="site-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="site-navigation">
                        <nav class="main-navigation">
                            <?php get_template_part( 'template-parts/header-menu' ); ?>
                        </nav>
                        <div class="site-menu-right">
                            <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                                <div class="site-menu-right-cart">
                                    <div class="menu-right-item menu-cart">
                                        <span class="h-btn-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="header-count cart-count cart_total style-<?php echo esc_attr($args['style']);?>"><?php fastway_woocommerce_cart_counter(['style' => $cart_style]); ?></span></span>
                                        </span>

                                        <div class="widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <?php woocommerce_mini_cart(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($search_on || $cart_on || $hidden_sidebar_on ) : ?>
                                <div class="site-menu-right-group">
                                    <?php if($search_on) : ?>
                                        <span class="menu-right-item h-btn-search"><i class="fa fa-search"></i></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($h_btn_on == 'show' && !empty($h_btn_text)) : ?>
                                <div class="site-menu-right-button">
                                    <a href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>" class="menu-right-item h-btn"><?php echo esc_attr( $h_btn_text ); ?></a>
                                </div>
                            <?php endif; ?>
                            <div class="site-menu-social"><?php 
                                fastway_social_header(); 
                            ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>