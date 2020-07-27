<?php
    $galleries               = $widget->get_setting('galleries', []);
    if(empty($galleries)) return;
    $html_id = etc_get_element_id($settings);
    $widget->add_render_attribute( 'inner', [
        'class' => 'cms-image-carousel-inner',
        'dir'   => $widget->get_setting('dir', 'ltr')
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
        <div <?php fastway_slick_slider_settings($widget); ?>>
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