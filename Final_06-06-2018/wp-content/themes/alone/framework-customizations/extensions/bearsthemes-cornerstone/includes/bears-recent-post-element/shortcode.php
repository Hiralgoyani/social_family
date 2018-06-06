<?php
// echo '<pre>'; print_r($atts); echo '</pre>';
$data_post = alone_get_posts(array(
  'sort'              => 'recent',
  'return_image_tag'  => false,
  'return_for_alone_image'  => true,
  'image_size'        => $image_size,
  'items'             => $post_count,
  'offset'            => $offset,
  'category'          => $category,
));

$atts_element = array(
  'id' => $id,
  'class' => "bearsthemes-element bearsthemes-recent-post-element {$class} recent-post-layout-{$layout} sticky-posts-{$sticky_posts}",
  'style' => $style,
  'data-bears-masonryhybrid' => json_encode(array('col' => (int) $columns, 'space' => 30)),
);
?>
<div <?php cs_atts( $atts_element, true ); ?>>
  <div class="element-inner">
    <?php
    if(defined('FW')) {
      /**
       * @param
       * 1. path
       * 2. Params
       * 3. Return
       */
       if(! empty($data_post)) :
         foreach($data_post as $post_item) :
           $atts['post_item'] = $post_item;
           fw_render_view(__DIR__ . "/layouts/{$layout}.php", array('atts' => $atts), false);
         endforeach;
         echo '<div class="grid-sizer"></div><div class="gutter-sizer"></div>';
       endif;
    } else {
      _e('Please install all plugins required!', 'alone');
    } ?>
  </div>
</div>
