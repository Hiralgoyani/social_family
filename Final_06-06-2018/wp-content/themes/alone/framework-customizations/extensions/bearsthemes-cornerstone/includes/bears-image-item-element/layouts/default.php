<?php
extract($atts);

$image_default = get_template_directory_uri() . '/assets/images/image-default.jpg';
$image = ! empty($image) ? $image : $image_default;

$image_html = "<img data-src='{$image}' src='data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==' class='lazyload' alt='#'>";

$title_html = "";
if(!empty($title) && !empty($show_title_on_hover)) {
  $title_html = "<h4 class='title'>{$title}</h4>";
}
?>
<div class="image-item-inner">
  <?php echo "{$image_html}"; ?>
  <?php echo "{$title_html}"; ?>
  <a href="<?php echo esc_attr($image); ?>" class="icon-zoom"><i class="fa fa-search"></i></a>
</div>
