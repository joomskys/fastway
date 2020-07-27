<?php
$html_id   = etc_get_element_id($settings);
$tax       = array();
$source    = $widget->get_setting('source', '');
$orderby   = $widget->get_setting('orderby', 'date');
$order     = $widget->get_setting('order', 'desc');
$limit     = $widget->get_setting('limit', 6);
extract(etc_get_posts_of_grid('cms-service', [
    'source'   => $source,
    'orderby'  => $orderby,
    'order'    => $order,
    'limit'    => $limit,
]));
$col_xl = 12 / intval($widget->get_setting('col_xl', 4));
$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm}";
$gap = intval($widget->get_setting('gap', 30));
$gap_item = intval($gap / 2);

$layout_type = $widget->get_setting('layout_type', 'basic');
$masonry_layout_mode = $widget->get_setting('masonry_layout_mode', 'masonry');
if ($layout_type == 'masonry') {
    $grid_class = 'cms-grid-inner cms-grid-masonry row';
} else {
    $grid_class = 'cms-grid-inner row';
}
$filter                     = $widget->get_setting('filter', 'false');
$filter_alignment           = $widget->get_setting('filter_alignment', 'center');
$filter_default_title = $widget->get_setting('filter_default_title', 'All');

$thumbnail_size             = $widget->get_setting('thumbnail_size', '');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');
$title_tag                  = $widget->get_setting('title_tag', 'h3');
$pagination_type            = $widget->get_setting('pagination_type');
$load_more = array(
    'html_id'                    => $html_id,
    'startPage'                  => $paged,
    'maxPages'                   => $max,
    'total'                      => $total,
    'perpage'                    => $limit,
    'nextLink'                   => $next_link,
    'source'                     => $source,
    'orderby'                    => $orderby,
    'order'                      => $order,
    'limit'                      => $limit,
    'col_xl'                     => $col_xl,
    'col_lg'                     => $col_lg,
    'col_md'                     => $col_md,
    'col_sm'                     => $col_sm,
    'thumbnail_size'             => $thumbnail_size,
    'thumbnail_custom_dimension' => $thumbnail_custom_dimension,
    'pagination_type'            => $pagination_type,
    'gap_item'                   => $gap_item
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="cms-grid cms-service cms-service-layout1 cms-post-grid-layout1" data-layout="<?php echo esc_attr($layout_type); ?>" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>" data-gutter="<?php echo esc_attr($gap); ?>">
    <div class="cms-grid-overlay"></div>
    <?php if ($filter == "true" and $layout_type == 'masonry'): ?>
        <div class="grid-filter-wrap align-<?php echo esc_attr($filter_alignment); ?>">
            <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category):
                $category_arr = explode('|', $category);
                $tax[] = $category_arr[1];
                $term = get_term_by('slug',$category_arr[0], $category_arr[1]); 
            ?>
                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?> animation-time" data-layoutmode="<?php echo esc_attr($masonry_layout_mode);?>" data-gutter="<?php echo esc_attr($gap); ?>" style="margin-left: <?php echo esc_attr($gap_item*-1); ?>px;margin-right: <?php echo esc_attr($gap_item*-1); ?>px;">
        <?php if ($layout_type == 'masonry') : ?>
            <div class="grid-sizer"></div>
        <?php endif; ?>
        <?php
            $load_more['tax'] = $tax;
            fastway_elementor_get_service($posts, $load_more, $widget);
        ?>
    </div>
    <?php if ($layout_type == 'masonry' && $pagination_type == 'pagination') { ?>
        <div class="cms-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php fastway_posts_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $layout_type == 'masonry' && $pagination_type == 'loadmore') { ?>
        <div class="cms-load-more text-center" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
            <span class="btn btn-outline">
                <?php echo esc_html__('Load More', 'fastway') ?>
            </span>
        </div>
    <?php } ?>
    <?php fastway_elementor_button_render($widget, $settings); ?>
</div>