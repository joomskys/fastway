<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FastWay
 */
$content_404_page = fastway_get_opt( 'content_404_page' );
$btn_text_404_page = fastway_get_opt( 'btn_text_404_page' );
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="row">
                <div class="col-12">
                    <section class="error-404 bg-overlay bg-image">
                        <div class="error-404-inner">
                            <header>
                                <h1>404</h1>
                            </header><!-- .page-title -->
                            <div class="page-content">
                                <?php if(!empty($content_404_page)) {
                                    echo wp_kses_post($content_404_page);
                                } else {
                                    echo esc_html__('FastWay has the perfect place to enjoy fine food and great cocktails with excellent service, in comfortable atmospheric surroundings. We have a soft dining room, combined with an open kitchen, coffee take out bar and alovely awesome on site coffee roastery.', 'fastway');
                                } ?>
                            </div><!-- .page-content -->
                            <a class="btn btn-default" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php if(!empty($btn_text_404_page)) {
                                    echo wp_kses_post($btn_text_404_page);
                                } else {
                                    echo esc_html__('Back To Home', 'fastway');
                                } ?>   
                            </a>
                        </div>
                    </section><!-- .error-404 -->
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
