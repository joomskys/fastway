<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package FastWay
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content clearfix">
        <?php
            the_content();
            fastway_entry_link_pages();
        ?>
    </div><!-- .entry-content -->

    <?php if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php fastway_entry_edit_link(); ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
