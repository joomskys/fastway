<?php
/**
 * The template for displaying all single posts
 *
 * @package FastWay
 */
get_header();
$sidebar_pos = '';
$show_sidebar_post = false;
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php fastway_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
                <?php

                    while ( have_posts() )
                    {
                        the_post();
                        
                        the_content();

                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }
                    
                ?>
            </main>
        </div>
    </div>
</div>
<?php
fastway_set_post_views(get_the_ID());
get_footer();
