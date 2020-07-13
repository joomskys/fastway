<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-inner',
] );

$slides_to_show          = $widget->get_setting('slides_to_show', '');
$slides_to_show_tablet   = $widget->get_setting('slides_to_show_tablet', '');
$slides_to_show_mobile   = $widget->get_setting('slides_to_show_mobile', '');
$slides_to_scroll        = $widget->get_setting('slides_to_scroll', '');
$slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', '');
$slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', '');

$slidesToShow = !empty($slides_to_show)?$slides_to_show:3;
$isSingleSlide = 1 === $slidesToShow;
$defaultLGDevicesSlidesCount = $isSingleSlide ? 1 : 2;
$slidesToShowTablet = !empty($slides_to_show_tablet)?$slides_to_show_tablet:$defaultLGDevicesSlidesCount;
$slidesToShowMobile = !empty($slides_to_show_mobile)?$slides_to_show_mobile:1;
if($isSingleSlide){
    $slidesToScroll = 1;
}
else{
    $slidesToScroll = !empty($slides_to_scroll)?$slides_to_scroll:$defaultLGDevicesSlidesCount;
}
$slidesToScrollTablet = !empty($slides_to_scroll_tablet)?$slides_to_scroll_tablet:$defaultLGDevicesSlidesCount;
$slidesToScrollMobile = !empty($slides_to_scroll_mobile)?$slides_to_scroll_mobile:1;

$slides_gutter  = (int) $widget->get_setting('slides_gutter', '30');
$arrows         = $widget->get_setting('arrows');
$dots           = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay       = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite       = $widget->get_setting('infinite');
$speed          = $widget->get_setting('speed', '500');
$widget->add_render_attribute( 'carousel', [
    'class'                     => 'cms-slick-slider',
    'data-arrows'               => $arrows,
    'data-dots'                 => $dots,
    'data-pauseOnHover'         => $pause_on_hover,
    'data-autoplay'             => $autoplay,
    'data-autoplaySpeed'        => $autoplay_speed,
    'data-infinite'             => $infinite,
    'data-speed'                => $speed,
    'data-slidesToShow'         => $slidesToShow,
    'data-slidesToShowTablet'   => $slidesToShowTablet,
    'data-slidesToShowMobile'   => $slidesToShowMobile,
    'data-slidesToScroll'       => $slidesToScroll,
    'data-slidesToScrollTablet' => $slidesToScrollTablet,
    'data-slidesToScrollMobile' => $slidesToScrollMobile,
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider cms-ttmn-slider2">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'carousel' )); ?> style="margin-left: <?php echo esc_attr($slides_gutter/-2);?>px; margin-right: <?php echo esc_attr($slides_gutter/-2);?>px;">
                <?php foreach ($settings['testimonial'] as $value): 
                    $img = etc_get_image_by_size( array(
                        'attach_id'  => $value['image']['id'],
                        'thumb_size' => '150',
                        'class'      => '',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                        <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($slides_gutter/2);?>px; padding-right: <?php echo esc_attr($slides_gutter/2);?>px;">
                            <div class="cms-ttmn-item-inner p-a20">
                                <div class="row text-center text-md-start">
                                    <?php if(!empty($value['image']['id'])) { ?>
                                        <div class="cms-ttmn-image col-12 col-md-auto">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="cms-ttmn-content col">
                                        <span class="cms-quote-icon fa fa-quote-left"></span>
                                        <div class="cms-ttmn-desc"><?php echo esc_attr($value['description']); ?></div>
                                        <div class="cms-ttmn-title text-uppercase"><?php echo esc_attr($value['title']); ?></div>
                                        <div class="cms-ttmn-position text-accent"><?php echo esc_attr($value['position']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
