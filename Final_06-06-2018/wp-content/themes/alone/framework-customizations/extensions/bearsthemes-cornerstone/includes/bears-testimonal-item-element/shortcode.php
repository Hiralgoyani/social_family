<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

if($layout == 'carousel-2') {
  /* set item background - layout carousel-2 */
  if(! empty($carousel_2_item_background)) {
    $style .= "background-color: {$carousel_2_item_background};";
  }
}

$image_default = get_template_directory_uri() . '/assets/images/image-default.jpg';

$class = "bearsthemes-element bearsthemes-testimonal-item-element {$class}";
$atts['content'] = $content;
$atts['avatar'] = ! empty($avatar) ? $avatar : $image_default;
?>
<div class="item">
  <div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
    <?php
    if(defined('FW')) {
      /**
       * @param
       * 1. path
       * 2. Params
       * 3. Return
       */
      fw_render_view(__DIR__ . "/layouts/{$layout}.php", array('atts' => $atts), false);
    } else {
      _e('Please install all plugins required!', 'alone');
    } ?>
  </div>
</div>
