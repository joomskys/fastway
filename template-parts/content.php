<?php
/**
 * Template part for displaying posts in loop
 *
 * @package FastWay
 */
?>
<article <?php post_class('single-hentry archive'); ?>>
    <?php if (has_post_format('gallery')) : ?>
        <div class="entry-featured relative">
            <?php
            $light_box = fastway_get_post_format_value('post-gallery-lightbox', '0');
            $gallery_list = explode(',', fastway_get_post_format_value('post-gallery-images', ''));
            wp_enqueue_script('jquery-slick');
            ?>
            <div class="cms-post-gallery-slide <?php if($light_box) {echo 'images-light-box';} ?>" >
                <?php
                foreach ($gallery_list as $img_id):
                    ?>
                    <div class="carousel-item slick-slide-item">
                        <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><img src="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large'));?>" alt="<?php echo esc_attr(get_post_meta( $img_id, '_wp_attachment_image_alt', true )) ?>"></a>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
            <?php fastway_post_featured_date(fastway_get_opt( 'archive_date_on', true ));  ?>
        </div>
    <?php elseif (has_post_format('quote')) : ?>
        <div class="entry-featured relative">
            <?php
                $quote_text = fastway_get_post_format_value('post-quote-cite', '');
                echo esc_attr($quote_text);
            ?>
        </div>
    <?php elseif (has_post_format('link')) : ?>
        <div class="entry-featured relative">
            <?php
                $link_pf = fastway_get_post_format_value('post-link-url', '#');
                echo esc_url($link_pf);
            ?>
        </div>
    <?php elseif (has_post_format('video')) : ?>
        <div class="entry-featured relative">
            <div class="entry-video featured-active">
                <?php
                $video_url = fastway_get_post_format_value('post-video-url', '#');
                $video_file = fastway_get_post_format_value('post-video-file', '');
                $video_html = fastway_get_post_format_value('post-video-html', '');
                $video = '';
                if (!empty($video_url)) {
                    global $wp_embed;
                    echo $wp_embed->run_shortcode('[embed]' . $video_url . '[/embed]');
                } elseif (!empty($video_file)) {
                    if (strpos('[embed', $video_file)) {
                        global $wp_embed;
                        echo esc_html($wp_embed->run_shortcode($video_file));
                    } else {
                        echo do_shortcode($video_file);
                    }
                } else {
                    if ('' != $video_html) {
                        echo esc_html($video_html);
                    }
                }
                ?>
            </div>
            <?php fastway_post_featured_date(fastway_get_opt( 'archive_date_on', true ));  ?>
        </div>
    <?php elseif (has_post_format('audio')) : ?>
        <div class="entry-featured relative">
            <?php
                $audio_url = fastway_get_post_format_value('post-audio-url', '#');
                echo esc_url($audio_url);
            ?>
        </div>
    <?php elseif (has_post_thumbnail()) : ?>
            <div class="entry-featured relative">
                <div class="post-image">
                    <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('fastway-blog'); ?></a>
                </div>
                <?php fastway_post_featured_date(fastway_get_opt( 'archive_date_on', true ));  ?>
            </div>
    <?php endif; ?>
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