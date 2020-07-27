<?php
$widget->add_inline_editing_attributes('pricing_table_title_text');
$widget->add_inline_editing_attributes('pricing_table_description_text', 'advanced');
$widget->add_inline_editing_attributes('pricing_table_button_text');

$link_type = $settings['pricing_table_button_url_type'];

$target = $rel = '';
if($link_type == 'link'){
    $link_url = get_permalink($settings['pricing_table_button_link_existing_content']);
} elseif ($link_type == 'url') {
    $link_url = $settings['pricing_table_button_link']['url'];
    $target = !empty($settings['pricing_table_button_link']['is_external'])?'_blank':'';
    $rel = !empty($settings['pricing_table_button_link']['nofollow'])?'nofollow':'';
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>

<div class="cms-pricing-wrap bg-white cms-block-shadow text-center">
    <div class="cms-pricing-inner bg-gray">
        <?php if($settings['pricing_table_badge_switcher']) : ?>
            <div class="cms-pricing-badge cms-badge cms-badge-conner">
                <div class="corner"><span><?php echo esc_html($settings['pricing_table_badge_text']); ?></span></div>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_icon_switcher'] == 'true') : ?>
            <div class="cms-pricing-icon">
                <?php
                if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['pricing_table_icon_selection'], [ 'aria-hidden' => 'true' ] );
                ?>
                <?php else: ?>
                <i class="<?php echo esc_attr( $settings['pricing_table_icon_selection'] ); ?>"></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_price_switcher'] == 'true') : ?>
            <div class="cms-pricing-price">
                <span class="cms-price-wrap"><?php 
                    echo esc_html($settings['pricing_table_slashed_price_value']); 
                    echo esc_html($settings['pricing_table_price_currency']); 
                    echo esc_html($settings['pricing_table_price_value']); 
                ?></span>
                <span class="cms-price-package"><?php 
                    echo esc_html($settings['pricing_table_price_separator']); 
                    echo esc_html($settings['pricing_table_price_duration']); 
                ?></span>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_title_switcher'] == 'true') : ?>
            <div class="cms-pricing-title cms-heading h3">
                <span><?php echo esc_html($settings['pricing_table_title_text']);?></span>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_list_switcher'] == 'true') : ?>
            <div class="cms-pricing-list">
                <ul class="cms-pricing-list">
                    <?php
                        foreach( $settings['fancy_text_list_items'] as $item ):
                    ?>
                        <li>
                            <?php
                            if($is_new):
                                \Elementor\Icons_Manager::render_icon( $item['pricing_list_item_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                            <?php else: ?>
                            <i class="<?php echo esc_attr( $item['pricing_list_item_icon'] ); ?>"></i>
                            <?php endif; ?>
                            <span class="pricing-list-span"><?php echo esc_html($item['pricing_list_item_text']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_description_switcher'] == 'true') : ?>
            <div class="cms-pricing-description">
                <?php echo esc_html($settings['pricing_table_description_text']); ?>
            </div>
        <?php endif; ?>
        <?php if($settings['pricing_table_button_switcher'] == 'true') : ?>
            <div class="cms-pricing-button-wrap">
                <a class="cms-pricing-button  btn text-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>">
                    <span <?php etc_print_html($widget->get_render_attribute_string('pricing_table_button_text')); ?>><?php echo esc_html($settings['pricing_table_button_text']); ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>