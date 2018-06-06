<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

/* underline template */
$underline_temp = '';
switch ($layout) {
  case 'default':
    $underline_temp = '
    <div class="line"></div>
    <div class="dots">
      <span style="{background_color}"></span>
      <span style="{background_color}"></span>
    </div>';
    break;

  default:
    $button_temp = esc_html__('Template not exist!', 'alone');
    break;
}

/* max-width */
if(!empty($max_width)) { $style .= "max-width: {$max_width};"; }

/* variable */
$array_variable = array(
  '{color}' => !empty($color) ? "color: {$color};" : '',
  '{background_color}' => !empty($color) ? "background-color: {$color};" : '',
);

/* class */
$class = "bearsthemes-element bearsthemes-underline-element bearsthemes-underline-element-layout-{$layout} {$class} ";
?>
<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
  <?php echo str_replace(array_keys($array_variable), array_values($array_variable), $underline_temp); ?>
</div>
