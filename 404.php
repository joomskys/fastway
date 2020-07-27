<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FastWay
 */
$content_404_page = fastway_get_opt( 'content_404_page' );
$btn_text_404_page = fastway_get_opt( 'btn_text_404_page' );
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container text-center">
                <div data-title="<?php echo esc_attr__('Error','fastway');?>" class="cms-bg-text h2 m-b25"><span><?php echo esc_html__('404','fastway') ?></span></div>
                <div class="page-content h3 text-uppercase m-b20">
                    <?php if(!empty($content_404_page)) {
                        echo wp_kses_post($content_404_page);
                    } else {
                        echo esc_html__('The webpage you are looking for is not here!', 'fastway');
                    } ?>
                </div>
                <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(!empty($btn_text_404_page)) {
                        echo wp_kses_post($btn_text_404_page);
                    } else {
                        echo esc_html__('Back To Home', 'fastway');
                    } ?>   
                </a>
            </div>
        </main>
    </div>
<?php
get_footer();
