<?php
$has_content = ! empty( $settings['name_text'] ) || ! empty( $settings['testimonials_text'] );

$html = '<div class="cms-testimonials-wrapper">';

    if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
    $widget->add_render_attribute( 'link', 'target', '_blank' );
    }

    if ( ! empty( $settings['link']['nofollow'] ) ) {
    $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
    }
    }

    if ( ! empty( $settings['image']['url'] ) ) {
    $widget->add_render_attribute( 'image', 'src', $settings['image']['url'] );
    $widget->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
    $widget->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );

    if ( $settings['hover_animation'] ) {
    $widget->add_render_attribute( 'image', 'class', 'elementor-animation-' . $settings['hover_animation'] );
    }

    $image_html = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

    if ( ! empty( $settings['link']['url'] ) ) {
    $image_html = '<a ' . $widget->get_render_attribute_string( 'link' ) . '>' . $image_html . '</a>';
    }

    $html .= '<figure class="cms-testimonials-img">' . $image_html . '</figure>';
    }

    if ( $has_content ) {
        $html .= '<div class="cms-testimonials-content">';

        if ( ! empty( $settings['testimonials_text'] ) ) {
            $widget->add_render_attribute( 'testimonials_text', 'class', 'cms-testimonials-description' );

            $widget->add_inline_editing_attributes( 'testimonials_text' );

            $html .= sprintf( '<p %1$s>%2$s</p>', $widget->get_render_attribute_string( 'testimonials_text' ), $settings['testimonials_text'] );
        
        }

        if ( ! empty( $settings['name_text'] ) ) {
            $widget->add_render_attribute( 'name_text', 'class', 'cms-testimonial-author' );
            $widget->add_render_attribute( 'job_text', 'class', 'cms-testimonial-job' );

            $widget->add_inline_editing_attributes( 'name_text', 'none' );
            $widget->add_inline_editing_attributes( 'job_text' );

            $name_text = $settings['name_text'];
            $job_html = $settings['job_text'];

            if ( ! empty( $settings['link']['url'] ) ) {
            $name_text = '<a ' . $widget->get_render_attribute_string( 'link' ) . '>' . $name_text . '</a>';
            }

            $html .= sprintf( '<h3 %1$s>%2$s</h3>', $widget->get_render_attribute_string( 'name_text' ), $name_text );
            $html .= sprintf( '<span %1$s>%2$s</span>', $widget->get_render_attribute_string( 'job_text' ), $job_html );
        }

        $html .= '</div>';
    }

$html .= '</div>';

etc_print_html($html);

?>