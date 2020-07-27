<?php
$footer_top_column = fastway_get_opt( 'footer_top_column', '3' );
$footer_copyright = fastway_get_opt( 'footer_copyright' );

$footer_middle_logo = fastway_get_opt( 'footer_middle_logo' );
$footer_middle_logo_ov = fastway_get_opt( 'footer_middle_logo_ov' );
$footer_middle_about = fastway_get_opt( 'footer_middle_about' );

$f_btn_text = fastway_get_opt( 'f_btn_text' );
$f_btn_link_type = fastway_get_opt( 'f_btn_link_type', 'page' );
$f_btn_link = fastway_get_opt( 'f_btn_link' );
$f_btn_link_custom = fastway_get_opt( 'f_btn_link_custom' );
$f_btn_target = fastway_get_opt( 'f_btn_target', '_self' );
if($f_btn_link_type == 'page') {
    $f_btn_url = get_permalink($f_btn_link);
} else {
    $f_btn_url = $f_btn_link_custom;
}
?>
<footer id="cms-footer" class="<?php fastway_footer_css_class();?>">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <?php fastway_footer_top(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if(!empty($footer_middle_about) || !empty($f_btn_text) ) : ?>
        <div class="middle-footer">
            <?php if(!empty($footer_middle_logo_ov['url'])) : ?>
                <div class="middle-footer-logo-overlay">
                    <img src="<?php echo esc_url($footer_middle_logo_ov['url']); ?>" alt="<?php echo esc_attr__('Logo Footer Overlay', 'fastway'); ?>" />
                </div>
            <?php endif; ?>
            <div class="middle-footer-holder">
                <?php if(!empty($footer_middle_logo['url'])) : ?>
                    <div class="footer-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_middle_logo['url']); ?>" alt="<?php echo esc_attr__('Logo Footer', 'fastway'); ?>" /></a>
                    </div>
                <?php endif; ?>
                <?php if(!empty($footer_middle_about)) : ?>
                    <div class="footer-about">
                        <?php echo wp_kses_post($footer_middle_about); ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($f_btn_text)) : ?>
                    <div class="footer-button">
                        <a href="<?php echo esc_url( $f_btn_url ); ?>" target="<?php echo esc_attr($f_btn_target); ?>" class="btn btn-outline"><?php echo esc_html( $f_btn_text ); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-col col-12 text-center">
                    <div class="bottom-copyright"><?php
                        if ($footer_copyright) {
                            echo wp_kses_post($footer_copyright);
                        } else {
                            echo '&copy; FastWay, With Love by <a target="_blank" href="https://themeforest.net/user/7oroof/portfolio">7oroof.com</a>';
                        } 
                    ?></div>
                    <div class="bottom-social"><?php fastway_social_footer(); ?></div>
                </div>
            </div>
        </div>
    </div>
</footer>