<?php
$has_content = ! empty( $settings['title_text'] ) || ! empty( $settings['description_text'] );

$html = '<div class="cms-image-box-wrapper cms-image-box-layout2">';

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

    $html .= '<figure class="cms-image-box-img">' . $image_html . '</figure>';
    }

    if ( $has_content ) {
    $html .= '<div class="cms-image-box-content">';

        if ( ! empty( $settings['title_text'] ) ) {
        $widget->add_render_attribute( 'title_text', 'class', 'cms-image-box-title' );

        $widget->add_inline_editing_attributes( 'title_text', 'none' );

        $title_html = $settings['title_text'];

        if ( ! empty( $settings['link']['url'] ) ) {
        $title_html = '<a ' . $widget->get_render_attribute_string( 'link' ) . '>' . $title_html . '</a>';
        }

        $html .= sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['title_size'], $widget->get_render_attribute_string( 'title_text' ), $title_html );
    }

    if ( ! empty( $settings['description_text'] ) ) {
    $widget->add_render_attribute( 'description_text', 'class', 'cms-image-box-description' );

    $widget->add_inline_editing_attributes( 'description_text' );

    $html .= sprintf( '<p %1$s>%2$s</p>', $widget->get_render_attribute_string( 'description_text' ), $settings['description_text'] );
    }

    $html .= '</div>';
}

$html .= '</div>';

etc_print_html($html);

?>