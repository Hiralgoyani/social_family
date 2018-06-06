<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

$class = "bearsthemes-element bearsthemes-carousel-item-element {$class}";
?>
<div class="item">
  <div <?php cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ), true ); ?>>
    <?php echo do_shortcode("{$content}"); ?>
  </div>
</div>
