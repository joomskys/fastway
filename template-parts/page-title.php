<?php
$titles = fastway_get_page_titles();
$pagetitle = fastway_get_opts( 'pagetitle', '1' );
$ptitle_layout = fastway_get_opts( 'ptitle_layout', '1' );
$sub_title = fastway_get_opts( 'sub_title' );

ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_breadcrumb_on = fastway_get_opts( 'ptitle_breadcrumb_on', 'show' );
if(is_404()) {
    return true;
}
if($pagetitle == '1') : ?>
    <?php 
        switch ($ptitle_layout) {
            default: 
        ?>
            <div id="pagetitle" class="page-title page-title-layout<?php echo esc_attr($ptitle_layout); ?> relative d-flex">
                <div class="cms-page-title-overlay"></div>
                <div class="container d-flex">
                    <div class="cms-page-title-inner align-self-end">
                        <?php printf( '%s', wp_kses_post($titles_html)); ?>
                        <?php if($custom_pagetitle && !empty($sub_title)) : ?>
                            <h6 class="page-sub-title ft-sub">
                                <?php echo wp_kses_post( $sub_title ); ?>
                            </h6>
                        <?php endif; ?>
                        <?php if($ptitle_breadcrumb_on == '1') : ?>
                            <?php fastway_breadcrumb(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php 
            break;
        }
    ?>
<?php endif; ?>