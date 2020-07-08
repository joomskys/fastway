<?php
$default_settings = [
    'title_text' => '',
    'content_text' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);

$widget->add_render_attribute( 'title_text', 'class', 'blockquotes-title' );
$widget->add_render_attribute( 'content_text', 'class', 'blockquotes-content' );

$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'content_text' );
?>
<div id="<?php echo esc_attr("$html_id"); ?>" class="cms-blockquotes-wrapper cms-blockquotes-layout2">
    <blockquote>
        <span <?php etc_print_html($widget->get_render_attribute_string( 'content_text' )); ?>><?php echo wp_kses_post( nl2br($content_text) ); ?></span>
        <cite <?php etc_print_html($widget->get_render_attribute_string( 'title_text' )); ?>><?php echo esc_attr($title_text); ?></cite>
    </blockquote>
</div>