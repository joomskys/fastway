<?php 
$default_settings = [
    'img_type'       => 'img',
    'style'          => 'style1',
    'image_s2'       => '',
    'video_label'    => '',
    'video_btn_link' => '',
    'video_btn_text' => 'Contact Us'
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $settings['image']['url'] ) ) {
    $widget->add_render_attribute( 'image', 'src', $settings['image']['url'] );
    $widget->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
    $widget->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
}

$image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
if ( ! empty( $settings['video_btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['video_btn_link']['url'] );
    $widget->add_render_attribute( 'button', 'class', 'btn cms-video-btn text-white' );

    if ( $settings['video_btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['video_btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

?>
<div class="cms-video-player <?php echo esc_attr($style); ?>">
    <?php if(!empty($image_s2['id'])) {
        $img_s2  = etc_get_image_by_size( array(
            'attach_id'  => $image_s2['id'],
            'thumb_size' => 'full',
            'class'      => 'img-style2',
        ) );
        $img_thumbnail    = $img_s2['thumbnail'];
        echo wp_kses_post($img_thumbnail); 
    } ?>

    <?php if($style == 'style1') : ?>
        <?php if($img_type == 'bg') { ?>
            <div class="cms-video-bg-image bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
        <?php } else { ?>
            <?php if ( ! empty( $settings['image']['url'] ) ) { echo wp_kses_post($image_html); } ?>
        <?php } ?>
        <a class="btn-video" href="<?php echo esc_url($settings['video_link']); ?>">
            <i class="fac fac-play"></i>
        </a>
        <div class="video-overlay"></div>
    <?php endif; ?>

    <?php if($style == 'style2') : ?>
        <?php if ( ! empty( $settings['image']['url'] ) ) { ?>
            <div class="btn-video-image">
                <?php echo wp_kses_post($image_html);  ?>
                <?php if(!empty($settings['video_link'])) : ?>
                    <div class="btn-video-wrap">
                        <a class="btn-video" href="<?php echo esc_url($settings['video_link']); ?>">
                            <i class="fac fac-play"></i>
                        </a>
                    </div>
                <?php endif; ?>    
            </div>
        <?php } ?>
    <?php endif; ?>

    <?php if($style == 'style3') : ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap">
                <a class="btn-video" href="<?php echo esc_url($settings['video_link']); ?>">
                    <i class="fa fa-play"></i>
                </a>
                <div class="cms-video-title h2 m-b30 m-t50 text-white"><?php echo esc_html($video_label); ?></div>
                <div class="cms-video-sub-title h4 m-b30 m-t10 text-white"><?php echo esc_html($video_sub_title); ?></div>
                <?php fastway_elementor_button_render($widget, $settings, $args = ['prefix' => 'video_']); ?>
            </div>
        <?php endif; ?>  
    <?php endif; ?>
</div>