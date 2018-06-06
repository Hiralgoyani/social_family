<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

$class = "bearsthemes-element bearsthemes-gallery-element bearsthemes-gallery-element-layout-{$layout} {$class}";

/* masonryhybrid opts */
$masonryhybrid_opts = array(
  'col'         => ! empty($columns) ? (int) $columns : 4,
  'space'       => ! empty($space) ? (int) $space : 0,
  'responsive'  => ! empty($responsive) ? json_decode(stripslashes(html_entity_decode($responsive)), true) : json_decode('{"420":{"col":1},"860":{"col":2}}', true),
);

$current_user = wp_get_current_user();
$masonryhybrid_resize_attr = "";
if($layout == 'creative') {
  $masonryhybrid_resize_opts = array(
    'celHeight' => ! empty($cel_height) ? (int) $cel_height : 200,
    'grid_name' => ! empty($grid_name) ? $grid_name : 'grid-layout-default',
  );

  /* load grid map */
  $grid_map = alone_gridmap_masonryhybrid_handle('get', $grid_name);
  if(! empty($grid_map)) {
    $masonryhybrid_resize_opts['sizeMap'] = $grid_map;
  }

  /* check admin login can resize item */
  if(user_can( $current_user, 'administrator' )) {
    $masonryhybrid_resize_opts['resize'] = true;
  }

  $masonryhybrid_resize_attr = "data-bears-masonryhybrid-resize='". json_encode($masonryhybrid_resize_opts, true) ."'";
}

/* lightgallery opts */
$lightgallery_opts = array(
  'selector'  => '.icon-zoom',
);

/* variables */
$array_variable = array(
  '{masonryhybrid_opts}'        => json_encode($masonryhybrid_opts),
  '{lightgallery_opts}'         => json_encode($lightgallery_opts),
  '{content}'                   => $content,
  '{masonryhybrid_resize_attr}' => $masonryhybrid_resize_attr,
);

/* template */
$testimonals_temp = "";
switch ($layout) {
  case 'default':
  case 'creative':
    $testimonals_temp .= '
    <div class="masonry-hybrid-wrap" data-bears-masonryhybrid=\'{masonryhybrid_opts}\' {masonryhybrid_resize_attr} data-bears-lightgallery=\'{lightgallery_opts}\'>
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>
      {content}
    </div>';
    break;

  default:
    $testimonals_temp = esc_html__('Layout not exist!', 'alone');
    break;
}
?>
<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
  <div class="bearsthemes-element-inner">
    <?php echo str_replace(array_keys($array_variable), array_values($array_variable), $testimonals_temp); ?>
  </div>
</div>
