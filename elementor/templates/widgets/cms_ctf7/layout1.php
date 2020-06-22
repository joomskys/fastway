<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);

if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-contact-form7">
        <div class="cms-contact-form-inner">
            <?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); ?>
        </div>
    </div>
<?php endif; ?>
