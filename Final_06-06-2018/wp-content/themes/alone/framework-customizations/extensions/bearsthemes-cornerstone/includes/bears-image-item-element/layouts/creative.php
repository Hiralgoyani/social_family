<?php
extract($atts);
// echo '<pre>'; print_r($atts); echo '</pre>';

$image_default = get_template_directory_uri() . '/assets/images/image-default.jpg';
$image = ! empty($image) ? $image : $image_default;

$image_html = "<div class='image-ovelay' style='background: url({$image}) no-repeat center center / cover;'></div>";

$title_html = "";
if(!empty($title) && !empty($show_title_on_hover)) {
  $title_html = "<h4 class='title'>{$title}</h4>";
}
?>
<div class="grid-item-inner">
  <?php echo "{$image_html}"; ?>
  <?php echo "{$title_html}"; ?>
  <a href="<?php echo esc_attr($image); ?>" class="icon-zoom"><i class="fa fa-search"></i></a>
</div>
