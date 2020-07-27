<?php
$default_settings = [
    'active_section' => '',
    'cms_toggle'     => '',
    'icon'           => '',
    'icon_active'    => '',
    'title_html_tag' => 'div',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
$active_section = intval($active_section);
$toggles = $widget->get_settings('cms_toggle');
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($toggles)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-toggle cms-toggle-layout2">
        <?php foreach ($toggles as $key => $value):
            $is_active     = ($key + 1) == $active_section;
            $_id           = isset($value['_id']) ? $value['_id'] : '';
            $ac_title      = isset($value['ac_title']) ? $value['ac_title'] : '';
            $ac_title_icon = isset($value['ac_title_icon']) ? $value['ac_title_icon'] : '';
            $ac_content    = isset($value['ac_content']) ? $value['ac_content'] : '';

            $title_key = $widget->get_repeater_setting_key( 'ac_title', 'cms_toggle', $key );
            $widget->add_render_attribute( $title_key, [
                'class' => [ 'cms-toggle-title-text' ],
            ] );
            $widget->add_inline_editing_attributes( $title_key, 'basic' );

            $content_key = $widget->get_repeater_setting_key( 'ac_content', 'cms_toggle', $key );
            $widget->add_render_attribute( $content_key, [
                'id' => $_id,
                'class' => [ 'cms-toggle-content' ],
            ] );
            if($is_active){
                $widget->add_render_attribute( $content_key, 'style', 'display:block;' );
            }
            $widget->add_inline_editing_attributes( $content_key, 'basic' );
            ?>
            <div class="cms-toggle-item">
                <div class="cms-toggle-title <?php echo esc_attr($is_active?'active':''); ?> corner-skew" data-target="<?php echo esc_attr('#' . $_id); ?>">
                    <a <?php etc_print_html($widget->get_render_attribute_string( $title_key )); ?>><?php 
                        if($is_new){
                            \Elementor\Icons_Manager::render_icon(
                                $ac_title_icon,
                                [
                                    'aria-hidden' => 'true',
                                    'class'       => 'ac-title-icon'
                                ]
                            );
                        }
                        echo esc_html($ac_title); 
                    ?></a>
                    <span class="cms-toggle-title-icon">
                        <?php
                        if($is_new):
                            \Elementor\Icons_Manager::render_icon( $settings['main_icon'], [ 'aria-hidden' => 'true', 'class' => 'cms-toggle-title-icon-close' ] );
                            \Elementor\Icons_Manager::render_icon( $settings['icon_active'], [ 'aria-hidden' => 'true', 'class' => 'cms-toggle-title-icon-open' ] );
                            ?>
                        <?php else: ?>
                            <i class="cms-toggle-title-icon-close <?php echo esc_attr($main_icon); ?>"></i>
                            <i class="cms-toggle-title-icon-open <?php echo esc_attr($icon_active); ?>"></i>
                        <?php endif; ?>
                    </span>
                </div>
                <div <?php etc_print_html($widget->get_render_attribute_string( $content_key )); ?>><?php echo wp_kses_post(nl2br($ac_content)); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>