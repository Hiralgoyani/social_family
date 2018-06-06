<?php
//echo '<pre>'; print_r($attr); echo '</pre>';
$query_args = array(
  'orderby'   => $order_by,
  'order'     => $order,
  'items'     => $number,
  'category'  => $category,
);
$items = alone_get_portfolio($query_args);
// echo '<pre>'; print_r($items); echo '</pre>';

$class = "bearsthemes-element bearsthemes-portfolio-element bearsthemes-portfolio-element-layout-{$layout} {$class}";
$class_uniqid = uniqid('portfolio_filter_');
$masonryhybrid_opts = json_encode(array(
  'col'               => (int) $columns,
  'space'             => (int) $space,
  'filter_selector'   => ".{$class_uniqid}",
));
?>
<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
  <div class="bearsthemes-element-inner">
    <!-- filter -->
    <?php if($filter == true) : ?>
    <div class="bt-portfolio-filter-warp">
      <?php alone_builder_filter_taxonomy_portfolio(array('custom_class' => $class_uniqid . ' ' . $filter_align, 'in_slug' => $category), true); ?>
    </div>
    <?php endif; ?>

    <div class="bt-portfolio-posts-warp" data-bears-masonryhybrid='<?php echo esc_attr($masonryhybrid_opts); ?>' data-bears-lightgallery='{"selector": ".item-zoom"}'>
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>
      <?php if(! empty($items) && count($items) > 0) {
        foreach($items as $item) {
          if(defined('FW')) {
            /**
             * @param
             * 1. path
             * 2. Params
             * 3. Return
             */
            fw_render_view(__DIR__ . "/layouts/{$layout}.php", array('atts' => $atts, 'item' => $item), false);
          } else {
            _e('Please install all plugins required!', 'alone');
          }
        }
      } ?>
    </div>
  </div>
</div>
