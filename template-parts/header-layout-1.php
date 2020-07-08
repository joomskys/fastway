<?php
/**
 * Template part for displaying default header layout
 */
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="<?php fastway_header_css_class(); ?>">
        <div id="site-header" class="site-header-main">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="cms-header-left site-branding col">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="cms-header-right col-auto">
                        <div class="d-flex">
                            <div class="site-navigation">
                                <nav class="main-navigation">
                                    <?php get_template_part( 'template-parts/header-menu' ); ?>
                                </nav>
                            </div>
                            <div class="<?php fastway_site_menu_right_class();?>"><?php 
                                fastway_header_button();
                                fastway_header_cart(['class' => 'menu-icon']);
                                fastway_header_search(['class' => 'menu-icon']);
                                fastway_header_social(['icon_class' => 'menu-icon menu-color']); 
                                fastway_mobile_menu_icon();
                            ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>