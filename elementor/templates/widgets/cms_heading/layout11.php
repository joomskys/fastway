<?php 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-heading-wrapper cms-heading-layout11">
    <div class="cms-heading-inner relative">
        <?php if ( !empty($settings['heading_text']) ) { ?>
            <div class="cms-heading h2 m-b15"><?php echo esc_html($settings['heading_text']); ?></div>
        <?php  }
        if(!empty($settings['subheading_text'])) { ?>
            <div class="cms-heading-sub m-b15 font-700"><?php echo esc_html($settings['subheading_text']); ?></div>
        <?php } 
        if(!empty($settings['description_text'])) { ?>
            <div class="cms-heading-desc m-b20"><?php echo wpautop($settings['description_text']); ?></div>
        <?php } 
        if(!empty($settings['cms_lists']) || !empty($settings['cms_lists_r'])){ ?>
            <div class="cms-heading-list cms-lists m-b20 row">
        <?php }
        if(!empty($settings['cms_lists'])) { ?>
            <div class="col-auto">
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
        if(!empty($settings['cms_lists_r'])) { ?>
            <div class="col-auto">
                <?php foreach ($settings['cms_lists_r'] as $cms_lists_key => $cms_lists_value): ?>
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
        if(!empty($settings['cms_lists']) || !empty($settings['cms_lists_r'])){ 
        ?>
            </div>
        <?php }
        fastway_elementor_button_render($widget, $settings, ['class' => 'cms-heading-btns']);
        ?>
    </div>
</div>