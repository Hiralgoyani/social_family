<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

$class = "bearsthemes-element bearsthemes-carousel-element {$class}";

// owl_options
$owl_options = array(
  'margin'      => ! empty($owl_carousel_margin) ? (int) $owl_carousel_margin : 0,
  'loop'        => ! empty($owl_carousel_loop) ? $owl_carousel_loop : false,
  'autoplay'    => ! empty($owl_carousel_autoplay) ? $owl_carousel_autoplay : false,
  'autoplayTimeout'     => ! empty($owl_carousel_autoplay_timeout) ? (int) $owl_carousel_autoplay_timeout : 5000,
  'autoplayHoverPause'  => ! empty($owl_carousel_autoplay_hover_pause) ? $owl_carousel_autoplay_hover_pause : false,
  'nav'         => ! empty($owl_carousel_show_nav) ? $owl_carousel_show_nav : false,
  'dots'        => ! empty($owl_carousel_show_dots) ? $owl_carousel_show_dots : false,
  'responsive'  => ! empty($owl_carousel_responsive) ? json_decode(stripslashes(html_entity_decode($owl_carousel_responsive)), true) : json_decode('{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}', true),
);

/* variables */
$array_variable = array(
  '{owl_options}' => json_encode($owl_options),
  '{content}' => $content,
);

/* template */
$testimonals_temp = '<div class="owl-carousel" data-bears-owl-carousel=\'{owl_options}\'>{content}</div>';

?>
<div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
  <div class="bearsthemes-element-inner">
    <?php echo str_replace(array_keys($array_variable), array_values($array_variable), $testimonals_temp); ?>
  </div>
</div>
