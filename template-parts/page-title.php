<?php
$titles = fastway_get_page_titles();

$pagetitle = fastway_get_opt( 'pagetitle', 'show' );
$ptitle_layout = fastway_get_opt( 'ptitle_layout', '1' );

$custom_pagetitle = fastway_get_page_opt( 'custom_pagetitle', 'themeoption');
$ptitle_layout_page = fastway_get_page_opt( 'ptitle_layout', '');
if($custom_pagetitle != 'themeoption' && $custom_pagetitle != '') {
    $pagetitle = $custom_pagetitle;
}

if($custom_pagetitle != 'themeoption' && $custom_pagetitle != '' && $ptitle_layout_page != '') {
    $ptitle_layout = $ptitle_layout_page;
}

$sub_title = fastway_get_page_opt( 'sub_title' );
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="page-title">%s</h1>', esc_attr($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_breadcrumb_on = fastway_get_opt( 'ptitle_breadcrumb_on', 'show' );
if(is_404()) {
    return true;
}
if($pagetitle == 'show') : ?>
    <?php 
        switch ($ptitle_layout) {
            case '2': ?>
                <div id="pagetitle" class="page-title bg-overlay bg-image page-title-layout<?php echo esc_attr($ptitle_layout); ?>">
                    <div class="container">
                        <div class="page-title-inner">
                            <?php if(is_singular('post')) {
                                fastway_post_meta();
                            } ?>
                            <?php if(is_singular('event')) {
                                fastway_post_meta_event();
                            } ?>
                            <?php if($ptitle_breadcrumb_on == 'show' && !is_singular('post') && !is_singular('event')) : ?>
                                <h6 class="page-sub-title ft-sub">
                                    <?php echo wp_kses_post( $sub_title ); ?>
                                </h6>
                            <?php endif; ?>
                            <?php printf( '%s', wp_kses_post($titles_html)); ?>
                        </div>
                    </div>
                </div>
                <?php break;

            case '4': ?>
                <div id="pagetitle" class="page-title page-title-layout<?php echo esc_attr($ptitle_layout); ?>">
                    <div class="container">
                        <div class="page-title-inner">
                            <?php printf( '%s', wp_kses_post($titles_html)); ?>
                            <?php if($ptitle_breadcrumb_on == 'show') : ?>
                                <?php fastway_breadcrumb(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php break;
            
            default: ?>
                <div id="pagetitle" class="page-title bg-overlay bg-image page-title-layout<?php echo esc_attr($ptitle_layout); ?>">
                    <div class="container">
                        <div class="page-title-inner">
                            <?php if(is_singular('post')) {
                                fastway_post_meta();
                            } ?>
                            <?php if(is_singular('event')) {
                                fastway_post_meta_event();
                            } ?>
                            <?php if($custom_pagetitle && !empty($sub_title) && !is_singular('post')) : ?>
                                <h6 class="page-sub-title ft-sub">
                                    <?php echo wp_kses_post( $sub_title ); ?>
                                </h6>
                            <?php endif; ?>
                            <?php printf( '%s', wp_kses_post($titles_html)); ?>
                            <?php if($ptitle_breadcrumb_on == 'show' && !is_singular('post') && !is_singular('event')) : ?>
                                <?php fastway_breadcrumb(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php break;
        }
    ?>
<?php endif; ?>