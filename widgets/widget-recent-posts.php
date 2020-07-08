<?php defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 *
 * @package FastWay
 * @version 1.0
 */

class CMS_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'cms_recent_posts',
            esc_html__( '* Recent Posts', 'fastway' ),
            array(
                'description' => esc_attr__( 'Shows your most recent posts.', 'fastway' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'fastway' ),
            'number'        => 4,
            'post_in'        => '',
            'layout'        => '1',
        ) );

        $title = empty( $instance['title'] ) ? esc_html__( 'Recent Posts', 'fastway' ) : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo wp_kses_post($args['before_widget']);

        echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);

        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }
        $post_in = $instance['post_in'];
        $layout = $instance['layout'];
        $sticky = '';
        if($post_in == 'featured') {
            $sticky = get_option( 'sticky_posts' );
        }
        $r = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'  => $sticky,
        ) );

        if ( $r->have_posts() )
        {
            echo '<div class="posts-list layout-'.esc_attr($layout).'">';

            while ( $r->have_posts() )
            {
                $r->the_post();
                global $post;
                echo '<div class="post-item row gutters-15">';
                    if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail', false); ?>
                        <div class="entry-media col-auto">
                           <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" /></a>
                         </div>
                    <?php endif; ?>
                    <div class="entry-content col">
                        <?php switch ($layout) {
                            case '2':
                        ?>
                            <?php printf(
                                '<h6 class="entry-title text-uppercase"><a href="%1$s" title="%2$s">%3$s</a></h6>',
                                esc_url( get_permalink() ),
                                esc_attr( get_the_title() ),
                                get_the_title()
                            ); ?>
                            <ul class="entry-meta">
                                <li><?php fastway_post_author(); ?></li>
                                <li><?php fastway_post_comment(['text' => '','cmt_with_text' => false]); ?></li>
                            </ul>
                        <?php
                                break;
                            
                            default:
                        ?>
                        <div class="entry-meta">
                            <?php echo get_the_date(); ?>
                        </div>
                        <?php printf(
                            '<h6 class="entry-title text-uppercase"><a href="%1$s" title="%2$s">%3$s</a></h6>',
                            esc_url( get_permalink() ),
                            esc_attr( get_the_title() ),
                            get_the_title()
                        ); ?>
                        <?php # code...
                                break;
                        } ?>
                    </div>
                </div>
            <?php }

            echo '</div>';
        }

        wp_reset_postdata();
        wp_reset_query();

        echo wp_kses_post($args['after_widget']);
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title']         = sanitize_text_field( $new_instance['title'] );
        $instance['number']        = absint( $new_instance['number'] );
        $instance['post_in'] = strip_tags($new_instance['post_in']);
        $instance['layout'] = strip_tags($new_instance['layout']);
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'fastway' ),
            'number'        => 4,
        ) );

        $title         = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'fastway' );
        $number        = absint( $instance['number'] );
        $post_in = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';
        $layout = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'fastway' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p><label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e( 'Post in', 'fastway' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_in') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_in') ); ?>">
            <option value="recent"<?php if( $post_in == 'recent' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'fastway'); ?></option>
            <option value="featured"<?php if( $post_in == 'featured' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Featured', 'fastway'); ?></option>
         </select>
         </p>
          <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'fastway' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
            <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'fastway'); ?></option>
            <option value="2"<?php if( $layout == '2' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 2', 'fastway'); ?></option>
         </select>
         </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'fastway' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <?php
    }
}

add_action( 'widgets_init', function(){
    if(function_exists('etc_register_wp_widget')){
        etc_register_wp_widget( 'CMS_Recent_Posts_Widget' );
    }
});
