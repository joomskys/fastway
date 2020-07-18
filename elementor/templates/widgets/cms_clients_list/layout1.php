<?php if(isset($settings['clients']) && !empty($settings['clients']) && count($settings['clients'])): ?>
    <div class="cms-clients-list-wrapper">
        <div <?php fastway_slick_slider_settings($widget, 'cms-client-slider'); ?>>
            <?php foreach ($settings['clients'] as $client): 
                $img = etc_get_image_by_size( array(
                    'attach_id'  => $client['client_image']['id'],
                    'thumb_size' => 'full',
                    'class'      => '',
                ));
                $thumbnail = $img['thumbnail'];
                $url    = !empty($client['client_link']['id'])?$client['client_link']['id']:'#';
                $target = !empty($client['client_link']['is_external']);
                $rel    = !empty($client['client_link']['nofollow']);

            if(!empty($client['client_image']['id'])) { 
            ?>
            <div class="cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($slides_gutter/2);?>px; padding-right: <?php echo esc_attr($slides_gutter/2);?>px;">
                <div class="cms-client-item p-10">
                    <div class="cms-client-image">
                        <a href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?>><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                </div>
            </div>
            <?php }
            endforeach; ?>
        </div>
    </div>
<?php endif; ?>
