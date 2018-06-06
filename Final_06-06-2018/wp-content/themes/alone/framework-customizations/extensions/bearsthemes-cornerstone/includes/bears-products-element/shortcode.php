<?php
$products = alone_get_products($atts);
// echo '<pre>'; print_r($products); echo '</pre>';

$class_uniqid = uniqid('product_filter_');
$masonryhybrid_opts = json_encode(array(
  'col'               => (int) 4,
  'space'             => (int) 30,
  'filter_selector'   => ".{$class_uniqid}",
));

$row_html = $col_html = array();
switch ($layout) {
  case 'masonry':
    $row_html['start']  = '<div class="products-masonry-wrap" data-bears-masonryhybrid=\''. $masonryhybrid_opts .'\'><div class="grid-sizer"></div><div class="gutter-sizer"></div>';
    $row_html['end']    = '</div>';
    $col_html['start']  = "<div class='grid-item product-item {masonry_filter_class}'>";
    $col_html['end']    = '</div>';
    break;

  default:
    $row_html['start']  = '<div class="bt-row">';
    $row_html['end']    = '</div>';
    $col_html['start']  = "<div class='bt-{$columns} product-item'>";
    $col_html['end']    = '</div>';
    break;
}

/* class */
$class = "bearsthemes-element bearsthemes-products-element bearsthemes-products-element-layout-{$layout} {$class} woocommerce";
?>
<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
  <?php
  /* filter masonry */
  if($layout == 'masonry' && $filter == true) {
    echo alone_build_template_by_product_term(
      alone_get_all_product_cat(),
      'filter_masonry',
      array(
        'custom_class' => implode(' ', array($class_uniqid, $filter_align)),
        'in_slug'      => $category,
      )
    );
  }

  /* each items */
  echo "{$row_html['start']}";
    while ( $products->have_posts() ) {
      $products->the_post();
      $class_item_masonry_filter = alone_build_template_by_product_term(alone_get_category_by_id(get_the_ID()));

      echo str_replace(
        array('{masonry_filter_class}'),
        array($class_item_masonry_filter),
        $col_html['start']
      ); /* start column */

        /* load layout */
        switch ($layout) {
          case 'default':
            wc_get_template_part( 'content', 'product' );
            break;

          default:
            if(defined('FW')) {
              /**
               * @param
               * 1. path
               * 2. Params
               * 3. Return
               */
              fw_render_view(__DIR__ . "/layouts/{$layout}.php", array('atts' => $atts, 'content' => $content), false);
            } else {
              _e('Please install all plugins required!', 'alone');
            }
            break;
        }

      echo "{$col_html['end']}"; /* end column */
    }
    wp_reset_postdata();
  echo "{$row_html['end']}";
  ?>
</div>
