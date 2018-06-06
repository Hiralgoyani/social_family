<?php
// echo '<pre>'; print_r($atts); echo '</pre>';

/* variable effect fade-in scroll */
if ( $fade == true ) {
 $fade = 'data-fade="true"';
 $data = cs_generate_data_attributes('column', array('fade' => true));
 switch ( $fade_animation ) {
   case 'in' :
     $fade_animation_offset = '';
     break;
   case 'in-from-top' :
     $fade_animation_offset = ' transform: translate(0, -' . $fade_animation_offset . '); ';
     break;
   case 'in-from-left' :
     $fade_animation_offset = ' transform: translate(-' . $fade_animation_offset . ', 0); ';
     break;
   case 'in-from-right' :
     $fade_animation_offset = ' transform: translate(' . $fade_animation_offset . ', 0); ';
     break;
   case 'in-from-bottom' :
     $fade_animation_offset = ' transform: translate(0, ' . $fade_animation_offset . '); ';
     break;
  }
  $fade_animation_style = 'opacity: 0;' . $fade_animation_offset . 'transition-duration: ' . $fade_duration . 'ms;';
}else {
  $data                 = '';
  $fade                 = '';
  $fade_animation_style = '';
}

$layout_atts['link-url'] = !empty($link_url) ? "{$link_url}" : '#'; // link url
$layout_atts['link-title'] = !empty($link_title) ? "title='{$link_title}'" : ''; // link title
$layout_atts['link-new-tab'] = ($link_new_tab == true) ? "target='_blank'" : ''; // link new tab
$layout_atts['font-size'] = !empty($font_size) ? "font-size: {$font_size};" : '';

/* class */
$class = "bearsthemes-element bearsthemes-button-element bt-btn bt-btn-{$layout} {$class} ";

/* custom font */
$layout_atts['custom-font'] = '';
if(!empty($custom_typography)) {
  $font_data = alone_get_extra_typography('get_style_font_by_name', $custom_typography);
  if(is_array($font_data)) {
    # unset color - color folow color theme
    unset($font_data['color']);
    # font Size
    if(!empty($layout_atts['font-size'])) { $font_data['font-size'] = $font_size; }

    $layout_atts['custom-font'] = alone_css_build_font_style($font_data);
  }
}else {
  $layout_atts['custom-font'] .= $layout_atts['font-size'];
}

/* style */
$style = $style . $fade_animation_style . $layout_atts['custom-font'];

/* template */
$button_temp = '';
switch ($layout) {
  case 'default':
  case 'border-line':
    $button_temp = '<a {attributes} {attr_title} {attr_target} {data}{fade}>{text}</a>';
    break;

  default:
    $button_temp = esc_html__('Template not exist!', 'alone');
    break;
}

/* array variable */
$array_variable = array(
  '{attributes}'  => cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style, 'href' => $layout_atts['link-url'] ) ),
  '{attr_title}'  => $layout_atts['link-title'],
  '{attr_target}' => $layout_atts['link-new-tab'],
  '{data}'        => $data,
  '{fade}'        => $fade,
  '{text}'        => $text,
);

echo str_replace(array_keys($array_variable), array_values($array_variable), $button_temp);
?>
