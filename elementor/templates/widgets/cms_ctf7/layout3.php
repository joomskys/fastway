<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);

if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 cms-cf7-layout3 p-30 bg-secondary" data-title="<?php echo esc_attr($settings['heading_text']); ?>">
        <div class="cms-cf7-inner">
            <?php if(!empty($settings['heading_text'])){ ?>
            	<div class="cms-form-heading h2 m-b25 text-white"><?php echo esc_html($settings['heading_text']); ?></div>
            <?php }
            	echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
            ?>
        </div>
    </div>
<?php endif;