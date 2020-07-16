<?php 
	$subheading_text = explode('|', $settings['subheading_text']);
	$subheading_text[0] = '<span class="text-accent">'.$subheading_text[0].'</span>';
	$subheading_text = implode(' ', $subheading_text);
?>
<div class="cms-heading-wrapper cms-heading-layout7">
    <div class="cms-heading-inner relative"><?php
        if ( !empty($settings['heading_text']) ) { ?>
        	<div class="cms-heading h2"><?php echo esc_html($settings['heading_text']); ?></div>
        	<div class="cms-separator cms-separator-1 bg-accent m-t25"></div>
        <?php } 
        if(!empty($settings['subheading_text'])) { ?>
        	<div class="cms-heading-sub h2 m-t45"><?php echo wp_kses_post($subheading_text); ?></div>
       <?php } ?>
   </div>
</div>