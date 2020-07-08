<?php
/**
 * Template part for displaying posts in loop
 *
 * @package FastWay
 */
?>
<article <?php post_class('single-hentry archive'); ?>>
    <?php 
        fastway_post_media([
            'thumbnail_size' => 'large',
            'after'          => fastway_post_featured_date(fastway_get_opt('archive_date_on', '1'), false)
        ]); 
    ?>
    <div class="entry-body p-tb30">
        <div class="entry-holder">
            <?php 
                fastway_archive_meta(['show_date' => false, 'class' => 'mt-post-meta bdr-1 bdr-solid bdr-b-1 bdr-gray-light p-b20 m-b15']);
            ?>
            <h3 class="entry-title text-uppercase">
                <a href="<?php echo esc_url( get_permalink()); ?>">
                    <?php if(is_sticky()) { ?>
                        <i class="fa fa-thumb-tack"></i>
                    <?php } ?>
                    <?php the_title(); ?>
                </a>
            </h3>
        </div>
        <div class="entry-content">
            <?php
                fastway_entry_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="entry-readmore">
            <a href="<?php echo esc_url( get_permalink()); ?>" class="text-accent btn-text"><?php echo esc_html__('Read More', 'fastway'); ?></a>
        </div>
    </div>
</article><!-- #post -->