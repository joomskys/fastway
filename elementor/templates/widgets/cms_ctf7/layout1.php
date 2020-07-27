<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);

if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 cms-cf7-layout1 p-30 bg-gray">
        <div class="cms-cf7-inner">
            <?php if(!empty($settings['heading_text'])){ ?>
            	<div class="cms-form-heading h2 m-b25"><?php echo esc_html($settings['heading_text']); ?></div>
            	<div class="cms-separator cms-separator-1 bg-accent m-b40"></div>
            <?php }
            	echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
            ?>
        </div>
    </div>
<?php endif;