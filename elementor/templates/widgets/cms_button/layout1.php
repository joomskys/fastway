<?php
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );
    $widget->add_render_attribute( 'button', 'class', 'btn' );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
$widget->add_render_attribute( 'button', 'role', 'button' );

if ( ! empty( $settings['color'] ) ) {
    $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['color'] );
}
if ( ! empty( $settings['type'] ) ) {
    $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['type'] );
}
if ( ! empty( $settings['size'] ) ) {
    $widget->add_render_attribute( 'button', 'class', 'btn-' . $settings['size'] );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();

?>

<a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
    <?php
    $widget->add_render_attribute( [
		'content-wrapper' => [
			'class' => 'cms-btn-content',
		],
		'icon-align' => [
			'class' => [
				'cms-btn-icon',
				'cms-align-icon-' . $settings['icon_align'],
			],
		],
		'text' => [
			'class' => 'cms-btn-text',
		],
	] );
	$widget->add_inline_editing_attributes( 'text', 'none' );
	?>
	<span <?php etc_print_html($widget->get_render_attribute_string( 'content-wrapper' )); ?>>
        <?php if($settings['icon_align'] === 'left' && !empty($settings['btn_icon']['value'])) : ?>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                <?php
                    \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );
                ?>
            </span>
        <?php endif; ?>
		<span <?php etc_print_html($widget->get_render_attribute_string( 'text' )); ?>><?php echo esc_html($settings['text']); ?></span>
        <?php if($settings['icon_align'] === 'right' && !empty($settings['btn_icon']['value'])) : ?>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                <?php
                    \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );
                ?>
            </span>
        <?php endif; ?>
	</span>
</a>
