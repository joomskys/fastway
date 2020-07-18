<?php
if(isset($settings['progressbar_list']) && !empty($settings['progressbar_list'])):
    foreach ($settings['progressbar_list'] as $key => $progressbar):
        $wrapper_key = $widget->get_repeater_setting_key( 'wrapper', 'progressbar_list', $key );
        $progress_bar_key = $widget->get_repeater_setting_key( 'progress_bar', 'progressbar_list', $key );
        $inner_text_key = $widget->get_repeater_setting_key( 'inner_text', 'progressbar_list', $key );
        $widget->add_render_attribute( $wrapper_key, [
            'class' => 'cms-progress-wrapper m-t10 m-b30',
            'role' => 'progressbar',
            'aria-valuemin' => '0',
            'aria-valuemax' => '100',
            'aria-valuenow' => $progressbar['percent']['size'],
            'aria-valuetext' => $progressbar['inner_text'],
        ] );

        if ( ! empty( $progressbar['progress_type'] ) ) {
            $widget->add_render_attribute( $wrapper_key, 'class', 'progress-' . $progressbar['progress_type'] );
        }

        $widget->add_render_attribute( $progress_bar_key, [
            'class'    => 'cms-progress-bar',
            'data-max' => $progressbar['percent']['size'],
        ] );

        $widget->add_render_attribute( $inner_text_key, [
            'class' => 'cms-progress-inner-text',
        ] );

        $widget->add_inline_editing_attributes( $inner_text_key );

        if ( ! empty( $progressbar['title'] ) ) { ?>
            <div class="cms-progress-wrappers cms-progress-layout1">
                <span class="cms-progress-title text-16 text-uppercase font-700"><?php echo esc_html($progressbar['title']); ?></span>
        <?php } ?>
        
        <div <?php etc_print_html($widget->get_render_attribute_string( $wrapper_key )); ?>>
            <div <?php etc_print_html($widget->get_render_attribute_string( $progress_bar_key )); ?>>
                <?php if(!empty($progressbar['inner_text'])) {?>
                    <span <?php etc_print_html($widget->get_render_attribute_string( $inner_text_key )); ?>><?php echo esc_html($progressbar['inner_text']); ?></span>
                <?php } ?>
                <?php if ( 'hide' !== $progressbar['display_percentage'] ) { ?>
                    <span class="cms-progress-percentage"><?php echo esc_html($progressbar['percent']['size']); ?>%</span>
                <?php } ?>
            </div>
        </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>