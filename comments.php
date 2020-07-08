<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package FastWay
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
$post_comments_form_on = fastway_get_opt( 'post_comments_form_on', true );

if($post_comments_form_on) : ?>

    <div id="comments" class="comments-area">

        <?php
        // You can start editing here -- including this comment!
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">
                <h2 class="comments-title"><?php echo esc_html__('Comments', 'fastway') ?></h2><!-- .comments-title -->

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'fastway_comment_list'
                        ) );
                    ?>
                </ul><!-- .comment-list -->

                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fastway' ); ?></p>
            <?php
            endif;

        endif; // Check for have_comments().
        comment_form(fastway_comment_form_args());
    ?>

    </div><!-- #comments -->

<?php endif; ?>