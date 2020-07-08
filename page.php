<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package FastWay
 */

get_header();
$sidebar_pos = fastway_get_opts( 'sidebar_page_pos' );
?>
    <div class="container content-container">
        <div class="row content-row">
            <div id="primary" <?php fastway_primary_class( $sidebar_pos, 'content-area' ); ?>>
                <main id="main" class="site-main">
                    <?php

                    while ( have_posts() )
                    {
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }

                    ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
                <aside id="secondary" <?php fastway_secondary_class( $sidebar_pos, 'widget-area sidebar-widget' ); ?>><?php 
                    dynamic_sidebar('sidebar-page'); 
                ?></aside>
            <?php endif; ?>

        </div>
    </div>
<?php
get_footer();