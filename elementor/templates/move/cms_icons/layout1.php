<?php
    if(!empty($settings['icons'])):
        $icons = json_decode($settings['icons'], true);
        foreach ($icons as $icon):
?>
            <i class="<?php echo esc_attr($icon['icon']); ?>"></i>
<?php
        endforeach;
    endif;
?>
