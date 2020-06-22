<?php
$cols = 12/intval($settings['per_line']);
$bar_color = ' data-bar-color="' . esc_attr($settings['bar_color']) . '"';
$track_color = ' data-track-color="' . esc_attr($settings['track_color']) . '"';
?>
<div class="cms-piecharts cms-piecharts--layout1">
    <div class="row">
        <?php foreach ($settings['piecharts'] as $key => $piechart): ?>
            <?php
                $pie_key = $widget->get_repeater_setting_key( 'piechart', 'piecharts', $key );
                $widget->add_render_attribute($pie_key, [
                    'class' => 'percentage',
                    'data-bar-color' => $settings['bar_color'],
                    'data-track-color' => $settings['track_color'],
                    'data-percent' => round($piechart['percentage_value']),
                ]);
            ?>
            <div class="piechart col-xs-12 col-sm-12 col-md-<?php echo esc_attr($cols); ?>">
                <div <?php etc_print_html($widget->get_render_attribute_string( $pie_key )); ?>>
                    <span><?php echo esc_html(round($piechart['percentage_value'])); ?><sup>%</sup></span>
                </div>
                <div class="label"><?php echo esc_html($piechart['stats_title']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>