<?php
/**
 * Template part for displaying posts in loop
 *
 * @package FastWay
 */
$post_tags_on = fastway_get_opt( 'post_tags_on', true );
$post_author_info_on = fastway_get_opt( 'post_author_info_on', false );
$post_social_share_on = fastway_get_opt( 'post_social_share_on', false );
$post_feature_image_on = fastway_get_opt( 'post_feature_image_on', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-body">
        <div class="entry-content clearfix">
            <?php
                the_content();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php fastway_socials_share_default(); ?>
    </div>
</article><!-- #post -->