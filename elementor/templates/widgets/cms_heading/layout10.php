<?php 
	$subheading_text = explode('|', $settings['subheading_text']);
  if(count($subheading_text) > 2){
    $subheading_text[1] = '<span class="text-accent">'.$subheading_text[1].'</span>';
  } else {
    $subheading_text[0] = '<span class="text-accent">'.$subheading_text[0].'</span>';
  }
	
	$subheading_text = implode(' ', $subheading_text);
?>
<div class="cms-heading-wrapper cms-heading-layout10 text-center">
    <div class="cms-heading-inner relative"><?php
        if ( !empty($settings['heading_text']) ) { ?>
        	<div class="cms-heading h2 text-white"><?php echo esc_html($settings['heading_text']); ?></div>
        	<div class="cms-separator cms-separator-1 bg-accent m-t25 m-b45"></div>
        <?php } 
        if(!empty($settings['subheading_text'])) { ?>
        	<div class="cms-heading-sub h2 text-white"><?php echo wp_kses_post($subheading_text); ?></div>
        <?php }
          if(!empty($settings['description_text'])) { ?>
        <div class="cms-heading-desc text-white p-t20"><?php echo esc_html($settings['description_text']); ?></div>
        <?php }  ?>
   </div>
</div>