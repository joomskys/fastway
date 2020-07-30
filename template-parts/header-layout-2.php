<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = fastway_get_opt( 'sticky_on', false );
?>
<header id="masthead" class="site-header">
    <div id="site-header-wrap" class="<?php fastway_header_css_class('fixed-height'); ?>">
        <div id="cms-before-header">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="site-branding col-12 col-md-auto">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="cms-header-quick-contact col-auto d-max-md-none">
                        <?php fastway_header_top_quick_contact(['class' => 'style2 row']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="site-header" class="site-header-main bg-secondary">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="site-navigation col">
                        <nav class="main-navigation">
                            <?php get_template_part( 'template-parts/header-menu' ); ?>
                        </nav>
                    </div>
                    <div class="<?php fastway_site_menu_right_class('col-12 col-xl-auto d-block');?>">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-left col-auto">
                                <?php  fastway_mobile_menu_icon(); ?>
                            </div>
                            <div class="col-right col-auto d-flex align-items-center"><?php
                                fastway_header_button();
                                fastway_header_cart(['class' => 'menu-icon']);
                                fastway_header_search(['class' => 'menu-icon']);
                                fastway_header_social(['icon_class' => 'menu-icon menu-color']); 
                            ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>