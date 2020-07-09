<div class="cms-heading-wrapper cms-heading-layout1">
    <div class="cms-heading-inner relative"><?php 
        if(!empty($settings['subheading_text'])){
        ?><div class="cms-heading-sub"><?php echo esc_html($settings['subheading_text']); ?></div><?php }
        if ( !empty($settings['heading_text']) ) { 
            ?><div class="cms-heading h2"><?php echo esc_html($settings['heading_text']); ?></div><?php 
        } 
    ?></div><div class="cms-separator cms-separator-1"></div>
    <?php if(!empty($settings['description_text'])) { ?>
        <div class="cms-heading-desc"><?php echo esc_html($settings['description_text']); ?></div>
    <?php } 
?></div>