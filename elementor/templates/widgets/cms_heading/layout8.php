<div class="cms-heading-wrapper cms-heading-layout8">
    <div class="cms-heading-inner relative">
        <?php if ( !empty($settings['heading_text']) ) { ?>
            <div class="cms-heading h2"><?php echo esc_html($settings['heading_text']); ?></div>
        <?php  }
        if(!empty($settings['subheading_text'])) { ?>
            <div class="cms-heading-sub h4 m-t25"><?php echo esc_html($settings['subheading_text']); ?></div>
        <?php } 
        if(!empty($settings['description_text'])) { ?>
            <div class="cms-heading-desc m-t15"><?php echo wpautop($settings['description_text']); ?></div>
        <?php } ?>
    </div>
</div>