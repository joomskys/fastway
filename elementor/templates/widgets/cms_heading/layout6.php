<div class="cms-heading-wrapper cms-heading-layout6">
    <div class="cms-heading-inner relative p-20 bg-white"><?php 
        if ( !empty($settings['heading_text']) ) { ?>
            <div class="cms-heading h4 text-uppercase m-b20 m-t10"><?php echo esc_html($settings['heading_text']); ?></div>
        <?php  } 
        if(!empty($settings['description_text'])) { ?>
            <div class="cms-heading-desc m-b25"><?php echo esc_html($settings['description_text']); ?></div>
        <?php }
        fastway_elementor_button_render($widget, $settings, ['class' => 'cms-heading-btns']);
        ?>
    </div>
</div>