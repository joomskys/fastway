<?php
if ( !empty( $settings['alert_title'] ) ):

    $widget->add_render_attribute( 'alert_title', 'class', 'cms-alert-title' );

    $widget->add_inline_editing_attributes( 'alert_title', 'none' );
    ?>
    <div class="cms-alert cms-alert-layout1">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'alert_title' )); ?>><?php echo esc_html($settings['alert_title']); ?></div>
        <?php
        if ( ! empty( $settings['alert_description'] ) ) :
            $widget->add_render_attribute( 'alert_description', 'class', 'cms-alert-description' );

            $widget->add_inline_editing_attributes( 'alert_description' );
            ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'alert_description' )); ?>><?php etc_print_html($settings['alert_description']); ?></div>
        <?php endif; ?>
        <?php if ( 'show' === $settings['show_dismiss'] ) : ?>
            <a class="cms-alert-dismiss">
                <span aria-hidden="true">&times;</span>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>