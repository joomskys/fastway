<?php
$widget->add_inline_editing_attributes('pricing_table_title_text');
$widget->add_inline_editing_attributes('pricing_table_description_text', 'advanced');
$widget->add_inline_editing_attributes('pricing_table_button_text');

$title_tag = $settings['pricing_table_title_size'];
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

<div class="pricing-table-container text-center">
    <?php if($settings['pricing_table_badge_switcher']) : ?>
        <div class="pricing-badge-container">
            <div class="corner"><span><?php echo esc_html($settings['pricing_table_badge_text']); ?></span></div>
        </div>
    <?php endif; ?>
    <?php if($settings['pricing_table_icon_switcher'] == 'true') : ?>
        <div class="pricing-icon-container">
            <?php
            if($is_new):
                \Elementor\Icons_Manager::render_icon( $settings['pricing_table_icon_selection'], [ 'aria-hidden' => 'true' ] );
            ?>
            <?php else: ?>
            <i class="<?php echo esc_attr( $settings['pricing_table_icon_selection'] ); ?>"></i>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if($settings['pricing_table_title_switcher'] == 'true') : ?>
    <<?php etc_print_html($title_tag);?> class="pricing-table-title"><span <?php etc_print_html($widget->get_render_attribute_string( 'pricing_table_title_text' )); ?>><?php echo esc_html($settings['pricing_table_title_text']);?></span></<?php etc_print_html($title_tag);?>><?php endif; ?>
<?php if($settings['pricing_table_price_switcher'] == 'true') : ?>
    <div class="pricing-price-container">
        <strike class="pricing-slashed-price-value">
            <?php echo esc_html($settings['pricing_table_slashed_price_value']); ?>
        </strike>
        <span class="pricing-price-currency">
            <?php echo esc_html($settings['pricing_table_price_currency']); ?>
        </span>
        <span class="pricing-price-value">
            <?php echo esc_html($settings['pricing_table_price_value']); ?>
        </span>
        <span class="pricing-price-separator">
            <?php echo esc_html($settings['pricing_table_price_separator']); ?>
        </span>
        <span class="pricing-price-duration">
            <?php echo esc_html($settings['pricing_table_price_duration']); ?>
        </span>
    </div>
<?php endif; ?>
<?php if($settings['pricing_table_list_switcher'] == 'true') : ?>
    <div class="pricing-list-container">
        <ul class="pricing-list">
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
    <div class="pricing-description-container">
        <div <?php etc_print_html($widget->get_render_attribute_string('pricing_table_description_text')); ?>>
            <?php echo esc_html($settings['pricing_table_description_text']); ?>
        </div>
    </div>
<?php endif; ?>
<?php if($settings['pricing_table_button_switcher'] == 'true') : ?>
    <div class="pricing-button-container">
        <a class="pricing-price-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>">
            <span <?php etc_print_html($widget->get_render_attribute_string('pricing_table_button_text')); ?>><?php echo esc_html($settings['pricing_table_button_text']); ?></span>
        </a>
    </div>
<?php endif; ?>
</div>