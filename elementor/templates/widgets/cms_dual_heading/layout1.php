<?php
$widget->add_inline_editing_attributes('cms_header_first_header_text');

$widget->add_inline_editing_attributes('cms_header_second_header_text');

$first_title_tag = $settings['cms_header_first_header_tag'];

$first_title_text = $settings['cms_header_first_header_text'] . ' ';

$second_title_text = $settings['cms_header_second_header_text'];

$first_clip = '';

$second_clip = '';

$first_stroke = '';

$second_stroke = '';

if( 'clipped' === $settings['cms_header_first_back_clip'] ) : $first_clip = "cms-header-first-clip"; endif;

if( 'clipped' === $settings['cms_header_second_back_clip'] ) : $second_clip = "cms-header-second-clip"; endif;

if( ! empty( $first_clip ) && 'true' === $settings['cms_header_first_stroke'] ) : $first_stroke = " stroke"; endif;

if( ! empty( $second_clip ) && 'true' === $settings['cms_header_second_stroke'] ) : $second_stroke = " stroke"; endif;

$first_grad = $settings['cms_header_first_animated'] === 'true' ? ' gradient' : '';

$second_grad = $settings['cms_header_second_animated'] === 'true' ? ' gradient' : '';

$full_title = '<' . $first_title_tag . ' class="cms-header-first-wrapper ' . $first_clip . $first_stroke . $first_grad . '"><span class="cms-header-first-span">'. $first_title_text . '</span><span class="cms-header-second-span ' . $second_clip . $second_stroke . $second_grad . '">'. $second_title_text . '</span></' . $settings['cms_header_first_header_tag'] . '> ';

$link = '';
if( $settings['cms_header_link_switcher'] == 'true' && $settings['cms_heading_link_selection'] == 'link' ) {
    $link = get_permalink( $settings['cms_heading_existing_link'] );
} elseif( $settings['cms_header_link_switcher'] == 'true' && $settings['cms_heading_link_selection'] == 'url' ) {
    $link = $settings['cms_heading_link']['url'];
}
?>

<div class="cms-header-container">
    <?php if( ! empty ( $link ) ) : ?>
    <a href="<?php echo esc_attr( $link ); ?>" <?php if( ! empty( $settings['cms_heading_link']['is_external'] ) ) : ?> target="_blank" <?php endif; ?><?php if( ! empty( $settings['cms_heading_link']['nofollow'] ) ) : ?> rel="nofollow" <?php endif; ?>>
        <?php endif; ?>
        <div class="cms-header-first-container">
            <?php etc_print_html($full_title); ?>
        </div>
        <?php if( ! empty ( $link ) ) : ?>
    </a>
<?php endif; ?>
</div>