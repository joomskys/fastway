<?php
if(!function_exists('fastway_elementor_get_post_grid')){
    function fastway_elementor_get_post_grid($posts = [], $settings = [], $widget, $args=[]){
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
        if($widget->get_setting('layout_mode') == 'carousel'){
            $widget->add_render_attribute( 'item', [
                'class' => 'carousel-item slick-slide'
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'carousel-item-inner'
            ] );
        } else {
            $widget->add_render_attribute( 'item', [
                'class' => trim('grid-item col-xl-'.$col_xl.' col-lg-'.$col_lg.' col-md-'.$col_md.' col-sm-'.$col_sm),
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'grid-item-inner',
                'style' => 'padding-left:'.esc_attr($gap_item).'px;padding-right:'.esc_attr($gap_item).'px; padding-bottom:'.esc_attr($gap_item*2).'px;'
            ] );
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
                if($widget->get_setting('layout_mode') == 'carousel'){
                    $item_class = 'carousel-item slick-slide';
                } else {
                    $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";
                }
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo trim($item_class.' '.$filter_class); ?>">
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'item-inner' )); ?>>
                        <div class="grid-item-content">
                            <?php fastway_post_media([
                                'id'             => $post->ID, 
                                'thumbnail_size' => $img_size,
                                'after'          => fastway_post_featured_date($show_post_date, false, $post->ID)
                            ]); ?>
                            <div class="entry-body p-30">
                                <?php if($show_meta == 'true'): 
                                    fastway_archive_meta([
                                        'show_date'   => false,
                                        'show_author' => $show_author,
                                        'show_cat'    => $show_categories,
                                        'show_cmt'    => $show_cmt,
                                        'post_id'     => $post->ID,
                                        'class'       => 'bdr-b-1 bdr-solid bdr-gray-light p-b20 m-b15'  
                                    ]);
                                endif; ?>
                                <?php if($show_title == 'true'): ?>
                                    <<?php etc_print_html($title_tag);?> class="entry-title m-b15 text-uppercase"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></<?php etc_print_html($title_tag);?>>
                                <?php endif; ?>
                                <?php if($show_excerpt == 'true'): ?>
                                    <div class="entry-content m-b30"><?php
                                        if(!empty($post->post_excerpt)){
                                            echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
                                        }
                                        else{
                                            $content = strip_shortcodes( $post->post_content );
                                            $content = apply_filters( 'the_content', $content );
                                            $content = str_replace(']]>', ']]&gt;', $content);
                                            $content = wp_trim_words( $content, $num_words, '' );
                                            echo wp_kses_post($content);
                                        }
                                    ?></div>
                                <?php endif; ?>
                                <?php if($show_button == 'true'): ?>
                                    <div class="entry-readmore">
                                        <a class="text-accent btn-text elementor-animation-<?php echo esc_attr($hover_animation); ?>" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($button_text); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

// Post List 
if(!function_exists('fastway_elementor_get_post_list')){
    function fastway_elementor_get_post_list($posts = [], $settings = []){
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
                $img    = etc_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $img_size,
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $item_class = "grid-item col-12";
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner">
                        <div class="row">
                            <?php fastway_post_media([
                                'id'             => $post->ID, 
                                'thumbnail_size' => $img_size,
                                'class'          => 'col-lg-auto col-md-12',
                                'after'          => fastway_post_featured_date($show_post_date, false, $post->ID)
                            ]); ?>
                            <div class="entry-body col pt-30 pt-lg-0">
                                <?php if($show_meta == 'true'): 
                                    fastway_archive_meta([
                                        'show_date'   => false,
                                        'show_author' => $show_author,
                                        'show_cat'    => $show_categories,
                                        'show_cmt'    => $show_cmt,
                                        'post_id'     => $post->ID,
                                        'class'       => 'm-b15'  
                                    ]);
                                endif; 
                                if($show_title == 'true'): ?>
                                    <<?php etc_print_html($title_tag);?> class="entry-title text-uppercase m-b15"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a></<?php etc_print_html($title_tag);?>>
                                <?php endif; 
                                if($show_excerpt == 'true'): ?>
                                    <div class="entry-content m-b30">
                                        <?php
                                            if(!empty($post->post_excerpt)){
                                                echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
                                            }
                                            else{
                                                $content = strip_shortcodes( $post->post_content );
                                                $content = apply_filters( 'the_content', $content );
                                                $content = str_replace(']]>', ']]&gt;', $content);
                                                $content = wp_trim_words( $content, $num_words, '' );
                                                echo wp_kses_post($content);
                                            }
                                        ?>
                                    </div>
                                <?php endif;
                                if($show_button == 'true'): ?>
                                    <div class="entry-readmore">
                                        <a class="text-accent btn-text elementor-animation-<?php echo esc_attr($hover_animation); ?>" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($button_text); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div> 
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

// Service list 
if(!function_exists('fastway_elementor_get_service')){
    function fastway_elementor_get_service($posts = [], $settings = [], $widget, $args=[]){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        $args = wp_parse_args($args, [
            'class'         => '',
            'inner_class'   => 'bg-white',
            'show_readmore' => '',
            'overlay'       => false
        ]);
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
        if($widget->get_setting('layout_mode') == 'carousel'){
            $widget->add_render_attribute( 'item', [
                'class' => 'carousel-item slick-slide'
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'carousel-item-inner'
            ] );
        } else {
            $widget->add_render_attribute( 'item', [
                'class' => trim('grid-item col-xl-'.$col_xl.' col-lg-'.$col_lg.' col-md-'.$col_md.' col-sm-'.$col_sm),
            ] );
            $widget->add_render_attribute( 'item-inner', [
                'class' => 'grid-item-inner',
                'style' => 'padding-left:'.esc_attr($gap_item).'px;padding-right:'.esc_attr($gap_item).'px; padding-bottom:'.esc_attr($gap_item*2).'px;'
            ] );
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
                if($widget->get_setting('layout_mode') == 'carousel'){
                    $item_class = 'carousel-item slick-slide';
                } else {
                    $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";
                }
                $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);

                if(!empty($post->post_excerpt)){ 
                    $content = wp_trim_words( $post->post_excerpt, 15, $more = null );
                }
                else{
                    $content = strip_shortcodes( $post->post_content );
                    $content = apply_filters( 'the_content', $content );
                    $content = str_replace(']]>', ']]&gt;', $content);
                    $content = wp_trim_words( $content, 15, '' );
                }
                if($args['show_readmore'] == '1') { 
                    $readmore = '
                        <a class="btn" href="'.esc_url(get_permalink( $post->ID )).'">'.esc_html__('Read More', 'fastway').'</a>
                    ';
                } else {
                    $readmore =  '';
                }

                $post_link = '<a class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white bdr-hover-accent text-hover-accent" href="'.esc_url(get_permalink( $post->ID )).'"><span class="fas fa-link"></span></a>';
                $post_img = '<a class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white bdr-hover-accent text-hover-accent" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="'.esc_attr($html_id).'" href="'.wp_get_attachment_url($img_id).'"><span class="fas fa-search"></span></a>';

                $overlay_content = '
                    <div class="entry-title h4 m-b15 text-uppercase">
                        <a href="'.esc_url(get_permalink( $post->ID )).'">'.get_the_title($post->ID).'</a>
                    </div>
                    <div class="entry-content">'
                        . wp_kses_post($content).
                    '</div>
                    <div class="entry-readmore m-t25">'
                        .$readmore.
                    '</div>
                ';
                ?>
                <div class="<?php echo trim(esc_attr($item_class.' '.$filter_class)); ?>">
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'item-inner' )); ?>>
                        <div class="<?php echo trim(implode(' ', ['grid-item-content cms-overlay-wrap', $args['inner_class']]));?>">
                            <?php if (isset($settings['layout']) && $settings['layout'] == '3') { ?>
                                <?php fastway_post_media([
                                    'id'             => $post->ID, 
                                    'thumbnail_size' => $img_size,
                                    'class'          => '',
                                    'after'          => '<div class="cms-overlay-content d-flex align-items-end p-30 p-b20"><div class="cms-overlay-content-inner text-white">'.$overlay_content.'</div></div>'
                                ]); ?>
                            <?php } else { ?>
                                <?php fastway_post_media([
                                    'id'             => $post->ID, 
                                    'thumbnail_size' => $img_size,
                                    'class'          => '',
                                    'after'          => '<div class="cms-overlay-content cms-overlay-zoom-in d-flex align-items-center justify-content-center"><div class="cms-overlay-content-inner w-100 cms-icon-list">'.$post_link.$post_img.'</div></div>'
                                ]); ?>
                                <div class="entry-body p-30">
                                    <div class="entry-title h4 m-b15 text-uppercase">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo  get_the_title($post->ID); ?></a>
                                    </div>
                                    <div class="entry-content"><?php echo wp_kses_post($content); ?></div>
                                    <?php if($args['show_readmore'] == '1'): ?>
                                        <div class="entry-readmore m-t25">
                                            <a class="btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html__('Read More', 'fastway'); ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endif;
    }
}

/* Load more post grid */
add_action( 'wp_ajax_fastway_elementor_load_more_post_grid', 'fastway_elementor_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_fastway_elementor_load_more_post_grid', 'fastway_elementor_load_more_post_grid' );
if(!function_exists('fastway_elementor_load_more_post_grid')){
    function fastway_elementor_load_more_post_grid(){
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
            fastway_elementor_get_post_grid($posts, $settings, $widget);
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
/* Load more post list */
add_action( 'wp_ajax_fastway_elementor_load_more_post_list', 'fastway_elementor_load_more_post_list' );
add_action( 'wp_ajax_nopriv_fastway_elementor_load_more_post_list', 'fastway_elementor_load_more_post_list' );
if(!function_exists('fastway_elementor_load_more_post_list')){
    function fastway_elementor_load_more_post_list(){
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
            fastway_elementor_get_post_list($posts, $settings);
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