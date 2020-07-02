<?php
/**
 * Custom template tags for this theme.
 *
 * @package FastWay
 */

/**
 * Header layout
 **/
function fastway_page_loading()
{
    $page_loading = fastway_get_opt( 'show_page_loading', false );

    if($page_loading) { ?>
        <div id="cms-loadding" class="cms-loader">
            <div class="loading-spinner">
                <div class="loading-dot1"></div>
                <div class="loading-dot2"></div>
            </div>
        </div>
    <?php }
}

/**
 * Header layout
 **/
function fastway_header_layout()
{
    $header_layout = fastway_get_opts( 'header_layout', '1' );
    if($header_layout == '0') {
        return;
    }
    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Page title layout
 **/
function fastway_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Page title layout
 **/
function fastway_footer()
{
    if(is_404()) {
        return true;
    }
    $footer_layout = fastway_get_opt( 'footer_layout', '1' );
    get_template_part( 'template-parts/footer-layout', $footer_layout );
}

/**
 * Set primary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function fastway_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    elseif (is_post_type_archive('recipe')  || is_tax('recipe-diet')) :
        $sidebar_load = 'sidebar-recipe';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-8 col-lg-8 col-md-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-8 col-lg-8 col-md-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"';
    }
}

/**
 * Set secondary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function fastway_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    elseif (is_post_type_archive('recipe') || is_tax('recipe-diet')) :
        $sidebar_load = 'sidebar-recipe';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-4 col-lg-4 col-md-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function fastway_breadcrumb()
{
    if ( ! class_exists( 'CMS_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CMS_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="cms-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function fastway_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'fastway_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function fastway_entry_excerpt( $length = 55 )
    {
        $cms_the_excerpt = get_the_excerpt();
        if(!empty($cms_the_excerpt)) {
            echo esc_html($cms_the_excerpt);
        } else {
            echo wp_kses_post(fastway_get_the_excerpt( $length ));
        }
    }
endif;

/**
 * Prints post edit link when applicable
 */
function fastway_entry_edit_link()
{
    edit_post_link(
        sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                esc_html__( 'Edit', 'fastway' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<div class="entry-edit-link"><i class="fa fa-edit"></i>',
        '</div>'
    );
}

if(!function_exists('fastway_ajax_paginate_links')){
    function fastway_ajax_paginate_links($link){
        $parts = parse_url($link);
        parse_str($parts['query'], $query);
        if(isset($query['page']) && !empty($query['page'])){
            return '#' . $query['page'];
        }
        else{
            return '#1';
        }
    }
}

add_action( 'wp_ajax_fastway_get_pagination_html', 'fastway_get_pagination_html' );
add_action( 'wp_ajax_nopriv_fastway_get_pagination_html', 'fastway_get_pagination_html' );
if(!function_exists('fastway_get_pagination_html')){
    function fastway_get_pagination_html(){
        try{
            if(!isset($_POST['query_vars'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'fastway'));
            }
            $query = new WP_Query($_POST['query_vars']);
            ob_start();
            fastway_posts_pagination( $query,  true );
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => __('Load Successfully!', 'fastway'),
                    'data' => array(
                        'html' => $html,
                        'query_vars' => $_POST['query_vars'],
                        'post' => $query->have_posts()
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function fastway_posts_pagination( $query = null, $ajax = false )
{
    if($ajax){
        add_filter('paginate_links', 'fastway_ajax_paginate_links');
    }

    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = $query->get( 'paged', '' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = $query->get( 'page', '' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<span class="nav-prev-icon"></span>';
    $html_next = '<span class="nav-next-icon"></span>';
    $paginate_links_args = array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    );
    if($ajax){
        $paginate_links_args['format'] = '?page=%#%';
    }
    $links = paginate_links( $paginate_links_args );
    if ( $links ):
    ?>
    <nav class="navigation posts-pagination <?php echo esc_attr($ajax?'ajax':''); ?>">
        <div class="posts-page-links">
            <?php
                printf($links);
            ?>
        </div>
    </nav>
    <?php
    endif;
}

/* Meta Post Author */
if(!function_exists('fastway_post_author')){
    function fastway_post_author($args = []){
        $args = wp_parse_args($args,[
            'show_author' => true,
            'text'       => esc_html__('By','fastway'),
            'icon'       => 'fa fa-user',
            'icon_class' => 'text-accent'
        ]);

        if(!$args['show_author']) return;
    ?>
        <span class="post-author">
            <?php 
                // author icon
                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
                // Author text
                if(!empty($args['text'])):  echo esc_html($args['text']).'&nbsp;'; endif; 
                // Author name
                the_author_posts_link();
            ?>
        </span>
    <?php
    }
}
/* Meta Post Category */
if(!function_exists('fastway_post_category')){
    function fastway_post_category($args = []){
        $args = wp_parse_args($args,[
            'show_cat'   => true,
            'text'       => esc_html__('Category','fastway'),
            'icon'       => 'fa fa-folder-open',
            'icon_class' => 'text-accent',
            'taxo'       => 'category',
            'separator'  => ', '
        ]);

        if(!$args['show_cat']) return;
    ?>
        <span class="post-cat">
            <?php 
                // cat icon
                $icon_class = implode(' ', ['meta-icon',$args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
                // cat text
                if(!empty($args['text'])):  echo esc_html($args['text']).'&nbsp;'; endif; 
                // cat list
                the_terms( get_the_ID(), $args['taxo'], '', $args['separator'] );
            ?>
        </span>
    <?php
    }
}
/* Meta Post Comment */
if(!function_exists('fastway_post_comment')){
    function fastway_post_comment($args = []){
        $args = wp_parse_args($args,[
            'show_cmt'   => true,
            'text'       => esc_html__('Comments','fastway'),
            'icon'       => 'fa fa-comments',
            'icon_class' => 'text-accent',
            'cmt_with_text' => true
        ]);

        if(!$args['show_cmt']) return;
    ?>
        <span class="post-cmt">
            <?php 
                // cat icon
                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
                // cat text
                if(!empty($args['text'])):  echo esc_html($args['text']).'&nbsp;'; endif; 
                // cat list
            ?>
            <a href="<?php the_permalink(); ?>"><?php
                if($args['cmt_with_text']) 
                    echo comments_number(
                        esc_html__('No Comments', 'fastway'),
                        esc_html__('Comment: 1', 'fastway'),
                        esc_html__('Comments: %', 'fastway')); 
                else 
                    echo comments_number(
                        '0',
                        '1',
                        '%'
                    );
            ?></a>
        </span>
    <?php
    }
}

/**
 * Prints archive meta on blog
 */
if ( ! function_exists( 'fastway_archive_meta' ) ) :
    function fastway_archive_meta($args=[]) {
        $args = wp_parse_args($args,[
            'show_author' => fastway_get_opt( 'archive_author_on', false ),
            'show_cat'    => fastway_get_opt( 'archive_categories_on', true ),
            'show_cmt' => fastway_get_opt( 'archive_comments_on', true ),
            'show_date' => fastway_get_opt( 'archive_date_on', true ),
            'class'     => ''
        ]);
       
        if($args['show_author'] || $args['show_cat'] || $args['show_cmt'] || $args['show_date']) : ?>
            <div class="<?php echo implode(' ', ['cms-archive-meta', $args['class']]); ?>">
                <ul class="entry-meta">
                    <?php if($args['show_author']) : ?>
                        <li class="item-author"><?php 
                            fastway_post_author(['show_author' => $args['show_author']]); 
                        ?></li>
                    <?php endif;
                    if($args['show_date']) : ?>
                        <li><?php 
                            echo get_the_date(); 
                        ?></li>
                    <?php endif;
                    if($args['show_cat']) : ?>
                        <li class="item-category"><?php fastway_post_category([
                            'show_cat' => $args['show_cat'],
                            'text'     =>  ''
                        ]);?></li>
                    <?php endif;
                    if($args['show_cmt']) : ?>
                        <li class="item-comment"><?php 
                            fastway_post_comment([
                                'show_cmt' => $args['show_cmt'],
                                'text'     => ''
                            ]);
                        ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; }
endif;

if ( ! function_exists( 'fastway_post_meta' ) ) :
    function fastway_post_meta() {
        $post_author_on = fastway_get_opt( 'post_author_on', false );
        $post_categories_on = fastway_get_opt( 'post_categories_on', true );
        $post_comments_on = fastway_get_opt( 'post_comments_on', true );
        $post_date_on = fastway_get_opt( 'post_date_on', true );
        if($post_author_on || $post_comments_on || $post_categories_on || $post_date_on) : ?>
            <ul class="entry-meta">
                <?php if($post_author_on) : ?>
                    <li class="item-author">
                        <span><?php echo esc_html__('By', 'fastway'); ?></span>
                        <?php the_author_posts_link(); ?>
                    </li>
                <?php endif; ?>
                <?php if($post_date_on) : ?>
                    <li><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($post_categories_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
                <?php endif; ?>
                <?php if($post_comments_on) : ?>
                    <li class="item-comment"><a href="<?php the_permalink(); ?>"><?php echo comments_number(
                        esc_html__('No Comments', 'fastway'),
                        esc_html__('Comment: 1', 'fastway'),
                        esc_html__('Comments: %', 'fastway')); 
                ?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; }
endif;

if ( ! function_exists( 'fastway_post_meta_event' ) ) :
    function fastway_post_meta_event() {
        $event_date = get_post_meta(get_the_ID(), 'event_date', true);
        ?>
        <ul class="entry-meta">
            <li>
                <?php
                if(!empty($event_date)) {
                    echo esc_attr($event_date);
                } else {
                    echo get_the_date();
                }
                ?>
            </li>
            <li class="item-category"><?php the_terms( get_the_ID(), 'event-category', '', ', ' ); ?></li>
        </ul>
    <?php }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'fastway_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function fastway_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-content-bottom clearfix">';
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
            echo '</div>';
        }
    }
endif;
/**
 * Post date
**/
if (!function_exists('fastway_post_featured_date')){
    function fastway_post_featured_date($show_date = false){
        if(!$show_date) return;
        ?>
            <div class="cms-post-featured-date bg-accent text-center text-white font-style-600">
                <div class="cms-post-date text-60 lh-60"><?php echo get_the_date('d'); ?></div>
                <div class="cms-post-year bg-secondary text-12 text-uppercase"><?php echo get_the_date('F Y'); ?></div>
            </div>
        <?php
    }
}

/**
 * List socials share for post.
 */
function fastway_socials_share_default() { ?>
    <div class="entry-socail">
        <label class="label"><?php echo esc_html__('Share: ', 'fastway'); ?></label>
        <a class="fb-social hover-effect" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
        <a class="tw-social hover-effect" title="Twitter" target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
        <a class="g-social hover-effect" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
        <a class="pin-social hover-effect" title="Pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a>
    </div>
    <?php
}

/**
 * Footer Top
 */
function fastway_footer_top() {
    $footer_top_column = fastway_get_opt( 'footer_top_column' );
    $footer_layout = fastway_get_opt( 'footer_layout' );
    $footer_contact_phone_label = fastway_get_opt( 'footer_contact_phone_label' );
    $footer_contact_phone = fastway_get_opt( 'footer_contact_phone' );
    $footer_contact_email_label = fastway_get_opt( 'footer_contact_email_label' );
    $footer_contact_email = fastway_get_opt( 'footer_contact_email' );

    if(empty($footer_top_column))
        return;

    $_class = "";

    switch ($footer_top_column){
        case '2':
            $_class = 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
            break;
        case '3':
            $_class = 'col-xl-4 col-lg-4 col-md-4 col-sm-12';
            break;
        case '4':
            $_class = 'col-xl-3 col-lg-3 col-md-6 col-sm-12';
            break;
    }

    for($i = 1 ; $i <= $footer_top_column ; $i++){
        if ( is_active_sidebar( 'sidebar-footer-' . $i ) ){
            echo '<div class="cms-footer-item ' . esc_html($_class) . '">';
            dynamic_sidebar( 'sidebar-footer-' . $i );
            if($i == '3' && $footer_layout == '5') { ?>
                <div class="footer5-section-group">
                    <?php if(!empty($footer_contact_phone) && !empty($footer_contact_email)) : ?>
                        <section id="footer5-quick-contact" class="widget">
                            <h2 class="footer-widget-title"><?php echo esc_html__('Quick Contact', 'fastway'); ?></h2>
                            <div class="footer-widget-content">
                                <?php if(!empty($footer_contact_phone)) : ?>
                                    <div class="quick-contact-item">
                                        <label><?php echo esc_attr( $footer_contact_phone_label ); ?></label>
                                        <a class="ft-pn-sb" href="tel:<?php echo esc_attr( $footer_contact_phone ); ?>"><?php echo esc_attr( $footer_contact_phone ); ?></a>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($footer_contact_email)) : ?>
                                    <div class="quick-contact-item">
                                        <label><?php echo esc_attr( $footer_contact_email_label ); ?></label>
                                        <a class="ft-pn-sb" href="mailto:<?php echo esc_attr( $footer_contact_email ); ?>"><?php echo esc_attr( $footer_contact_email ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                    <section id="footer5-social-contact" class="widget">
                        <h2 class="footer-widget-title"><?php echo esc_html__('Social', 'fastway'); ?></h2>
                        <div class="footer-widget-content">
                            <div class="footer-social">
                                <?php fastway_top_bar_social_icon_box(); ?>
                            </div>
                        </div>
                    </section>
                </div>
            <?php }
            if($i == '3' && $footer_layout == '6') { ?>
                <div class="footer5-section-group">
                    <section id="footer5-social-contact" class="widget">
                        <h2 class="footer-widget-title"><?php echo esc_html__('Follow Us!', 'fastway'); ?></h2>
                        <div class="footer-widget-content">
                            <div class="footer-social">
                                <?php fastway_top_bar_social_icon_box(); ?>
                            </div>
                        </div>
                    </section>
                </div>
            <?php }
            echo "</div>";
        }
    }
}

/**
 * Related Post
 */
function fastway_related_post()
{
    $post_related_on = fastway_get_opt( 'post_related_on', false );

    if($post_related_on) {
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);
        if (empty($posttags)) return;

        $tags = array();

        foreach ($posttags as $tag) {

            $tags[] = $tag->term_id;
        }
        $post_number = '6';
        $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
        if (count($query_similar->posts) > 1) {
            wp_enqueue_script( 'owl-carousel' );
            wp_enqueue_script( 'fastway-carousel' );
            ?>
            <div class="cms-related-post">
                <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'fastway'); ?></h4>
                <div class="cms-related-post-inner owl-carousel" data-item-xs="1" data-item-sm="2" data-item-md="3" data-item-lg="3" data-item-xl="3" data-item-xxl="3" data-margin="30" data-loop="false" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false">
                    <?php foreach ($query_similar->posts as $post):
                        $thumbnail_url = '';
                        if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fastway-blog-small', false);
                        endif;
                        if ($post->ID !== $current_id) : ?>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="item-featured">
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                        </div>
                                    <?php } ?>
                                    <h3 class="item-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php }
    }

    wp_reset_postdata();
}

/**
 * Search Popup
 */
function fastway_search_popup()
{
    $search_on = fastway_get_opt( 'search_on', false );
    if($search_on) { ?>
        <div class="cms-modal cms-modal-search">
            <div class="cms-modal-close">x</div>
            <div class="cms-modal-content">
                <form role="search" method="get" class="search-form-popup" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <div class="searchform-wrap">
                        <input type="text" placeholder="<?php echo esc_attr__('Enter Keywords...', 'fastway'); ?>" id="search" name="s" class="search-field" />
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    <?php }
}
/**
 * Sidebar Hidden
 */
function fastway_sidebar_hidden()
{
    $hidden_sidebar_on = fastway_get_opt( 'hidden_sidebar_on', false );
    if($hidden_sidebar_on && is_active_sidebar('sidebar-hidden')) { ?>
        <div class="cms-hidden-sidebar">
            <div class="cms-hidden-close fa fa-close"></div>
            <div class="cms-hidden-sidebar-inner">
                <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
            </div>
        </div>
    <?php }
}
/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'fastway_user_fields' );
add_action( 'edit_user_profile', 'fastway_user_fields' );
function fastway_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_rss = get_user_meta($user->ID, 'user_rss', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'fastway'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'fastway'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'fastway'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'fastway'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'fastway'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'fastway'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'fastway'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'fastway'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'fastway'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_rss"><?php esc_html_e('Rss', 'fastway'); ?></label></th>
            <td>
                <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'fastway'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'fastway'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'fastway'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'fastway_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'fastway_save_user_custom_fields' );
function fastway_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_skype']))
        update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
    if(isset($_POST['user_google']))
        update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
    if(isset($_POST['user_vimeo']))
        update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
    if(isset($_POST['user_tumblr']))
        update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
    if(isset($_POST['user_rss']))
        update_user_meta( $user_id, 'user_rss', $_POST['user_rss'] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_yelp']))
        update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}
/* Author Social */
function fastway_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_rss = get_user_meta(get_the_author_meta( 'ID' ), 'user_rss', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="fa fa-facebook"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="fa fa-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="fa fa-linkedin"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_rss)) { ?>
            <li><a href="<?php echo esc_url($user_rss); ?>"><i class="fa fa-rss"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="fa fa-instagram"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_google)) { ?>
            <li><a href="<?php echo esc_url($user_google); ?>"><i class="fa fa-google-plus"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_skype)) { ?>
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="fa fa-skype"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="fa fa-pinterest"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?>
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="fa fa-vimeo"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="fa fa-youtube"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_yelp)) { ?>
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="fa fa-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="fa fa-tumblr"></i></a></li>
        <?php } ?>

    </ul> <?php
}

function fastway_social_share_product() { ?>
    <a class="fb-social hover-effect" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="zmdi zmdi-facebook"></i></a>
    <a class="tw-social hover-effect" title="Twitter" target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="zmdi zmdi-twitter"></i></a>
    <a class="g-social hover-effect" title="Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="zmdi zmdi-google-plus"></i></a>
    <a class="pin-social hover-effect" title="Pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="zmdi zmdi-pinterest"></i></a>
    <?php
}

function fastway_product_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="product-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a class="nav-link-prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-long-arrow-left"></i></a>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <a class="nav-link-next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="fa fa-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Social Icon
 */

function fastway_social_header() {
    $social_list = fastway_get_opt( 'social_list' );
    if($social_list && isset($social_list['enabled'])){
        foreach ($social_list['enabled'] as $social_key => $social_name){
            $social_link = fastway_get_opt( 'social_' . $social_key . '_url' );
            $social_link = !empty($social_link)?$social_link:'#';
            if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank"><i class="fa fa-' . esc_attr($social_key) . '"></i></a>';
        }
    }
}

function fastway_social_footer() {
    $social_list = fastway_get_opt( 'f_social_list' );
    if($social_list && isset($social_list['enabled']) && count($social_list['enabled']) > 1){
        foreach ($social_list['enabled'] as $social_key => $social_name){
            $social_link = fastway_get_opt( 'social_' . $social_key . '_url' );
            $social_link = !empty($social_link)?$social_link:'#';
            if($social_key !== 'placebo')  echo '<a href="'. esc_url($social_link) .'" target="_blank"><i class="fa fa-' . esc_attr($social_key) . '"></i></a>';
        }
    }
}

if(!function_exists('fastway_get_post_grid')){
    function fastway_get_post_grid($posts = [], $settings = []){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'full';
        }
        if (is_array($posts)):
            foreach ($posts as $post):
                $img_id = get_post_thumbnail_id($post->ID);
                $img = etc_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false) && $show_thumbnail == 'true'): ?>
                            <div class="entry-featured">
                                <div class="post-image">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="entry-body">
                            <?php if($show_meta == 'true'): ?>
                                <ul class="entry-meta">
                                    <?php if($show_author == 'true'): ?>
                                        <li class="author"><a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a></li>
                                    <?php endif; ?>
                                    <?php if($show_post_date == 'true'): ?>
                                        <li class="post-date"><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                    <?php endif; ?>
                                    <?php if($show_categories == 'true'): ?>
                                        <li class="categories"><?php the_terms( $post->ID, 'category', '', ' ' ); ?></li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if($show_title == 'true'): ?>
                            <<?php etc_print_html($title_tag);?> class="entry-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></<?php etc_print_html($title_tag);?>>
                    <?php endif; ?>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="entry-content">
                                <?php
                                    if(!empty($post->post_excerpt)){
                                        echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
                                    }
                                    else{
                                        $content = strip_shortcodes( $post->post_content );
                                        $content = apply_filters( 'the_content', $content );
                                        $content = str_replace(']]>', ']]&gt;', $content);
                                        $content = wp_trim_words( $content, $num_words, '&hellip;' );
                                        echo wp_kses_post($content);
                                    }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true'): ?>
                            <div class="entry-readmore">
                                <a class="btn elementor-animation-<?php echo esc_attr($hover_animation); ?>" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

add_action( 'wp_ajax_fastway_load_more_post_grid', 'fastway_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_fastway_load_more_post_grid', 'fastway_load_more_post_grid' );
if(!function_exists('fastway_load_more_post_grid')){
    function fastway_load_more_post_grid(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'fastway'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(etc_get_posts_of_grid('post', [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
            fastway_get_post_grid($posts, $settings);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => __('Load Successfully!', 'fastway'),
                    'data' => array(
                        'html' => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
 * Header Top
**/
if(!function_exists('fastway_header_top_text')){
    function fastway_header_top_text($args = []){
        $args = wp_parse_args($args,[
            'tag'   => 'div',
            'class' => '',
            'text'  => 'Your Trusted 24 Hours Service Provider!'
        ]);
        $text = fastway_get_opts('header_top_short_text', $args['text']);
        echo '<'.$args['tag'].' class="'.implode(' ', ['cms-header-top-text', $args['class']]).'">';
            echo esc_html($text);
        echo '</'.$args['tag'].'>';
    }
}
if(!function_exists('fastway_header_top_quick_contact')){
    function fastway_header_top_quick_contact($args=[]){
        $args = wp_parse_args($args,[
            'before' => '',
            'after'  => '',
            'tag'    => 'div',
            'class'  => ''
        ]);
        $phone_label   = fastway_get_opts('phone_label','');
        $phone_number  = fastway_get_opts('phone_number','');
        $email_label   = fastway_get_opts('email_label','');
        $email_address = fastway_get_opts('email_address','');
        $time_label    = fastway_get_opts('time_label','');
        $time          = fastway_get_opts('time','');
        // html
        if(!empty($args['before']))  echo wp_kses_post($args['before']);
            echo '<'.$args['tag'].' class="'.implode(' ', ['cms-quick-contact', $args['class']]).'">';
                if(!empty($phone_label) || !empty($phone_number)){
                    echo '<div class="qc-item qc-phone">';
                        if(!empty($phone_label)) echo '<span class="qc-labelr phone-label">'.esc_html($phone_label).'</span>';
                        if(!empty($phone_number)) echo '<span class="qc-value phone-number">'.esc_html($phone_number).'</span>';
                    echo '</div>';
                }
                if(!empty($email_label) || !empty($email_address)) {
                    echo '<div class="qc-item qc-email">';
                        if(!empty($email_label)) echo '<span class="qc-labelr email-label">'.esc_html($email_label).'</span>';
                        if(!empty($email_address)) echo '<span class="qc-value email-address">'.esc_html($email_address).'</span>';
                    echo '</div>';
                }
                if(!empty($time_label) || !empty($time)){
                    echo '<div class="qc-item qc-email">';
                        if(!empty($time_label)) echo '<span class="qc-labelr time-label">'.esc_html($time_label).'</span>';
                        if(!empty($time)) echo '<span class="qc-value time">'.esc_html($time).'</span>';
                    echo '</div>';
                }
            echo '</'.$args['tag'].'>';
        if(!empty($args['after'])) echo wp_kses_post($args['after']);
    }
}
if(!function_exists('fastway_header_top_social')){
    function fastway_header_top_social($args=[]) {
        $args = wp_parse_args($args, [
            'tag'    => 'div',
            'class'  => '',
            'before' => '',
            'after'  => ''
        ]);
        $social_list = fastway_get_opts( 't_social_list' );
        if(!empty($args['before'])) echo wp_kses_post($args['before']);
            echo '<'.$args['tag'].' class="'.implode(' ', ['cms-social-list', $args['class']]).'">';
                if($social_list && isset($social_list['enabled'])){
                    foreach ($social_list['enabled'] as $social_key => $social_name){
                        $social_link = fastway_get_opt( 'social_' . $social_key . '_url' );
                        $social_link = !empty($social_link)?$social_link:'#';
                        if($social_key !== 'placebo') echo '<a href="'. esc_url($social_link) .'" target="_blank"><span class="cms-icon fa fa-' . esc_attr($social_key) . '"></span></a>';
                    }
                }
            echo '</'.$args['tag'].'>';
        if(!empty($args['after'])) echo wp_kses_post($args['after']);
    }
}
if(!function_exists('fastway_header_top')){
    function fastway_header_top($args = []){
        $args = wp_parse_args($args, []);
        $show_header_top = fastway_get_opts('show_header_top', true);
        if(!$show_header_top) return;
    ?>
    <div id="cms-header-top" class="cms-header-top bg-gray">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-end">
                <div class="col-auto"><?php
                    fastway_header_top_social(['tag' => 'span']);
                    fastway_header_top_quick_contact(['tag' => 'span', 'class' => 'd-inline-block vertical']);
                    fastway_header_top_text(['tag' => 'span']);
                ?></div>
            </div>
        </div>
    </div>
    <?php
    }
}