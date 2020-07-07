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
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry'); ?>>
    <?php 
        fastway_post_media([
            'thumbnail_size' => 'large',
            'after' => fastway_post_featured_date(fastway_get_opts('post_date_on','1'), false) 
        ]);
    ?>
    <div class="entry-body p-t30">
        <?php 
            fastway_archive_meta([
                'show_date' => false,
                'show_author'  => fastway_get_opts('post_categories_on','0'),
                'show_cat'  => fastway_get_opts('post_author_on','1'),
                'show_cmt'  => fastway_get_opts('post_comments_on','1'),
                'class' => 'mt-post-meta bdr-1 bdr-solid bdr-b-1 bdr-gray-light p-b20 m-b15'
            ]);
        ?>
        <h2 class="entry-title text-uppercase m-b15">
            <a href="<?php echo esc_url( get_permalink()); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="fa fa-thumb-tack"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
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
        <?php if($post_tags_on) :
            fastway_entry_tagged_in();
        endif; ?>
        <?php if($post_social_share_on) {
            fastway_socials_share_default();
        } ?>
        <?php if($post_author_info_on) : ?>
            <div class="entry-author-info">
                <div class="author-post">
                    <div class="author-avatar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 'full' ); ?>
                        </div>
                    <div class="author-description">
                        <p>
                            <?php the_author_meta( 'description' ); ?>
                        </p>
                        <?php fastway_get_user_social(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php fastway_related_post(); ?>
    </div>
</article><!-- #post -->