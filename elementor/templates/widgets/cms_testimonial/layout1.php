<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-inner',
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider cms-ttmn-slider1">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php fastway_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['testimonial'] as $value): 
                    $img = etc_get_image_by_size( array(
                        'attach_id'  => $value['image']['id'],
                        'thumb_size' => '150',
                        'class'      => '',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                        <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['slides_gutter']/2);?>px; padding-right: <?php echo esc_attr($settings['slides_gutter']/2);?>px;">
                            <div class="cms-ttmn-item-inner p-a20">
                                <div class="row text-center text-md-start">
                                    <?php if(!empty($value['image']['id'])) { ?>
                                        <div class="cms-ttmn-image col-12 col-md-auto">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="cms-ttmn-content col">
                                        <span class="cms-quote-icon fa fa-quote-left"></span>
                                        <div class="cms-ttmn-title text-uppercase"><?php echo esc_html($value['title']); ?></div>
                                        <div class="cms-ttmn-position text-accent"><?php echo esc_html($value['position']); ?></div>
                                        <div class="cms-ttmn-desc"><?php echo esc_html($value['description']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
