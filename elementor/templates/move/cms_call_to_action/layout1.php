<?php
$link_type = $settings['button_url_type'];

$target = $rel = '';
if($link_type == 'link'){
    $link_url = get_permalink($settings['button_link_existing_content']);
} elseif ($link_type == 'url') {
    $link_url = $settings['button_link']['url'];
    $target = !empty($settings['button_link']['is_external'])?'_blank':'';
    $rel = !empty($settings['button_link']['nofollow'])?'nofollow':'';
}
$btn_hover_class = "";
if ( $settings['hover_animation'] ) {
    $btn_hover_class = 'elementor-animation-' . $settings['hover_animation'];
}
// Attribute Handle and name(id) of Control Setting is same
// to render editing result together.
$widget->add_render_attribute( 'subheading_text', array(
    'class' => ['custom-subheading', 'font-smooth'],
) );
$widget->add_render_attribute( 'heading_text', array(
    'class' => ['custom-heading', 'font-smooth'],
) );

// Tooltip basic(default), advanced, none.
$widget->add_inline_editing_attributes( 'subheading_text' );
$widget->add_inline_editing_attributes( 'heading_text', 'none' );
?>
<div class="cms-call-to-action layout1">
    <div class="left-content">
        <?php if(!empty($settings['subheading_text'])) : ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading_text' )); ?>>
                <?php echo esc_html($settings['subheading_text']); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($settings['heading_text'])) : ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading_text' )); ?>>
                <?php echo esc_html($settings['heading_text']); ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="right-content">
        <a class="cta-button font-smooth <?php echo esc_attr($btn_hover_class);?>" role="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>">
            <span><?php echo esc_html($settings['button_text']); ?></span>
        </a>
    </div>
</div>