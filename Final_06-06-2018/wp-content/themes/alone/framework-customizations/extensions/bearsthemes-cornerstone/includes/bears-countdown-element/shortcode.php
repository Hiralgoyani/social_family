<?php
// echo '<pre>'; print_r($atts); echo '</pre>';
$end_date_str = ! empty($end_date) ? explode('|', $end_date)[0] : '0000/00/00';
$end_date = date("Y/m/d", strtotime($end_date_str));

$class = "bearsthemes-element bearsthemes-countdown-element " . $class;
$attributes_data = array(
  'id' => $id,
  'class' => $class,
  'style' => $style,
);
$countdown_data = json_encode(array(
  'date_end' => $end_date,
  'template' => $template,
))
?>
<div <?php cs_atts( $attributes_data, true ); ?>>
  <div class="bearsthemes-element-inner" data-bears-countdown='<?php echo esc_attr($countdown_data); ?>'>

  </div>
</div>
