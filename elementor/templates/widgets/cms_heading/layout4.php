<?php
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );
    $widget->add_render_attribute( 'button', 'class', 'btn cms-heading-btn text-white m-t25' );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="cms-heading-wrapper cms-heading-layout4">
    <div class="cms-heading-inner relative"><?php 
        if ( !empty($settings['heading_text']) ) { 
            ?><div class="cms-heading heading text-accent text-20 font-600 text-uppercase m-b15"><?php echo esc_html($settings['heading_text']); ?></div><?php 
        } 
        if(!empty($settings['subheading_text'])){
        ?><div class="cms-heading-sub h2 m-b25"><?php echo esc_html($settings['subheading_text']); ?></div><?php }
        ?>
        <?php if(!empty($settings['description_text'])) { ?>
            <div class="cms-heading-desc"><?php echo esc_html($settings['description_text']); ?></div>
        <?php }
        if(!empty($settings['btn_text'])) { ?>
            <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <span <?php etc_print_html($widget->get_render_attribute_string( 'btn_text' )); ?>><?php echo esc_html($settings['btn_text']); ?></span>
            </a>
        <?php } ?>
    </div>
</div>