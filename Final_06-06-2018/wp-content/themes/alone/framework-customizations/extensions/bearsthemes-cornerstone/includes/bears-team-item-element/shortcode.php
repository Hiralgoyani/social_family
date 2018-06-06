<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

$class = "bearsthemes-element bearsthemes-team-item-element {$class}";
$atts['content'] = $content;
if(empty($atts['avatar'])) {
  $atts['avatar'] = get_template_directory_uri() . '/assets/images/image-default.jpg';;
}
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
