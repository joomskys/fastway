<?php
$widget->add_render_attribute( 'wrapper', 'class', 'cms-button-wrapper cms-button-layout3' );

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );
    $widget->add_render_attribute( 'button', 'class', 'cms-button-link' );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$widget->add_render_attribute( 'button', 'class', 'cms-button btn-text' );
$widget->add_render_attribute( 'button', 'role', 'button' );

if ( ! empty( $settings['button_css_id'] ) ) {
    $widget->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
}

if ( ! empty( $settings['size'] ) ) {
    $widget->add_render_attribute( 'button', 'class', 'cms-size-' . $settings['size'] );
}

if ( $settings['hover_animation'] ) {
    $widget->add_render_attribute( 'button', 'class', 'cms-animation-' . $settings['hover_animation'] );
}

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
        <?php
        $widget->add_render_attribute( [
			'content-wrapper' => [
				'class' => 'cms-button-content-wrapper',
			],
			'icon-align' => [
				'class' => [
					'cms-button-icon',
					'cms-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'cms-button-text',
			],
		] );

		$widget->add_inline_editing_attributes( 'text', 'none' );
		?>
		<span <?php etc_print_html($widget->get_render_attribute_string( 'content-wrapper' )); ?>>
			<?php if ( ! empty( $settings['icon'] ) ) : ?>
			<span <?php etc_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
				<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
			</span>
			<?php endif; ?>
			<span <?php etc_print_html($widget->get_render_attribute_string( 'text' )); ?>><?php echo esc_html($settings['text']); ?></span>
		</span>
    </a>
</div>