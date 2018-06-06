<?php
extract($atts);

/* color */
$layout_atts = array();
$layout_atts['title-color'] = ! empty($title_color) ? "color: {$title_color};" : '';
$layout_atts['subtitle-color'] = ! empty($subtitle_color) ? "color: {$subtitle_color};" : '';

/* title */
$title_html = "";
if(! empty($title)) {
  /* custom title font */
  $layout_atts['title-custom-font'] = '';
  if(! empty($title_custom_typography)) {
    $font_data = alone_get_extra_typography('get_style_font_by_name', $title_custom_typography);
    if(is_array($font_data)) {
      /* overide color */
      if(! empty($layout_atts['title-color'])) { $font_data['color'] = $title_color; }

      $layout_atts['title-custom-font'] = alone_css_build_font_style($font_data);
    }
  } else {
    $layout_atts['title-custom-font'] = $layout_atts['title-color'];
  }

  $title_style = implode(' ', array($layout_atts['title-custom-font']));
  $title_html .= "<h4 class='title' style=\"{$title_style}\">{$title}</h4>";
}

/* sub title */
$subtitle_html = "";
if(! empty($title)) {
  /* custom sub-title font */
  $layout_atts['subtitle-custom-font'] = '';
  if(! empty($subtitle_custom_typography)) {
    $font_data = alone_get_extra_typography('get_style_font_by_name', $subtitle_custom_typography);
    if(is_array($font_data)) {
      /* overide color */
      if(! empty($layout_atts['subtitle-color'])) { $font_data['color'] = $subtitle_color; }

      $layout_atts['subtitle-custom-font'] = alone_css_build_font_style($font_data);
    }
  } else {
    $layout_atts['subtitle-custom-font'] = $layout_atts['subtitle-color'];
  }

  $subtitle_style = implode(' ', array($layout_atts['subtitle-custom-font']));
  $subtitle_html .= "<div class='sub-title' style=\"{$subtitle_style}\">{$subtitle}</div>";
}

/* content */
$content_html = "";
if(! empty($content)) {
  /* custom sub-title font */
  $layout_atts['content-custom-font'] = '';
  if(! empty($content_custom_typography)) {
    $font_data = alone_get_extra_typography('get_style_font_by_name', $content_custom_typography);
    if(is_array($font_data)) {
      /* unset color, font-style, font-weight */
      unset($font_data['color']);
      unset($font_data['font-style']);
      unset($font_data['font-weight']);

      $layout_atts['content-custom-font'] = alone_css_build_font_style($font_data);
    }
  }

  $content_style = implode(' ', array($layout_atts['content-custom-font']));
  $content_html .= "<div class='entry-content' style=\"{$content_style}\">
    <i class='fa fa-quote-left' aria-hidden='true'></i>
    {$content}
  </div>";
}
?>
<?php
/* content */
echo "{$content_html}";
?>
<div class="testimonal-avavar-wrap">
  <?php
  /* avatar */
  if(!empty($avatar)){ echo "<img src='{$avatar}' alt=''>"; }

  /* title - sub-title */
  echo "<div class='extra-meta'>
    {$title_html}
    {$subtitle_html}
  </div>"
  ?>
</div>
