<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = fastway_get_opt( 'sticky_on', false );
$search_on = fastway_get_opt( 'search_on', false );
$cart_on = fastway_get_opt( 'cart_on', false );
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="header-layout2 fixed-height <?php if($sticky_on == 1) { echo 'is-sticky'; } ?>">
        <div id="site-header" class="site-header-main">
            <div class="container">
                <div class="norow">
                    <div class="site-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="site-navigation">
                        <nav class="main-navigation">
                            <?php get_template_part( 'template-parts/header-menu' ); ?>
                        </nav>
                        <?php if($search_on || $cart_on ) : ?>
                            <div class="site-menu-right">
                                <div class="site-menu-right-group">
                                    <?php if($search_on) : ?>
                                        <span class="menu-right-item h-btn-search"><i class="fa fa-search"></i></span>
                                    <?php endif; ?>
                                    <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                                        <div class="menu-right-item menu-cart">
                                            <span class="h-btn-cart"><i class="fa fa-shopping-cart"></i></span>
                                            <div class="widget_shopping_cart">
                                                <div class="widget_shopping_cart_content">
                                                    <?php woocommerce_mini_cart(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
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