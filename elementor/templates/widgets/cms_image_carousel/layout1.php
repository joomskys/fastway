<?php
    $galleries               = $widget->get_setting('galleries', []);
    if(empty($galleries)) return;

    $html_id = etc_get_element_id($settings);
    $dir     = $widget->get_setting('dir', 'ltr');
    $widget->add_render_attribute( 'inner', [
        'class' => 'cms-image-carousel-inner',
        'dir'   => $dir,
    ] );

    $slide_mode     = $widget->get_setting('slide_mode', 'false');
    if($slide_mode == 'true'){
        $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = '1';
    } else {
        $slidesToShow = $widget->get_setting('slides_to_show', '1');
        $slidesToShowTablet = $widget->get_setting('slides_to_show_tablet', '1');
        $slidesToShowMobile = $widget->get_setting('slides_to_show_mobile', '1');

        $slidesToScroll       = $widget->get_setting('slides_to_scroll', '1');
        $slidesToScrollTablet = $widget->get_setting('slides_to_scroll_tablet', '1');
        $slidesToScrollMobile = $widget->get_setting('slides_to_scroll_mobile', '1');
    }

    $arrows         = $widget->get_setting('arrows');
    $dots           = $widget->get_setting('dots');
    $pause_on_hover = $widget->get_setting('pause_on_hover');
    $autoplay       = $widget->get_setting('autoplay');
    $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
    $infinite       = $widget->get_setting('infinite');
    $speed          = $widget->get_setting('speed', '500');

    $widget->add_render_attribute( 'carousel', [
        'class'                     => 'cms-slick-slider',
        'data-dir'                  => $dir,
        'data-arrows'               => $arrows,
        'data-dots'                 => $dots,
        'data-pauseOnHover'         => $pause_on_hover,
        'data-autoplay'             => $autoplay,
        'data-autoplaySpeed'        => $autoplay_speed,
        'data-infinite'             => $infinite,
        'data-speed'                => $speed,
        'data-fade'                 => $slide_mode,
        'data-slidesToShow'         => $slidesToShow,
        'data-slidesToShowTablet'   => $slidesToShowTablet,
        'data-slidesToShowMobile'   => $slidesToShowMobile,
        'data-slidesToScroll'       => $slidesToScroll,
        'data-slidesToScrollTablet' => $slidesToScrollTablet,
        'data-slidesToScrollMobile' => $slidesToScrollMobile,
    ] );

    $thumbnail_size = $widget->get_setting('thumbnail_size', 'full');
    $thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');
    if($thumbnail_size != 'custom'){
        $img_size = $thumbnail_size;
    }
    elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
        $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
    }
    else{
        $img_size = 'full';
    }
?>
<div id="<?php echo esc_attr($html_id) ?>" class="cms-image-carousel">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
        <?php
            foreach ($galleries as $gallery):
            $img_id       = $gallery;
            $img          = etc_get_image_by_size( array(
                'attach_id'  => $img_id['id'],
                'thumb_size' => $img_size,
                'class'      => '',
            ) );
            $thumbnail    = $img['thumbnail'];
        ?>
            <div class="carousel-item slick-slide">
                <div class="carousel-item-inner">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>