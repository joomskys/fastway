<?php
$html_id  = etc_get_element_id($settings);
$gap = 30;
$gap_item = 15;
$layout_mode = 'masonry';
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-gallery-inner',
] );
$filter_list = [];
foreach ($settings['galleries'] as $value){
	$filter_list[] = $value['filter_tag'];
}
$filter_list = array_unique($filter_list);

if($settings['thumbnail_size'] != 'custom'){
    $img_size = $settings['thumbnail_size'];
}
elseif(!empty($settings['thumbnail_custom_dimension']['width']) && !empty($settings['thumbnail_custom_dimension']['height'])){
    $img_size = $settings['thumbnail_custom_dimension']['width'] . 'x' . $settings['thumbnail_custom_dimension']['height'];
}
else{
    $img_size = 'full';
}

$col_xl = 12 / intval($widget->get_setting('col_xl', 4));
$col_lg = 12 / intval($widget->get_setting('col_lg', 3));
$col_md = 12 / intval($widget->get_setting('col_md', 2));
$col_sm = 12 / intval($widget->get_setting('col_sm', 1));
$gallery_columns = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-{$col_sm}";
?>
<?php if(isset($settings['galleries']) && !empty($settings['galleries']) && count($settings['galleries'])): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="cms-gallery cms-gallery-1">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        	<div class="grid-filter-wrap outline">
	            <span class="filter-item active" data-filter="*">All</span>
	            <?php foreach ($filter_list as $filter): ?>
	                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $filter); ?>">
	                    <?php echo esc_html($filter); ?>
	                </span>
	            <?php endforeach; ?>
	        </div>
        	<div class="cms-grid-masonry animation-time relative cms-images-light-box" data-layoutmode="<?php echo esc_attr($layout_mode);?>" data-gutter="<?php echo esc_attr($gap); ?>" style="margin: <?php echo esc_attr($gap_item*-1); ?>px;">
        		<div class="grid-sizer"></div>
	            <?php foreach ($settings['galleries'] as $value): 
	                $img = etc_get_image_by_size( array(
	                    'attach_id'  => $value['image']['id'],
	                    'thumb_size' => $img_size,
	                    'class'      => '',
	                ));
	                if(!empty($value['image']['id'])){
	                	$thumbnail = $img['thumbnail'];
	                } else {
	                	$thumbnail = fastway_default_image_thumbnail([
	                		'size' => 'large',
	                	]);
	                }
	                $filter_class = explode(',', $value['filter_tag']);
	                ?>
	                    <div class="cms-gallery-item grid-item <?php echo esc_attr($gallery_columns);?> p-0 <?php echo implode(' ', $filter_class);?>">
	                        <div class="cms-gallery-item-inner p-<?php echo esc_attr($gap_item);?>">
		                        <div class="cms-gallery-item-inner2 bg-gray p-10 cms-overlay-wrap cms-overlay1 cms-overlay-bottom-to-top">
	                                <div class="cms-gallery-image">
	                                    <?php echo wp_kses_post($thumbnail); ?>
	                                </div>
	                                <div class="cms-gallery-content cms-overlay-content cms-transition d-flex justify-content-center align-items-center text-center">
	                                	<div class="cms-gallery-content-inner">
		                                	<div class="cms-icon-list">
		                                		<?php if($settings['open_lightbox'] === 'yes') : ?><a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="<?php echo esc_attr($html_id);?>" href="<?php echo esc_url(wp_get_attachment_url($value['image']['id'])) ?>" class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white"><span class="fa fa-search"></span></a><?php endif; ?>
		                                		<?php if($settings['gallery_link'] === 'attachment') : ?><a href="<?php echo esc_url(get_attachment_link($value['image']['id'])) ?>" class="cms-icon cms-icon-46 bdr-solid bdr-3 bdr-white text-white"><span class="fa fa-link"></span></a><?php endif; ?>
		                                	</div>
		                                </div>
	                                </div>
		                        </div>
		                    </div>
	                    </div>
	            <?php 
	        	endforeach; ?>
        </div>
    </div>
<?php endif;
