<?php 
    if ( ! empty( $settings['btn_link']['url'] ) ) {
        $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );
        $widget->add_render_attribute( 'button', 'class', 'cms-heading-btn m-t15' );
        $widget->add_render_attribute( 'button', 'class', $settings['btn_type'].' btn-'.$settings['btn_color'].' btn-'.$settings['btn_size']);

        if($settings['btn_type'] == 'btn-text') $widget->add_render_attribute( 'button', 'class', 'text-accent' );

        if ( $settings['btn_link']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['btn_link']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }
    $is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-heading-wrapper cms-heading-layout9">
    <div class="cms-heading-inner relative">
        <?php if ( !empty($settings['heading_text']) ) { ?>
            <div class="cms-heading h2 m-b25"><?php echo esc_html($settings['heading_text']); ?></div>
        <?php  }
        if(!empty($settings['subheading_text'])) { ?>
            <div class="cms-heading-sub m-b15 font-700"><?php echo esc_html($settings['subheading_text']); ?></div>
        <?php } 
        if(!empty($settings['description_text'])) { ?>
            <div class="cms-heading-desc m-b25"><?php echo wpautop($settings['description_text']); ?></div>
        <?php } 
        if(!empty($settings['cms_lists'])) { ?>
            <div class="cms-heading-list cms-lists">
                <?php foreach ($settings['cms_lists'] as $cms_lists_key => $cms_lists_value): ?>
                    <div class="cms-list-item">
                        <?php 
                            if($is_new){
                                \Elementor\Icons_Manager::render_icon(
                                    $cms_lists_value['list_icon'],
                                    [
                                        'aria-hidden' => 'true',
                                        'class'       => 'list-icon text-accent p-r5'
                                    ],
                                    'span'
                                );
                            }
                        ?>
                        <span class="list-text">
                            <?php echo esc_html($cms_lists_value['list_title']);  ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } 
            if(!empty($settings['btn_text'])) { ?>
            <a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <span><?php echo esc_html($settings['btn_text']); ?></span>
            </a>
        <?php } ?>
    </div>
</div>