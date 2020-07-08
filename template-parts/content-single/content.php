<?php
/**
 * Template part for displaying posts in loop
 *
 * @package FastWay
 */
$post_tags_on          = fastway_get_opt( 'post_tags_on', true );
$post_author_info_on   = fastway_get_opt( 'post_author_info_on', false );
$post_social_share_on  = fastway_get_opt( 'post_social_share_on', false );
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
                'show_date'   => false,
                'show_cat'    => fastway_get_opts('post_categories_on','0'),
                'show_author' => fastway_get_opts('post_author_on','1'),
                'show_cmt'    => fastway_get_opts('post_comments_on','1'),
                'class'       => 'mt-post-meta bdr-1 bdr-solid bdr-b-1 bdr-gray-light p-b20 m-b15'
            ]);
        ?>
        <h3 class="entry-title text-uppercase m-b15">
            <a href="<?php echo esc_url( get_permalink()); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="fa fa-thumb-tack"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h3>
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
        </div>
        <?php
            // Post tag
            // param: show_tag, title
            fastway_entry_tagged_in([
                'show_tag' => fastway_get_opt( 'post_tags_on', '1' ), 
                'title'    => esc_html__('Tags','fastway')
            ]);
            // post share
            // param: show_share, class, title, social_class
            fastway_socials_share_default([
                'class'      => 'm-t40',
                'show_share' => fastway_get_opt( 'post_social_share_on', '0' ),   
                'title'      => '<div class="col-auto"><div class="h4 text-uppercase">'.esc_html__('Share','fastway').'</div></div>',
                'social_class' => 'text-accent link-accent social-square'
            ]);
            // Author info
            // param: show_author, class
            fastway_post_author_info([
                'class'       => 'm-t40',
                'show_author' => fastway_get_opt('post_author_info_on', '0')
            ]);
            // Related post
            // param: class, show_related, title, posts_per_page, post_tyle
            fastway_related_post([
                'class' => 'm-t40'
            ]);
        ?>
    </div>
</article><!-- #post -->